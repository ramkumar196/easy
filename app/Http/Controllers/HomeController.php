<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
use App\Http\Resources\Products as ProductResource;
use App\Http\Resources\ProductCategories;


use View;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return View::make('frontend.pages.home');
    }

    public function categoryproductlist($id)
    {
        if(isset($id))
      return View::make('frontend.pages.productlist')->with(['category_id' => $id]);
      else
      return View::make('frontend.pages.productlist');
      
    }

    public function productdetail($id)
    {
      return View::make('frontend.pages.productdetail')->with(['product_id' => $id]);;
    }

    public function homeproducts($id)
    {
        $products=Product::find($id);
        return new ProductResource($products);
    }

    public function categorydetail($id)
    {
        $category=ProductCategory::find($id);
        return new ProductCategories($category);
    }

    public function categorylist(Request $request)
    {
        if ($request->has('id')) {      
            $category_id =$request->input('id');
            $categories=ProductCategory::where('main_category',$category_id)->get();//united
        }
        else
        {
            $categories=ProductCategory::where('main_category',0)->get();//united  
        }
        
        $categories=$this->addRelation($categories);
        
        return ProductCategories::collection($categories);

    }

    protected function selectChild($id)
    {
        $categories=ProductCategory::where('main_category',$id)->get(); //rooney

        $categories=$this->addRelation($categories);

        return $categories;

    }

    protected function addRelation($categories){

        $categories->map(function ($item, $key) {
            
            $sub=$this->selectChild($item->id); 
            
            return $item=array_add($item,'subCategory',$sub);

        });

        return $categories;
    }

    protected function productslist($id=''){

        if($id == 'new')
        $products=Product::orderBy('created_at', 'asc')->get();

        if($id == 'featured')
        $products=Product::orderBy('created_at', 'desc')->get();

        if($id == 'best')
        $products=Product::orderBy('created_at', 'desc')->get();

        $products=Product::all();

        return ProductResource::collection($products);
    }


    public function productFilter(Request $request){
      
        if(isset($request))
        {
            $order_by = '';
            if ($request->has('order_by')) {      
            $order_by =$request->input('order_by');
             }

            $cat_id ='';

            $product = DB::table('products');

            if ($request->has('category_id')) {      
            $cat_id=$request->input('category_id');
            $product->where('category_id', $cat_id);
            }

            //$product->offset(10)
                //->limit(5)

            //lowest price
            if($order_by == 1)
            $product->orderBy('price', 'desc');

            //highest price
            if($order_by == 2)
             $product->orderBy('price', 'asc');

            //product Name A to Z
            if($order_by == 3)
            $product->orderBy('product_name', 'desc');

            $products = $product->get();
        
            //$cat_id=$request->input('category_id');
           // $products=Product::where('category_id',$cat_id)->get();
        }
        else
        {
        $products=Product::all();            
        }

        return ProductResource::collection($products);
    }


    public function searchItems(Request $request)
    {
        $products = array();
        $keyword=$request->input('keyword');
        if ($request->has('keyword')) { 
            $products = Product::where('product_name','LIKE',"%{$keyword}%")
              ->get(); 
        }
        return $products;
    }





        




}
