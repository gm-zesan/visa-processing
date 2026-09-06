<?php

namespace App\Http\Controllers;

use App\Models\CountryDetails;
use App\Models\VisaType;
use Illuminate\Http\Request;
use DataTables;
use DB;
class VisaTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:visa_type-list|visa_type-create|visa_type-edit|visa_type-delete', ['only' => ['index']]);
        $this->middleware('permission:visa_type-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:visa_type-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:visa_type-delete', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $visa_type = VisaType::get()->all();
            return DataTables::of($visa_type)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->addColumn('country_details_id ', function($row) {
                    return $row->countryDetails->country->name;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.visa_type.index');
    }

    public function create()
    {
        $countries = CountryDetails::all();
        return view('admin.visa_type.create', ['countries' => $countries]);
    }

    public function store(Request $request)
    { 
        $request->validate([
            'name' => 'required|unique:visa_types',
            'country_details_id' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name has already been taken.',
            'country_details_id.required' => 'The country field is required.',
        ]);

        $data = $request->all();

        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/visa_type/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }
        VisaType::create($data);
        
        return view('admin.visa_type.index');
        
    }

    public function edit($id)
    {
        $visa_type = VisaType::find($id);
        $countries = CountryDetails::all();
        return view('admin.visa_type.edit', ['visa_type' => $visa_type, 'countries' => $countries]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:visa_types,name,'.$id,
            'country_details_id' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name has already been taken.',
            'country_details_id.required' => 'The country field is required.',
        ]);
        $data = $request->all();
        $visa_type = VisaType::find($id);

        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/visa_type/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($visa_type->image != ""){
                if(file_exists($visa_type->image)){
                    unlink($visa_type->image);
                }
            }
        }

        $visa_type->update($data);
        return redirect()->route('visa_type')->with('success', 'Visa Type Updated Successfully');
    }

    public function delete($id)
    {
        $visa_type = VisaType::find($id);
        if($visa_type->image != ""){
            if(file_exists($visa_type->image)){
                unlink($visa_type->image);
            }
        }
        $visa_type->delete();
        return redirect()->route('visa_type')->with('success', 'Visa Type Deleted Successfully');
    }
}
