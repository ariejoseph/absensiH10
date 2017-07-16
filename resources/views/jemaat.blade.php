@extends('index')

@section('content')

<h2>List jemaat:</h2>
@if(count($gereja))
	<ul>
		@foreach($gereja as $saudara)
			<li>{{ $saudara->name }}</li>
		@endforeach
	</ul>
@else
<p>tidak ada.</p>
@endif

@stop