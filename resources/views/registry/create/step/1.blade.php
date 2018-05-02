@extends('master')
@section('stylesheets')
    <link rel="stylesheet" href="{{ config('app.url') }}assets/css/steps.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')
		
	<section>
		<div>
			<div class="steps-wrapper">
				<ul class="container">
					<li class="container__item">
					    <div class="stepper" data-debug="data-debug">
					        <input class="stepper__input" id="stepper-3-0" name="stepper-3" type="radio" checked="checked" disabled>
					        <div class="stepper__step">
					            <label class="stepper__button" for="stepper-3-0">Step: 1</label>
					        </div>
					        <input class="stepper__input" id="stepper-3-1" name="stepper-3" type="radio" disabled>
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
	<section>
		<div>
			<div>
				<h1 class="text-light text-center" >Welcome To Your Registry Create Page</h1>
				<p class="text-center" style="font-style:italic">We're so excited to be starting this Registry with you both!  Let's get started!</p>
			</div>
		</div>
		<div class="container container-wishlist-form">
			<div class="clearfix">
				<div class="col-sm-4">
					<div class="img-wishlist-container">
						<img src="{{ config('app.url') }}assets/img/main-banner/5.jpeg" alt="" class="img-responsive">
					</div>
				</div>
				<div class="col-sm-8">
					<form action="{{ config('app.url') }}create/registry/store" method="POST" accept-charset="UTF-8">
						<div class="wishlist-wrapper">
							<div>
								<div class="form-group">
								    <label for="xtxtOccs" class="h3 text-light" style="margin-top:0;">What's the registry title?</label>
								    <input type="text" class="form-control" name="xtxtRegTitle" id="xtxtRegTitle" required placeholder="Your Registry's Title">
								</div>
								<hr>
								<div class="form-group">
								    <label for="xtxtOccs" class="h3 text-light" style="margin-top:0;">What's the ocassion?</label>
								    <select class="form-control" id="xtxtOccs" name="xtxtOccs" required>
								    	<option value="">SELECT</option>
								    	@foreach( $ocassions as $ocs )
									    	<option value="{{ $ocs->id }}">{{ $ocs->title }}</option>
								    	@endforeach
								    </select>
								</div>
								<hr>
								<div class="form-group form-group-married">
								    <label for="xtxtCoupleNames[0]" class="h3 text-light" style="margin-top:0px;">Who are the Happy Couple?</label>
								    <div class="clearfix">
									    <input type="text" class="field-control col-sm-5" name="xtxtCoupleNames[]" id="xtxtCoupleNames[0]" placeholder="Your Name" required>
									    <input type="text" class="field-control col-sm-5 col-sm-offset-2" name="xtxtCoupleNames[]" id="xtxtCoupleNames[1]" placeholder="Partner's Name" required>
								    </div>
								</div>
								<div class="form-group form-group-single" style="display: none">
								    <label for="xtxtYourNames[0]" class="h3 text-light" style="margin-top:0px;">Your Name</label>
								    <div class="clearfix">
									    <input type="text" class="field-control col-sm-5" name="xtxtYourNames[]" id="xtxtYourNames[0]" placeholder="Your First Name">
									    <input type="text" class="field-control col-sm-5 col-sm-offset-2" name="xtxtYourNames[]" id="xtxtYourNames[1]" placeholder="Your Last Name">
								    </div>
								</div>
								<hr>
								<div class="form-group">
								    <label for="xtxtEventDate" class="h3 text-light" style="margin-top:0px;">When is your Event?</label>
								    <div class="input-group">
								    	<input type="text" id="xtxtEventDate" name="xtxtEventDate" class="form-control" required>
								    	<span class="input-group-addon" onclick="xtxtEventDate.focus()" id="basic-addon2"><i class="fa fa-calendar"></i></span>
								    </div>
								</div>
								<hr>
								<div class="form-group">
								    <label for="xrdoDelPref1" class="h3 text-light" style="margin-top:0px;">Would you like the Gifts Delivered or you prefer to pick up in store? <div style="font-weight: bold; font-style: italic; margin-top:5px;">*Note that a delivery fee is applicable</div></label>
								    @foreach( $delivery_pref as $inc => $pref )
										<label class="radio-inline text-capitalize">
											<input type="radio" class="pickReg"  name="xrdoDelPref" id="xrdoDelPref{{ $inc }}" value="{{ $pref->id }}" @if( $inc == 0 ) checked  @endif > {{ $pref->name }}
										</label>
									@endforeach
								</div>
								<hr>
								<div class="ship-info-form">
									<div class="form-group">
										<div class="">
											<h3 class="text-light">Where should guests ship your gifts?</h3>
										</div>
									    <label for="xtxtShippingFirstName">Ship to Name</label>
									    <div class="clearfix">
										    <input type="text" class="field-control col-sm-5" name="xtxtShippingFirstName" id="xtxtShippingFirstName" placeholder="Your First Name" required>
										    <input type="text" class="field-control col-sm-5 col-sm-offset-2" name="xtxtShippingLastName" id="xtxtShippingLastName" placeholder="Your Last Name" required>
									    </div>
									</div>
									<div class="form-group">
									    <label for="xtxtAddress1">Address 1</label>
									    <input type="text" class="form-control" name="xtxtAddress1" id="xtxtAddress1" placeholder="Your Address 1" required>
									</div>
									<div class="form-group">
									    <label for="xtxtAddress2">Address 2 (optional)</label>
									    <input type="text" class="form-control" name="xtxtAddress2" id="xtxtAddress2" placeholder="Your Address 2">
									</div>
									<div class="form-group">
									    <label for="xtxtCity">City</label>
									    <!-- <select class="form-control" id="xtxtCity" name="xtxtCity" required>
									    	<option value="">SELECT</option>
									    	@foreach( $cities as $city ):
										    	<option value="{{ $city->id }}">{{ $city->name }}</option>
									    	@endforeach
									    </select> -->
									    <input type="text" name="xtxtCity" id="xtxtCity" class="form-control" required placeholder="Your City Name">

									</div>
									<div class="form-group">
									    <label for="xslsCountry">Country</label>
									    <select class="form-control" id="xslsCountry" name="xslsCountry" required>
									    	<option value="">SELECT</option>
									    	@foreach( $countries as $country ):
										    	<option value="{{ $country->id }}">{{ $country->name }}</option>
									    	@endforeach
									    </select>
									</div>
									<div class="form-group">
									    <label for="xtxtShippingPhoneNumber">Phone Number</label>
									    <input type="number" class="form-control" name="xtxtShippingPhoneNumber" id="xtxtShippingPhoneNumber" placeholder="Your Phone Number">
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-12 pull-right">
										<button type="submit" class="btn btn-primary">CONTINUE</button>
										<!-- <a href="{{ config('app.url') }}create/registry/2" class="btn btn-primary">CONTINUE</a> -->
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="step" value="1">
						{{ csrf_field() }}
					</form>
				</div>
			</div>
		</div>
	</section>

	@include('sections.contactus')
    @section('scripts')
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
		$(function(){
		    $( "#xtxtEventDate" ).datepicker();
		    $('.pickReg').on('change', function(){
		   		if( $(this).val() == '2' )
		   		{
		   			$('.ship-info-form input, .ship-info-form select').removeAttr('required');
		   			$('.ship-info-form').stop().slideUp();
		   		} else 
		   		{
		   			$('.ship-info-form input, .ship-info-form select').attr('required', true);
		   			$('.ship-info-form').stop().slideDown();
		   		}
		    });
		    $('#xtxtOccs').on('change', function(){
		    	if( $(this).val() == '2' )
		    	{
		    		$('.form-group-single').stop().slideDown();
		    		$('.form-group-single input').attr('required', true);
		    		$('.form-group-married input').removeAttr('required');
		    		$('.form-group-married').stop().slideUp();
		    	} else 
		    	{
		    		$('.form-group-single').stop().slideUp();
		    		$('.form-group-married input').attr('required', true);
		    		$('.form-group-single input').removeAttr('required');
		    		$('.form-group-married').stop().slideDown();
		    	}
		    });
		});
		</script>
    @endsection

@endsection