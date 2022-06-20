@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa tin tức Blog</h2>
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
                                <form role="form" action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <input type="hidden" name="old_oic" value="{{$objBlog->picture}}"> --}}
                                    <div class="form-group">
                                        <label>Tên Blog</label>
                                        <input type="text" name="name" class="form-control" value="{{$objBlog->name}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>tên danh mục</label>
                                        <select name="cat_id" id="" class="form-control border-input">
                                            @foreach ($objCats as $objCat)
                                            @php
                                                $idCat = $objCat->cat_id;
                                                $nameCat = $objCat->name;
                                                $selected = "";
                                            @endphp

                                            @if ($idCat==$objBlog->cat_id)
                                            @php
                                                $selected = "selected='selected'";
                                            @endphp
                                            @endif

                                            <option {{$selected}} value="{{$idCat}}">{{$nameCat}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    @if ($objBlog->picture !='')
                                    <div class="form-group">
                                        <label>Ảnh cũ</label>
                                        <img src="storage/files/{{$objBlog->picture}}" width="120px" alt="" />
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="picture" class="form-control" placeholder="Chọn ảnh" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="preview" rows="4" class="form-control border-input" placeholder="Mô tả tóm tắt về blog">{{$objBlog->preview_text}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết</label>
                                        <textarea name="detail" rows="4" class="form-control border-input" placeholder="Chi tiết blog">{{$objBlog->detail_text}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Thứ tự</label>
                                        <input type="number" name="sort" class="form-control" value="{{$objBlog->sort}}"  min="1" max="3000"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Blog_hot</label>
                                        <select name="bloghot" id="" class="form-control border-input">
                                            @if ($objBlog->is_hot == 0)
                                            <option value="0" selected>Bình thường</option>
                                            <option value="1">blog hot</option>
                                            @else
                                            <option value="0">Bình thường</option>
                                            <option value="1" selected>blog hot</option>
                                            @endif

                                        </select>


                                    </div>

                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
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
