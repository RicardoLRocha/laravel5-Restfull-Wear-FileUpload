@extends('layouts.default')

@section('content')
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>List of Product Files</h2>
			</div>
			<div class="pull-right">
				<a class="btn btn-success" href="{{ route('upload-files.create') }}"> Upload New File</a>
			</div>
		</div>
	</div>
	
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Details</th>
			<th>Your File</th>
		</tr>
	@foreach ($products as $product)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $product->name }}</td>
		<td>{{ $product->details }}</td>
		<td>
		<a href='{{ asset("images/$product->product_image") }}'>{{ $product->product_image }}</a>
		</td>
	</tr>
	@endforeach
	</table>

	{!! $products->render() !!}
@endsection