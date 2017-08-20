@extends('index')

@section('content')

<h2>Daftar Sidang:</h2>
@if(count($daftarSidang))
	<ul>
		@foreach($daftarSidang as $sidang)
			<li><a href="{{ url('absensi', [$sidang->id]) }}">{{ $sidang->nama }}</a></li>
		@endforeach
	</ul>
@else
<p>tidak ada.</p>
@endif

@stop