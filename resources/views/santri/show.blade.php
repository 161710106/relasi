@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Santri
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama santri</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $santri->nama }}"  readonly>
			  		</div>
			  				<div class="form-group">
			  			<label class="control-label">Nis</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $santri->nis }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Pelajaran</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $santri->Pelajaran->pelajaran }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection