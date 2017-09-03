@extends('index')

@section('content')

<h2>Daftar Sidang:</h2>
@if(count($daftarSidang))
	<table class="table">
		@foreach($daftarSidang as $sidang)
			<tr class="clickable-row" data-href="{{ url('absensi', [$sidang->id]) }}" style="cursor: pointer;">
				<td>{{ $sidang->nama }}</td>
			</tr>
		@endforeach
	</table>
@else
<p>tidak ada.</p>
@endif

@stop