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
					        <input class="stepper__input" id="stepper-3-0" name="stepper-3" type="radio" checked="checked">
					        <div class="stepper__step">
					            <label class="stepper__button" for="stepper-3-0">Step: 1</label>
					        </div>
					        <input class="stepper__input" id="stepper-3-1" name="stepper-3" type="radio">
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
					<div class="wishlist-wrapper">
						<div>
							<div class="form-group">
							    <label for="xtxtOccs" class="h3 text-light" style="margin-top:0;">What's the ocassion?</label>
							    <select class="form-control" id="occsfield">
							    	<option value="">SELECT</option>
							    	<option value="">Wedding Registry</option>
							    	<option value="2">Personal Wishlist</option>
							    </select>
							</div>
							<hr>
							<div class="form-group form-group-married">
							    <label for="xtxtNames[0]" class="h3 text-light" style="margin-top:0px;">Who are the Happy Couple?</label>
							    <div class="clearfix">
								    <input type="text" class="field-control col-sm-5" name="xtxtNames[]" id="xtxtNames[0]" placeholder="Your Name" >
								    <input type="text" class="field-control col-sm-5 col-sm-offset-2" name="xtxtNames[]" id="xtxtNames[1]" placeholder="Partner's Name">
							    </div>
							</div>
							<div class="form-group form-group-single" style="display: none">
							    <label for="xtxtNames[0]" class="h3 text-light" style="margin-top:0px;">Your Name</label>
							    <div class="clearfix">
								    <input type="text" class="field-control col-sm-5" name="xtxtNames[]" id="xtxtNames[0]" placeholder="Your First Name" >
								    <input type="text" class="field-control col-sm-5 col-sm-offset-2" name="xtxtNames[]" id="xtxtNames[1]" placeholder="Your Last Name">
							    </div>
							</div>
							<hr>
							<div class="form-group">
							    <label for="xtxtOccs" class="h3 text-light" style="margin-top:0px;">When is your Event?</label>
							    <div class="input-group">
							    	<input type="text" id="datepicker" name="datepicker" class="form-control">
							    	<span class="input-group-addon" onclick="datepicker.focus()" id="basic-addon2"><i class="fa fa-calendar"></i></span>
							    </div>
							</div>
							<hr>
							<div class="form-group">
							    <label for="xtxtOccs" class="h3 text-light" style="margin-top:0px;">Would you like the Gifts Delivered or you prefer to pick up in store? <div style="font-weight: bold; font-style: italic; margin-top:5px;">*Note that a delivery fee is applicable</div></label>
								<label class="radio-inline">
									<input type="radio" class="pickReg" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked> Delivery
								</label>
								<label class="radio-inline">
									<input type="radio" class="pickReg" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Pick Up in Store
								</label>
							</div>
							<hr>
							<div class="ship-info-form">
								<div class="form-group">
									<div class="">
										<h3 class="text-light">Where should guests ship your gifts?</h3>
									</div>
								    <label for="xtxtOccs">Ship to Name</label>
								    <div class="clearfix">
									    <input type="text" class="field-control col-sm-5" name="xtxtNames[]" id="xtxtNames[0]" placeholder="Your First Name" >
									    <input type="text" class="field-control col-sm-5 col-sm-offset-2" name="xtxtNames[]" id="xtxtNames[1]" placeholder="Your Last Name">
								    </div>
								</div>
								<div class="form-group">
								    <label for="xtxtOccs">Address 1</label>
								    <input type="text" class="form-control" id="xtxtOccs" placeholder="Your Address 1">
								</div>
								<div class="form-group">
								    <label for="xtxtOccs">Address 2 (optional)</label>
								    <input type="text" class="form-control" id="xtxtOccs" placeholder="Your Address 2">
								</div>
								<div class="form-group">
								    <label for="xtxtOccs">Zipcode</label>
								    <input type="text" class="form-control" id="xtxtOccs" placeholder="Your Zipcode">
								</div>
								<div class="form-group">
								    <label for="xtxtOccs">City</label>
								    <input type="text" class="form-control" id="xtxtOccs" placeholder="Your City">
								</div>
								<div class="form-group">
								    <label for="xtxtOccs">State</label>
								    <input type="text" class="form-control" id="xtxtOccs" placeholder="Your State">
								</div>
								<div class="form-group">
								    <label for="xtxtOccs">Country</label>
								    <input type="text" class="form-control" id="xtxtOccs" placeholder="Your Country">
								</div>
								<div class="form-group">
								    <label for="xtxtOccs">Phone Number</label>
								    <input type="text" class="form-control" id="xtxtOccs" placeholder="Your Phone Number">
								</div>
							</div>
							<div class="row clearfix">
								<div class="col-sm-12 pull-right">
									<a href="{{ config('app.url') }}create/registry/2" class="btn btn-primary">CONTINUE</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@include('sections.contactus')
    @section('scripts')
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
		$(function(){
		    $( "#datepicker" ).datepicker();
		    $('.pickReg').on('change', function(){
		   		if( $(this).val() == 'option2' )
		   		{
		   			$('.ship-info-form').stop().slideUp();
		   		} else 
		   		{
		   			$('.ship-info-form').stop().slideDown();
		   		}
		    });
		    $('#occsfield').on('change', function(){
		    	if( $(this).val() == '2' )
		    	{
		    		$('.form-group-single').stop().slideDown();
		    		$('.form-group-married').stop().slideUp();
		    	} else 
		    	{
		    		$('.form-group-single').stop().slideUp();
		    		$('.form-group-married').stop().slideDown();
		    	}
		    });
		});
		</script>
    @endsection

@endsection