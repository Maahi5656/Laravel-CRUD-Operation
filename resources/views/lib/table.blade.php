@extends('lib.home')

@section('content')
    @if(session('msg'))
	    <p class="text-success">{{ session('msg') }}</p>
    @endif
	
	<div class="taskdiv">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Username</th>
					<th scope="col">Email</th>
					<th scope="col">Age</th>
					<th scope="col">Action</th>
				</tr>		
			</thead>
			<tbody>
				@foreach($employee as $row)
		    	<tr>
					<td scope="row">{{ $row->id }}</td>
					<td>{{ $row->username }}</td>
					<td>{{ $row->email }}</td>
					<td>{{ $row->age }}</td>
					<td>
						<a href="{{ url('/edit/'.$row->id) }}" class="btn btn-primary">Update</a>
						<a href="{{ url('/delete/'.$row->id)}}" class="btn btn-danger">Delete</a>
					</td>
			    </tr>
			@endforeach		
			</tbody>		
		</table>
		
	</div>

<a href="{{ url('/') }}">Go Back</a>

@endsection