@extends('lib.home')

@section('content')
	<div class="tableDiv">
        <form method="post" action="{{ url('/category/edit/'.$category->id)  }}" class="w-75 border border-dark p-4" enctype="multipart/form-data">
        	@csrf

        	@if(session('msg'))
        	 <p class="text-success">{{ session('msg') }}</p>
        	@endif

        	<h5>Add New Brand</h5>
                <div class="form-group">
                    <label for="exampleInputImage">Image</label>
                    <input type="file" name="cateoryImage" class="d-bolck w-100 @error('categoryImage') is-invalid @enderror" id="exampleInputImage" placeholder="Brand Image">
                    <span class="text-danger">
                		@error('categoryImage')                	
                    		<div class="alert alert-danger my-2">{{ $message }}</div>
                    	@endif	
                    </span>
                </div>

                <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="input" name="categoryName" class="form-control @error('categoryName') is-invalid @enderror" id="exampleInputName" placeholder="Brand Name" value="{{ $category->name }}">
                    <span class="text-danger py-2">
                		@error('categoryName')                	
                    		<div class="alert alert-danger my-2">{{ $message }}</div>
                    	@endif
                    </span>
                </div>
            <input type="submit" name="update_category"  class="btn btn-primary" value="Update">
        </form>		
	</div>

@endsection
