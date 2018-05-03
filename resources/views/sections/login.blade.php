<div class="modal site-modal fade bs-login-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="text-light text-center">Login to TheRegistryTT</h2>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ config('app.url') }}login">
                {{ csrf_field() }}
              <div class="form-group" style="margin-top: 20px">
                <label class="label-lighter" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="checkbox">
                <label class="label-lighter">
                  <input class="minimal" type="checkbox"> Keep me logged in
                </label>
              </div>
              <div class="checkbox">
                <label class="label-lighter">
                  <input type="checkbox"> I agree to the website terms
                </label>
              </div>
              <div class="form-group">
                <a href="javascript:;" class="text-primary modal-fp">Forgot password?</a>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" style="color:#fff;padding-right:5px"></i> LOG IN</button>
          </div>
        </div>
    </div>
</div>