@extends('index')

@section('content')

<h2>Daftar Hadir {{ $namaSidang }} tanggal {{ $tanggal }}:</h2>
@if(count($daftarHadir))
	<ul>
		@foreach($daftarHadir as $saudara)
			<li>{{ $saudara->name }}</li>
		@endforeach
	</ul>
	<br>
	<p><h4>Jumlah hadir: {{ count($daftarHadir) }}</h4></p>
@else
<p>tidak ada.</p>
@endif

@stop