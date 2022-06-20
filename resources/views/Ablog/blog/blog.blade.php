@extends('templates.ablog.master')
@section('content')
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Blog mới</div>
                </div>
                @foreach ($objBlogs as $item)
                @php
                    $name = $item->name;
                    $picture = $item->picture;
                    $createdAt = $item->created_at;
                    $previewText = Str::limit($item->preview_text,150);
                    $slug = Str::slug($name);
                    $id = $item->blog_id;
                    $urlPic = 'storage/files/'.$picture;
                    $url = route('Ablog.blog.detail',['slug'=>$slug,'id'=>$id]);

                @endphp
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{$urlPic}}" alt="" /></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="{{$url}}" class="fh5co_magna py-2">
                            {{$name}}
                        </a>
                        <a href="{{$url}}" class="fh5co_mini_time py-3">
                            {{$createdAt}}
                        </a>
                        <div class="fh5co_consectetur">
                           {{$previewText}}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <!-- Sidebar -->
            @include('templates.ablog.inc.sidebar')

        </div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
                {!!$objBlogs->appends(request()->all())->links()!!}
                {{-- <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a> --}}
            </div>
        </div>
    </div>
</div>
@endsection
