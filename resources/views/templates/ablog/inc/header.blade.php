@php
    $path = $_SERVER['REQUEST_URI'];
    $path = explode('/',$path);
    $path = end($path);
@endphp
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ablog - Vinaenter For IT</title>
    <base href="{{asset('')}}">
    <link href="templates/ablog/css/media_query.css" rel="stylesheet" type="text/css" />
    <link href="templates/ablog/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="templates/ablog/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="templates/ablog/css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="templates/ablog/css/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="templates/ablog/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap CSS -->
    <script src="templates/ablog/js/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Modernizr JS -->
    <script src="templates/ablog/js/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <div class="container-fluid fh5co_header_bg">
        <div class="container">
            <div class="row">
                <div class="col-10 fh5co_mediya_center">
                    <a href="#" class="color_fff fh5co_mediya_setting"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;Ngày 2 tháng 11 năm 2021</a>
                    <div class=" btn-login d-inline-block fh5co_trading_posotion_relative "><a href="#" class="treding_btn">Vinaenter Academy</a>
                        <div class="fh5co_treding_position_absolute"></div>
                    </div>
                    @if (Auth::check())
                    <i style="color: brown">Xin chào : </i><span style="color: brown">{{Auth::user()->fullname}}</span>
                    @endif
                </div>
                <div class="col-2 " >
                    @if (Auth::check())
                        <div class="dangnhap">

                            <a href="{{Route('Ablog.auth.logout')}}" class="color_fff fh5co_mediya_setting ">

                                <button class="btn btn-secondary">đăng xuất</button>
                            </a>
                        </div>
                    @else
                    <div class="dangnhap">
                        <a href="{{Route('Ablog.auth.login')}}" class="color_fff fh5co_mediya_setting ">
                            {{-- <i>Tin:</i> Nữ học viên Vinaenter được bổ nhiệm làm trưởng phòng công nghệ Asiatech --}}
                            <button class="btn btn-secondary">đăng nhập</button>
                        </a>
                    </div>
                    @endif
                    {{-- <a href="#" class="color_fff fh5co_mediya_setting ">

                        <button>đăng xuất</button>
                    </a> --}}

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 fh5co_padding_menu">
                    <img src="templates/ablog/images/logo.png" alt="img" class="fh5co_logo_width" />
                </div>

                <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                    <div class="text-center d-inline-block">
                        <a href="http://facebook.com/it.vinaenter.vn" target="_blank" class="fh5co_display_table">
                            <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                        </a>
                    </div>
                    <div class="text-center d-inline-block">
                        <a href="https://www.facebook.com/digital.vinaenter.vn" target="_blank" class="fh5co_display_table">
                            <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                        </a>
                    </div>

                    <div class="d-inline-block text-center dd_position_relative ">
                        <select class="form-control fh5co_text_select_option">
                            <option>English </option>
                            <option>Việt Nam </option>
                        </select>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
        <div class="container padding_786">
            <nav class="navbar navbar-toggleable-md navbar-light ">
                <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
                <a class="navbar-brand" href="/"><img src="templates/ablog/images/logo.png" alt="img" class="mobile_logo_width" /></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li @if ($path=='')
                                class="nav-item menu active"
                            @endif >
                            <a class="nav-link" href="{{route('Ablog.index.index')}}">Trang chủ <span class="sr-only">(current)</span></a>
                        </li>
                        <li @if ($path=='gioi-thieu')
                                class="nav-item menu active"
                            @endif>
                            <a class="nav-link" href="{{route('Ablog.about.about')}}">Giới thiệu <span class="sr-only">(current)</span></a>
                        </li>
                        <li @if ($path!='' && $path!='gioi-thieu' && $path!='lien-he')
                                class="nav-item menu dropdown active"
                            @endif>
                            <a class="nav-link dropdown-toggle" href="" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog <span class="sr-only">(current)</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                @foreach ($listCats as $item)
                                    @php
                                        $name = $item->name;
                                        $id = $item->cat_id;
                                        $slug = Str::slug($name);
                                        $url = route('Ablog.blog.blog',['slug'=>$slug,'id'=>$id])
                                    @endphp
                                    <a class="dropdown-item" href="{{$url}}">{{$name}}</a>
                                @endforeach

                            </div>
                        </li>
                        <li @if ($path=='lien-he')
                                class="nav-item menu active"
                            @endif>
                            <a class="nav-link" href="{{route('Ablog.contact.contact')}}">Liên hệ tôi <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <div class="box">
                        <div class="container-4">
                            <form action="">
                                {{-- @csrf --}}
                                <input type="search" id="input-search" placeholder="Search..." />
                                <button class="icon"><i class="fa fa-search"></i></button>
                                <div class="search-ajax-result" id="result-search">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <script>
        $('#input-search').keyup(function () {
            var text = $(this).val();
            // var _token = $('input[name="_token"]').val();

            $.ajax({
                type: "GET",
                url: "http://ablog.phv:81/api/ajax-search-blog?key="+ text,
                data: {
                    timkiem:text
                },
                // dataType: "dataType",
                success: function (res) {
                    // console.table(res)
                    var _html = '';
                    for(var pro of res){
                        _html += '<div class="media">';
                            _html += '<a class="d-flex align-self-bottom" href="#">';
                                _html += '<img width="100" src="http://ablog.phv:81/storage/files/'+ pro.picture +'" alt="">';
                            _html += '</a>';
                            _html += '<div class="media-body" style="margin-left: 10px">';
                                _html += '<h5><a href="">'+ pro.name +'</a></h5>';
                                _html += '<p><a href="">'+ pro.preview_text +'</a></p>';
                            _html += '</div>';
                        _html += '</div>';

                    }
                    // for (var i = 0; i < 5; i++) {}

                    $('#result-search').html(_html);
                }
            });

        });
    </script>







