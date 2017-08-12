@extends('index')

@section('content')

<h2>{{ $namaSidang }} tanggal {{ $today }}</h2>
@if(count($gereja))
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