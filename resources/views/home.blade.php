<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home Page</title>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="./vendors/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./vendors/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="./vendors/Ionicons/css/ionicons.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="./vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="./vendors/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="./plugins/iCheck/all.css">
    <!-- Main Theme Css -->
    <link rel="stylesheet" href="./assets/css/main.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>   
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="col-sm-12 container-navbar">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TheRegistryTT.com</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-center">
                    <li>
                        <div class="anchor-form"><label class="label-navbar" for="">Find a Wishlist</label></div>
                    </li>
                    <li>
                        <div class="anchor-form"><input type="text" class="form-control text-center input-navbar" value="Enter Promo Code"></div>
                    </li>
                    <li>
                        <div class="anchor-form"><button class="btn btn-primary" style="width:100%" type="button">SEARCH</button></div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" data-toggle="modal" data-target=".bs-login-modal-lg"><i class="fa fa-user-o" aria-hidden="true"></i> LOGIN</a></li>
                    <li><a href="#" data-toggle="modal" data-target=".bs-signup-modal-lg"><i class="fa fa-user-plus" aria-hidden="true"></i> SIGN UP</a></li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
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
        <div class="clearfix">
            <img src="https://images-platform.99static.com/JsmXH_1twMGCO3EedzmGJhdKyss=/fit-in/900x675/99designs-contests-attachments/4/4843/attachment_4843165" style="opacity: .6;">
            <!-- <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
            <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
            <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
            <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
            <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
            <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
            <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
            <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
            <div class="brand-detail"><img src="https://s3.amazonaws.com/static.myregistry.com/cm/HomePage/SyncPartner_1_481285961-hover.png" alt=""></div>
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
                    <img class="hp_w100" src="http://preview.oklerthemes.com/porto/5.7.2/img/demos/app-landing/product/how-works-product-image-1.png" alt="Add gifts on-the-go from your smartphone">
                    <img class="hp_w100" src="http://preview.oklerthemes.com/porto/5.7.2/img/demos/app-landing/product/how-works-product-image-2.png" alt="Add gifts on-the-go from your smartphone" style=" position: absolute; top: 35px; left:0; z-index: -0999;">
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
            <span style="color:#fff; font-weight: 300;font-size: 24px;padding: 30px; color: #fff;">More information About Us!</span>
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
                    <img src="https://www.hopsej.com/resize/e/300/300/files/produkty/zima/sled-dogs/sled-dogs-sjezd-300.jpg" alt="" class="sample-imgs">
                </div>
                <div class="col-sm-4 text-center">
                    <div class="title-sample">
                        <a href="#">Sample Wishlist 2</a>
                    </div>
                    <img src="https://www.hopsej.com/resize/e/300/300/files/produkty/zima/sled-dogs/sled-dogs-sjezd-300.jpg" alt="" class="sample-imgs">
                </div>
                <div class="col-sm-4 text-center">
                    <div class="title-sample">
                        <a href="#">Sample Wishlist 3</a>
                    </div>
                    <img src="https://www.hopsej.com/resize/e/300/300/files/produkty/zima/sled-dogs/sled-dogs-sjezd-300.jpg" alt="" class="sample-imgs">
                </div>
            </div>
        </div>
    </section>
    <section class="contact-us">
        <h1 class="text-light text-center">Contact Us</h1>
        <div class="contact-container">
            <div class="container">
                <h3 class="text-light text-center">We'd <i class="fa fa-heart-o text-theme"></i> to Help!</h3>
                <p class="text-center text-contact-us">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias minima unde minus esse est voluptate! Quis dicta quisquam, sint sunt sit, deserunt, est magni in aperiam illum repudiandae minima rem!
                </p>
                <div class="block-contact">
                    <div class="col-sm-6 row">
                        <form>
                            <div class="form-group input-group contact-frm-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                <input type="text" class="form-control" placeholder="Enter your Name">
                            </div>
                            <div class="form-group input-group contact-frm-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" placeholder="Enter your Email">
                            </div>
                            <div class="form-group contact-frm-group">
                                <textarea class="form-control" placeholder="Enter your message"></textarea>
                            </div>
                            <button type="button" class="btn btn-primary pull-right"> <span class="glyphicon glyphicon-send" style="padding-right: 10px;"></span> SEND</button>
                        </form>
                    </div>
                    <div class="col-sm-6 row">
                        <div class="clearfix">
                            <div class="col-sm-5 col-xs-5 text-right">
                                <h3 class="text-light"><i class="fa text-theme fa-map-marker"></i></h3>
                            </div>
                            <div class="col-sm-6 col-xs-6 col-contact-us">
                                <h3 class="text-light text-left">Lorem Design Columbia, SC</h3>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-sm-5 col-xs-5 text-right"> <h3 class="text-light"><i class="fa text-theme fa-phone"></i></h3> </div>
                            <div class="col-sm-6 col-xs-6 col-contact-us">
                                <h3 class="text-light text-left">(123) 111-1111</h3>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="col-sm-5 col-xs-5 text-right"> <h3 class="text-light"><i class="fa text-theme fa-inbox"></i></h3> </div>
                            <div class="col-sm-6 col-xs-6 col-contact-us">
                                <h3 class="text-light text-left">developer@ttregistry.com</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>© 2018 All rights reserved - TheRegistryTT LLC   |   <span><a href="#">Site Map</a></span></p>
    </footer>
    
    <div class="modal fade bs-login-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-login" role="document">
            <div class="modal-content" style="padding: 30px; background: #f8f9f9d1;">
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size: 26px;">&times;</span></button>
               <form>
                <h1 class="text-light text-center">Login To ttRegistry</h1>
              <div class="form-group" style="margin-top: 20px">
                <label class="label-lighter" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="checkbox">
                <label class="label-lighter">
                  <input class="minimal" type="checkbox"> Keep me logged in
                </label>
              </div>
              <div class="checkbox">
                <label class="label-lighter">
                  <input type="checkbox"> I agree to the website terms
                </label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>

    <div class="modal fade bs-signup-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-login" role="document">
            <div class="modal-content" style="padding: 30px; background: #f8f9f9d1;">
                <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="font-size: 26px;">&times;</span></button>
            <div class="loadersmall" style="display:none"></div>
            <form method="POST" action="#" id="frmSignUp">
              {{ csrf_field() }}
              <h1 class="text-light text-center">Sign up to ttRegistry</h1>
              <div class="form-group" style="margin-top: 20px">
                <label class="label-lighter" for="exampleInputEmail1">Choose a registry type</label>
                <select name="xslcRegType" id="xslcRegType" class="form-control" required>
                    <option value="">SELECT</option>
                    @if (count($reg_types) > 0)
                        @foreach ($reg_types as $reg_type)
                            <option value="{{ $reg_type->ID }}"> {{ $reg_type->name }} </option>
                        @endforeach
                    @endif
                </select>
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xtxtFirstName">First Name</label>
                <input type="text" class="form-control" required name="xtxtFirstName" id="xtxtFirstName" placeholder="Enter your First Name">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xtxtLastName">Last Name</label>
                <input type="text" class="form-control" required name="xtxtLastName" id="xtxtLastName" placeholder="Enter your Last Name">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xemlEmailAddr">E-mail Address</label>
                <input type="email" class="form-control" required name="xemlEmailAddr" id="xemlEmailAddr" placeholder="Enter your E-mail Address">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xemlConfEmailAddr">Confirm E-mail</label>
                <input type="email" class="form-control" required name="xemlConfEmailAddr" id="xemlConfEmailAddr" placeholder="Re-Enter your E-mail Address">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xpsPassword">Password</label>
                <input type="password" class="form-control" required name="xpsPassword" id="xpsPassword" placeholder="Enter your Password">
              </div>
              <div class="form-group">
                <label class="label-lighter" for="xpsConfPassword">Confirm Password</label>
                <input type="password" class="form-control" required name="xpsConfPassword" id="xpsConfPassword" placeholder="Re-Enter your Password">
              </div>
              <div class="text-center">
                <button type="button" class="btn btn-create-account btn-primary">Create Account</button>
              </div>
            </form>
            </div>
        </div>
    </div>
    
    <!-- jQuery 3 -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="./vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="./vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
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


</body>
</html>