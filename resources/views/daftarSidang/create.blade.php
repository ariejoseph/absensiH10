@extends('index')

@section('content')

<h2>Create Sidang</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/daftarSidang') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('sidang') ? ' has-error' : '' }}">
                            <label for="sidang" class="col-md-4 control-label">Sidang</label>

                            <div class="col-md-6">
                                <input id="sidang" type="text" class="form-control" name="sidang" value="{{ old('sidang') }}">

                                @if ($errors->has('sidang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sidang') }}</strong>
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