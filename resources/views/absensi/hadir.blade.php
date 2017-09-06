@extends('index')

@section('content')

<h2>Daftar Hadir {{ $namaSidang }} ({{ date('F j, Y', strtotime($tanggal)) }}):</h2>
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
<br>
<h4>Saudara/i absen:</h4>
<ul>
	@foreach($yangAbsen as $saudara)
		<li>{{ $saudara->name }}</li>
	@endforeach
</ul>

@stop