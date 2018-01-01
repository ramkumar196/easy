<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;
use View;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->has('category_id')) {      
            $category_id = $request->input('category_id');
            return  ProductCategory::where('main_category', $category_id)->get();
       }
       if ($request->has('id')) {      
        $id = $request->input('id');
        return  ProductCategory::where('id', $id)->get();
        }
        if ($request->has('exp_id')) {      
            $id = $request->input('exp_id');
            return  ProductCategory::where('id', '!=', $id)->get();
        }

        return ProductCategory::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View::make('admin.pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator=$request->validate([
            'category_name' => 'required|unique:product_categories,category_name',
            "main_category" => 'required'
        ]); 

        ProductCategory::create($request->all());
        return ['message' => 'Product Category Created!'];
    }

    public function manage()
    {
        return View::make('admin.pages.category.manage')->with('category',ProductCategory::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCatergory  $productCatergory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCatergory,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCatergory  $productCatergory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory,$id)
    {
        //
        return View::make('admin.pages.category.edit')->with(['category_id' => $id]);        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCatergory  $productCatergory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory,$id)
    {
        //
        $validator=$request->validate([
            'category_name' => 'required|unique:product_categories,category_name,'.$id,
            "main_category" => 'required'
        ]); 
        $productcategory = ProductCategory::findOrFail($id);
        $productcategory->update($request->all());
        return $productcategory;
    }

    public function updateStatus(Request $request,$id)
    {
        $product = ProductCategory::findOrFail($id);
        $validator=$request->validate([
            'status' => 'required',
        ]);
        
        $product->update($request->all());
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCatergory  $productCatergory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCatergory $productCatergory)
    {
        //
    }
}
