@extends('master')
@section('stylesheets')

@endsection
@section('content')
	<form action="{{config('app.url')}}guest/checkout/process/store" method="POST" class="storeFrm">
		<section class="container container-registeries">
			<div class="head-main">
				<div class="row clearfix">
					<div class="col-sm-9">
						<h1 class="text-light text-left"> <i class="fa fa-fw fa-shopping-cart"></i> Shopping Cart</h1>
					</div>
					<div class="col-sm-3" style="padding-top: 20px;">
						{{ csrf_field() }}
						<button type="submit" style="font-size:18px; width: 100%" class="btn btn-success btn-lg pull-right start-purhcasing-btn"> <i class="fa fa-shopping-cart" style="color:#fff; padding-right:5px"></i> PLACE ORDER</button>
					</div>
				</div>
			</div>

			<div class="row clearfix" style="margin-top: 30px;">
				<div class="col-sm-9">
					<div class="content-checkout">
						<div class="head-checkout">
							<h3 class="text-light"> <span class="badge">1</span> YOUR INFORMATION </h3>
						</div>
						<div class="main-content-checkout">
							<div class="checkout-fields-container">
								<div class="guest-personal-info clearfix">
									<div class="col-sm-6 form-group">
										<label for="xtxtGuestFirstName">First Name</label>
										<input type="text" class="form-control" id="xtxtGuestFirstName" name="xtxtGuestFirstName" placeholder="Enter your First Name">
									</div>
									<div class="col-sm-6 form-group">
										<label for="xtxtGuestLastName">Last Name</label>
										<input type="text" class="form-control" id="xtxtGuestLastName" name="xtxtGuestLastName" placeholder="Enter your Last Name">
									</div>
									<div class="clearfix"></div>
									<div class="col-sm-12 form-group">
										<label for="xtxtGuestEmailAddress">Email Address</label>
										<input type="text" class="form-control" id="xtxtGuestEmailAddress" name="xtxtGuestEmailAddress" placeholder="Enter your Email Address">
									</div>
									<div class="clearfix"></div>
								</div>

							</div>
						</div>
					</div>
					<div class="content-checkout">
						<div class="main-content-checkout">
							<div class="">
								<div class="clearfix">
									<div class="col-sm-12 checkbox">
										<label>
											<input type="checkbox" name="xchckAnonymous" value="1">
											Want to keep your information secret?
										</label>
									</div>
								</div>
								<div class="clearfix">
									<div class="col-sm-12 checkbox">
										<label>
											<input type="checkbox" name="xchckWrap" value="1" {{ $do_gift_wrapping ? 'checked disabled':'' }}>
											Want to wrap gift in gift cover?
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="content-checkout">
						<div class="head-checkout">
							<h3 class="text-light"> <span class="badge">2</span> PAYMENT DETAILS </h3>
						</div>
						<div class="main-content-checkout">
							<div class="checkout-fields-container">
								<div class="col-sm-12 form-group">
									<label for="xtxtCC">Credit Card Number</label>
									<div class="input-group">
										<input type="text" class="form-control" id="xtxtCC" name="xtxtCC" placeholder="0000-0000-0000-0000">
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
										</div>
									</div>
								</div>
								<div class="clearfix">
									<div class="col-sm-6 form-group">
										<label for="xtxtGuestScCode">Security Code</label>
										<div class="input-group">
											<input type="text" class="form-control" id="xtxtGuestScCode" name="xtxtGuestScCode" placeholder="****">
											<div class="input-group-addon">
												<span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span>
											</div>
										</div>
									</div>
									<div class="col-sm-6 form-group">
										<label for="xtxtGuestCcExpDate">Expiration Date</label>
										<div class="input-group">
											<input type="date" class="form-control" id="xtxtGuestCcExpDate" name="xtxtGuestCcExpDate" placeholder="MM/YY">
											<div class="input-group-addon">
												<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="submit" style="font-size:18px; width: 100%; margin-bottom: 20px" class="btn btn-success btn-lg pull-right start-purhcasing-btn"> <i class="fa fa-shopping-cart" style="color:#fff; padding-right:5px"></i> PLACE ORDER</button>
				</div>
				<div class="col-sm-3">
					<div class="order-details">
						<div class="head-order">
							<h3 class="text-light" style="font-size: 20px">YOUR ORDER</h3>
						</div>
						<div class="clearfix content-order">
							@foreach($products as $product)
							<div class="order-items">
								<div class="oi oi-name">{{ $product->title }}</div>
								<div class="oi oi-price">{{ $qtys[$product->id] }} x ${{ $product->price }}</div>
							</div>
							@endforeach
						</div>
						<div class="clearfix content-order">
							<div class="order-items">
								<?php
								$total_amount = 0;
								foreach($products as $product):
									$total_amount += ($product->price * $qtys[$product->id]);
								endforeach;

								?>
								<div class="oi oi-name">Total Amount</div>
								<div class="oi oi-price">${{ $total_amount }}</div>
							</div>
							<div class="order-items">
								<div class="oi oi-name">Personalization Fee</div>
								<div class="oi oi-price">${{ $applicable_fee }}</div>
							</div>
						</div>
						<div class="clearfix content-order">
							<div class="order-items">
								<div class="oi oi-name">Total</div>
								<div class="oi oi-price" style="font-size: 24px; font-family:'Raleway'; font-weight: bold">${{ ($total_amount+$applicable_fee) }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</section>
	</form>
	@section('scripts')
		<script>
			
		</script>
	@endsection

@endsection