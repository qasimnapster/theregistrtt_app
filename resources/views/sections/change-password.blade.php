<div class="modal fade bs-change-password-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-change-password" role="document">
        <div class="modal-content" style="padding: 30px; background: #f8f9f9d1;">
            <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size: 26px;">&times;</span></button>
        <div class="loadersmall" style="display:none"></div>
        <form method="POST" action="{{ config('app.url') }}change-password" id="frmChangePass">
            {{ csrf_field() }}
            <h1 class="text-light text-center">Change Password</h1>
          <div class="form-group" style="margin-top: 20px">
            <label class="label-lighter" for="xtxtCurrPassword">Current Password</label>
            <input type="password" class="form-control" name="xtxtCurrPassword" id="xtxtCurrPassword" placeholder="Enter your Current Password" required>
          </div>
          <div class="form-group" style="margin-top: 20px">
            <label class="label-lighter" for="xtxtNewPassword">New Password</label>
            <input type="password" class="form-control" name="xtxtNewPassword" id="xtxtNewPassword" placeholder="Enter your New Password" required>
          </div>
          <button type="button" class="btn btn-change-password btn-primary" style="width:100%">CHANGE</button>
        </form>
        </div>
    </div>
</div>