<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Image;

class FormController extends Controller
{
    //
    public function index(){
    	return view('form.form');
    }

    public function insert(Request $request){
      
      $request->validate([
        'employeeName' => 'required',
        'employeeImage' => 'required',
        'email' => 'required|unique:employees',
        'employeePassword' => 'required|min:8',
        'employeeAge' => 'required|numeric',
      ]);

      $image = $request->file('employeeImage');
      $extension = $image->getClientOriginalExtension();
      $newname = uniqid().".".$extension;
      $path = base_path("public/uploads/".$newname);
      Image::make($image)->resize(100,50)->save($path);


      $employee = new Employee;
      $employee->image = $newname;
      $employee->username = $request->employeeName; 
      $employee->age = $request->employeeAge;
      $employee->email = $request->email;
      $employee->password = $request->employeePassword;

      $employee->save();

      return redirect()->back()->with('msg','New Employee Added');
    }

    public function seeAll(){
    	$employee = Employee::all();

     	return view('lib.table', compact('employee'));
    }

    public function edit($id){
    	$employee = Employee::find($id);

    	return view('lib.update', compact('employee'))->with('msg', 'Successfully Updated Employee Information');
    }

    public function update(Request $request,$id){

      $employee = Employee::find($id);

    	$employee->update([
    		'username' => $request->employeeName,
    		'email' => $request->email,
    		'age' => $request->employeeAge,
    		'password' => $request->employeePassword,
    	]);

      if($request->file('employeeImage')) {
          $unlink_path = base_path('public/uploads/'.$employee->image);
          unlink($unlink_path);

          $image = $request->file('employeeImage');
          $extension = $image->getClientOriginalExtension();
          $newname = uniqid().".".$extension;
          $path = base_path("public/uploads/".$newname);
          Image::make($image)->resize(100,50)->save($path);

          $employee->update([
              'image' => $newname,
          ]);
      }

        return redirect('/all')->with('msg','Employee Successfully Updated');

    }


    public function delete($id){
    	Employee::find($id)->delete();

    	return redirect('/all')->with('msg','Employee Successfully Deleted');
    }



}
