@extends('layouts.master')
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
					        <input class="stepper__input" id="stepper-3-0" name="stepper-3" type="radio">
					        <div class="stepper__step">
					            <label class="stepper__button" for="stepper-3-0">Step: 1</label>
					        </div>
					        <input class="stepper__input" id="stepper-3-1" name="stepper-3" type="radio">
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
		<div>
			<div class="alert alert-success">
				<h1 class="text-light text-center" ><span style="font-style:italic; font-size: inherit;">Congratulations!</span> You have created the wishlist successfully.</h1>

			</div>
		</div>
		
	</section>

	@include('sections.contactus')
    @section('scripts')
        
    @endsection

@endsection