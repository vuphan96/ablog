@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Mã thay đổi mât khẩu đã được gửi về email của bạn</h2>
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
                                    <input type="hidden" name="mail" value="{{$mail}}">
                                    <div class="form-group">
                                        <label>Nhập mã kiểm tra tại đây</label>
                                        <input type="text" name="code" class="form-control" value="" required/>
                                        {{-- <p class="help is-danger">{{ $errors->first('email') }}</p> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập mật khẩu mới</label>
                                        <input type="password" name="password" class="form-control" value=""/>
                                        <p class="help is-danger">{{ $errors->first('password') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Xác nhận lại mật khẩu</label>
                                        <input type="password" name="repassword" class="form-control" value=""/>
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
