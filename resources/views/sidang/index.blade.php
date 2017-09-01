@extends('index')

@section('content')

<h2>Daftar Sidang:</h2>
<a class="btn btn-small btn-primary pull-right" href="{{ url('sidang/create') }}"><i class="fa fa-plus"></i> Add sidang</a>
@if(count($daftarSidang))
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Sidang</th>
				<th>Sesi</th>
				<th>Waktu</th>
				<th>Lokasi</th>
				<th>Kelompok</th>
			</tr>
		</thead>
		<tbody>
		@foreach($daftarSidang as $sidang)
			<tr class="clickable-row" data-href="{{ url(route('sidang.edit', [$sidang->id])) }}" style="cursor: pointer;">
				<td>{{ $sidang->nama }}</td>
				<td>{{ $sidang->sesi }}</td>
				<td>{{ $sidang->start }} - {{ $sidang->end}}</td>
				<td>{{ $sidang->lokasi }}</td>
				<td>{{ $sidang->kelompok }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@else
<p>tidak ada.</p>
@endif

@stop