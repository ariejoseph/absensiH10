@extends('index')

@section('content')

<h2>Edit {{ $sidang->nama }}</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/sidang', [$sidang->id]) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Sidang</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $sidang->nama }}">

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hall') ? ' has-error' : '' }}">
                            <label for="hall" class="col-md-4 control-label">Hall</label>

                            <div class="col-md-6">
                                <input id="hall" type="number" min="1" class="form-control" name="hall" value="{{ $sidang->hall }}">

                                @if ($errors->has('hall'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hall') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sesi') ? ' has-error' : '' }}">
                            <label for="sesi" class="col-md-4 control-label">Sesi</label>

                            <div class="col-md-6">
                                <input id="sesi" type="number" min="1" class="form-control" name="sesi" value="{{ $sidang->sesi }}">

                                @if ($errors->has('sesi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sesi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hari') ? ' has-error' : '' }}">
                            <label for="hari" class="col-md-4 control-label">Hari</label>

                            <div class="col-md-6">
                                <!-- <input id="role" type="text" class="form-control" name="role" value="{{ old('role') }}"> -->
                                <select name="hari" class="form-control">
                                    <option value="Senin" {{ $sidang->hari === 'Senin' ? "selected":"" }}>Senin</option>
                                    <option value="Selasa" {{ $sidang->hari === 'Selasa' ? "selected":"" }}>Selasa</option>
                                    <option value="Rabu" {{ $sidang->hari === 'Rabu' ? "selected":"" }}>Rabu</option>
                                    <option value="Kamis" {{ $sidang->hari === 'Kamis' ? "selected":"" }}>Kamis</option>
                                    <option value="Jumat" {{ $sidang->hari === 'Jumat' ? "selected":"" }}>Jumat</option>
                                    <option value="Sabtu" {{ $sidang->hari === 'Sabtu' ? "selected":"" }}>Sabtu</option>
                                    <option value="Minggu" {{ $sidang->hari === 'Minggu' ? "selected":"" }}>Minggu</option>
                                </select>

                                @if ($errors->has('hari'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hari') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start') ? ' has-error' : '' }}">
                            <label for="start" class="col-md-4 control-label">Mulai</label>

                            <div class="col-md-6">
                                <input id="start" type="time" class="form-control" name="start" value="{{ $sidang->start }}">

                                @if ($errors->has('start'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('end') ? ' has-error' : '' }}">
                            <label for="end" class="col-md-4 control-label">Selesai</label>

                            <div class="col-md-6">
                                <input id="end" type="time" class="form-control" name="end" value="{{ $sidang->end }}">

                                @if ($errors->has('end'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                            <label for="lokasi" class="col-md-4 control-label">Lokasi</label>

                            <div class="col-md-6">
                                <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{ $sidang->lokasi }}">

                                @if ($errors->has('lokasi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lokasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kelompok') ? ' has-error' : '' }}">
                            <label for="kelompok" class="col-md-4 control-label">Kelompok</label>

                            <div class="col-md-6">
                                <input id="kelompok" type="text" class="form-control" name="kelompok" value="{{ $sidang->kelompok }}">

                                @if ($errors->has('kelompok'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelompok') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-floppy-o"></i> Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@stop