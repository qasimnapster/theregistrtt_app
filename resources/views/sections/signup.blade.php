<div class="modal site-modal fade bs-signup-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-login" role="document">
        <div class="loadersmall" style="display:none"></div>
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="text-light text-center">Sign up to TheRegistryTT</h2>
          </div>
          <div class="modal-body">
            <form method="POST" action="#" id="frmSignUp">
              {{ csrf_field() }}
              <div class="form-group" style="margin-top: 20px">
                <label class="label-lighter" for="exampleInputEmail1">Choose a registry type</label>
                <select name="xslcRegType" id="xslcRegType" class="form-control" required>
                    <option value="">SELECT</option>
                    @if (count($reg_types) > 0)
                        @foreach ($reg_types as $reg_type)
                            <option value="{{ $reg_type->ID }}"> {{ $reg_type->name }} </option>
                        @endforeach
                    @endif
                </select>
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xtxtFirstName">First Name</label>
                <input type="text" class="form-control" required name="xtxtFirstName" id="xtxtFirstName" placeholder="Enter your First Name">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xtxtLastName">Last Name</label>
                <input type="text" class="form-control" required name="xtxtLastName" id="xtxtLastName" placeholder="Enter your Last Name">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xemlEmailAddr">E-mail Address</label>
                <input type="email" class="form-control" required name="xemlEmailAddr" id="xemlEmailAddr" placeholder="Enter your E-mail Address">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xemlConfEmailAddr">Confirm E-mail</label>
                <input type="email" class="form-control" required name="xemlConfEmailAddr" id="xemlConfEmailAddr" placeholder="Re-Enter your E-mail Address">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xpsPassword">Password</label>
                <input type="password" class="form-control" required name="xpsPassword" id="xpsPassword" placeholder="Enter your Password">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xpsConfPassword">Confirm Password</label>
                <input type="password" class="form-control" required name="xpsConfPassword" id="xpsConfPassword" placeholder="Re-Enter your Password">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-create-account btn-primary">Create Account</button>
          </div>
        </div>
    </div>
</div>