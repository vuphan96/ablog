@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>TRANG QUẢN TRỊ VIÊN</h2>
            </div>
        </div>
        @if (session('msg'))
            <p style="color:rgb(243, 76, 34);">{{session('msg')}}
            </p>
        @endif
        <hr />
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                        <i class="fa fa-bars"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text"><a href="{{Route('Admin.cat.index')}}" title="">Quản lý danh mục</a></p>
                        <p class="text-muted">Có 4 danh mục</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-blue set-icon">
                        <i class="fa fa-bell-o"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text"><a href="{{Route('Admin.blog.index')}}" title="">Quản lý tin</a></p>
                        <p class="text-muted">Có 20 truyện</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-brown set-icon">
                        <i class="fa fa-rocket"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text"><a href="{{Route('Admin.user.index')}}" title="">Quản lý người dùng</a></p>
                        <p class="text-muted">Có 5 người dùng</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
