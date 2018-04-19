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
		$('#navbar ul.navbar-nav .anchor-form .input-navbar').focusin(function(){
			//$(this).val('');
		});
	});
</script>
</body>
</html>