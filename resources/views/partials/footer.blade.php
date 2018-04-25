<footer class="">
    <p>© 2018 All rights reserved - TheRegistryTT LLC   |   <span><a href="#">Site Map</a></span></p>
</footer>

<div class="alert-overlay" style="display: none"></div>

@include('sections.login')
@include('sections.signup')

@if( Route::getCurrentRoute()->getPath() != '/' )
	<!-- jQuery 3 -->
	<script src="{{ config('app.url') }}vendors/jquery/dist/jquery.min.js"></script>
@endif
<!-- Bootstrap 3.3.7 -->
<script src="{{ config('app.url') }}vendors/bootstrap/dist/js/bootstrap.min.js"></script>
@yield('scripts')
<script>
	$(function(){
		if( $('.common-alert p').length > 0 )
			$('.alert-overlay').css({'opacity':.5}).fadeIn(300);
		
		$('.common-alert button.close').on('click', function(){
			$('.alert-overlay').css({'opacity':0}).fadeOut(300);	
		});
		
		$('[data-toggle="tooltip"]').tooltip();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btn-create-account').on('click', function(){
            $('.loadersmall').fadeIn();
            $('#frmSignUp').fadeOut();
            xslcRegType       = $('#xslcRegType').val();
            xtxtFirstName     = $('#xtxtFirstName').val();
            xtxtLastName      = $('#xtxtLastName').val();
            xemlEmailAddr     = $('#xemlEmailAddr').val();
            xemlConfEmailAddr = $('#xemlConfEmailAddr').val();
            xpsPassword       = $('#xpsPassword').val();
            xpsConfPassword   = $('#xpsConfPassword').val();
            $.ajax({
                url: '{{ config("app.url") }}signup',
                type: 'POST',
                dataType: 'html',
                data: {
                    'xslcRegType': xslcRegType,
                    'xtxtFirstName': xtxtFirstName,
                    'xtxtLastName': xtxtLastName,
                    'xemlEmailAddr': xemlEmailAddr,
                    'xemlConfEmailAddr': xemlConfEmailAddr,
                    'xpsPassword': xpsPassword,
                    'xpsConfPassword': xpsConfPassword,
                    _token: '{!! csrf_token() !!}'
                },
                success: function(response){
                    $('.loadersmall').fadeOut();
                    $result = JSON.parse(response);
                    $('.bs-signup-modal-lg').modal('toggle')
                    alert( $result.message );
                    //console.log(response)
                },
                error: function(response){
                    //console.log(response)
                }
            });
        });
		
	});
</script>
</body>
</html>