@extends('index')

@section('content')

<h2>Edit {{ $gereja->name }}</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/remaja', [$gereja->id]) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $gereja->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                            <label for="nickname" class="col-md-4 control-label">Nama Panggilan</label>

                            <div class="col-md-6">
                                <input id="nickname" type="text" class="form-control" name="nickname" value="{{ $gereja->nickname }}">

                                @if ($errors->has('nickname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $gereja->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                            <label for="kategori" class="col-md-4 control-label">Kategori</label>

                            <div class="col-md-6">
                                <select name="kategori" class="form-control">
                                    <option value="anak" {{ $gereja->kategori === 'anak' ? "selected":"" }}>Anak-Anak</option>
                                    <option value="remaja" {{ $gereja->kategori === 'remaja' ? "selected":"" }}>Remaja</option>
                                    <option value="pemuda" {{ $gereja->kategori === 'pemuda' ? "selected":"" }}>Pemuda</option>
                                    <option value="umum" {{ $gereja->kategori === 'umum' ? "selected":"" }}>Umum</option>
                                </select>

                                @if ($errors->has('kategori'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kategori') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hall') ? ' has-error' : '' }}">
                            <label for="hall" class="col-md-4 control-label">Hall</label>

                            <div class="col-md-6">
                                <input id="hall" type="number" min="1" class="form-control" name="hall" value="{{ $gereja->hall }}">

                                @if ($errors->has('hall'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hall') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $gereja->address }}">

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">No. Telp</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $gereja->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
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