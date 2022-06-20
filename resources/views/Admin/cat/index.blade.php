@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý danh mục</h2>
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
                                    <a href="{{Route('Admin.cat.add')}}" class="btn btn-success btn-md">Thêm</a>
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
                                        <th>Tên danh mục</th>
                                        <th>Thứ tự</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objCats as $item)
                                        @php
                                            $idCat = $item->cat_id;
                                            $name = $item->name;
                                            $sort = $item->sort;
                                            $urledit = Route('Admin.cat.edit',['id'=>$idCat]);
                                            $urldel = Route('Admin.cat.del',['id'=>$idCat]);
                                        @endphp
                                        <tr>
                                            <td>{{$idCat}}</td>
                                            <td>{{$name}}</td>
                                            <td>{{$sort}}</td>
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
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ {{$start}} đến {{$curent}} của {{$total}} danh mục</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        
                                        {{$objCats->appends(request()->all())->links()}}
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

