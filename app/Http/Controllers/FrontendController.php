<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontendController extends Controller
{
    public function index(){

        $products = Product::paginate(3);
        return view('index')->with('products', $products);
    }

    public function singleProduct($id){
        $product = Product::find($id);

        return view('single')->with('product', $product);
    }
}
