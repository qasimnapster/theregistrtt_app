<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Wedding Registry, Baby Registry &amp; Gift Registry | TheRegistryTT.com</title>
    <meta name='description' content="The #1 Universal Wedding Registry, Baby Registry and Gift Registry for all occasions! Create a wedding wish list! Add gifts from any store to this online multistore bridal registry."/>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ config('app.url') }}vendors/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ config('app.url') }}vendors/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ config('app.url') }}vendors/Ionicons/css/ionicons.min.css">

    @yield('stylesheets')
    
    <!-- Main Theme Css -->
    <link rel="stylesheet" href="{{ config('app.url') }}assets/css/main.css">
    <link rel="stylesheet" href="{{ config('app.url') }}assets/css/responsive.css">
    <link rel="stylesheet" href="{{ config('app.url') }}assets/css/anim.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>  