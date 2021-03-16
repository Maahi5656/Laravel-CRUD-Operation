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
					<th scope="col">Image</th> 
					<th scope="col">Name</th>
					<th scope="col">Action</th>

				</tr>		
			</thead>
			<tbody>
                @foreach($category as $row)
		    	    <tr>
				    	<td scope="row">{{ $row->id }}</td>
				    	<td>
				    		<img src="{{ asset('uploads/category/'.$row->image) }}" class="img-thumbnail w-25" alt="">
				    	</td>
				    	<td>{{ $row->name }}</td>
				    	<td>
				    		<a href="{{ url('/category/edit/'.$row->id)}}" class="btn btn-primary">Update</a>
				    		<a href="{{ url('/category/delete/'.$row->id) }}" class="btn btn-danger">Delete</a>
				    	</td>
			        </tr>
                @endforeach 
			</tbody>		
		</table>	
	</div>


@endsection