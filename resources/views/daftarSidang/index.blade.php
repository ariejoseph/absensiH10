@extends('index')

@section('content')

<h2>Daftar Sidang:</h2>
<a class="btn btn-small btn-primary pull-right" href="{{ url('daftarSidang/create') }}" style="margin-bottom: 9px;"><i class="fa fa-plus"></i> Add Sidang</a>
@if(count($daftarSidang))
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Sidang</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		@foreach($daftarSidang as $sidang)
			<tr class="clickable-row" data-href="{{ url(route('daftarSidang.edit', [$sidang->id])) }}" style="cursor: pointer;">
				<td style="vertical-align: middle;">{{ $sidang->sidang }}</td>
				<td>
					<form method="POST" action="{{ url('daftarSidang', [$sidang->id]) }}">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="DELETE">
						<button type="submit" class="btn btn-sm btn-danger pull-right">
							<i class="fa fa-trash"></i>
						</button>
					</form>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
@else
<p>tidak ada.</p>
@endif

@stop