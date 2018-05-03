@extends('master')

@section('stylesheets')

@endsection

@section('content')
<form method="POST" action="" id="frmResetPass">
	<div class="site-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	    <div class="modal-dialog modal-forgot-password" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h2 class="text-light text-center">Reset Password</h2>
	          </div>
	          <div class="modal-body">
	          	@if( $message != '' )
	          		<div class="alert alert-{{$error == true ? 'danger':'success'}}">
	          			<p style="color:inherit">{{ $message }}</p>
	          		</div>
	          	@endif
			    {{ csrf_field() }}
			    <div class="form-group" style="margin-top: 20px">
			        <label class="label-lighter" for="xtxtNewPassword">New Password</label>
			        <input type="password" class="form-control" name="xtxtNewPassword" id="xtxtNewPassword" placeholder="Enter your New Password" required>
			    </div>
			    <div class="form-group" style="margin-top: 20px">
			        <label class="label-lighter" for="xtxtConfPassword">Confirm Password</label>
			        <input type="password" class="form-control" name="xtxtConfPassword" id="xtxtConfPassword" placeholder="Enter your Confirm Password" required>
			    </div>
			    
	          </div>
	          <div class="modal-footer">
	            <button type="submit" class="btn btn-primary">RESET</button>
	          </div>
	        </div>
	    </div>
	</div>
	</form>
	

	@section('scripts')
	<!-- <p></p> -->
	@endsection
@endsection