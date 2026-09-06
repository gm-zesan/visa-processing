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
        $this->middleware('permission:country-delete', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $countries = CountryDetails::all();
            return DataTables::of($countries)
                ->addIndexColumn()
                ->addColumn('country_id', function($row) {
                    return $row->country->name;
                })
                ->addColumn('capital', function($row) {
                    return $row->country->capital;
                })
                ->addColumn('action-btn', function ($row) {
                    return $row->id;
                })
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
