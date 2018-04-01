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
							        
							        <div class="panel-heading" role="tab" id="collapseListGroupHeading1">
							            <h4 class="panel-title">
							            	<a href="#collapseListGroup1" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup1"> Glassware </a>
							            </h4>
							        </div>
							        

							        <div class="panel-heading" role="tab" id="collapseListGroupHeading2">
							            <h4 class="panel-title">
							            	<a href="#collapseListGroup2" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup2"> Crockery </a>
							            </h4>
							        </div>
							        

									<div class="panel-heading" role="tab" id="collapseListGroupHeading3">
							            <h4 class="panel-title">
							            	<a href="#collapseListGroup3" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup3"> Kitchen Utensils </a>
							            </h4>
							        </div>
							        

							        <div class="panel-heading" role="tab" id="collapseListGroupHeading4">
							            <h4 class="panel-title">
							            	<a href="#collapseListGroup4" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup4"> Linens <span class="caret pull-right" style="margin-top:7px;"></span></a>
							            </h4>
							        </div>
							        <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroup4" aria-labelledby="collapseListGroupHeading4" aria-expanded="false" style="height: 0px;">
							            <ul class="list-group">
							                <li class="list-group-item">sheets</li>
							                <li class="list-group-item">sofa covers</li>
							                <li class="list-group-item">curtains</li>
							            </ul>
							        </div>

							        <div class="panel-heading" role="tab" id="collapseListGroupHeading5">
							            <h4 class="panel-title">
							            	<a href="#collapseListGroup5" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup5"> Bathroom Accessories </a>
							            </h4>
							        </div>
							        

							        <div class="panel-heading" role="tab" id="collapseListGroupHeading6">
							            <h4 class="panel-title">
							            	<a href="#collapseListGroup6" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup6"> Mini Appliances </a>
							            </h4>
							        </div>
							        

							        <div class="panel-heading" role="tab" id="collapseListGroupHeading7">
							            <h4 class="panel-title">
							            	<a href="#collapseListGroup7" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup7"> Home Accents </a>
							            </h4>
							        </div>
							        

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
								<button type="button" class="btn btn-primary">Shipping Info</button>
							</form>
						</div>
						<div class="block-products-list">
							<div class="row">
								@for($i=0; $i<12; $i++)
								<div class="col-sm-3 product-box text-center">
									<div class="product-img-container space-prod">
										<img src="https://s3.amazonaws.com/static.myregistry.com/users/ids770k/773576/GiftImages/8368f165-3228-40e0-b6b9-62506188a67e_Large.jpg" alt="" class="img-responsive">
									</div>
									<div class="product-title space-prod">Range 24L Laptop Backpack</div>
									<div class="product-price space-prod">$44.99</div>
									<div class="product-purhcase">
										<button class="btn btn-primary text-uppercase">purchase this gift</button>
									</div>
								</div>
								@endfor
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