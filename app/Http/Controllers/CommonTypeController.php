<?php

namespace App\Http\Controllers;

use App\Models\CommonType;
use App\Models\WebsiteContent;
use Illuminate\Http\Request;
use DataTables;
use PhpOffice\PhpSpreadsheet\Calculation\Web;

class CommonTypeController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:commontype-list|commontype-create|commontype-edit|commontype-delete', ['only' => ['index','store']]);
        $this->middleware('permission:commontype-create', ['only' => ['create','store']]);
        $this->middleware('permission:commontype-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:commontype-delete', ['only' => ['delete']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $commonTypes = CommonType::get()->all();
            return DataTables::of($commonTypes)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.common-type.index');
    }

    public function create()
    {
        return view('admin.common-type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:common_types',
        ],[
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name has already been taken.',
        ]);
        $data = $request->except(['key']);
        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/common-type/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }
        CommonType::create($data);
        WebsiteContent::create([
            'page_name' => $request->name,
        ]);

        return redirect()->route('commontypes')->with('success','CommonType created successfully.');
    }

    public function edit($id)
    {
        return view('admin.common-type.edit',[
            'commontype' => CommonType::find($id),
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required | unique:common_types,name,'.$id,
        ],[
            'name.required' => 'The name field is required.',
            'name.unique' => 'The name has already been taken.',
        ]);
        $data = $request->all();
        $old_data = CommonType::find($id);
        
        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/common-type/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($old_data->image != ""){
                if(file_exists($old_data->image)){
                    unlink($old_data->image);
                }
            }
            
        }
        CommonType::find($id)->update($data);

        return redirect()->route('commontypes')->with('success','CommonType updated successfully.');
    }

    public function delete($id){
        $old_data = CommonType::find($id);
        if($old_data->image != ""){
            if(file_exists($old_data->image)){
                unlink($old_data->image);
            }
        }
        $old_data->delete();
        return redirect()->route('commontypes')->with('success','CommonType deleted successfully.');
    }
}
