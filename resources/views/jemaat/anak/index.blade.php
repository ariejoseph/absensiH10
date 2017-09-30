@extends('index')

@section('content')

<ul class="nav nav-tabs">
	<li><a href="/jemaat">Kaum Saleh</a></li>
	<li class="active"><a href="#">Anak-Anak</a></li>
	<li><a href="/remaja">Remaja</a></li>
	<li><a href="/pemuda">Pemuda</a></li>
</ul>

<h2>Daftar Anak-Anak:</h2>
<div class="row">
	<div class="col-md-4 col-sm-6 col-xs-7 form-group">
		<div class="input-group">
			<input class="form-control" id="search" value="{{ empty($keyword) ? '' : $keyword }}" placeholder="Cari" type="text" onkeydown="if(event.keyCode == 13) { showResult(); return false; }">

	        <div class="input-group-btn">
	            <button type="button" class="btn btn-default" onclick="showResult()"><i class="glyphicon glyphicon-search"></i>
	            </button>
	        </div>
	    </div>
	</div>
	<div class="col-md-8 col-sm-6 col-xs-5">
		<a class="btn btn-small btn-primary pull-right" href="{{ url('anak/create') }}"><i class="fa fa-plus"></i> Add Anak-Anak</a>
	</div>
</div>
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
			<tr class="clickable-row" data-href="{{ url('anak', [$saudara->id]) }}" style="cursor: pointer;">
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