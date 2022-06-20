@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Nhập Email để khôi phục mật khẩu</h2>
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
                                        <label>Nhập Email</label>
                                        <input type="text" name="email" class="form-control" value="{{old('email')}}"/>
                                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Gửi</button>

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
