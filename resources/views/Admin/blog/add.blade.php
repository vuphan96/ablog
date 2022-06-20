@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm tin tức Blog</h2>
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
                                    <div class="form-group">
                                        <label>Tên Blog</label>
                                        <input type="text" name="name" class="form-control" />
                                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>tên danh mục</label>
                                        <select name="cat_id" id="" class="form-control border-input">
                                            <option value="">--chọn danh mục--</option>
                                            @foreach ($objCats as $item)
                                                <option value="{{$item->cat_id}}">{{$item->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="picture" class="form-control" placeholder="Chọn ảnh" />
                                        <p class="help is-danger">{{ $errors->first('picture') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="preview" rows="4" class="form-control border-input" placeholder="Mô tả tóm tắt về blog"></textarea>
                                        <p class="help is-danger">{{ $errors->first('preview') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết</label>
                                        <textarea name="detail" rows="4" class="form-control border-input" placeholder="Chi tiết blog"></textarea>
                                        <p class="help is-danger">{{ $errors->first('detail') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Thứ tự</label>
                                        <input type="number" name="sort" class="form-control" value="1000" min="1" max="3000"/>
                                        <p class="help is-danger">{{ $errors->first('sort') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Blog_hot</label>
                                        <select name="bloghot" id="" class="form-control border-input">
                                            <option value="0" selected>Bình thường</option>
                                            <option value="1">blog hot</option>
                                        </select>


                                    </div>

                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
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
