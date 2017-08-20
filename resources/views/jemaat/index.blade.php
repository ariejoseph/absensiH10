@extends('index')

@section('content')

<h2>List jemaat:</h2>
<a class="btn btn-small btn-primary pull-right" href="{{ url('jemaat/create') }}"><i class="fa fa-plus"></i> Add user</a>
@if(count($gereja))
	<ul>
		@foreach($gereja as $saudara)
			<li><a href="{{ url('jemaat', [$saudara->id]) }}">{{ $saudara->name }}</a></li>
			<!-- <a class="btn btn-small btn-info" href="{{ url('jemaat/'. $saudara->id .'/edit') }}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
			<form method="POST" action="{{ url('jemaat', [$saudara->id]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="DELETE">
				<button type="submit" class="btn btn-danger">
					<i class="fa fa-trash"></i> Delete
				</button>
			</form> -->
		@endforeach
	</ul>
@else
<p>tidak ada.</p>
@endif

@stop