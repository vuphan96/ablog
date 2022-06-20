@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý Tin tức</h2>
                @if (session('msg'))
                    <p style="color:green;">{{session('msg')}}
                        @if (session('ten'))
                            <span style="color:rgb(35, 112, 228);"> {{session('ten')}}</span>
                        @endif
                    </p>
                @endif
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="{{Route('Admin.blog.add')}}" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="get" action="">
                                        <input type="submit"  value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" name="search" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên tin tức</th>
                                        <th>Mô tả</th>
                                        <th>Danh mục</th>
                                        <th>Hình ảnh</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objBlogs as $item)
                                        @php
                                            $idBlog= $item->blog_id;
                                            $name = $item->name;
                                            $previewText = $item->preview_text;
                                            $cname = $item->cat->name;
                                            $picture = $item->picture;
                                            $urlPic = "storage/files/".$picture;
                                            $urledit = Route('Admin.blog.edit',['id'=>$idBlog]);
                                            $urldel = Route('Admin.blog.del',['id'=>$idBlog]);
                                        @endphp
                                        <tr>
                                            <td>{{$idBlog}}</td>
                                            <td>{{$name}}</td>
                                            <td>{{$previewText}}</td>
                                            <td>{{$cname}}</td>
                                            <td><img src="{{$urlPic}}" alt="" width="150px" height="150px"></td>
                                            <td class="center">
                                                <a href="{{$urledit}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                <a href="{{$urldel}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    {{-- <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ {{$start}} đến {{$curent}} của {{$total}} danh mục</div> --}}
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        {{-- <ul class="pagination">
                                            <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Trang trước</a></li>
                                            <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">2</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">3</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">4</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">5</a></li>
                                            <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Trang tiếp</a></li>
                                        </ul> --}}
                                        {{$objBlogs->appends(request()->all())->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
</div>
@endsection

