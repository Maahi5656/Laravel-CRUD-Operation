@extends('lib.home')

@section('content')
<div class="taskdiv">
	<ul>
		<li><a href="{{ url('/home') }}">Add New</a></li>
		<li><a href="{{ url('/all') }}">View All</a></li>
	</ul>
</div>
@endsection