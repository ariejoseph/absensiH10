@extends('index')

@section('content')

<h2>Create Grup</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/kelompok') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="sidang" value="{{ $sidang }}">
                        <div class="form-group{{ $errors->has('koordinator') ? ' has-error' : '' }}">
                            <label for="koordinator" class="col-md-4 control-label">Koordinator</label>

                            <div class="col-md-6">
                                <select name="koordinator" class="form-control">
                                    @foreach($gerejaKoor as $saudara)
                                        <option value="{{ $saudara->id }}">{{ $saudara->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('koordinator'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('koordinator') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('asisten') ? ' has-error' : '' }}">
                            <label for="asisten" class="col-md-4 control-label">Asisten</label>

                            <div class="col-md-6">
                                <select name="asisten" class="form-control">
                                    @foreach($gerejaKoor as $saudara)
                                        <option value="{{ $saudara->id }}">{{ $saudara->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('asisten'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('asisten') }}</strong>
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