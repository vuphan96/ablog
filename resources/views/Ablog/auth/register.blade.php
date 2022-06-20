@extends('templates.ablog.master')
@section('content')
<div class="container-fluid mb-4">
    <div class="container">
        <div class="col-12 contact_margin_svnit ">
            <h2 class="fh5co_heading py-2">Tạo tài khoản</h2>
            @if (session('msg'))
                <h3 style="color: greenyellow">{{session('msg')}}</h3>
            @endif
        </div>
        <div class="row">
            <div class="col-4 col-md-4">
                <form class="row" id="fh5co_contact_form" action="" method="POST">
                    @csrf
                    <div class="col-12 py-3">
                        <input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="Tên đăng nhập" />
                        <p class="help is-danger">{{ $errors->first('username') }}</p>
                    </div>
                    <div class="col-12 py-3">
                        <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control" placeholder="Họ tên đầy đủ" />
                        <p class="help is-danger">{{ $errors->first('fullname') }}</p>
                    </div>
                    <div class="col-12 py-3">
                        <input type="email" name="email" value="" class="form-control" placeholder="Email" />
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                    </div>

                    <div class="col-12 py-3">
                        <input type="password" name="password" value="" class="form-control" placeholder="mật khẩu" />
                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                    </div>
                    <div class="col-12 py-3 text-center">
                         <button class="btn contact_btn" type="submit">Đăng ký</button>
                         {{-- <p><input type="Submit" class="wpcf7-submit" value="Gửi liên hệ"/></p> --}}
                    </div>
                </form>
            </div>
            {{-- <div class="col-12 col-md-6 align-self-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3168.639290621062!2d-122.08624618469247!3d37.421999879825215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sbe!4v1514861541665" class="map_sss" allowfullscreen></iframe>
            </div> --}}
        </div>
    </div>
</div>

@endsection
