<div class="modal fade bs-forgot-password-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-forgot-password" role="document">
        <div class="modal-content" style="padding: 30px; background: #f8f9f9d1;">
            <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size: 26px;">&times;</span></button>
        <form method="POST" action="{{ config('app.url') }}forgot-password">
            {{ csrf_field() }}
            <h1 class="text-light text-center">Forgot Password</h1>
          <div class="form-group" style="margin-top: 20px">
            <label class="label-lighter" for="F__xemlEmailAddr">Email Address</label>
            <div class="input-group">
              <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
              <input type="email" class="form-control" name="F__xemlEmailAddr" id="F__xemlEmailAddr" placeholder="Enter your Email-Address">
            </div>
          </div>
          <button type="submit" class="btn btn-primary" style="width:100%">SEND</button>
        </form>
        </div>
    </div>
</div>