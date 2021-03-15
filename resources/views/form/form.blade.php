@extends('lib.home')

@section('content')
		<form method="post" action="{{ route('home') }}" class="p-4 border border-dark w-75 mt-5" enctype="multipart/form-data">
		@csrf
		@if(session('msg'))
			<p class="text-success">{{ session('msg') }}</p>
		@endif	
			<h2>Form</h2>

		  	<div class="form-group">
	    		<label for="exampleInputName">Image</label>
		    	<input type="file" class="form-control @error('employeeImage') is-invalid @enderror" name="employeeImage" id="exampleInputname">
		    	<span class="text-danger">
            		@error('employeeImage')
		    			<div class="alert alert-danger my-2">{{ $message }}</div>
		    		@endif
		        </span>
		  	</div>

		  	<div class="form-group">
	    		<label for="exampleInputName">Username</label>
		    	<input type="text" class="form-control @error('employeeName') is-invalid @enderror" name="employeeName" id="exampleInputname">
		    	<span class="text-danger">
            		@error('employeeName')
		    			<div class="alert alert-danger my-2">{{ $message }}</div>
		    		@endif
		        </span>
		  	</div>	
		  	<div class="form-group">
		    	<label for="exampleInputName">Age</label>
		    	<input type="number" class="form-control @error('employeeAge') is-invalid @enderror" name="employeeAge" id="exampleInputname">
		    	<span class="text-danger">
            		@error('employeeAge')
	    				<div class="alert alert-danger my-2">{{ $message }}</div>
		    		@endif		    		
		    	</span>
		  	</div>		  		
		  	<div class="form-group">
		    	<label for="exampleInputEmail1">Email address</label>
		    	<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1">
            	<span class="text-danger">
            		@error('email')
		       			<div class="alert alert-danger my-2">{{ $message }}</div>
		    		@endif            		
            	</span>
		    
		    </div>
		  	<div class="form-group">
		    	<label for="exampleInputPassword1">Password</label>
		    	<input type="password" name="employeePassword" class="form-control @error('employeePassword') is-invalid @enderror" id="exampleInputPassword1">
            	<span class="text-danger">
            		@error('employeePassword')
		       			<div class="alert alert-danger my-2">{{ $message }}</div>
		    		@endif            		
            	</span>		    
		    </div>
		  <input type="submit" name="insert" class="btn btn-primary" value="Submit">
		</form>
		<br>
		<a href="{{ url('/') }}">Go Back</a>
	
@endsection