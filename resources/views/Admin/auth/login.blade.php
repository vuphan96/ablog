@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Đăng Nhập</h2>
                @if (session('error'))
                    <span style="color: red">{{session('error')}}</span>
                @endif
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form role="form" action="" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Tên đăng nhập</label>
                                        <input type="text" name="username" class="form-control" value="{{old('username')}}"/>
                                        <p class="help is-danger">{{ $errors->first('username') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" />
                                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-success btn-md">Đăng nhập</button>
                                    <a href="{{Route('Admin.auth.email')}}">Quên mật khẩu ?</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
    </div>
</div>
@endsection
