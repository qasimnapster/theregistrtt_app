<footer class="">
    <p>© 2018 All rights reserved - TheRegistryTT LLC   |   <span><a href="#">Site Map</a></span></p>
</footer>


@include('sections.login')
@include('sections.signup')

@if( Route::getCurrentRoute()->getPath() != '/' )
	<!-- jQuery 3 -->
	<script src="{{ config('app.url') }}vendors/jquery/dist/jquery.min.js"></script>
@endif
<!-- Bootstrap 3.3.7 -->
<script src="{{ config('app.url') }}vendors/bootstrap/dist/js/bootstrap.min.js"></script>
@yield('scripts')
</body>
</html>