
@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Upload Files</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-primary" href="{{ route('upload-files.index') }}"> Back</a>
			</div>
		</div>
	</div>

	{!! Form::open(array('route' => 'upload-files.store','method'=>'POST','files'=>true)) !!}
	  <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Name:</strong>
				{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-6">
			<div class="form-group">
				<strong>Upload File:</strong>
				{!! Form::file('product_image', array('class' => 'form-control')) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="form-group">
				<strong>Details:</strong>
				{!! Form::textarea('details', null, array('placeholder' => 'Details','class' => 'form-control','style'=>'height:100px')) !!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
	{!! Form::close() !!}
@endsection