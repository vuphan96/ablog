@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm giới thiệu</h2>
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
                                        <label>Tên giới thiệu</label>
                                        <input type="text" name="name" class="form-control" />
                                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="preview" rows="4" class="form-control border-input" placeholder="Mô tả về giới thiệu"></textarea>
                                        <p class="help is-danger">{{ $errors->first('preview') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết</label>
                                        <textarea name="detail" rows="4" class="form-control border-input" placeholder="Chi tiết về giới thiệu"></textarea>
                                        <p class="help is-danger">{{ $errors->first('detail') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Thứ tự</label>
                                        <input type="number" name="sort" class="form-control" min="1" max="3000" value="3000"/>
                                        <p class="help is-danger">{{ $errors->first('sort') }}</p>
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

