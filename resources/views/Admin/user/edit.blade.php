@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Chỉnh sửa người dùng</h2>
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
                                        <input type="text" name="username" class="form-control" value="{{$objUser->username}}" disabled/>

                                    </div>
                                    <div class="form-group">
                                        <label>Tên người dùng</label>
                                        <input type="text" name="fullname" class="form-control" value="{{ $objUser->fullname }}"/>
                                        <p class="help is-danger">{{ $errors->first('fullname') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ $objUser->email }}" required/>
                                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" />
                                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu</label>
                                        <input type="password" name="repassword" class="form-control" />
                                        <p class="help is-danger">{{ $errors->first('repassword') }}</p>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-success btn-md">Cập nhật</button>
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


