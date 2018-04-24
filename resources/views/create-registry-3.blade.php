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
					        <input class="stepper__input" id="stepper-3-0" name="stepper-3" type="radio" disabled>
					        <div class="stepper__step">
					            <label class="stepper__button" for="stepper-3-0">Step: 1</label>
					        </div>
					        <input class="stepper__input" id="stepper-3-1" name="stepper-3" type="radio" disabled>
					        <div class="stepper__step">
					            <label class="stepper__button" for="stepper-3-1">Step: 2</label>
					        </div>
					        <input class="stepper__input" id="stepper-3-2" name="stepper-3" type="radio" checked="checked">
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
		<div class="clearfix">
			<div class="alert alert-success">
				<h1 class="text-light text-center" ><span style="font-style:italic; font-size: inherit; color:inherit; font-weight: 700">Congratulations!</span> on Creating your Registry!'   We do hope this was one of the easier parts of your wedding!   Go and start sharing your Wedding Code with your guests!</h1>
			</div>
			<div class="col-sm-12 text-center" style="padding-bottom: 20px; margin: 20px 0; ">
				<span class="h4 text-center" style="background: #efefef; padding: 20px;">Your Registry Promo Code: <strong style="font-size:inherit;">#{{ $promo_code }}</strong></span>
			</div>
		</div>
		
	</section>

	@include('sections.contactus')
    @section('scripts')
        
    @endsection

@endsection