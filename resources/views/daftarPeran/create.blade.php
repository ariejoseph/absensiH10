@extends('index')

@section('content')

<h2>Create Peran</h2>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/daftarPeran') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('peran') ? ' has-error' : '' }}">
                            <label for="peran" class="col-md-4 control-label">Peran</label>

                            <div class="col-md-6">
                                <input id="peran" type="text" class="form-control" name="peran" value="{{ old('peran') }}">

                                @if ($errors->has('peran'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('peran') }}</strong>
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