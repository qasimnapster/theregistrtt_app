@extends('master')

@section('stylesheets')

@endsection

@section('content')
	
	@if( $updation )
		<script>alert('Profile Updated Successfully');</script>
		<script> window.location.reload(); </script>
	@endif
	<section class="profile-container clearfix">
		<div class="block-container container">
			<div class="head-block-profile">
				<div class="title-profile-head text-light clearfix">
					<i class="fa fa-user" style="padding-right: 8px;"></i> Profile Setting
					<div class="pull-right">
						<a href="#" class="btn btn-primary ">CREATE YOUR FREE REGISTRY</a>
					</div>
				</div>
			</div>
			<div class="content-block-profile clearfix">
				<!-- <div class="headline-profile">
					<h3 class="text-light">Your Info:</h3>
				</div> -->
				<div class="profile-form-container">
					<form method="POST" action='#' accept-charset="UTF-8">
						{{ csrf_field() }}
					    <div class="row">
					    	<div class="form-group col-sm-6">
						        <label class="text-light" for="xtxtCustFirstName">First Name:</label>
						        <input type="text" class="form-control" name="xtxtCustFirstName" id="xtxtCustFirstName" placeholder="Enter Your First Name" value="{{ $customer->first_name }}" required>
						    </div>
						    <div class="form-group col-sm-6">
						        <label class="text-light" for="xtxtCustLastName">Last Name:</label>
						        <input type="text" class="form-control" name="xtxtCustLastName" id="xtxtCustLastName" placeholder="Enter Your Last Name" value="{{ $customer->last_name }}" required>
						    </div>
					    </div>
					    <div class="row">
					    	<div class="form-group col-sm-6">
						        <label class="text-light" for="xtxtAddress1">Address 1:</label>
						        <input type="text" class="form-control" name="xtxtAddress1" id="xtxtAddress1" placeholder="Enter Your Address 1" value="{{ $customer->address_1 }}" required>
						    </div>
						    <div class="form-group col-sm-6">
						        <label class="text-light" for="xtxtAddress2">Address 2:</label>
						        <input type="text" class="form-control" name="xtxtAddress2" id="xtxtAddress2" placeholder="Enter Your Address 2" value="{{ $customer->address_2 }}" required>
						    </div>
					    </div>
					    <div class="row">
					    	<div class="form-group col-sm-6">
						        <label class="text-light" for="xtxtCity">City:</label>
						        <input type="text" class="form-control" name="xtxtCity" id="xtxtCity" placeholder="Enter Your City" value="{{ $customer->city }}" required>
						    </div>
						    <div class="form-group col-sm-6">
						        <label class="text-light" for="xtxtCountry">Country:</label>
						        <input type="text" class="form-control" name="xtxtCountry" id="xtxtCountry" placeholder="Enter Your Country" value="{{ $customer->country }}" required>
						    </div>
					    </div>
					    <div class="pull-right">
					    	<button type="submit" class="btn btn-default" style="background:#313538;color:#fff;border:0;">Update Profile <i class="fa fa-edit" style="padding-left: 5px;color:#fff"></i></button>
					    </div>
					</form>
				</div>
			</div>
		</div>
	</section> 

	@section('scripts')
	<!-- <p></p> -->
	@endsection
@endsection