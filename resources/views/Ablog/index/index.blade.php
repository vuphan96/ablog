@extends('templates.ablog.master')

@section('content')
<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Blog hot</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            @foreach ($objBlogHot as $item)
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
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="{{$urlPic}}" alt="" /></div>
                    <div>
                        <a href="{{$url}}" class="d-block fh5co_small_post_heading">
                            <span class="">
                            {{$name}}
                            </span>
                        </a>
                        <div class="c_g"><i class="fa fa-clock-o"></i> Ngày đăng: {{$createdAt}}</div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<div class="container-fluid fh5co_video_news_bg pb-4">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Video IT</div>
        </div>
        <div>
            <div class="owl-carousel owl-theme" id="slider3">
                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video" width="100%" height="200" src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span class="">The top 10 funniest videos on YouTube </span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> 2/11/2021</div>
                        </div>
                    </div>
                </div>

                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video" width="100%" height="200" src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span class="">The top 10 funniest videos on YouTube </span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> 2/11/2021</div>
                        </div>
                    </div>
                </div>

                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video" width="100%" height="200" src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span class="">The top 10 funniest videos on YouTube </span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> 2/11/2021</div>
                        </div>
                    </div>
                </div>

                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video" width="100%" height="200" src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span class="">The top 10 funniest videos on YouTube </span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> 2/11/2021</div>
                        </div>
                    </div>
                </div>

                <div class="item px-2">
                    <div class="fh5co_hover_news_img">
                        <div class="fh5co_hover_news_img_video_tag_position_relative">
                            <div class="fh5co_news_img">
                                <iframe id="video" width="100%" height="200" src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="pt-2">
                            <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span class="">The top 10 funniest videos on YouTube </span></a>
                            <div class="c_g"><i class="fa fa-clock-o"></i> 2/11/2021</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Blog</div>
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
                            <div class="fh5co_news_img">
                                <a href="{{$url}}">
                                    <img src="{{$urlPic}}" alt="" width="100%" height="100%"/></div>
                                </a>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <div>
                            <a href="{{$url}}" class="fh5co_magna py-2">
                                {{$name}}
                            </a>
                        </div>

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
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                {!!$objBlogs->appends(request()->all())->links()!!}
                {{-- <a href="#" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Trang trước</a>
                <a href="#" class="btn_pagging">1</a>
                <a href="#" class="btn_pagging">2</a>
                <a href="#" class="btn_pagging">3</a>
                <a href="#" class="btn_pagging">...</a>
                <a href="#" class="btn_mange_pagging">Trang kế <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a> --}}
            </div>
        </div>
    </div>
</div>
@endsection
