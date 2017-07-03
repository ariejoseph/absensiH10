@extends('index')

@section('content')

<h2>Daftar hadir SPR:</h2>
@if(count($daftarHadir))
	<ul>
		@foreach($daftarHadir as $saudara)
			<li>{{ $saudara->nama }}</li>
		@endforeach
	</ul>
@else
<p>tidak ada.</p>
@endif

@stop