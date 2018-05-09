@extends('admin.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<section class="content-header">
	    <h1> Add Product </h1>
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
				        <p>Product added successfully</p>
				    </div>
				@endif
				<div class="box box-warning">
				    <!-- <div class="box-header with-border">
				        <h3 class="box-title">ADD</h3>
				    </div> -->
				    <!-- /.box-header -->
				    <!-- form start -->
				    <form role="form" action="{{ config('app.url') }}administrator/products/add/process" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
				    	{{ csrf_field() }}
				        <div class="box-body">
				            <div class="form-group">
				                <label for="xtxtProductTitle">Title</label>
				                <input type="text" class="form-control" id="xtxtProductTitle" name="xtxtProductTitle" placeholder="Enter product title" required>
				            </div>
				            <div class="form-group">
				            	<label for="xtxtProductPrice">Price</label>
				            	<div class="input-group">
					                <span class="input-group-addon">$</span>
					                <input type="text" class="form-control" id="xtxtProductPrice" name="xtxtProductPrice" placeholder="Enter product price" required>
					                <span class="input-group-addon">.00</span>
					            </div>
				            </div>
							<div class="form-group">
				                <label>Categories</label>
				                <select class="form-control select2" name="xtxtCategory[]" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;" required>
				                	@foreach($categories as $category)
										<option value="{{ $category->id }}">{{ $category->title }}</option>
									@endforeach
				                </select>
				            </div>
				            <div class="form-group">
				                <label for="xtxtProductDescription">Description</label>
				                <textarea class="form-control" id="xtxtProductDescription" name="xtxtProductDescription" placeholder="Enter product description" required></textarea>
				            </div>
				            <div class="form-group">
				                <label for="xFileProductImage">Upload Image</label>
				                <input type="file" id="xFileProductImage" name="xFileProductImage">
				                <!-- <p class="help-block">Example block-level help text here.</p> -->
				            </div>
				        </div>
				        <!-- /.box-body -->
				        <div class="box-footer">
				            <button type="submit" class="btn btn-primary">ADD</button>
				        </div>
				    </form>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection