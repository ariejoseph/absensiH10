@extends('index')

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2 style="margin: 0;">Grup {{$kelompok->id}}</h2>
			</div>
			<div class="panel-body">
				<div class="row">
					<br>
					<div class=" col-md-12 col-lg-12 "> 
						<table class="table table-user-information">
							<tbody>
								<tr>
									<td style="vertical-align: middle;">Koordinator</td>
									<td style="vertical-align: middle;">{{ $kelompok->koordinator }}</td>
									<td><!-- <a href="{{ url('kelompok/'. $kelompok->id .'/edit') }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning pull-right"><i class="glyphicon glyphicon-edit"></i></a> --></td>
								</tr>
								<tr>
									<td style="vertical-align: middle;">Asisten</td>
									<td style="vertical-align: middle;">{{ $kelompok->asisten }}</td>
									<td><!-- <a href="{{ url('kelompok/'. $kelompok->id .'/edit') }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning pull-right"><i class="glyphicon glyphicon-edit"></i></a> --></td>
								</tr>
								<tr>
									<td style="vertical-align: middle;">Anggota</td>
									@foreach($listAnggota as $anggota)
										<td style="vertical-align: middle;">{{ $anggota->name }}<br></td>
										<td>
											<form method="POST" action="{{ url('anggota/hapus', [$kelompok->id, $anggota->id]) }}">
												{{ csrf_field() }}
												<button type="submit" class="btn btn-xs btn-danger pull-right">
													<i class="glyphicon glyphicon-remove"></i>
												</button>
											</form>
										</td>
										</tr>
										<tr>
										<td></td>
									@endforeach
									<td><a class="btn btn-small btn-primary" href="{{ url('anggota/create', [$kelompok->id]) }}"><i class="fa fa-plus"></i> Add anggota</a></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="panel-footer" style="height: 51px;">
				<span class="pull-right">
					<a href="{{ url('kelompok/'. $kelompok->id .'/edit') }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
					<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
				</span>
			</div>

		</div>
	</div>
</div>
@stop