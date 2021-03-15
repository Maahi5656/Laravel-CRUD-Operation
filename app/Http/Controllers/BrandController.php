<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    //
    public function index(){

    	//select all data
        $brand = Brand::all();

    	return view('brand.index', compact('brand'));
    }

    public function create(){
       return view('brand.create');

    }

    public function insert(Request $request){

    	$request->validate([
          'brandImage' => 'required',
          'brandName' => 'required',
    	]);

    	$image = $request->file('brandImage');
    	$extension = $image->getClientOriginalExtension();
    	$newname = uniqid().".".$extension;
    	$path = base_path("public/uploads/brand/".$newname);
    	Image::make($image)->resize(200, 200)->save($path);

    	$brand = new Brand;
    	$brand->image = $newname;
    	$brand->name = $request->brandName;

    	$brand->save();

    	return redirect()->back()->with('msg','New Brand Created');
    }

    public function edit($id){
        $brand = Brand::find($id);

        return view('brand.edit', compact('brand'));

    }

    public function update(Request $request,$id){
        $brand = Brand::find($id);

        $brand->update([
          'name'=> $request->brandName,
        ]);

        if($request->file('brandImage')){
            //unlink
            $unlink_path = base_path('public/uploads/brand/'.$brand->image);
            unlink($unlink_path);

            $image = $request->file('brandImage');
            $extension = $image->getClientOriginalExtension();
            $newname = uniqid().".".$extension;
            $path = base_path("public/uploads/brand/".$newname);
            Image::make($image)->resize(200, 200)->save($path);

            $brand->update([
                'image'=>$newname,
            ]);
        }

        return redirect('/brand/all')->with('msg','Employee Successfully Updated');  
    }

    public function delete($id){
        Brand::find($id)->delete();

        return redirect()->back()->with('msg','Record Deleted Successfully');
    }
}
