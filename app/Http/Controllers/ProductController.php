<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DataTables;
class ProductController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','store']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::get()->all();
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('category_id', function($row) {
                    return $row->category->name;
                })
                ->addColumn('action-btn', function($row) {
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get()->all();
        return view('admin.products.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'category_id.required' => 'The category field is required.',
        ]);
        $data = $request->all();

        if($data['cover_thumbnail_data'] != "") {
            $image = $request->file('thumbnail');
            $destinationPath = 'upload/products/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['thumbnail'] = $imageValue;
        }
        Product::create($data);
        return redirect()->route('products')->with('success','Product created successfully.');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get()->all();
        return view('admin.products.edit',['product'=>$product,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
        ],[
            'name.required' => 'The name field is required.',
            'category_id.required' => 'The category field is required.',
            'price.required' => 'The price field is required.',
            'description.required' => 'The description field is required.',
        ]);
        $data = $request->all();
        $oldData = Product::find($id);
        if($request->hasFile('thumbnail') && $data['cover_thumbnail_data'] != "") {
            $image = $request->file('thumbnail');
            $destinationPath = 'upload/products/';
            $imageValue = $destinationPath . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imageValue);
            $data['thumbnail'] = $imageValue;
            if($oldData->thumbnail != ""){
                if(file_exists($oldData->thumbnail)){
                    unlink($oldData->thumbnail);
                }
            }
        } else {
            $data['thumbnail'] = $oldData->image;
        }
        $oldData->update($data);
        return redirect()->route('products')->with('success','Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $oldData = Product::find($id);
        if($oldData->thumbnail != ""){
            if(file_exists($oldData->thumbnail)){
                unlink($oldData->thumbnail);
            }
        }
        $oldData->delete();
        return redirect()->route('products')->with('success','Product deleted successfully.');
    }
}
