@extends('master')
@section('stylesheets')
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
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
                            <img src="{{ config('app.url') }}assets/img/categories/glassware.jpg" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/glassware" class="h4 text-center text-capitalize">glassware</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="{{ config('app.url') }}assets/img/categories/crockery.jpg" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/crockery" class="h4 text-center text-capitalize">crockery</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="{{ config('app.url') }}assets/img/categories/kitchen_utensils.jpg" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/kitchen_utensils" class="h4 text-center text-capitalize">kitchen utensils</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="{{ config('app.url') }}assets/img/categories/linens.jpg" alt="" class="img-responsive" style="">
                        </div>
                        <a href="{{ config('app.url') }}categories/linens" class="h4 text-center text-capitalize">linens</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="{{ config('app.url') }}assets/img/categories/bathroom_accessories.jpg" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/bathroom_accessories" class="h4 text-center text-capitalize">bathroom accessories</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="{{ config('app.url') }}assets/img/categories/mini_appliances.jpg" alt="" class="img-responsive">
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
                            <img src="{{ config('app.url') }}assets/img/categories/home_accents.jpg" alt="" class="img-responsive">
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
        
        <script>
        $(function(){

            $('#rev_slider_1').revolution({
                sliderLayout: 'fullscreen',
            });

        }); //ready
        </script>
    @endsection

@endsection