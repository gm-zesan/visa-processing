<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index()
    {
        $themes = Theme::get()->all();
        return view('admin.themes.index',['themes' => $themes]);
    }

    public function create()
    {
        return view('admin.themes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'The name field is required.',
        ]);
        $data = $request->all();

        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/theme/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }

        $previousTheme = Theme::where('status',1)->first();
        if($previousTheme == null){
            $data['status'] = 1;
        }
        Theme::create($data);

        return redirect()->route('theme')->with('success','Theme created successfully.');
    }

    public function edit($id)
    {
        return view('admin.themes.edit',[
            'theme' => Theme::find($id)
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->all();
        $old_data = Theme::find($id);
        
        if($data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/theme/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($old_data->image != ""){
                if(file_exists($old_data->image)){
                    unlink($old_data->image);
                }
            }
            
        }
        Theme::find($id)->update($data);

        return redirect()->route('theme')->with('success','Theme updated successfully.');
    }

    public function delete($id)
    {
        $theme = Theme::find($id);
        if($theme->image != ""){
            if(file_exists($theme->image)){
                unlink($theme->image);
            }
        }
        $theme->delete();
        return redirect()->route('theme')->with('success','Theme deleted successfully.');
    }

    public function activate($id)
    {
        $previousTheme = Theme::where('status',1)->first();
        $activateTheme = Theme::find($id);
        if($activateTheme != null && $previousTheme != null){
            $previousTheme->status = 0;
            $previousTheme->save();
            $activateTheme->status = 1;
            $activateTheme->save();
        }
        return redirect()->route('theme')->with('success','Theme activated successfully.');
    }


}
