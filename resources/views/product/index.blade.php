@extends('lib.home')

@section('content')
	<div class="tableDiv">
        	@if(session('msg'))
        	 <p class="text-success">{{ session('msg') }}</p>
        	@endif			
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Brand Name</th>
					<th scope="col">Brand Picture</th>
					<th scope="col">Category</th>
					<th scope="col">Quantity</th>
					<th scope="col">Price</th>
					<th scope="col">Product Image</th>															
					<th scope="col">Description</th>
					<th scope="col">Action</th>					
				</tr>		
			</thead>
			<tbody>
		    	<tr>
					<td scope="row">1</td>
					<td>Ajwad Maahi</td>
					<td>Ajwad Maahi</td>
					<td>Ajwad Maahi</td>
					<td>Ajwad Maahi</td>
					<td>Ajwad Maahi</td>
					<td>Ajwad Maahi</td>
					<td>Ajwad Maahi</td>
					<td>
						<a href="" class="btn btn-primary">Update</a>
						<a href="" class="btn btn-danger">Delete</a>
					</td>
			    </tr>
	
			</tbody>		
		</table>	
	</div>


@endsection