@extends('index')

@section('content')

<h2>Daftar Kaum Saleh:</h2>
<a class="btn btn-small btn-primary pull-right" href="{{ url('jemaat/create') }}" style="margin-bottom: 9px;"><i class="fa fa-plus"></i> Add Kaum Saleh</a>
@if(count($gereja))
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Panggilan</th>
				<th>JK</th>
				<th>Alamat</th>
				<th>HP</th>
			</tr>
		</thead>
		<tbody>
		@foreach($gereja as $saudara)
			<tr class="clickable-row" data-href="{{ url('jemaat', [$saudara->id]) }}" style="cursor: pointer;">
				<td>{{ $saudara->name }}</td>
				<td>{{ $saudara->nickname }}</td>
				<td>{{ $saudara->gender }}</td>
				<td>{{ $saudara->address }}</td>
				<td>{{ $saudara->phone }}</td>
			</tr>
			<!-- <a class="btn btn-small btn-info" href="{{ url('jemaat/'. $saudara->id .'/edit') }}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
			<form method="POST" action="{{ url('jemaat', [$saudara->id]) }}">
				{{ csrf_field() }}
				<input type="hidden" name="_method" value="DELETE">
				<button type="submit" class="btn btn-danger">
					<i class="fa fa-trash"></i> Delete
				</button>
			</form> -->
		@endforeach
		</tbody>
	</table>
	<div id="pagination" class="pull-right">
		{{ $gereja->links() }}
	</div>
@else
<p>tidak ada.</p>
@endif

@stop