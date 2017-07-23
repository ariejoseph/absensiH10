@extends('index')

@section('content')

<h2>{{ $namaSidang }} tanggal {{ $today }}</h2>
@if(count($gereja))
	<ul>
		@foreach($gereja as $saudara)
			<li>{{ $saudara->name }} <a href="{{ url('absensi', [$sidang,$saudara->id]) }}">HADIR</a></li>
		@endforeach
	</ul>
@else
<p>tidak ada.</p>
@endif

@stop