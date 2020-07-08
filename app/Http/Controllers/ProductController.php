<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product/index');
    }

    public function getProducts()
    {
        $products = Product::all();

        // add Value Category and imagePath to product
        foreach ($products as $product){
          
            $product->categorys = $product->categorys()->get();
           
            $product->imagePath = url('/')."/assets/images/".$product->image;
        }
        
        return $products;
    }


    public function getMinPriceProduct(){
      
        $min = [Product::min('price')];

        return $min;
    }

    public function getMaxPriceProduct(){
      
        $max = [Product::max('price')];

        return $max;
    }

    // Filtre Product With Price and Category
    public function filterProduct(Request $request){
      
        $idsCategory= $request->selected;

        if(count($idsCategory) == 0){ // check if User select !Category

            $products = Product::where('price', '>=', $request->start, 'and')->where('price', '<=', $request->end)->get();
        
        }elseif ($request->end == 0 || $request->start = 0) { // check if User select !Price
        
            $products = Product::whereHas('Categorys', function($q) use($idsCategory) {
        
                $q->whereIn('categories.id', $idsCategory);
        
            })->get();
       
        }else{
        
            $products = Product::where('price', '>=', $request->start, 'and')->where('price', '<=', $request->end,'and')->whereHas('Categorys', function($q) use($idsCategory) {
        
                $q->whereIn('categories.id', $idsCategory);
        
            })->get();
        }

        // add Value Category and imagePath to product
        foreach ($products as $product){
        
            $product->categorys = $product->categorys()->get();
        
            $product->imagePath = url('/')."/assets/images/".$product->image;
        }
      
        return $products;
    }

    
    public function testProductCreate(Request $request){

        // add Product
        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;

        $product->save();

        if ($product->save()) {
            response()->json(['success' => 'success'], 200);
        }else{
            response()->json(['error' => 'invalid'], 401);
        }

    }
}
