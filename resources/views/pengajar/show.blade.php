@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Pengajar 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $a->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nik</label>	
			  			<input type="text" name="nik" class="form-control" value="{{ $a->nik }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">pelajaran</label>	
			  			<textarea rows="10" class="form-control" readonly>@foreach($a->pelajaran as $data)
			  				-{{ $data->pelajaran }}
			  				@endforeach
			  			</textarea> 
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection