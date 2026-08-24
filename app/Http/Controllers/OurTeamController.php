<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use DataTables;
class OurTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $ourTeams = OurTeam::all();
            return DataTables::of($ourTeams)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row){
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);

        }
        return view('admin.our_team.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.our_team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
        ]);
        $data = $request->all();
        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/our_team/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }
        OurTeam::create($data);
        return redirect()->route('our-team')->with('success', 'Our Team created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.our_team.edit', ['ourTeam' => OurTeam::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
        ]);
        $data = $request->all();
        $old_data = OurTeam::find($id);
        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/our_team/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }else{
            $data['image'] = $old_data->image;
        }
        OurTeam::find($id)->update($data);
        return redirect()->route('our-team')->with('success', 'Our Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $ourTeam = OurTeam::find($id);
        if($ourTeam->image != ""){
            if(file_exists($ourTeam->image)){
                unlink($ourTeam->image);
            }
        }
        OurTeam::find($id)->delete();
        return redirect()->route('our-team')->with('success', 'Our Team deleted successfully');
    }
}
