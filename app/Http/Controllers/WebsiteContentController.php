<?php

namespace App\Http\Controllers;

use App\Models\WebsiteContent;
use Illuminate\Http\Request;

class WebsiteContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:website-content-list|website-content-create|website-content-edit|website-content-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:website-content-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:website-content-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:website-content-delete', ['only' => ['delete']]);
    }
    
    public function index(Request $request)
    {
        // Defined logical page ordering for clean navigation
        $pageOrder = [
            'Home' => 1,
            'About' => 2,
            'Service' => 3,
            'Faq' => 4,
            'Terms of use' => 5,
            'Privacy Policy' => 6,
            'Contact' => 7,
            'Blog' => 8,
            'Team' => 9,
            'Website Setting' => 10,
            'Admin Setting' => 11,
        ];

        $rawContents = WebsiteContent::select('link_key', 'page_name')->distinct()->get()->groupBy('page_name');
        
        // Sort grouped pages by established logical order
        $websitecontent = $rawContents->sortBy(function ($items, $pageName) use ($pageOrder) {
            return $pageOrder[$pageName] ?? 99;
        });

        $activeKey = $request->key;
        $activePage = $request->page;

        if ($activeKey && $activePage) {
            $webcontent = WebsiteContent::where('page_name', $activePage)->where('link_key', $activeKey);
            $count = $webcontent->count();
            if ($count > 1) {
                $settings = $webcontent->get();
            } else {
                $settings = $webcontent->first();
            }
            return view('admin.website-content.index', [
                'settings' => $settings,
                'websitecontents' => $websitecontent,
                'count' => $count,
                'key' => $activeKey,
                'page' => $activePage,
            ])->with('key', $activeKey)->with('page', $activePage);
        } else {
            $first = WebsiteContent::first();
            $link_key = $first ? $first->link_key : 'home-hero-section';
            $page_name = $first ? $first->page_name : 'Home';
            $webcontent = WebsiteContent::where('link_key', $link_key)->where('page_name', $page_name);
            $count = $webcontent->count();
            if ($count > 1) {
                $settings = $webcontent->get();
            } else {
                $settings = $webcontent->first();
            }
            return view('admin.website-content.index', [
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
        if ($key != null) {
            $websitecontent = WebsiteContent::where('link_key', $key)->where('page_name', $page)->first();
            return view('admin.website-content.create', ['key' => $key, 'page' => $page, 'websitecontent' => $websitecontent]);
        } else {
            return view('admin.website-content.create', ['key' => $key, 'page' => $page]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'link_key' => 'required',
        ], [
            'link_key.required' => 'The key field is required.',
        ]);

        $data = $request->all();

        if (isset($data['cover_image_data']) && $data['cover_image_data'] != "") {
            $image = $request->file('image');
            if ($image) {
                $destinationPath = 'upload/website-content/';
                $imageValue = $destinationPath . rand(1, 999999) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageValue);
                $data['image'] = $imageValue;
            }
        }

        unset($data['cover_image_data']);
        $page = $data['page_name'];
        $key = $data['link_key'];
            
        WebsiteContent::create($data);

        clearWebsiteContentCache();

        return redirect()->route('website-contents', ['key' => $key, 'page' => $page])->with('success', 'Website content created successfully.');
    }

    public function edit($id)
    {
        $data = WebsiteContent::findOrFail($id);
        $page = $data->page_name;
        return view('admin.website-content.edit', ['settings' => $data, 'key' => $data->link_key, 'page' => $page])->with('key', $data->link_key)->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'link_key' => 'required',
        ], [
            'link_key.required' => 'The key field is required.',
        ]);

        $data = $request->all();

        $old_data = WebsiteContent::findOrFail($id);
        $page = $old_data->page_name;

        if (isset($data['cover_image_data']) && $data['cover_image_data'] != "") {
            $image = $request->file('image');
            if ($image) {
                $destinationPath = 'upload/website-content/';
                $imageValue = $destinationPath . rand(1, 999999) . date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageValue);
                $data['image'] = $imageValue;
                if ($old_data->image != "" && file_exists(public_path($old_data->image))) {
                    @unlink(public_path($old_data->image));
                }
            }
        } else {
            $data['image'] = $old_data->image;
        }

        unset($data['cover_image_data']);

        $old_data->update($data);

        clearWebsiteContentCache();

        return redirect()->route('website-contents', ['key' => $old_data->link_key, 'page' => $page])->with('success', 'Website Content updated successfully');
    }

    public function delete($id)
    {
        $data = WebsiteContent::findOrFail($id);
        $page = $data->page_name;
        $key = $data->link_key;
        if (!empty($data->image) && file_exists(public_path($data->image))) {
            @unlink(public_path($data->image));
        }
            
        $data->delete();

        clearWebsiteContentCache();

        return redirect()->route('website-contents', ['key' => $key, 'page' => $page])->with('success', 'Website Content deleted successfully');
    }
}
