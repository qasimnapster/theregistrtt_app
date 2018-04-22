@extends('master')
@section('stylesheets')

@endsection
@section('content')
	
	<section class="products-container">
		<div class="block-container container">
			<div class="row clearfix">
				<div class="col-sm-12">
					<div class="products-list-content">
						<div class="head-products-list">
							<div class="row clearfix">
								<div class="col-sm-9">
									<div class="h1 text-light text-left" style="margin-top:0">{{ $registry_detail->title }}</div>
								</div>
								<div class="col-sm-3">
									<form action="{{config('app.url')}}guest/cart/store" method="POST" class="storeFrm">
										{{ csrf_field() }}
										<button type="button"  style="font-size:18px;" class="btn btn-default btn-lg pull-right start-purhcasing-btn"> <i class="fa fa-cart-plus" style="color:#e5c100; padding-right:5px"></i> ADD ITEMS TO SHOPPING CART</button>
										@if( count( $cart_pqs ) > 0 )
											@foreach( $cart_pqs as $pid => $qty )
												<input data-val="{{ $pid }}" class="hidden-pids" type="hidden" name="products_id[]" value="{{ $pid }}">
												<input data-val-q="{{ $pid }}" class="hidden-pids" type="hidden" name="quantity_id[{{ $pid }}][]" value="{{ $qty }}">
											@endforeach
										@endif
									</form>
								</div>
							</div>
						</div>
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
											@if( $qtys[$product->id] != $rec_qtys[$product->id]  )
												<div class="product-qty">
													<div class="input-group plus-minus-input">
													    <div class="input-group-button">
													        <button type="button" class="btn btn-primary" data-quantity="minus" data-field="q__{{$product->id}}">
													            <i class="fa fa-minus" aria-hidden="true"></i>
													        </button>
													    </div>
													    <input class="input-group-field" id="q__{{$product->id}}" type="number" name="quantity[]" value="{{ isset($cart_pqs[$product->id]) ? $cart_pqs[$product->id] : 1 }}" min="1" max="{{ ($qtys[$product->id] - $rec_qtys[$product->id]) }}">
													    <div class="input-group-button">
													        <button type="button" class="btn btn-primary" data-quantity="plus" data-field="q__{{$product->id}}">
													            <i class="fa fa-plus" aria-hidden="true"></i>
													        </button>
													    </div>
													</div>
												</div>
												<div class="product-purhcase">
													<button data-product-id="{{ $product->id }}" class="btn btn-primary btn-add-gift text-uppercase">add this gift to cart</button>
													<button data-product-id="{{ $product->id }}" class="btn btn-primary btn-remove-gift text-uppercase" style="display: none">remove this gift from cart</button>
												</div>
											@else
												<div class="product-purhcase">
													<h3 class="text-light text-center">Quantity Received.</h3>
												</div>
											@endif
											
										</div>
									@endforeach
								@else
									<div class="col-sm-12">
										<div class="alert alert-warning alert-dismissible" role="alert">
											<strong>Sorry!</strong> No products added to this registry.
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
		<script>
			$(function(){
				$.each( $('.hidden-pids'), function(index, value){
			    	$('.btn-add-gift[data-product-id="'+ $(value).data('val') +'"]').fadeOut();
			    	$('.btn-remove-gift[data-product-id="'+ $(value).data('val') +'"]').fadeIn();
			    });
				$('.btn-add-gift').on('click', function(){
			    	var $this = $(this),
						$pId  = $this.data('product-id'),
						$qty  = $('#q__'+$pId).val();
			    	
			    	$('.storeFrm').append('<input data-val="'+$pId+'" type="hidden" name="products_id[]" value="'+$pId+'">');
			    	$('.storeFrm').append('<input data-val-q="'+$pId+'" type="hidden" name="quantity_id['+$pId+'][]" value="'+$qty+'">');
			    	alert('Item added to your registry!');
			    	$this.fadeOut();
			    	$this.siblings('.btn-remove-gift').fadeIn();

			    });

			    $('.btn-remove-gift').on('click', function(){
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
			            
			            if( (currentVal + 1) <= $('input[id='+fieldName+']').attr('max') )
			            {
				            $('input[id='+fieldName+']').val(currentVal + 1);
				            if( $('[data-val-q="'+fieldName.replace('q__','')+'"]').length > 0 )
				        		$('[data-val-q="'+fieldName.replace('q__','')+'"]').val(currentVal + 1)
			        	} else {
			        		//$('input[id='+fieldName+']').attr('disabled', true);
			        		alert('Max. ' + $('input[id='+fieldName+']').attr('max') + ' quantity desired.');
			        	}
			        
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
			    $('.start-purhcasing-btn').on('click', function(){
			    	if( $('[name="products_id[]"]').length > 0 )
			    		$('.storeFrm').submit();
			    });
			    
			});
		</script>
	@endsection

@endsection