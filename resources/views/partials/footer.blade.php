<footer class="">
    <p>© 2018 All rights reserved - TheRegistryTT LLC   |   <span><a href="#">Site Map</a></span></p>
</footer>

<div class="alert-overlay" style="display: none"></div>
<div class="product-detail-overlay" style="display: none">
    <button class="close-detail-view btn btn-default" style="border:0"><i class="fa fa-window-close" style="font-size: 36px"></i></button>
    <div class="container">
        <div class="row clearfix">
            <div class="col-sm-4">
                <img src="http://theregistrytt.optimalsolutionsonline.com//assets/img/uploads/Bathroom Caddy Double Chrome] Bathroom Accesories] $100.jpg" class="img-responsive" alt="">
            </div>
            <div class="col-sm-8">
                <div class="detail-title">
                    <h1 class="text-light">Bathroom Caddy Double Chrome</h1>
                </div>
                <div class="detail-cat">
                    <a href="#" class="h3 text-light">Home Accents</a>
                </div>
                <div class="detail-desc">
                    <h3 class="text-light">Bathroom Caddy Double Chrome</h3>
                </div>
                <div class="detail-price"><h3 class="text-light">$299</h3></div>
            </div>
        </div>
    </div>
</div>

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

        var detailView = $('.product-detail-overlay');

        $('.detail-product-view').on('click', function(){
            var $this = $(this)
                $id   = $this.data('detail-id');
            $.ajax({
                url: '{{ config("app.url") }}product/detail/'+$id,
                type: 'GET',
                dataType: 'html',
                data: {
                    'id': $id,
                    _token: '{!! csrf_token() !!}'
                },
                success: function(response){
                    //console.log(response);
                    $response = JSON.parse(response);
                    console.log( $response );
                    $('.detail-title > *').html( $response.data.title );
                    $('.detail-cat > a').attr('href', $response.data.category_slug );
                    $('.detail-cat > *').html( $response.data.category );
                    $('.detail-desc > *').html( $response.data.description );
                    $('.detail-price > *').html( '$' + $response.data.price );
                    detailView.css({'display':'block', 'opacity':1});
                },
                error: function(response){
                    console.log(response)
                }
            });
        });

        $('.close-detail-view').on('click', function(){
            detailView.css({'display':'none', 'opacity':0});
        });
		
	});
</script>
</body>
</html>