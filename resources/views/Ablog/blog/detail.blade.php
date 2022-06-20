@extends('templates.ablog.master')
@section('content')
<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div class="page-title">
                    <span>{{$objBlog->created_at}}</span>
                    <h1>{{$objBlog->name}}</h1>
                </div>
                <div class="content">
                    {!!$objBlog->detail_text!!}
                </div>

            </div>
            <!-- Sidebar -->
            @include('templates.ablog.inc.sidebar')
            <!-- Sidebar -->
        </div>
    </div>
</div>

<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Blog liên quan</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
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
        <div class="item px-2">
            <div class="fh5co_hover_news_img">
                <div class="fh5co_news_img"><a href="{{$url}}"></a><img src="{{$urlPic}}" alt="" /></div>
                <div>
                    <a href="{{$url}}" class="d-block fh5co_small_post_heading"><span class="">{{$name}}</span></a>
                    <div class="c_g"><i class="fa fa-clock-o"></i>{{$createdAt}}</div>
                </div>
            </div>
        </div>
        @endforeach

        </div>
    </div>
    {{-- comment chi tiết bài viết  --}}
    <div class="container mt-5">
        <div class="row  d-flex justify-content-center">
            <div class="col-md-8" id="comment-display">
                {{-- --------------------------- --}}
                @include('Ablog.blog.listComment')
                {{-- --------------------------- --}}
            </div>
        </div>
    </div>
    {{-- end comment chi tiết bài viết --}}
</div>
<script>
    $("#comment-display").on("click","#btn-comment", function(ev){
    //$('#btn-comment').click(function(ev){
        ev.preventDefault();
        var content = $('#comment').val();
        var _token = $('input[name="_token"]').val();
        var idBlog = '{{$objBlog->blog_id}}';
        $.ajax({
            url: "{{Route('Ablog.blog.comment')}}",
            type: "post",
            cache:false,
            data: {
                content:content,
                _token:_token,
                idBlog:idBlog
            },
            // dataType: 'json',
            success: function(data) {
                $('#comment-display').html(data);
            },
            error:function(data){
                console.log('Đã có lỗi xảy ra');
            },
        });

        // return false;
    });
    $(document).on('click','.btn-rep-comment', function(ev){
        ev.preventDefault();
        var id = $(this).data('id');
        var comment_rep_id = '#comment-rep-' + id;
        var content = $(comment_rep_id).val();
        var form_reply = '.form-rep-' + id;
        // alert(form_reply);
        $('.formrep').slideUp();
        $(form_reply).slideDown();
    });
    $(document).on('click','.btn-submit-rep', function(ev){
        ev.preventDefault();
        var id = $(this).data('id');
        var comment_rep_id = '#comment-rep-' + id;
        var content_rep = $(comment_rep_id).val();
        var _token = $('input[name="_token"]').val();
        var idBlog = '{{$objBlog->blog_id}}';
        // var form_reply = '.form-rep-' + id;
        // alert(form_reply);
        // $('.formrep').slideUp();
        // $(form_reply).slideDown();
        // alert(idBlog);
        $.ajax({
            url: "{{Route('Ablog.blog.comment')}}", //đây à edaj đay
            type: "post",
            cache:false,
            data: {
                content:content_rep,
                _token:_token,
                idBlog:idBlog,
                idComment:id
            },
            // dataType: 'json',
            success: function(data) {
                $('#comment-display').html(data);
            },
            error:function(data){
                console.log('Đã có lỗi repcm');
            },
        });
    });


</script>

@endsection
