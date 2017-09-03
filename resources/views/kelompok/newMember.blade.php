@extends('index')

@section('content')

<h2>Add Anggota</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kelompok {{ $id_kelompok }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/anggota/daftar', [$id_kelompok]) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('anggota') ? ' has-error' : '' }}">
                            <label for="anggota" class="col-md-4 control-label">Anggota</label>

                            <div class="col-md-6">
                                <select name="anggota" class="form-control">
                                    @foreach($gereja as $saudara)
                                        <option value="{{ $saudara->id }}">{{ $saudara->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('anggota'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('anggota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
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