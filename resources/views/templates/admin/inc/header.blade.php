<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdminCP | VinaEnter Edu</title>
    <!-- BOOTSTRAP STYLES-->
    <base href="{{asset('')}}">
    <link href="templates/admin/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="templates/admin/assets/css/style.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="templates/admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="templates/admin/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="templates/admin/asset/js/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{Route('Admin.index.index')}}">VinaEnter Edu</a>
            </div>
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
                @if (Auth::check())

                 Xin chào,
                 <b>
                    @if (Auth::check())
                        {{Auth::user()->fullname}}
                    @endif
                </b> &nbsp;
                <a href="{{route('Admin.auth.logout')}}" class="btn btn-danger square-btn-adjust">Đăng xuất</a>
                @endif
            </div>
        </nav>
