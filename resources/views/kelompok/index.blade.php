@extends('index')

@section('content')

<h2>Daftar Grup:</h2>
<a class="btn btn-small btn-primary pull-right" href="{{ url('kelompok/create', [$sidang]) }}" style="margin-bottom: 9px;"><i class="fa fa-plus"></i> Add Grup</a>
@if(count($daftarKelompok))
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nomor</th>
				<th>Koordinator</th>
				<th>Asisten</th>
			</tr>
		</thead>
		<tbody>
		@foreach($daftarKelompok as $kelompok)
			<tr class="clickable-row" data-href="{{ url('kelompok', [$kelompok->id]) }}" style="cursor: pointer;">
				<td>{{ $kelompok->id }}</td>
				<td>{{ $kelompok->koordinator }}</td>
				<td>{{ $kelompok->asisten }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@else
<p>tidak ada.</p>
@endif

@stop