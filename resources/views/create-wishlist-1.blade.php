@extends('master')
@section('stylesheets')
    <link rel="stylesheet" href="{{ config('app.url') }}assets/css/steps.css">
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
				<h1 class="text-light text-center" >Welcome to your Wishlists Create Page</h1>
				<p class="text-center" style="font-style:italic">We're so excited for you, and can't wait for you to discover how easy it is to add gifts from any store in the world. Let's get started!</p>
			</div>
		</div>
		<div class="container container-wishlist-form">
			<div class="clearfix">
				<div class="col-sm-4">
					<div class="img-wishlist-container">
						<img src="{{ config('app.url') }}assets/img/New-Baby-Arrival.jpg" alt="" class="img-responsive">
					</div>
				</div>
				<div class="col-sm-8">
					<div class="wishlist-wrapper">
						<div>
							<div class="form-group">
							    <label for="xtxtOccs" class="h3 text-light">What's the ocassion?</label>
							    <input type="text" class="form-control" id="xtxtOccs" placeholder="Baby?">
							</div>
							<div class="form-group">
							    <label for="xtxtNames[0]">Who is the Happy Parent?</label>
							    <div class="clearfix">
								    <input type="text" class="col-sm-5" name="xtxtNames[]" id="xtxtNames[0]" placeholder="Your Name" >
								    <input type="text" class="col-sm-5 col-sm-offset-2" name="xtxtNames[]" id="xtxtNames[1]" placeholder="Partner's Name">
							    </div>
							</div>
							<div class="form-group">
								<div>Your Event</div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
										Baby's Due Date
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
										Baby's Already Here
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
										It's an adoption!
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="">
									<h3 class="text-light">Where should guests ship your gifts?</h3>
								</div>
							    <label for="xtxtOccs">Ship to Name</label>
							    <div class="clearfix">
								    <input type="text" class="col-sm-5" name="xtxtNames[]" id="xtxtNames[0]" placeholder="Your First Name" >
								    <input type="text" class="col-sm-5 col-sm-offset-2" name="xtxtNames[]" id="xtxtNames[1]" placeholder="Your Last Name">
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
							<div class="row clearfix">
								<div class="col-sm-12 pull-right">
									<a href="{{ config('app.url') }}create/wishlist/2" class="btn btn-primary">CONTINUE</a>
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
        
    @endsection

@endsection