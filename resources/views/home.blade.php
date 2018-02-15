@extends('master')
@section('content')
    <div class="slider">
        <div class="banner-main">
            <div class="col-md-6 pull-right container-site-info text-center">
                <h3 class="text-light">THE #1 UNIVERSAL</h3>
                <h1 class="text-light">Wedding Wishlist, Baby Wishlist <br /> and Gift Wishlist for all occasions</h1>
                <a href="#" class="btn btn-primary btn-site-info-big text-light">CREATE YOUR FREE WISHLIST</a>
            </div>
        </div>
        <div class="banner-main" style="background-image:url(./assets/img/slide2.jpg)">
            <div class="col-md-6 pull-right container-site-info text-center">
                <h3 class="text-light">THE #1 UNIVERSAL</h3>
                <h1 class="text-light">Wedding Wishlist, Baby Wishlist <br /> and Gift Wishlist for all occasions</h1>
                <a href="#" class="btn btn-primary btn-site-info-big text-light">CREATE YOUR FREE WISHLIST</a>
            </div>
        </div>
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
                        <img src="./assets/img/icons/glassware.png" alt="" class="img-responsive">
                    </div>
                    <a href="#" class="h4 text-center text-capitalize">glassware</a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="./assets/img/icons/crockery.png" alt="" class="img-responsive">
                    </div>
                    <a href="#" class="h4 text-center text-capitalize">crockery</a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="./assets/img/icons/kitchen_utensils.png" alt="" class="img-responsive">
                    </div>
                    <a href="#" class="h4 text-center text-capitalize">kitchen utensils</a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="./assets/img/icons/linens.png" alt="" class="img-responsive" style="    height: 100px;">
                    </div>
                    <a href="#" class="h4 text-center text-capitalize">linens</a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="./assets/img/icons/bathroom_accessories.png" alt="" class="img-responsive">
                    </div>
                    <a href="#" class="h4 text-center text-capitalize">bathroom accessories</a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="./assets/img/icons/mini_appliances.png" alt="" class="img-responsive">
                    </div>
                    <a href="#" class="h4 text-center text-capitalize">mini appliances</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
                    <div class="img-cats">
                        <img src="./assets/img/icons/home_accents.png" alt="" class="img-responsive">
                    </div>
                    <a href="#" class="h4 text-center text-capitalize">home accents</a>
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
                    <img class="hp_w100" src="./assets/img/mobile-preview-1.png" alt="Add gifts on-the-go from your smartphone">
                    <img class="hp_w100" src="./assets/img/mobile-preview-2.png" alt="Add gifts on-the-go from your smartphone" style=" position: absolute; top: 35px; left:0; z-index: -0999;">
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
    <a href="./about-us">
        <div class="ticker-main gradient-ticker text-center">
            <span style="color:#fff; font-weight: 300;font-size: 24px;padding: 30px; color: #fff;">Want to know more about us!</span>
            <span style="font-size:24px; color: #e5c100; padding:15px; background-color: #fff; border-right:1px solid" data-toggle="tooltip" data-placement="left" title="What is a Bridal Registry?"><i class="fa fa-gift" aria-hidden="true"></i> W </span>
            <span style="font-size:24px; color: #e5c100; padding:15px; background-color: #fff; border-right:1px solid" data-toggle="tooltip" data-placement="left" title="Why Use a Registry?"><i class="fa fa-gift" aria-hidden="true"></i> BW </span>
            <span style="font-size:24px; color: #e5c100; padding:15px; background-color: #fff;" data-toggle="tooltip" data-placement="left" title="Why select your Registry with Us?"><i class="fa fa-gift" aria-hidden="true"></i> WL</span>
        </div>
    </a>
    <section class="sample-wishlist">
        <h1 class="text-light text-center">View a sample Wishlist</h1>
        <div class="samples-container container">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <div class="title-sample">
                        <a href="#">Sample Wishlist 1</a>
                    </div>
                    <img src="./assets/img/skate.jpg" alt="" class="sample-imgs">
                </div>
                <div class="col-sm-4 text-center">
                    <div class="title-sample">
                        <a href="#">Sample Wishlist 2</a>
                    </div>
                    <img src="./assets/img/skate.jpg" alt="" class="sample-imgs">
                </div>
                <div class="col-sm-4 text-center">
                    <div class="title-sample">
                        <a href="#">Sample Wishlist 3</a>
                    </div>
                    <img src="./assets/img/skate.jpg" alt="" class="sample-imgs">
                </div>
            </div>
        </div>
    </section>
    @include('sections.contactus')
    @section('scripts')
        

        <script src="./vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="./vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="./vendors/bxslider/js/jquery.bxslider.min.js"></script>
        <script src="./plugins/iCheck/icheck.min.js"></script>

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
                    url: './signup',
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
        </script>
    @endsection

@endsection