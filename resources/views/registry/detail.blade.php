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
									<form action="{{ config('app.url') }}guest/store" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="registry_id" value="{{ $registry_detail->id }}">
										<button type="submit"  style="font-size:18px;" class="btn btn-default btn-lg pull-right start-purhcasing-btn"> <i class="fa fa-shopping-cart" style="color:#e5c100; padding-right:5px"></i> START PURCHASING</button>	
									</form>
								</div>
							</div>

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
												<div class="col-sm-6 pull-left">
													<h4 class="text-light">Desired: {{ $qtys[$product->id] }}</h4>
												</div>
												<div class="col-sm-6 pull-right">
													<h4 class="text-light">Recieved: {{ $rec_qtys[$product->id] }}</h4>
												</div>
											</div>
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
		
	@endsection

@endsection