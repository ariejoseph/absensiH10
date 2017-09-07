@extends('index')

@section('content')

<h2>Daftar Sidang:</h2>
<form class="form-horizontal" role="form" method="POST" action="{{ url('/daftarHadir') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('sidang') ? ' has-error' : '' }}">
        <label for="sidang" class="col-md-4 control-label">Sidang</label>

        <div class="col-md-6">
            <!-- <input id="sidang" type="text" class="form-control" name="sidang" value="{{ old('sidang') }}"> -->
            <select name="sidang" class="form-control">
            	@foreach($daftarSidang as $sidang)
            		<option value="{{ $sidang->nama }}">{{ $sidang->nama }}</option>
            	@endforeach
            </select>

            @if ($errors->has('sidang'))
                <span class="help-block">
                    <strong>{{ $errors->first('sidang') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
        <label for="tanggal" class="col-md-4 control-label">Tanggal</label>

        <div class="col-md-6">
            <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">

            @if ($errors->has('tanggal'))
                <span class="help-block">
                    <strong>{{ $errors->first('tanggal') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </div>
    </div>
</form>

@stop