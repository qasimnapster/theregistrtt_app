@if (count($errors) > 0)
    <div class="alert alert-danger common-alert">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        @foreach ($errors->all() as $error)
            <p> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> {{ $error }}</p>
        @endforeach
    </div>
@endif
