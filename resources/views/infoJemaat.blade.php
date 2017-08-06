@extends('index')

@section('content')

<h2>{{ $gereja->name }}</h2>
<div class="table-responsive">          
	<table class="table">
		<tr>
			<td>Jenis Kelamin</td>
			<td>{{ $gereja->gender }}</td>
		</tr>
		<tr>
			<td>Tempat Tanggal Lahir</td>
			<td>{{ $gereja->place_of_birth }}, {{ $gereja->date_of_birth }}</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>{{ $gereja->address }}</td>
		</tr>
		<tr>
			<td>No. Telp</td>
			<td>{{ $gereja->phone }}</td>
		</tr>
	</table>
</div>

@stop