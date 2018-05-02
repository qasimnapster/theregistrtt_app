@extends('master')
@section('stylesheets')
    <link rel="stylesheet" href="{{ config('app.url') }}assets/css/steps.css">
@endsection
@section('content')
		
	<section>
		<div class="clearfix">
			<div class="alert alert-success">
				<h1 class="text-light text-center" ><span style="font-style:italic; font-size: inherit; color:inherit; font-weight: 700">Thank You!</span> Your payment has been received.</h1>
			</div>
		</div>
		
	</section>

	@include('sections.contactus')
    @section('scripts')
        
    @endsection

@endsection