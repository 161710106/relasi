@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Pelajaran 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">pelajaran</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $pelajaran->pelajaran }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nama pengajar</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $pelajaran->pengajar->nama }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection