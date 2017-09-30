@extends('index')

@section('content')

<h2>Daftar Hadir {{ $namaSidang }} ({{ date('F j, Y', strtotime($tanggal)) }}):</h2>
@if(count($daftarHadir))
	<ul>
		@if(count($dataResponse) == 1)
			@foreach($dataResponse as $sidang)
				@foreach($sidang['jemaat'] as $saudara)
					<ul>
						<li>{{ $saudara->name }}</li>
					</ul>
				@endforeach
			@endforeach
		@else
			@foreach($dataResponse as $sidang)
				@if($sidang['sidang']->nama == 'Sidang Pemecahan Roti')
					<li>Sesi {{ $sidang['sidang']->sesi }}</li>
				@else
					<li>Kelompok {{ $sidang['sidang']->kelompok }}</li>
				@endif
				@foreach($sidang['jemaat'] as $saudara)
					<ul>
						<li>{{ $saudara->name }}</li>
					</ul>
				@endforeach
				Jumlah hadir: {{ count($sidang['jemaat']) }}
			@endforeach
		@endif
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