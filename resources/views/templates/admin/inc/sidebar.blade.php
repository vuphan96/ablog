@php
    $path = $_SERVER['REQUEST_URI'];
    $path = explode('/',$path);
    $path = end($path);
@endphp
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="templates/admin/assets/img/find_user.png" class="user-image img-responsive" />
            </li>
            <li>
                <a
                @if ($path=='Admin')
                    class="active-menu"
                @endif href="{{Route('Admin.index.index')}}"><i class="fa fa-dashboard fa-3x"></i> Trang chủ</a>
            </li>
            <li>
                <a
                @if ($path=='cat')
                    class="active-menu"
                @endif href="{{Route('Admin.cat.index')}}"><i class="fa fa-bar-chart-o fa-3x"></i> Quản lý danh mục</a>
            </li>
            <li>
                <a
                @if ($path=='blog')
                    class="active-menu"
                @endif href="{{Route('Admin.blog.index')}}"><i class="fa fa-qrcode fa-3x"></i> Quản lý blog</a>
            </li>
            <li>
                <a
                @if ($path=='user')
                    class="active-menu"
                @endif href="{{Route('Admin.user.index')}}"><i class="fa fa-sitemap fa-3x"></i> Quản lý người dùng</a>
            </li>
            <li>
                <a
                @if ($path=='contact')
                    class="active-menu"
                @endif href="{{Route('Admin.contact.index')}}"><i class="fa fa-sitemap fa-3x"></i> Quản lý liên hệ</a>
            </li>
            <li>
                <a
                @if ($path=='about')
                    class="active-menu"
                @endif href="{{Route('Admin.about.index')}}"><i class="fa fa-sitemap fa-3x"></i> Quản lý giới thiệu</a>
            </li>
        </ul>
    </div>
</nav>
@if ($path=='Admin')
@endif
