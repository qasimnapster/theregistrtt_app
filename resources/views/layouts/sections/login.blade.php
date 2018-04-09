<div class="modal fade bs-login-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content" style="padding: 30px; background: #f8f9f9d1;">
            <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size: 26px;">&times;</span></button>
        <form method="POST" action="./login">
            {{ csrf_field() }}
            <h1 class="text-light text-center">Login To ttRegistry</h1>
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
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>