@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Data Pelajaran 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('pelajaran.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('pelajaran') ? ' has-error' : '' }}">
			  			<label class="control-label">Pelajaran</label>	
			  			<input type="text" name="pelajaran" class="form-control"  required>
			  			@if ($errors->has('pelajaran'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pelajaran') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('pengajar_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Pengajar</label>	
			  			<select name="pengajar_id" class="form-control">
			  				@foreach($Pengajar as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('pengajar_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pengajar_id') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection