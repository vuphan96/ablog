@extends('templates.admin.master')
@section('main-content')
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa danh mục</h2>
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
                                        <label>Tên danh mục</label>
                                        <input type="text" name="name" class="form-control" value="{{$objCat->name}}"/>
                                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Thứ tự</label>
                                        <input type="number" name="sort" class="form-control" value="{{$objCat->sort}}"/>
                                        <p class="help is-danger">{{ $errors->first('sort') }}</p>
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
