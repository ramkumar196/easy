<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use View;
use Image;
use App\Http\Resources\Products as ProductResource;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $products = Product::all();
        if ($request->has('id')) {      
            $id = $request->input('id');
        $products= Product::where('id', $id)->get();
            }
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View::make('admin.pages.products.add');

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
            'product_name' => 'required',
            "description" => 'required',
            "price"=>'required|numeric',
            "offer"=>'required|numeric',
            "product_photo"=>'required|base64image|base64dimension',
            "product_photo_2"=>'required|base64image|base64dimension',
            "product_photo_3"=>'required|base64image|base64dimension',
            "product_photo_4"=>'required|base64image|base64dimension'
        ]); 
        
        $requestData = $request->all();


        $base64_str=$request->input('product_photo');
        
        if($base64_str != '')
        {
                $image = base64_decode($base64_str);
                $png_url = "product-".time().".png";
                $path = public_path() . "/uploads/products/" . $png_url;
                
                $img = Image::make($base64_str);
                $img->resize(700, 700);        
                $img->save($path);
                $requestData['product_photo'] = $png_url;
        }
        else{
            unset($requestData['product_photo']);
        }

        $base64_str=$request->input('product_photo_2');
        
        if($base64_str != '')
        {
                $image = base64_decode($base64_str);
                $png_url = "product-".time().".png";
                $path = public_path() . "/uploads/products/" . $png_url;
                
                $img = Image::make($base64_str);
                $img->resize(700, 700);        
                $img->save($path);
                $requestData['product_photo_2'] = $png_url;
        }
        else{
            unset($requestData['product_photo_2']);
        }
        $base64_str=$request->input('product_photo_3');
        
        if($base64_str != '')
        {
                $image = base64_decode($base64_str);
                $png_url = "product-".time().".png";
                $path = public_path() . "/uploads/products/" . $png_url;
                
                $img = Image::make($base64_str);
                $img->resize(700, 700);        
                $img->save($path);
                $requestData['product_photo_3'] = $png_url;
        }
        else{
            unset($requestData['product_photo_4']);
        }

        $base64_str=$request->input('product_photo_4');
        
        if($base64_str != '')
        {
                $image = base64_decode($base64_str);
                $png_url = "product-".time().".png";
                $path = public_path() . "/uploads/products/" . $png_url;
                
                $img = Image::make($base64_str);
                $img->resize(700, 700);        
                $img->save($path);
                $requestData['product_photo_4'] = $png_url;
        }
        else{
            unset($requestData['product_photo_4']);
        }
        
        //$requestData['product_photo'] = $png_url;
         Product::create($requestData);
        return ['message' => 'Product Created!'];
         
    }

    public function manage()
    {
        $products=ProductResource::collection(Product::all());
        return View::make('admin.pages.products.manage')->with('products',$products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Product::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
          return View::make('admin.pages.products.edit')->with(['product_id' => $id]);        
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::findOrFail($id);
        $validator=$request->validate([
            'product_name' => 'required|alpha_num',
            "description" => 'required',
            "price"=>'required|numeric',
            "offer"=>'required|numeric',
           // "product_photo"=>'base64image|base64dimension'
        ]);

        $requestData = $request->all();


        $base64_str=$request->input('product_photo');
        
        if($base64_str != '')
        {
                $image = base64_decode($base64_str);
                $png_url = "product-".time().".png";
                $path = public_path() . "/uploads/products/" . $png_url;
                
                $img = Image::make($base64_str);
                $img->resize(700, 700);        
                $img->save($path);
                $requestData['product_photo'] = $png_url;
        }
        else{
            unset($requestData['product_photo']);
        }

        $base64_str=$request->input('product_photo_2');
        
        if($base64_str != '')
        {
                $image = base64_decode($base64_str);
                $png_url = "product-".time().".png";
                $path = public_path() . "/uploads/products/" . $png_url;
                
                $img = Image::make($base64_str);
                $img->resize(700, 700);        
                $img->save($path);
                $requestData['product_photo_2'] = $png_url;
        }
        else{
            unset($requestData['product_photo_2']);
        }
        $base64_str=$request->input('product_photo_3');
        
        if($base64_str != '')
        {
                $image = base64_decode($base64_str);
                $png_url = "product-".time().".png";
                $path = public_path() . "/uploads/products/" . $png_url;
                
                $img = Image::make($base64_str);
                $img->resize(700, 700);        
                $img->save($path);
                $requestData['product_photo_3'] = $png_url;
        }
        else{
            unset($requestData['product_photo_4']);
        }

        $base64_str=$request->input('product_photo_4');
        
        if($base64_str != '')
        {
                $image = base64_decode($base64_str);
                $png_url = "product-".time().".png";
                $path = public_path() . "/uploads/products/" . $png_url;
                
                $img = Image::make($base64_str);
                $img->resize(700, 700);        
                $img->save($path);
                $requestData['product_photo_4'] = $png_url;
        }
        else{
            unset($requestData['product_photo_4']);
        }
        
        $product->update($requestData);
        return ['message' => 'Product Updated!'];

    }

    public function updateStatus(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $validator=$request->validate([
            'status' => 'required',
        ]);
        
        $product->update($request->all());
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
        $product->delete();

        return 204;
    }
}