<nav class="navbar navbar-default navbar-fixed-top">
    <div class="col-sm-12 container-navbar">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand-href" href="{{ config('app.url') }}">
                <img src="{{ config('app.url') }}assets/img/logo.png" class="logo-brand img-responsive" alt="TheRegistryTT.com">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form action="{{ config('app.url') }}registry/search" method="POST">
                {{ csrf_field() }}
                <ul class="nav navbar-nav navbar-center">
                    <li>
                        <div class="anchor-form"><label class="label-navbar" for="">Find a Registry</label></div>
                    </li>
                    <li class="less-mt">
                        <div class="anchor-form"><input type="text" class="form-control text-center input-navbar" placeholder="Enter Promo Code" name="promo_code"></div>
                    </li>
                    <li class="less-mt">
                        <div class="anchor-form"><button class="btn btn-primary" style="width:100%" type="submit">SEARCH</button></div>
                    </li>
                </ul>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::id())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ config('app.url') }}create/registry/1"> <i class="fa fa-paper-plane"></i> Create Registry</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ config('app.url') }}registry/index"> <i class="fa fa-briefcase"></i> My Registry</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ config('app.url') }}profile"> <i class="fa fa-gear"></i> Profile Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"> <i class="fa fa-edit"></i> Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ config('app.url') }}logout"> <i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>
                @else
                    @if( isset( $_COOKIE['guest_cart'] ) )
                        <li><a href="{{ config('app.url') }}guest/cart/index"><span style="position: absolute; top:10px;" class="badge">{{ count( json_decode(base64_decode($_COOKIE['guest_cart'])) ) }}</span><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 24px"></i> ITEMS</a></li>
                    @else
                        <li><a href="#" data-toggle="modal" data-target=".bs-login-modal-lg"><i class="fa fa-user-o" aria-hidden="true"></i> LOGIN</a></li>
                        <li><a href="#" data-toggle="modal" data-target=".bs-signup-modal-lg"><i class="fa fa-user-plus" aria-hidden="true"></i> SIGN UP</a></li>
                    @endif
                @endif
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
@include('partials.alert')