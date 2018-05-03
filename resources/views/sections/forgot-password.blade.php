<div class="modal site-modal fade bs-forgot-password-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-forgot-password" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="text-light text-center">Forgot Password</h2>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ config('app.url') }}forgot-password">
                {{ csrf_field() }}
              <div class="form-group" style="margin-top: 20px">
                <label class="label-lighter" for="F__xemlEmailAddr">Email Address</label>
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                  <input type="email" class="form-control" name="F__xemlEmailAddr" id="F__xemlEmailAddr" placeholder="Enter your Email-Address">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >SEND</button>
          </div>
        </div>
    </div>
</div>