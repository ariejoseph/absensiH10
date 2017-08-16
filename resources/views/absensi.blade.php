@extends('index')

@section('content')

<h2>{{ $namaSidang }} ({{ $today }})</h2>
@if(count($gereja))
	<div class="form-group row">
		<div class="col-md-4 col-md-offset-8">
			<input type="text" class="form-control" id="search-input" onkeyup="searchup()" onkeydown="searchdown()" placeholder="Search">
		</div>
	</div>
	<table class="table table-striped">
		@foreach($gereja as $saudara)
			<tr>
				<td style="vertical-align: middle;">{{ $saudara->name }}</td>
				<td><a href="{{ url('absensi', [$sidang,$saudara->id]) }} " class="btn btn-primary pull-right">Hadir</a></td>
			</tr>
		@endforeach
	</table>
@else
<p>tidak ada.</p>
@endif

@stop