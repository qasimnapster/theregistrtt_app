@extends('layouts.master')

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
							<form class="form-inline">
								<div class="form-group">
									<input type="text" class="form-control" id="xtxtAllGifts" name="xtxtAllGifts" value="All Gifts">
								</div>
								<div class="form-group">
									<select class="form-control" id="xslcSortBy" name="xslcSortBy">
										<option value="Sort By">Sort By</option>
										<option value="1">High to Low</option>
										<option value="2">Low to High</option>
									</select>
								</div>
								<a href="{{config('app.url')}}create/wishlist/3" class="btn btn-primary pull-right">FINALIZE</a>
							</form>
						</div>
						<div class="block-products-list">
							<div class="row">
								@if( count( $products ) > 0 )
									@foreach($products as $product)
										<div class="col-sm-3 product-box text-center">
											<div class="product-img-container space-prod">
												<img src="{{ config('app.url') }}{{ $product->image }}" alt="" class="img-responsive">
											</div>
											<div class="product-title space-prod">{{ $product->title }}</div>
											<div class="product-price space-prod">{{ $product->price }}</div>
											<div class="product-purhcase">
												<button class="btn btn-primary btn-add-gift text-uppercase">add or view this gift</button>
												<button class="btn btn-primary btn-remove-gift text-uppercase" style="display: none">remove this gift</button>
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
		    $('.price-slider').slider()
		    $('.btn-add-gift').on('click', function(){
		    	alert('Item added to your wishlist!');
		    	$(this).fadeOut();
		    	$(this).siblings('.btn-remove-gift').fadeIn();

		    });
		    $('.btn-remove-gift').on('click', function(){
		    	alert('Item remvoed from your wishlist!');
		    	$(this).fadeOut();
		    	$(this).siblings('.btn-add-gift').fadeIn();
		    });
		  })
		</script>
	@endsection
@endsection