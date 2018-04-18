@extends('master')

@section('stylesheets')
	<link rel="stylesheet" href="{{ config('app.url') }}vendors/bootstrap-slider/slider.css">
@endsection

@section('content')
	
	<section class="products-container">
		<div class="block-container container">
			<div class="row clearfix">
				<div class="col-sm-3 products-list-sidebar">
					<div class="block-sidebar-head">
						<div class="head-detail">
							<h3 class="text-center text-light">
								CATEGORIES
							</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="block-sidebar-details categories-list">
						<div class="lists-container">
							<div class="panel-group" role="tablist">
							    <div class="panel panel-default">
							    	@foreach($categories as $cat)    
								        <div class="panel-heading" role="tab" id="collapseListGroupHeading1">
								            <h4 class="panel-title">
								            	<a href="{{ config('app.url') }}categories/{{ $cat->slug }}" class="collapsed"> {{ $cat->title }} </a>
								            </h4>
								        </div>
								        @if( $cat->parent_id != 0 )
								        	<!-- <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroup4" aria-labelledby="collapseListGroupHeading4" aria-expanded="false" style="height: 0px;">
									            <ul class="list-group">
									                <li class="list-group-item">sheets</li>
									                <li class="list-group-item">sofa covers</li>
									                <li class="list-group-item">curtains</li>
									            </ul>
									        </div> -->
								        @endif
							        @endforeach

							       
							        <!-- <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroup4" aria-labelledby="collapseListGroupHeading4" aria-expanded="false" style="height: 0px;">
							            <ul class="list-group">
							                <li class="list-group-item">sheets</li>
							                <li class="list-group-item">sofa covers</li>
							                <li class="list-group-item">curtains</li>
							            </ul>
							        </div> -->

							    </div>
							</div>
						</div>
					</div>
					<div class="block-sidebar-head">
						<div class="head-detail">
							<h3 class="text-center text-light">
								FILTER BY PRICE
							</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="block-sidebar-details price-slider-container">
						<div class="price-bar-block col-xs-12">
							<input type="text" value="" class="price-slider form-control" data-slider-min="-200" data-slider-max="200"
                         data-slider-step="5" data-slider-handle="square" data-slider-value="[-100,100]" data-slider-orientation="horizontal"
                         data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
						</div>
						<div class="clearfix"></div>
						<div class="price-details-block clearfix">
							<div class="col-xs-12 col-sm-7">
								<p>Price: <b>$430</b> - <b>$630</b></p>
							</div>
							<div class="col-xs-12 col-sm-5">
								<button class="btn btn-primary">FILTER</button>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="products-list-content">
						<div class="head-products-list">
							<form class="form-inline" name="sortingFrm" id=sortingFrm method="POST" action="">
								{{ csrf_field() }}
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
												<button class="btn btn-primary text-uppercase">add or view this gift</button>
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
		  })
		</script>
	@endsection
@endsection