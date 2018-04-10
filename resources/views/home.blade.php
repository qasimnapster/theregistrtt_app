@extends('master')
@section('stylesheets')
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ config('app.url') }}vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ config('app.url') }}vendors/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ config('app.url') }}vendors/bxslider/css/jquery.bxslider.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ config('app.url') }}plugins/iCheck/all.css">
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
    <!-- <script type="text/javascript" src="{{ config('app.url') }}plugins/rs-plugin/js/jquery.themepunch.plugins.min.js"></script> -->
    <script type="text/javascript" src="{{ config('app.url') }}plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url') }}plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ config('app.url') }}plugins/rs-plugin/css/settings.css" media="screen" />
    <style>
        .bx-viewport{
            /*height: 500px !important;*/
        }
    </style>
@endsection
@section('content')
    <div class="slider">

        @include('sections.banner')

        <!-- <div class="banner-main">
            <div class="col-md-6 pull-right container-site-info text-center">
                <h3 class="text-light">THE #1 UNIVERSAL</h3>
                <h1 class="text-light">Wedding Registry, Baby Registry <br /> and Gift Registry for all occasions</h1>
                <a href="{{ config('app.url') }}create/registry/1" class="btn btn-primary btn-site-info-big text-light">CREATE YOUR FREE REGISTRY</a>
            </div>
        </div>
        <div class="banner-main" style="background-image:url(./assets/img/slide2.jpg)">
            <div class="col-md-6 pull-right container-site-info text-center">
                <h3 class="text-light">THE #1 UNIVERSAL</h3>
                <h1 class="text-light">Wedding Registry, Baby Registry <br /> and Gift Registry for all occasions</h1>
                <a href="{{ config('app.url') }}create/registry/1" class="btn btn-primary btn-site-info-big text-light">CREATE YOUR FREE REGISTRY</a>
            </div>
        </div> -->

    </div>
    <div class="ticker-main text-center">
        <span><i class="fa fa-fw fa-heart-o"></i></span> Why you’ll Adore using TheRegistrytt.com <span><i class="fa fa-fw fa-heart-o"></i></span> 
    </div>
    <section class="brands-container text-center">
        <h1 class="text-light" style="margin-bottom: 30px;" >Items Categories</h1>
        <div class="clearfix container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="https://assets3.classic-assets.com/product_photo/48301/large_20014-glassware-vinea-set-1_1473717653.jpg" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/glassware" class="h4 text-center text-capitalize">glassware</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="http://cookingchefshop.com/1491-large_default/maxwell-williams-servizio-18pz-piatti-motion.jpg" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/crockery" class="h4 text-center text-capitalize">crockery</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="https://ae01.alicdn.com/kf/HTB1ZKg2QVXXXXc0XVXXq6xXFXXXh/Kids-Stainless-Steel-Kitchen-Cooking-Utensils-Pots-Pans-Food-Gift-Miniature-Kitchen-Tools-Set-Simulation-Play.jpg_640x640.jpg" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/kitchen_utensils" class="h4 text-center text-capitalize">kitchen utensils</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="https://cdn.shopify.com/s/files/1/0951/7126/products/linen-hardcore-bundle_cream--cream--cream_background_480x.jpg?v=1510930368" alt="" class="img-responsive" style="">
                        </div>
                        <a href="{{ config('app.url') }}categories/linens" class="h4 text-center text-capitalize">linens</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="https://images.cb2.com/is/image/CB2/RubberBathSinkGroupFHF16Group/?$web_product_hero$&161121140920&wid=625&hei=625" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/bathroom_accessories" class="h4 text-center text-capitalize">bathroom accessories</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="https://www.courts.com.sg/media/catalog/product/cache/image/4dd88cc0ac8c2f36fda1eefecbc98069/i/p/ip084299_00.jpg" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/mini_appliances" class="h4 text-center text-capitalize">mini appliances</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">&nbsp;</div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="http://www.sneakerdunk.com/wp-content/uploads/2018/04/bathroom-shelf-decorating-ideas-pictures-of9g18-tjihome-amazing-1024x1024.jpg" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/home_accents" class="h4 text-center text-capitalize">home accents</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">&nbsp;</div>
            </div>
            <!-- <img src="https://images-platform.99static.com/JsmXH_1twMGCO3EedzmGJhdKyss=/fit-in/900x675/99designs-contests-attachments/4/4843/attachment_4843165" style="opacity: .6;"> -->
            <!-- <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
            <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div> -->
        </div>
    </section>
    <!-- <div class="ticker-main light-ticker text-center">
        See what members are adding: <a href="#" style="font-size:24px;">Wedding Registry | </a><a href="#" style="font-size:24px;">Baby Registry | </a><a href="#" style="font-size:24px;">Wish List</a>
    </div> -->
    <!-- FAQs Section -->
    @include('sections.faqs')
        
    <!-- <section class="banner-ads">
        <div class="container" style="height:100%">
            <div class="col-sm-6 pull-right ads-table">
                <div class="ads-detail">
                    <div class="ads-title-container">
                        <h2 class="text-light" style="color:#fff">Add gifts from any store in the world</h2>
                    </div>
                    <div class="ads-title-container">
                        <h3 class="text-light" style="color:#fff">It's easy! Just put the "<a href="#" style="font-weight: 500; color:#3e4348; font-size: 20px;" onclick="return false;">Add to MyRegistry</a>" button on your bookmarks bar. Then, click the button to add a gift to your wedding Wishlist, baby Wishlist or wish list!
                            <a href="#" style="font-weight: 500; color:#3e4348; font-size: 20px;">Learn More</a>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
    <!-- <section class="adding-gifts">
        <div class="container">
            <div class="col-sm-6">
                <div style="position: relative;">
                    <img class="hp_w100" src="{{ config('app.url') }}/assets/img/mobile-preview-1.png" alt="Add gifts on-the-go from your smartphone" style="width:100%">
                    <img class="hp_w100" src="{{ config('app.url') }}/assets/img/mobile-preview-2.png" alt="Add gifts on-the-go from your smartphone" style=" position: absolute; top: 35px; left:0; z-index: -0999;width:100%">
                </div>
            </div>
            <div class="col-sm-6">
                <div style="    transform: translate(0%, 25%);">
                    <div class="paragraph-adding">
                        <h3 class="text-light" style="line-height: 30px;">
                            <i class="fa fa-check-square-o" style="padding-right: 5px;"></i> Browse and Purchase from the convenience of your mobile
                        </h3>
                    </div>
                    <div class="paragraph-adding">
                        <h3 class="text-light" style="line-height: 30px;">
                            <i class="fa fa-check-square-o" style="padding-right: 5px;"></i> Complimentary Registry Invites
                        </h3>
                    </div>
                    <div class="paragraph-adding">
                        <h3 class="text-light" style="line-height: 30px;">
                            <i class="fa fa-check-square-o" style="padding-right: 5px;"></i> Exclusive Bridal Party Discounts
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <div class="ticker-main gradient-ticker text-center">
        <span style="color:#fff; font-weight: 300;font-size: 24px;padding: 30px; color: #fff;">Want to know more about us!</span>
        <a href="{{ config('app.url') }}about-us" class="btn btn-default btn-lg">Click Here</a>
        <!-- <span style="font-size:24px; color: #e5c100; padding:15px; background-color: #fff; border-right:1px solid" data-toggle="tooltip" data-placement="left" title="What is a Bridal Registry?"><i class="fa fa-gift" aria-hidden="true"></i> W </span>
        <span style="font-size:24px; color: #e5c100; padding:15px; background-color: #fff; border-right:1px solid" data-toggle="tooltip" data-placement="left" title="Why Use a Registry?"><i class="fa fa-gift" aria-hidden="true"></i> BW </span>
        <span style="font-size:24px; color: #e5c100; padding:15px; background-color: #fff;" data-toggle="tooltip" data-placement="left" title="Why select your Registry with Us?"><i class="fa fa-gift" aria-hidden="true"></i> WL</span> -->
    </div>
    
    @include('sections.testimonials')
    <!-- <section class="sample-wishlist">
        <h1 class="text-light text-center">View a sample Wishlist</h1>
        <div class="samples-container container">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <div class="title-sample">
                        <a href="#">Sample Wishlist 1</a>
                    </div>
                    <img src="{{ config('app.url') }}/assets/img/skate.jpg" alt="" class="sample-imgs">
                </div>
                <div class="col-sm-4 text-center">
                    <div class="title-sample">
                        <a href="#">Sample Wishlist 2</a>
                    </div>
                    <img src="{{ config('app.url') }}/assets/img/skate.jpg" alt="" class="sample-imgs">
                </div>
                <div class="col-sm-4 text-center">
                    <div class="title-sample">
                        <a href="#">Sample Wishlist 3</a>
                    </div>
                    <img src="{{ config('app.url') }}/assets/img/skate.jpg" alt="" class="sample-imgs">
                </div>
            </div>
        </div>
    </section> -->
    @include('sections.contactus')
    @section('scripts')
        

        <script src="{{ config('app.url') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="{{ config('app.url') }}/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ config('app.url') }}/vendors/bxslider/js/jquery.bxslider.min.js"></script>
        <script src="{{ config('app.url') }}/plugins/iCheck/icheck.min.js"></script>

        <script>
        $(document).ready(function(){
            
            // $('.slider').bxSlider({
            //     responsive: true,
            //     mode: 'fade',
            //     auto: true,
            //     speed: 1500,
            //     hideControlOnEnd: true,
            //     controls: false,
            //     pager: false
            // });

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

            //Flat red color scheme for iCheck
            // $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            //     checkboxClass: 'icheckbox_minimal-blue',
            //     radioClass   : 'iradio_minimal-blue'
            // })
        });


        $(document).ready(function() {

            $('#rev_slider_1').revolution({
                sliderLayout: 'fullscreen',
            });

        }); //ready
        </script>
    @endsection

@endsection