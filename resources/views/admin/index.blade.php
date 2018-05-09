@extends('admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<section class="content-header">
	    <h1> All Products <small>({{count($products)}})</small></h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-warning">
		            <div class="box-body">
					    <table id="products-table" class="table table-bordered table-striped">
					        <thead>
					            <tr>
					                <th>#</th>
					                <th>Title</th>
					                <th>Description</th>
					                <th>Price</th>
					                <th>Image</th>
					                <th>Datetime</th>
					                <!-- <th>Action</th> -->
					            </tr>
					        </thead>
					        <tbody>
					        	@foreach( $products as $p => $product )
						        	<tr>
						        		<td>{{ $p + 1 }}</td>
							        	<td>{{ $product->title }}</td>
							        	<td>{{ $product->description }}</td>
							        	<td>${{ $product->price }}</td>
							        	<td><img src="{{ $product->image }}" width="40" height="40" /></td>
							        	<td>{{ date('F d, Y g:i A', strtotime( $product->create_datetime )) }}</td>
							        	<!-- <td><button data-product-id="{{ $product->id }}" class="btn btn-danger"><i class="fa fa-trash"></i> DELETE</button></td> -->
						        	</tr>
					        	@endforeach
					        </tbody>
					    </table>
					</div>
				</div>
			</div>
		</div>
	</section>
	

</div>
@endsection