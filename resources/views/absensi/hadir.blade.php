@extends('index')

@section('content')

<h2>Daftar Hadir {{ $namaSidang }} ({{ date('F j, Y', strtotime($tanggal)) }}):</h2>
@if(count($daftarHadir))
	<ul>
		@foreach($dataResponse as $sidang)
			<li>Sesi {{ $sidang['sidang']->sesi }}</li>
			@foreach($sidang['jemaat'] as $saudara)
				<ul>
					<li>{{ $saudara->name }}</li>
				</ul>
			@endforeach
			Jumlah hadir: {{ count($sidang['jemaat']) }}
		@endforeach
	</ul>
	<br>
	<p><h4>Jumlah hadir keseluruhan: {{ count($daftarHadir) }}</h4></p>
@else
<p>tidak ada.</p>
@endif
<br>
<h4>Saudara/i absen ({{ count($yangAbsen) }}):</h4>
<ul>
	@foreach($yangAbsen as $saudara)
		<li>{{ $saudara->name }}</li>
	@endforeach
</ul>

@stop