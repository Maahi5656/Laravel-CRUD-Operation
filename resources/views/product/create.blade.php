@extends('lib.home')


@section('content')
    <div class="tableDiv">
        <form method="post" action="" class="w-75 border border-dark p-4" enctype="multipart/form-data">
        	@csrf

        	@if(session('msg'))
        	 <p class="text-success">{{ session('msg') }}</p>
        	@endif

        	<h5>Add New Product</h5>

            <div class="form-group">
                <label for="exampleInputImage">Product Image</label>
                <input type="file" name="productImage" class="d-bolck w-100 @error('productImage') is-invalid @enderror" id="exampleInputImage" placeholder="Product Image">
                <span class="text-danger">
            		@error('productImage')                	
                		<div class="alert alert-danger my-2">{{ $message }}</div>
                	@endif	
                </span>
            </div>

            <div class="form-group">
                <label for="exampleInputName">Product Name</label>
                <input type="text" name="productName" class="form-control @error('productName') is-invalid @enderror" id="exampleInputName" placeholder="Product Name">
                <span class="text-danger py-2">
            		@error('productName')                	
                		<div class="alert alert-danger my-2">{{ $message }}</div>
                	@endif
                </span>
            </div>

            <div class="form-group">
                <label for="exampleInputName">Product Brand</label>
                <select class="form-control @error('brandID') is-invalid @enderror" name="brandID">
                    <option value="" hidden>select</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>

                <span class="text-danger py-2">
            		@error('productBrand')                	
                		<div class="alert alert-danger my-2">{{ $message }}</div>
                	@endif
                </span>
            </div>

            <div class="form-group">
                <label for="exampleInputName">Product Category</label>
                <select class="form-control  @error('productName') is-invalid @enderror" name="category_id">
                	<option value="" hidden>select</option>
                	@foreach($categories as $category)
                		<option value="{{ $category->id }}">{{ $category->name }}</option>
                	@endforeach
                </select>
                <span class="text-danger py-2">
            		@error('productCategory')                	
                		<div class="alert alert-danger my-2">{{ $message }}</div>
                	@endif
                </span>
            </div>     

            <div class="form-group">
                <label for="exampleInputName">Quantity</label>
                <input type="text" name="productQuantity" class="form-control @error('productQuantity') is-invalid @enderror" id="exampleInputName" placeholder="Qunatity Of Product">
                <span class="text-danger py-2">
            		@error('productQuantity')                	
                		<div class="alert alert-danger my-2">{{ $message }}</div>
                	@endif
                </span>
            </div> 

            <div class="form-group">
                <label for="exampleInputName">Price</label>
                <input type="text" name="productPrice" class="form-control @error('productQuantity') is-invalid @enderror" id="exampleInputName" placeholder="Price Of Product">
                <span class="text-danger py-2">
            		@error('productPrice')                	
                		<div class="alert alert-danger my-2">{{ $message }}</div>
                	@endif
                </span>
            </div> 

            <div class="form-group">
                <label for="exampleInputName">Description</label>
                <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px"></textarea>
                <span class="text-danger py-2">
            		@error('productPrice')                	
                		<div class="alert alert-danger my-2">{{ $message }}</div>
                	@endif
                </span>
            </div>                                                                                    

            <input type="submit" name="add_product"  class="btn btn-primary" value="Add New">
        </form>		
	</div>

@endsection