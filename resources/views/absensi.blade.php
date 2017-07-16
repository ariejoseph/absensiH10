@extends('index')

@section('content')

<h2>Sidang Pemecahan Roti</h2>
@if(count($gereja))
	<ul>
		@foreach($gereja as $saudara)
			<li>{{ $saudara->name }} <a href="{{ url('absensi', [$saudara->id,'SPR']) }}">HADIR</a></li>
		@endforeach
	</ul>
@else
<p>tidak ada.</p>
@endif

@stop