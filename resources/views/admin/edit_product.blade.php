@extends('admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<section class="content-header">
	    <h1> Edit Product </h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				@if(count($errors) > 0)
				    <div class="alert alert-danger common-alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				        @foreach ($errors->all() as $error)
				            <p> <span class="glyphicon glyphicon-asterisk" style="font-size:8px" aria-hidden="true"></span> {{ $error }}</p>
				        @endforeach
				    </div>
				@endif
				@if (session('status'))
				    <div class="alert alert-success">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				        <p>Product updated successfully</p>
				    </div>
				@endif
				<div class="box box-warning">
				    <!-- <div class="box-header with-border">
				        <h3 class="box-title">ADD</h3>
				    </div> -->
				    <!-- /.box-header -->
				    <!-- form start -->
				    <form role="form" action="{{ config('app.url') }}administrator/products/edit/process" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
				    	{{ csrf_field() }}
				        <div class="box-body">
				            <div class="form-group">
				                <label for="xtxtProductTitle">Title</label>
				                <input type="text" class="form-control" id="xtxtProductTitle" value="{{ $product_dtl->title }}" name="xtxtProductTitle" placeholder="Enter product title" required>
				            </div>
				            <input type="hidden" name="product_id" value="{{ $product_dtl->id }}">
				            <div class="form-group">
				            	<label for="xtxtProductPrice">Price</label>
				            	<div class="input-group">
					                <span class="input-group-addon">$</span>
					                <input type="text" class="form-control" id="xtxtProductPrice" value="{{ $product_dtl->price }}" name="xtxtProductPrice" placeholder="Enter product price" required>
					                <span class="input-group-addon">.00</span>
					            </div>
				            </div>
							<div class="form-group">
				                <label>Categories</label>
				                <select class="form-control select2" value="{{ $product_dtl->title }}" name="xtxtCategory[]" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;" required>
				                	@foreach($categories as $category)
										<option value="{{ $category->id }}" {{ in_array( $category->id, $cat_ids ) ? 'selected' : '' }}>{{ $category->title }}</option>
									@endforeach
				                </select>
				            </div>
				            <div class="form-group">
				                <label for="xtxtProductDescription">Description</label>
				                <textarea class="form-control" id="xtxtProductDescription" name="xtxtProductDescription" placeholder="Enter product description" required>{{ $product_dtl->description }}</textarea>
				            </div>
				            <div class="form-group">
				            	<div class="clearfix" style="margin-bottom: 10px;">
				            		<img src="{{ $product_dtl->image }}" alt="{{ $product_dtl->title }}" width="250" style="border:1px solid #dcdcdc; padding:5px">
				            	</div>
				                <label for="xFileProductImage">Upload Image</label>
				                <input type="file" id="xFileProductImage" value="{{ $product_dtl->title }}" name="xFileProductImage">
				                <!-- <p class="help-block">Example block-level help text here.</p> -->
				            </div>
				        </div>
				        <!-- /.box-body -->
				        <div class="box-footer">
				            <button type="submit" class="btn btn-primary">UPDATE</button>
				        </div>
				    </form>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection