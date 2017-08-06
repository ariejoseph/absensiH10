@extends('index')

@section('content')

<h2>List jemaat:</h2>
@if(count($gereja))
	<ul>
		@foreach($gereja as $saudara)
			<li><a href="{{ url('jemaat', [$saudara->id]) }}">{{ $saudara->name }}</a></li>
		@endforeach
	</ul>
@else
<p>tidak ada.</p>
@endif

@stop