<?php

namespace App\Http\Controllers;

use App\Models\CommonType;
use App\Models\WebsiteContent;
use Illuminate\Http\Request;

class WebsiteContentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:website-content-list|website-content-create|website-content-edit|website-content-delete', ['only' => ['index','store']]);
        $this->middleware('permission:website-content-create', ['only' => ['create','store']]);
        $this->middleware('permission:website-content-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:website-content-delete', ['only' => ['delete']]);
    }
    
    public function index(Request $request){

        $websitecontent = WebsiteContent::select('link_key', 'page_name')->distinct()->get()->groupBy('page_name');
        if($request->key && $request->page){
            $webcontent = WebsiteContent::where('page_name', $request->page)->where('link_key', $request->key);
            $count = $webcontent->count();
            if($count > 1){
                $settings = $webcontent->get();
            }else{
                $settings = $webcontent->first();
            }
            return view('admin.website-content.index',[
                'settings' => $settings,
                'websitecontents' => $websitecontent,
                'count' => $count,
                'key' => $request->key,
                'page' => $request->page,
            ])->with('key', $request->key)->with('page', $request->page);
        }
        else{
            $link_key = WebsiteContent::first()->link_key;
            $page_name = WebsiteContent::first()->page_name;
            $webcontent = WebsiteContent::where('link_key', $link_key)->where('page_name',$page_name);
            $count = $webcontent->count();
            if($count > 1){
                $settings = $webcontent->get();
            }else{
                $settings = $webcontent->first();
            }
            return view('admin.website-content.index',[
                'settings' => $settings, 
                'websitecontents' => $websitecontent,
                'count' => $count,
                'key' => $link_key,
                'page' => $page_name,
            ]);
        }
    }


    public function create(Request $request)
    {
        $key = $request->key;
        $page = $request->page;
        if($key != null){
            $websitecontent = WebsiteContent::where('link_key', $key)->where('page_name', $page)->first();
            return view('admin.website-content.create',['key' => $key, 'page' => $page, 'websitecontent' => $websitecontent]);
        }else{
            return view('admin.website-content.create', ['key' => $key, 'page' => $page]);
        }
            
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'link_key' => 'required',
        ],[
            'link_key.required' => 'The key field is required.',
        ]);

        $data = $request->all();


        if($data['cover_image_data'] != ""){
            $image = $request->file('image');
            $destinationPath = 'upload/website-content/';
            $imageValue = $destinationPath .  rand(1,999999).date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
        }

        unset($data['cover_image_data']);
        $page = $data['page_name'];
        $key = $data['link_key'];
            
        WebsiteContent::create($data);

        return redirect()->route('website-contents', ['key' => $key, 'page' => $page])->with('success','Website content created successfully.');
    }

    public function edit($id)
    {
        $data = WebsiteContent::find($id);
        return view('admin.website-content.edit',['settings' => $data, 'key' => $data->link_key, 'page' => $data->commonType->name])->with('key', $data->link_key)->with('page', $data->commonType->name);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'link_key' => 'required',
        ],[
            'link_key.required' => 'The key field is required.',
        ]);

        $data = $request->all();

        $old_data = WebsiteContent::find($id);
        $page = $old_data->page_name;

        if (isset($data['cover_image_data']) && $data['cover_image_data'] != "") {
            $image = $request->file('image');
            $destinationPath = 'upload/website-content/';
            $imageValue = $destinationPath .  rand(1, 999999) . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['image'] = $imageValue;
            if($old_data->image != ""){
                if(file_exists($old_data->image)){
                    unlink($old_data->image);
                }
            }
        }else{
            $data['image'] = $old_data->image;
        }

        WebsiteContent::find($id)->update($data);

        return redirect()->route('website-contents', ['key' => $old_data->link_key, 'page' => $page])->with('message','Website Content updated successfully');

    }

    public function delete($id)
    {
        $data = WebsiteContent::find($id);
        $page = $data->page_name;
        if(file_exists($data->image) && !empty($data->image)){
            unlink($data->image);
        }
            
        $data->delete();
        return redirect()->route('website-contents', ['key' => $data->link_key, 'page' => $page])->with('message','Website Content deleted successfully');
    }
}
