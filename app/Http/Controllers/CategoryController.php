<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use DataTables;
class CategoryController extends Controller
{
    
    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','store']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['delete']]);
    }

    public function index(Request $request){
        if ($request->ajax()) {
            $categories = Category::get()->all();
            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'The name field is required.',
        ]);
        $data = $request->all();
        Category::create($data);
        return redirect()->route('categories')->with('success','Category created successfully.');
    }

    
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit',['category'=>$category]);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'The name field is required.',
        ]);
        $data = $request->all();
        $oldData = Category::find($id);
        $oldData->update($data);
        return redirect()->route('categories')->with('success','Category updated successfully.');
    }

    
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories')->with('success','Category deleted successfully.');
    }
}
