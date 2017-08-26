@extends('index')

@section('content')

<h2>{{ $namaSidang }} ({{ $today }})</h2>
@if(count($gereja))
	<div class="form-group row">
		<div class="col-md-4 col-md-offset-8">
			<input type="text" class="form-control" id="search-input" onkeyup="searchup()" onkeydown="searchdown()" placeholder="Search">
		</div>
	</div>
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/absensi2') }}" onsubmit="return confirm('Are you sure?')">
		{{ csrf_field() }}
		<button id="absen" type="submit" disabled class="btn btn-success" style="padding-left: 6px; padding-right: 6px; padding-top: 3px; padding-bottom: 3px;">
			<i class="fa fa-btn fa-check"></i>
		</button>
		<input type="hidden" name="sidang" value="{{ $sidang }}">
		<table class="table table-striped">
			@foreach($gereja as $saudara)
				<tr>
					<td style="width: 29px; vertical-align: middle;"><input type="checkbox" name="check_list_jemaat[]" value="{{ $saudara->id }}"></td>
					<td id="name" style="vertical-align: middle;">{{ $saudara->name }}</td>
					<td><a href="{{ url('absensi', [$sidang,$saudara->id]) }} " class="btn btn-primary pull-right" onclick="return confirm('Are you sure?')">Hadir</a></td>
				</tr>
			@endforeach
		</table>
	</form>
@else
<p>tidak ada.</p>
@endif

@stop