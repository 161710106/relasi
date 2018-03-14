@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Data Pelajaran
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('pelajaran.update',$pelajaran->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('pelajaran') ? ' has-error' : '' }}">
			  			<label class="control-label">pelajaran</label>	
			  			<input type="text" name="pelajaran" value="{{ $pelajaran->pelajaran }}" class="form-control"  required>
			  			@if ($errors->has('pelajaran'))
                            <span class="help-block">
                                <strong>{{ $errors->first('pelajaran') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('pengajar_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama pengajar</label>	
			  			<select name="pengajar_id" class="form-control">
			  				@foreach($pengajar as $data)
			  				<option value="{{ $data->id }}" {{ $selectedPengajar == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama }}</option>
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