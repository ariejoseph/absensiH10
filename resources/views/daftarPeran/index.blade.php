@extends('index')

@section('content')

<h2>Daftar Peran:</h2>
<a class="btn btn-small btn-primary pull-right" href="{{ url('daftarPeran/create') }}" style="margin-bottom: 9px;"><i class="fa fa-plus"></i> Add Peran</a>
@if(count($daftarPeran))
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Peran</th>
			</tr>
		</thead>
		<tbody>
		@foreach($daftarPeran as $peran)
			<tr class="clickable-row" data-href="{{ url(route('daftarPeran.edit', [$peran->id])) }}" style="cursor: pointer;">
				<td>{{ $peran->peran }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@else
<p>tidak ada.</p>
@endif

@stop