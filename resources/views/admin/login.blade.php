@extends('admin.master')
@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="javascript:;"><b>Registry</b>ADMIN</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    @if (count($errors) > 0)
	    <div class="alert alert-danger common-alert">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	        @foreach ($errors->all() as $error)
	            <p> <span class="glyphicon glyphicon-asterisk" style="font-size:8px" aria-hidden="true"></span> {{ $error }}</p>
	        @endforeach
	    </div>
	  @endif


    <form action="{{ config('app.url') }}administrator/login/process" method="post">
    	{{ csrf_field() }}
      <div class="form-group has-feedback">
        <input type="email" name="email_address" id="email_address" required class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" id="password" required class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
@endsection