<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    //
        public function index()
        {
            $category = Category::all();

    	    return view('category.index', compact('category'));
        }

        public function create()
        {
        	return view('category.create');
        }

        public function insert(Request $request)
        {

        	$request->validate([
             'categoryImage' => 'required',
             'categoryName' => 'required',

        	]);

        	$image = $request->file('categoryImage');
        	$extension = $image->getClientOriginalExtension();
        	$name = uniqid().".".$extension;
        	$path = base_path("public/uploads/category/".$name);
        	Image::make($image)->resize(200,200)->save($path);

        	$category = new Category;
        	$category->image = $name;
        	$category->name = $request->categoryName;

        	$category->save();

        	return redirect()->back()->with('msg','Successfully Added New Category');
        }

        public function delete($id)
        {
            Category::find($id)->delete();

            return redirect()->back()->with('msg','Successfully Deleted New Category');
        }

        public function edit($id){
           $category = Category::find($id);

           return view('category.edit',compact('category'));
        } 

        public function update(Request $request, $id)
        {
           $category = Category::find($id);
           
           $category->update([
              'name' => $request->categoryName,
           ]);
           
           if($request->file('cateoryImage'))
           {
            	$unlink_path = base_path('public/uploads/category/'.$category->image);
            	unlink($unlink_path);

            	$image = $request->file('cateoryImage');
            	$extension = $image->getClientOriginalExtension();
            	$newname = uniqid().".".$extension;
            	$path = base_path("public/uploads/brand/".$newname);
            	Image::make($image)->resize(200, 200)->save($path);

            	$category->update([
                   'image' => $request->cateoryImage,
            	]);
           }

           return redirect('/category/all')->with('msg','Category Successfully Updated');
        }  
}
