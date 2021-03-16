<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Image;

class ProductController extends Controller
{
    //
    public function index(){
    	return view('product.index');
    }

    public function create(){
    	return view ('product.create',[
    		'categories' => Category::all(),
    		'brands' => Brand::all(),
    	]);
    }

    public function insert(Request $request){

    	$request->validate(
           'productImage' => 'required',
           'productName' => 'required|string',
           'brandID' => 'required|numeric',
           ''
    	);
    	$products = new Product;

    	$products
    }

    public function edit($id){
    	$products = Product::find($id);

    	return view('product.edit')
    }    
} 
