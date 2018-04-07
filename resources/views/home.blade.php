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
    <script type="text/javascript" src="{{ config('app.url') }}plugins/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url') }}plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ config('app.url') }}plugins/rs-plugin/css/settings.css" media="screen" />
@endsection
@section('content')
    <div class="slider">

        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                    <!-- SLIDE 1 -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="700" >
                        <!-- MAIN IMAGE -->
                        <img src="{{ config('app.url') }}assets/img/main-banner/1.jpeg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYERS -->
                        <div class="tp-caption mediumlarge_light_white skewfromleftshort customout"
                            data-x="right"
                            data-y="center" data-voffset="-200"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="1600"
                            data-easing="Back.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 10">THE #1 UNIVERSAL
                        </div>
                        <div class="tp-caption mediumlarge_light_white skewfromrightshort customout"
                            data-x="right"
                            data-y="center" data-voffset="-120"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="1800"
                            data-easing="Back.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 12">Wedding Wishlist, Baby Wishlist <br> and Gift Wishlist for all occasions
                        </div>
                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption skewfromrightshort customout"
                            data-x="right"
                            data-y="center" data-voffset="-10"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="1900"
                            data-easing="Back.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 14"><a href="http://theregistrytt.optimalsolutionsonline.com/create/wishlist/1" class="btn btn-primary btn-site-info-big text-light" style="color:#fff;">CREATE YOUR FREE WISHLIST</a>
                        </div>
                    </li>
                    <!-- SLIDE 2 -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="700" >
                        <!-- MAIN IMAGE -->
                        <img src="{{ config('app.url') }}assets/img/main-banner/4.jpeg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYERS -->
                        <div class="tp-caption mediumlarge_light_white skewfromleftshort customout"
                            data-x="right"
                            data-y="center" data-voffset="-200"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="1600"
                            data-easing="Back.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 10">THE #1 UNIVERSAL
                        </div>
                        <div class="tp-caption mediumlarge_light_white skewfromrightshort customout"
                            data-x="right"
                            data-y="center" data-voffset="-120"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="1800"
                            data-easing="Back.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 12">Wedding Wishlist, Baby Wishlist <br> and Gift Wishlist for all occasions
                        </div>
                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption skewfromrightshort customout"
                            data-x="right"
                            data-y="center" data-voffset="-10"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="1900"
                            data-easing="Back.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 14"><a href="http://theregistrytt.optimalsolutionsonline.com/create/wishlist/1" class="btn btn-primary btn-site-info-big text-light" style="color:#fff;">CREATE YOUR FREE WISHLIST</a>
                        </div>
                    </li>
                    <!-- SLIDE 2 -->
                    <li data-transition="fade" data-slotamount="5" data-masterspeed="700" >
                        <!-- MAIN IMAGE -->
                        <img src="{{ config('app.url') }}assets/img/main-banner/5.jpeg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <!-- LAYERS -->
                        <div class="tp-caption mediumlarge_light_white skewfromleftshort customout"
                            data-x="right"
                            data-y="center" data-voffset="-200"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="1600"
                            data-easing="Back.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 10">THE #1 UNIVERSAL
                        </div>
                        <div class="tp-caption mediumlarge_light_white skewfromrightshort customout"
                            data-x="right"
                            data-y="center" data-voffset="-120"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="1800"
                            data-easing="Back.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 12">Wedding Wishlist, Baby Wishlist <br> and Gift Wishlist for all occasions
                        </div>
                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption skewfromrightshort customout"
                            data-x="right"
                            data-y="center" data-voffset="-10"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="1900"
                            data-easing="Back.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 14"><a href="http://theregistrytt.optimalsolutionsonline.com/create/wishlist/1" class="btn btn-primary btn-site-info-big text-light" style="color:#fff;">CREATE YOUR FREE WISHLIST</a>
                        </div>
                    </li>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>

        <!-- <div class="banner-main">
            <div class="col-md-6 pull-right container-site-info text-center">
                <h3 class="text-light">THE #1 UNIVERSAL</h3>
                <h1 class="text-light">Wedding Wishlist, Baby Wishlist <br /> and Gift Wishlist for all occasions</h1>
                <a href="{{ config('app.url') }}create/wishlist/1" class="btn btn-primary btn-site-info-big text-light">CREATE YOUR FREE WISHLIST</a>
            </div>
        </div>
        <div class="banner-main" style="background-image:url(./assets/img/slide2.jpg)">
            <div class="col-md-6 pull-right container-site-info text-center">
                <h3 class="text-light">THE #1 UNIVERSAL</h3>
                <h1 class="text-light">Wedding Wishlist, Baby Wishlist <br /> and Gift Wishlist for all occasions</h1>
                <a href="{{ config('app.url') }}create/wishlist/1" class="btn btn-primary btn-site-info-big text-light">CREATE YOUR FREE WISHLIST</a>
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
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="{{ config('app.url') }}/assets/img/icons/glassware.png" alt="" class="img-responsive">
                    </div>
                    <a href="{{ config('app.url') }}categories/glassware" class="h4 text-center text-capitalize">glassware</a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="{{ config('app.url') }}/assets/img/icons/crockery.png" alt="" class="img-responsive">
                    </div>
                    <a href="{{ config('app.url') }}categories/crockery" class="h4 text-center text-capitalize">crockery</a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="{{ config('app.url') }}/assets/img/icons/kitchen_utensils.png" alt="" class="img-responsive">
                    </div>
                    <a href="{{ config('app.url') }}categories/kitchen_utensils" class="h4 text-center text-capitalize">kitchen utensils</a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="{{ config('app.url') }}/assets/img/icons/linens.png" alt="" class="img-responsive" style="    height: 100px;">
                    </div>
                    <a href="{{ config('app.url') }}categories/linens" class="h4 text-center text-capitalize">linens</a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="{{ config('app.url') }}/assets/img/icons/bathroom_accessories.png" alt="" class="img-responsive">
                    </div>
                    <a href="{{ config('app.url') }}categories/bathroom_accessories" class="h4 text-center text-capitalize">bathroom accessories</a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="{{ config('app.url') }}/assets/img/icons/mini_appliances.png" alt="" class="img-responsive">
                    </div>
                    <a href="{{ config('app.url') }}categories/mini_appliances" class="h4 text-center text-capitalize">mini appliances</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="{{ config('app.url') }}/assets/img/icons/home_accents.png" alt="" class="img-responsive">
                    </div>
                    <a href="{{ config('app.url') }}categories/home_accents" class="h4 text-center text-capitalize">home accents</a>
                </div>
            </div>
            <!-- <img src="https://images-platform.99static.com/JsmXH_1twMGCO3EedzmGJhdKyss=/fit-in/900x675/99designs-contests-attachments/4/4843/attachment_4843165" style="opacity: .6;"> -->
            <!-- <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
            <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div> -->
        </div>
    </section>
    <section class="banner-ads">
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
    </section>
    <div class="ticker-main light-ticker text-center">
        See what members are adding: <a href="#" style="font-size:24px;">Wedding Wishlist | </a><a href="#" style="font-size:24px;">Baby Wishlist | </a><a href="#" style="font-size:24px;">Wish List</a>
    </div>
    <section class="adding-gifts">
        <div class="container">
            <div class="col-sm-6">
                <div style="position: relative;">
                    <img class="hp_w100" src="{{ config('app.url') }}/assets/img/mobile-preview-1.png" alt="Add gifts on-the-go from your smartphone" style="width:100%">
                    <img class="hp_w100" src="{{ config('app.url') }}/assets/img/mobile-preview-2.png" alt="Add gifts on-the-go from your smartphone" style=" position: absolute; top: 35px; left:0; z-index: -0999;width:100%">
                </div>
            </div>
            <div class="col-sm-6">
                <div>
                    <div class="title-adding">
                        <h2 class="text-light">Add gifts on-the-go from your smartphone</h2>
                    </div>
                    <div class="paragraph-adding">
                        <h3 class="text-light" style="line-height: 30px;">
                            Scan any barcode and add items to your gift list while browsing your favorite store. You can even add items from stores that do not have websites by taking a picture and adding a few details about where the item can be purchased.
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="ticker-main gradient-ticker text-center">
        <span style="color:#fff; font-weight: 300;font-size: 24px;padding: 30px; color: #fff;">Want to know more about us!</span>
        <a href="{{ config('app.url') }}about-us" class="btn btn-default btn-lg">Click Here</a>
        <!-- <span style="font-size:24px; color: #e5c100; padding:15px; background-color: #fff; border-right:1px solid" data-toggle="tooltip" data-placement="left" title="What is a Bridal Registry?"><i class="fa fa-gift" aria-hidden="true"></i> W </span>
        <span style="font-size:24px; color: #e5c100; padding:15px; background-color: #fff; border-right:1px solid" data-toggle="tooltip" data-placement="left" title="Why Use a Registry?"><i class="fa fa-gift" aria-hidden="true"></i> BW </span>
        <span style="font-size:24px; color: #e5c100; padding:15px; background-color: #fff;" data-toggle="tooltip" data-placement="left" title="Why select your Registry with Us?"><i class="fa fa-gift" aria-hidden="true"></i> WL</span> -->
    </div>
    <section class="sample-wishlist" style="border-bottom: 1px solid #ccc;">
        <h1 class="text-light text-center">FAQs</h1>
        <div class="samples-container container">
            @include('sections.faqs')
        </div>
    </section>
    <section class="sample-wishlist" style="border-bottom: 1px solid #ccc; background:#eee;">
        <h1 class="text-light text-center" style="margin-top: 0; padding-top: 25px;">Another Section</h1>
        <div class="samples-container container">
            <div class="row clearfix block-row-listb">
                <div class="col-sm-3 text-right">
                    <i class="h1 fa fa-bookmark" style="font-size: 42px;color:#e5c100"></i>
                </div>
                <div class="col-sm-6">
                    <h2 class="text-light">Browse and Purchase from your mobile</h1>
                    <p class="light-rale">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In ratione, temporibus consequuntur optio. Enim, fugiat aperiam. Dignissimos ea vero magnam nesciunt ut ad quae, quaerat quia blanditiis dolor cum corporis!</p>
                </div>
            </div>
            <div class="row clearfix block-row-listb">
                <div class="col-sm-3 text-right">
                    <i class="h1 fa fa-bookmark" style="font-size: 42px;color:#e5c100"></i>
                </div>
                <div class="col-sm-6">
                    <h2 class="text-light">Complimentary Registry Invites</h1>
                    <p class="light-rale">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero deleniti est placeat, repudiandae praesentium reiciendis saepe quaerat dolore fugit, voluptatibus magnam, odit minima esse iure distinctio consectetur tempora nemo eveniet.</p>
                </div>
            </div>
            <div class="row clearfix block-row-listb">
                <div class="col-sm-3 text-right">
                    <i class="h1 fa fa-bookmark" style="font-size: 42px;color:#e5c100"></i>
                </div>
                <div class="col-sm-6">
                    <h2 class="text-light">Exclusive Bridal Party Discounts at Kooti's</h1>
                    <p class="light-rale">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum magnam recusandae ipsum consectetur in eaque asperiores dolorem perspiciatis, ipsa sed nemo. Maxime quibusdam, rerum repellendus provident voluptatibus, reprehenderit molestias eum.</p>
                </div>
            </div>
            <div class="row clearfix block-row-listb">
                <div class="col-sm-3 text-right">
                    <i class="h1 fa fa-bookmark" style="font-size: 42px;color:#e5c100"></i>
                </div>
                <div class="col-sm-6">
                    <h2 class="text-light">Complete your Registry at Discounted Prices</h1>
                    <p class="light-rale">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi optio sequi inventore tenetur a modi aspernatur quas asperiores temporibus quibusdam perspiciatis sed itaque repellendus porro fugit nostrum facere, unde architecto.</p>
                </div>
            </div>
            <div class="row clearfix block-row-listb">
                <div class="col-sm-3 text-right">
                    <i class="h1 fa fa-bookmark" style="font-size: 42px;color:#e5c100"></i>
                </div>
                <div class="col-sm-6">
                    <h2 class="text-light">Access to Special Order Items</h1>
                    <p class="light-rale">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti excepturi eveniet assumenda qui enim repudiandae quibusdam, quam pariatur aliquid repellendus quod animi, impedit ratione iste eos debitis sint voluptatem illum.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="sample-wishlist">
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
    </section>
    @include('sections.contactus')
    @section('scripts')
        

        <script src="{{ config('app.url') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="{{ config('app.url') }}/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ config('app.url') }}/vendors/bxslider/js/jquery.bxslider.min.js"></script>
        <script src="{{ config('app.url') }}/plugins/iCheck/icheck.min.js"></script>

        <script>
        $(document).ready(function(){
            
            $('.slider').bxSlider({
                responsive: true,
                mode: 'fade',
                auto: true,
                speed: 1500,
                hideControlOnEnd: true,
                controls: false,
                pager: false
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

            //Flat red color scheme for iCheck
            // $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            //     checkboxClass: 'icheckbox_minimal-blue',
            //     radioClass   : 'iradio_minimal-blue'
            // })
        });

        var revapi;

        $(document).ready(function() {

               revapi = $('.tp-banner').revolution(
                {
                    delay:9000,
                    startwidth:1170,
                    startheight:900,
                    hideThumbs:10

                });

        }); //ready
        </script>
    @endsection

@endsection