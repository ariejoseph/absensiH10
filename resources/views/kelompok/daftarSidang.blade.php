@extends('index')

@section('content')

<h2>Daftar Sidang:</h2>
@if(count($daftarSidang))
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Sidang</th>
			</tr>
		</thead>
		<tbody>
		@foreach($daftarSidang as $sidang)
			<tr class="clickable-row" data-href="{{ url('kelompok/sidang', [$sidang->nama]) }}" style="cursor: pointer;">
				<td>{{ $sidang->nama }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@else
<p>tidak ada.</p>
@endif

@stop