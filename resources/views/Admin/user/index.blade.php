@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý người dùng</h2>
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
                                    <a href="{{Route('Admin.user.add')}}" class="btn btn-success btn-md">Thêm</a>
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
                                        <th>Tên đăng nhập</th>
                                        <th>Tên người dùng</th>
                                        <th width="160px">Chức năng</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objUsers as $item)
                                        @php
                                            $id = $item->id;
                                            $username = $item->username;
                                            $fullname = $item->fullname;
                                            $disabled = $item->disabled;
                                            $urledit = Route('Admin.user.edit',['id'=>$id]);
                                            $urldel = Route('Admin.user.del',['id'=>$id]);
                                            $urlActive =  Route('Admin.user.active',['id'=>$id]);
                                        @endphp
                                        <tr>
                                            <td>{{$id}}</td>
                                            <td>{{$username}}</td>
                                            <td>{{$fullname}}</td>
                                            <td class="center">
                                                <a href="{{$urledit}}" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                                <a href="{{$urldel}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                            </td>
                                            <td>
                                                @if ($disabled==1)
                                                <a href="{{$urlActive}}" title="" class="image"><img  src="templates/admin/assets/img/do.jpg" alt="" width="50px"></a>
                                                @else
                                                <a href="{{$urlActive}}" title="" class="image"><img  src="templates/admin/assets/img/xanh.jpg" alt="" width="50px"></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ {{$start}} đến {{$curent}} của {{$total}} người dùng</div>
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
                                        {{$objUsers->appends(request()->all())->links()}}
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

