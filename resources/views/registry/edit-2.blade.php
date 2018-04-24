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
					        <input class="stepper__input" id="stepper-3-0" name="stepper-3" type="radio" disabled>
					        <div class="stepper__step">
					            <label class="stepper__button" for="stepper-3-0">Step: 1</label>
					        </div>
					        <input class="stepper__input" id="stepper-3-1" name="stepper-3" type="radio" checked="checked">
					        <div class="stepper__step">
					            <label class="stepper__button" for="stepper-3-1">Step: 2</label>
					        </div>
					        <input class="stepper__input" id="stepper-3-2" name="stepper-3" type="radio" disabled>
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
							<form action="{{config('app.url')}}edit/registry/store/{{ $edit_details->id }}" method="POST" accept-charset="UTF-8" class="storeFrm">
								{{ csrf_field() }}
								<input type="hidden" name="step" value="2">
								@if( count( $edit_products_ids ) > 0 )
									@foreach( $edit_products_ids as $edit_product_id )
										<input data-val="{{ $edit_product_id->product_id }}" class="hidden-pids" type="hidden" name="products_id[]" value="{{ $edit_product_id->product_id }}">
										<input data-val-q="{{ $edit_product_id->product_id }}" class="hidden-pids" type="hidden" name="quantity_id[{{ $edit_product_id->product_id }}][]" value="{{ $edit_product_id->qty }}">
									@endforeach
								@else
									<input type="hidden" name="products_id[]" value="0">
									<input type="hidden" name="quantity_id[]" value="0">
								@endif
								<button type="submit" class="btn btn-primary pull-right">FINALIZE</button>
							</form>
						</div>
						<?php
						$pids=[];
						$qtys=[];
						if(count($edit_products_ids)>0):
							foreach($edit_products_ids as $key => $value):
								$pids[]   = $value->product_id;
								$qtys[$value->product_id] = $value->qty;
							endforeach;
						endif;
						?>
						<div class="block-products-list">
							<div class="row">
								@if( count( $products ) > 0 )
									@foreach($products as $product)
										<div class="col-sm-3 product-box product-rgc text-center">
											<div class="product-img-container space-prod">
												<img src="{{ $product->image }}" alt="" class="img-responsive">
											</div>
											<div class="product-title space-prod">{{ $product->title }}</div>
											<div class="product-price space-prod">${{ $product->price }}</div>
											<div class="product-qty">
												<div class="input-group plus-minus-input">
												    <div class="input-group-button">
												        <button type="button" class="btn btn-primary" data-quantity="minus" data-field="q__{{$product->id}}">
												            <i class="fa fa-minus" aria-hidden="true"></i>
												        </button>
												    </div>
												    <input class="input-group-field" id="q__{{$product->id}}" type="number" name="quantity[]" value="{{ in_array($product->id, $pids) ? $qtys[$product->id] : 1 }}" min="1" max="1000">
												    <div class="input-group-button">
												        <button type="button" class="btn btn-primary" data-quantity="plus" data-field="q__{{$product->id}}">
												            <i class="fa fa-plus" aria-hidden="true"></i>
												        </button>
												    </div>
												</div>
											</div>
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

		    $.each( $('.hidden-pids'), function(index, value){
		    	$('.btn-add-gift[data-product-id="'+ $(value).data('val') +'"]').fadeOut();
		    	$('.btn-remove-gift[data-product-id="'+ $(value).data('val') +'"]').fadeIn();
		    });

		    $('.price-slider').slider()
		    var btnAddGift = $('.btn-add-gift'),
		    	btnRmvGift = $('.btn-remove-gift'),
		    	frmStorm   = $('.storeFrm');

		    btnAddGift.on('click', function(){
		    	var $this = $(this),
					$pId  = $this.data('product-id'),
					$qty  = $('#q__'+$pId).val();
		    	
		    	frmStorm.append('<input data-val="'+$pId+'" type="hidden" name="products_id[]" value="'+$pId+'">');
		    	frmStorm.append('<input data-val-q="'+$pId+'" type="hidden" name="quantity_id['+$pId+'][]" value="'+$qty+'">');
		    	alert('Item added to your registry!');
		    	$this.fadeOut();
		    	$this.siblings('.btn-remove-gift').fadeIn();

		    });

		    btnRmvGift.on('click', function(){
		    	var $this     = $(this),
					$pId      = $this.data('product-id'),
					$qty      = $('#q__'+$pId).val(),
					fieldpId  = $('[data-val="'+$pId+'"]'),
					fieldQty  = $('[data-val-q="'+$pId+'"]');

				fieldpId.remove();
				fieldQty.remove();

				$('#q__'+$pId).val(1);

		    	alert('Item removed from your registry!');
		    	$this.fadeOut();
		    	$this.siblings('.btn-add-gift').fadeIn();
		    });
		    $('[data-quantity="plus"]').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        fieldName = $(this).attr('data-field');
		        // Get its current value
		        var currentVal = parseInt($('input[id='+fieldName+']').val());
		        // If is not undefined
		        if (!isNaN(currentVal)) {
		            // Increment
		            $('input[id='+fieldName+']').val(currentVal + 1);
		            if( $('[data-val-q="'+fieldName.replace('q__','')+'"]').length > 0 )
		        		$('[data-val-q="'+fieldName.replace('q__','')+'"]').val(currentVal + 1)
		        } else {
		            // Otherwise put a 0 there
		            $('input[id='+fieldName+']').val(1);
		        }
		    });
		    // This button will decrement the value till 0
		    $('[data-quantity="minus"]').click(function(e) {
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        fieldName = $(this).attr('data-field');
		        // Get its current value
		        var currentVal = parseInt($('input[id='+fieldName+']').val());
		        // If it isn't undefined or its greater than 0
		        if (!isNaN(currentVal) && currentVal > 1) {
		            // Decrement one
		            $('input[id='+fieldName+']').val(currentVal - 1);
		            if( $('[data-val-q="'+fieldName.replace('q__','')+'"]').length > 0 )
		        		$('[data-val-q="'+fieldName.replace('q__','')+'"]').val(currentVal - 1)
		        } else {
		            // Otherwise put a 0 there
		            $('input[id='+fieldName+']').val(1);
		        }
		    });
		  })
		</script>
	@endsection
@endsection