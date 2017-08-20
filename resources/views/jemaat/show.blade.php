@extends('index')

@section('content')

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-2 col-lg-offset-2 toppad" >
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2 style="margin: 0;">{{$gereja->name}}</h2>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://www.freeiconspng.com/uploads/user-icon-png-person-user-profile-icon-20.png" class="img-circle img-responsive" style="width: 128px;">
					</div>
					<br>
					<div class=" col-md-9 col-lg-9 "> 
						<table class="table table-user-information">
							<tbody>
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
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="panel-footer" style="height: 51px;">
				<span class="pull-right">
					<a href="{{ url('jemaat/'. $gereja->id .'/edit') }}" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
					<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
				</span>
			</div>

		</div>
	</div>
</div>
@stop