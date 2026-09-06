<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CountryDetails;
use Illuminate\Http\Request;
use DataTables;

class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:country-list|country-create|country-edit|country-delete', ['only' => ['index']]);
        $this->middleware('permission:country-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:country-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:country-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $countries = CountryDetails::with('country')->get();
            return DataTables::of($countries)
                ->addIndexColumn()
                ->addColumn('flag', function($row) {
                    $flagUrl = '';
                    if ($row->country && !empty($row->country->flag) && file_exists(public_path('flags/' . $row->country->flag))) {
                        $flagUrl = asset('flags/' . $row->country->flag);
                    } elseif ($row->country && (!empty($row->country->iso_3166_2) || !empty($row->country->country_code))) {
                        $iso = strtolower(trim($row->country->iso_3166_2 ?? $row->country->country_code));
                        $flagUrl = "https://flagcdn.com/w80/{$iso}.png";
                    }

                    if ($flagUrl) {
                        return '<div class="table-flag-container" title="' . e($row->country->name ?? 'Flag') . '">
                            <img src="' . $flagUrl . '" alt="' . e($row->country->name ?? 'Flag') . '" class="table-flag-img" loading="lazy">
                        </div>';
                    }
                    return '<span class="table-flag-container text-muted"><i class="ri-flag-2-line"></i></span>';
                })
                ->addColumn('country_id', function($row) {
                    return $row->country ? '<span class="fw-semibold text-dark">' . e($row->country->name) . '</span>' : 'N/A';
                })
                ->addColumn('capital', function($row) {
                    return $row->country ? e($row->country->capital) : 'N/A';
                })
                ->addColumn('action-btn', function ($row) {
                    return $row->id;
                })
                ->rawColumns(['flag', 'country_id', 'action-btn'])
                ->make(true);
        }
        return view('admin.countries.index');
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.countries.create', ['countries' => $countries]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
        ], [
            'country_id.required' => 'Country is required',
        ]);

        $data = $request->all();

        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/country/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }

        if (isset($data['sectors']) && is_string($data['sectors']) && trim($data['sectors']) !== '') {
            $decoded = json_decode($data['sectors'], true);
            $data['sectors'] = json_last_error() === JSON_ERROR_NONE ? $decoded : null;
        }
        if (isset($data['worker_protections']) && is_string($data['worker_protections']) && trim($data['worker_protections']) !== '') {
            $decoded = json_decode($data['worker_protections'], true);
            $data['worker_protections'] = json_last_error() === JSON_ERROR_NONE ? $decoded : null;
        }

        CountryDetails::create($data);
        return redirect()->route('countries')->with('success', 'Country created successfully.');
    }

    public function edit($id)
    {
        $countryDetails = CountryDetails::find($id);
        $countries = Country::all();
        return view('admin.countries.edit', ['countryDetails' => $countryDetails, 'countries' => $countries]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'country_id' => 'required',
        ], [
            'country_id.required' => 'Country is required',
        ]);

        $data = $request->all();
        $old_data = CountryDetails::find($id);

        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/country/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($old_data->image != ""){
                if(file_exists($old_data->image)){
                    unlink($old_data->image);
                }
            }
        }

        if (isset($data['sectors']) && is_string($data['sectors']) && trim($data['sectors']) !== '') {
            $decoded = json_decode($data['sectors'], true);
            $data['sectors'] = json_last_error() === JSON_ERROR_NONE ? $decoded : null;
        }
        if (isset($data['worker_protections']) && is_string($data['worker_protections']) && trim($data['worker_protections']) !== '') {
            $decoded = json_decode($data['worker_protections'], true);
            $data['worker_protections'] = json_last_error() === JSON_ERROR_NONE ? $decoded : null;
        }

        $old_data->update($data);
        return redirect()->route('countries')->with('success', 'Country updated successfully.');
    }

    public function destroy($id)
    {
        $country = CountryDetails::find($id);
        if($country->image != ""){
            if(file_exists($country->image)){
                unlink($country->image);
            }
        }
        $country->delete();
        return redirect()->route('countries')->with('success', 'Country deleted successfully.');
    }


}
