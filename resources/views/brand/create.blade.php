@extends('lib.home')

@section('content')
	<div class="tableDiv">
        <form method="post" action="{{ route('brand.insert') }}" class="w-75 border border-dark p-4" enctype="multipart/form-data">
        	@csrf

        	@if(session('msg'))
        	 <p class="text-success">{{ session('msg') }}</p>
        	@endif

        	<h5>Add New Brand</h5>

            <div class="form-group">
                <label for="exampleInputImage">Image</label>
                <input type="file" name="brandImage" class="d-bolck w-100 @error('brandImage') is-invalid @enderror" id="exampleInputImage" placeholder="Brand Name">
                <span class="text-danger">
            		@error('brandImage')                	
                		<div class="alert alert-danger my-2">{{ $message }}</div>
                	@endif	
                </span>
            </div>

            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input type="input" name="brandName" class="form-control @error('brandName') is-invalid @enderror" id="exampleInputName" placeholder="Brand Name">
                <span class="text-danger py-2">
            		@error('brandName')                	
                		<div class="alert alert-danger my-2">{{ $message }}</div>
                	@endif
                </span>
            </div>

            <input type="submit" name="add_brand"  class="btn btn-primary" value="Add New">
        </form>		
	</div>

@endsection