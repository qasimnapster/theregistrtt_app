@extends('master')

@section('stylesheets')
	<link rel="stylesheet" href="{{ config('app.url') }}vendors/bootstrap-slider/slider.css">
	<link rel="stylesheet" href="{{ config('app.url') }}assets/css/steps.css">
@endsection

@section('content')
	<section>
		<div>
			<div class="steps-wrapper">
				<ul class="container">
					<li class="container__item">
					    <div class="stepper" data-debug="data-debug">
					        <input class="stepper__input" id="stepper-3-0" name="stepper-3" type="radio">
					        <div class="stepper__step">
					            <label class="stepper__button" for="stepper-3-0">Step: 1</label>
					        </div>
					        <input class="stepper__input" id="stepper-3-1" name="stepper-3" type="radio" checked="checked">
					        <div class="stepper__step">
					            <label class="stepper__button" for="stepper-3-1">Step: 2</label>
					        </div>
					        <input class="stepper__input" id="stepper-3-2" name="stepper-3" type="radio">
					        <div class="stepper__step">
					            <label class="stepper__button" for="stepper-3-2">Step: 3</label>
					        </div>
					    </div>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<section class="products-container">
		<div class="block-container container">
			<div class="row clearfix">
				<div class="col-sm-12">
					<div class="products-list-content">
						<div class="head-products-list">
							<form class="form-inline" name="sortingFrm" id=sortingFrm method="POST" action="">
								{{ csrf_field() }}
								<div class="form-group">
									<select class="form-control" onchange="sortingFrm.submit()" id="xslcCat" name="xslcCat">
										<option value="">SELECT CATEGORY</option>
										@foreach( $categories as $cat ):
											<option {{ $sort_by_cat == $cat->id ? 'selected' : '' }}  value="{{ $cat->id }}">{{ $cat->title }}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" onchange="sortingFrm.submit()" id="xslcSortByPrice" name="xslcSortByPrice">
										<option value="">Sort By Price</option>
										<option value="1" {{ $sort_by_price == 1 ? 'selected' : '' }} >High to Low</option>
										<option value="2" {{ $sort_by_price == 2 ? 'selected' : '' }} >Low to High</option>
									</select>
								</div>
								<div class="form-group">
									<select class="form-control" onchange="sortingFrm.submit()" id="xslcSortByAlpha" name="xslcSortByAlpha">
										<option value="">Sort By Alpha.</option>
										<option value="1" {{ $sort_by_alpha == 1 ? 'selected' : '' }}>A-Z</option>
										<option value="2" {{ $sort_by_alpha == 2 ? 'selected' : '' }}>Z-A</option>
									</select>
								</div>
							</form>
							<form action="{{config('app.url')}}create/registry/store" method="POST" accept-charset="UTF-8" class="storeFrm">
								{{ csrf_field() }}
								<input type="hidden" name="step" value="2">
								<input type="hidden" class="rep-id" name="products_id[]" value="0">
								<button type="submit" class="btn btn-primary pull-right">FINALIZE</button>
							</form>
						</div>
						<div class="block-products-list">
							<div class="row">
								@if( count( $products ) > 0 )
									@foreach($products as $product)
										<div class="col-sm-3 product-box text-center">
											<div class="product-img-container space-prod">
												<img src="{{ $product->image }}" alt="" class="img-responsive">
											</div>
											<div class="product-title space-prod">{{ $product->title }}</div>
											<div class="product-price space-prod">${{ $product->price }}</div>
											<div class="product-purhcase">
												<button data-product-id="{{ $product->id }}" class="btn btn-primary btn-add-gift text-uppercase">add or view this gift</button>
												<button data-product-id="{{ $product->id }}" class="btn btn-primary btn-remove-gift text-uppercase" style="display: none">remove this gift</button>
											</div>
										</div>
									@endforeach
								@else
									<div class="col-sm-12">
										<div class="alert alert-warning alert-dismissible" role="alert">
											<strong>Sorry!</strong> No products found.
										</div>
									</div>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@section('scripts')
		<script src="{{ config('app.url') }}vendors/bootstrap-slider/bootstrap-slider.js"></script>
		<script>
		  $(function () {
		    /* BOOTSTRAP SLIDER */
		    $('.price-slider').slider();

		    var btnAddGift = $('.btn-add-gift'),
		    	btnRmvGift = $('.btn-remove-gift'),
		    	frmStorm   = $('.storeFrm');

		    btnAddGift.on('click', function(){
		    	var $this     = $(this),
					$pId      = $this.data('product-id');
		    	
		    	frmStorm.append('<input data-val="'+$pId+'" type="hidden" name="products_id[]" value="'+$pId+'">');
		    	alert('Item added to your registry!');
		    	$this.fadeOut();
		    	$this.siblings('.btn-remove-gift').fadeIn();

		    });

		    btnRmvGift.on('click', function(){
		    	var $this     = $(this),
					$pId      = $this.data('product-id'),
					fieldpId  = $('[data-val="'+$pId+'"]');

				fieldpId.remove();

		    	alert('Item removed from your registry!');
		    	$this.fadeOut();
		    	$this.siblings('.btn-add-gift').fadeIn();
		    });
		  });
		</script>
	@endsection
@endsection