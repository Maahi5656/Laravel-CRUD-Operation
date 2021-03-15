@extends('lib.home')

@section('content')
    @if(session('msg'))
       <p class="text-success">{{ session('msg') }}</p>
    @endif

	<div class="tableDiv">
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
				@foreach($brand as $row)
		    		<tr>
						<td scope="row">{{ $row->id }}</td>
						<td><img src="{{ asset('uploads/brand/'.$row->image) }}" class="img-thumbnail w-25" alt=""></td>
						<td><b>{{ $row->name }}</b></td>
						<td>
							<a href="{{ url('/brand/edit/'.$row->id) }}" class="btn btn-primary">Update</a>
							<a href="{{ url('/brand/delete/'.$row->id) }}" class="btn btn-danger">Delete</a>
						</td>
			    	</tr>
	            @endforeach
			</tbody>		
		</table>	
	</div>


@endsection