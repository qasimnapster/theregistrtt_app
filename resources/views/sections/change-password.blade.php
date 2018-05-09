<div class="modal site-modal fade bs-change-password-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-change-password" role="document">
        <div class="loadersmall" style="display:none"></div>
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="text-light text-center">Change Password</h2>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ config('app.url') }}change-password" id="frmChangePass">
                {{ csrf_field() }}
              <div class="form-group" style="margin-top: 20px">
                <label class="label-lighter" for="xtxtCurrPassword">Current Password</label>
                <input type="password" class="form-control" name="xtxtCurrPassword" id="xtxtCurrPassword" placeholder="Enter your Current Password" required>
              </div>
              <div class="form-group" style="margin-top: 20px">
                <label class="label-lighter" for="xtxtNewPassword">New Password</label>
                <input type="password" class="form-control" name="xtxtNewPassword" id="xtxtNewPassword" placeholder="Enter your New Password" required>
              </div>
            </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-change-password btn-primary">CHANGE</button>
          </div>
        </div>
    </div>
</div>