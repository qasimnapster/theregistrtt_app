@extends('master')
@section('stylesheets')
    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="{{ config('app.url') }}vendors/jquery/dist/jquery.1.10.1.min.js"></script>
    <!-- <script type="text/javascript" src="{{ config('app.url') }}plugins/rs-plugin/js/jquery.themepunch.plugins.min.js"></script> -->
    <script type="text/javascript" src="{{ config('app.url') }}plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="{{ config('app.url') }}plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ config('app.url') }}plugins/rs-plugin/css/settings.css" media="screen" />
@endsection
@section('content')
    <div class="slider">
        @include('sections.slider')
    </div>

    <div class="ticker-main text-center">
        <span><i class="fa fa-fw fa-heart-o"></i></span> Why you’ll Adore using TheRegistrytt.com <span><i class="fa fa-fw fa-heart-o"></i></span> 
    </div>

    <section class="brands-container text-center">
        <h1 class="text-light" style="margin-bottom: 30px;" >Items Categories</h1>
        <div class="clearfix container">
        <div class="row">
            <?php $c=0; ?>
            @foreach( $categories as $category )
                <?php $c++; ?>
                @if( $category->slug == 'home_accents' )
                    <div class="col-lg-4 col-md-4 col-sm-4">&nbsp;</div>
                @endif
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="item-cats">
                        <div class="img-cats">
                            <img src="{{ config('app.url') }}assets/img/categories/{{ $category->slug }}.jpg" alt="" class="img-responsive">
                        </div>
                        <a href="{{ config('app.url') }}categories/{{ $category->slug }}" class="h4 text-center text-capitalize">{{ $category->title }}</a>
                    </div>
                </div>
                @if( $category->slug == 'home_accents' )
                    <div class="col-lg-4 col-md-4 col-sm-4">&nbsp;</div>
                @endif
                @if( $c % 3 == 0 )
                    </div>
                    <div class="row">
                @endif
            @endforeach
        </div>
        </div>
    </section>

    <!-- FAQs Section -->
    @include('sections.faqs')
        
    <div class="ticker-main ticker-know text-center">
        <h3 class="text-light">Want to know more about us!</h3>
        <a href="{{ config('app.url') }}about-us" class="btn btn-default btn-modern btn-lg">Check Out Here</a>
    </div>
    
    @include('sections.testimonials')
    
    @include('sections.contactus')

    @section('scripts')
        
        <script>
        $(function(){

            $('#rev_slider_1').revolution({
                sliderLayout: 'fullscreen',
                navigation: {
                    arrows:{enable:true}              
                }
            });

            $('#accordion .panel-collapse').on('shown.bs.collapse', function () {
                console.log('test');
                $(this).prev().find(".glyphicon").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
            });

            //The reverse of the above on hidden event:

            $('#accordion .panel-collapse').on('hidden.bs.collapse', function () {
                $(this).prev().find(".glyphicon").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
            });

        }); //ready
        </script>

    @endsection

@endsection