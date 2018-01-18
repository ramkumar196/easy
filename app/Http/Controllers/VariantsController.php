<?php

namespace App\Http\Controllers;

use App\Variants;
use Illuminate\Http\Request;
use View;

class VariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->has('id')) {      
            $id = $request->input('id');
            return  Variants::where('id', $id)->get();
            }
        return Variants::all();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View::make('admin.pages.variants.add');
        
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
            'variant_name' => 'required|unique:product_categories,category_name',
            "variant_type" => 'required',
            "product_category_id"=>'required',
            "variant_value"=>'required'
        ]); 

        Variants::create($request->all());
        return ['message' => 'Variant Created!'];
        
    }

    public function manage()
    {
        return View::make('admin.pages.variants.manage')->with('variants',Variants::all());        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function show(Variants $variants,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function edit(Variants $variants,$id)
    {
        //
        return View::make('admin.pages.variants.edit')->with(['variants_id' => $id]);                
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variants $variants,$id)
    {
        //
        $validator=$request->validate([
            'variant_name' => 'required|unique:product_categories,category_name',
            "variant_type" => 'required',
            "product_category_id"=>'required',
            "variant_value"=>'required'

        ]); 
        $variants = Variants::findOrFail($id);
        $variants->update($request->all());
        return $variants;
    }

    public function updateStatus(Request $request,$id)
    {
        $variants = Variants::findOrFail($id);
        $validator=$request->validate([
            'status' => 'required',
        ]);
        $variants->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variants  $variants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variants $variants)
    {
        //
    }
}
