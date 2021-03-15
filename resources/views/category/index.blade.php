@extends('lib.home')

@section('content')
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
		    	<tr>
					<td scope="row">1</td>
					<td>Ajwad Maahi</td>
					<td>maahi@gmail</td>
					<td>
						<a href="" class="btn btn-primary">Update</a>
						<a href="" class="btn btn-danger">Delete</a>
					</td>
			    </tr>
	
			</tbody>		
		</table>	
	</div>


@endsection