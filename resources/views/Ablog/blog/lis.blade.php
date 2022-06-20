@foreach ($comment as $item)
<div class="media">
    <a class="pull-left mr-3" href="#">
        <img src="https://png.pngtree.com/png-vector/20190704/ourlarge/pngtree-businessman-user-avatar-free-vector-png-image_1538405.jpg"
        alt="" width="60px">
    </a>
    <div class="media-body">
        <h5 class="media-heading">{{ $item->comment->fullname }}</h5>
        <p style="background-color: #F1F3F4">
            <span>{{ $item->description }}</span><br>
            <span style="font-size: 12px;font-weight:bold"><i>Ngày đăng : {{ $item->created_at }}</i></span>
        </p>
        <br>
       @if (Auth::check())
        <p>
            <a href="" class="btn btn-primary btn-sm btn-reply-form" data-id="{{ $item->comment_id }}">Trả lời</a>
        </p>
        @else
           <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">Vui lòng đăng nhập để trả lời</button>
           <hr><br>
       @endif
       <hr>
        {{-- an tra loi  --}}
        <form action="" method="post" style="display:none" class="mb-3 formReply form-reply-{{ $item->comment_id }}">
            <div class="row">
                <div class="col-md-12">
                    <label for="">Xin chao{{ Auth::user()->fullname }}</label>
                </div>
                <div class="col-md-12">
                    <input type="hidden" value="" name="blog_id">
                </div>
                <div class="col-md-12">
                    <textarea name="description" id="comment-reply-{{ $item->comment_id }}" class="form-control" rows="3" placeholder="Nhập bình luận *" required="required" ></textarea>
                </div>
                <div class="col-md-12">
                    <button style="float: right" type="submit" data-id="{{ $item->comment_id }}" class="btn btn-primary btn-sm btn-comment-reply" >Gửi bình luận</button>
                </div>
            </div>
        </form>


        {{-- cac bình luận con --}}
        @foreach ($item->rep_Comment as $child)
        <div class="media">
            <a class="pull-left mr-3" href="#">
                <img src="https://png.pngtree.com/png-vector/20190704/ourlarge/pngtree-businessman-user-avatar-free-vector-png-image_1538405.jpg"
                alt="" width="60px">
            </a>
            <div class="media-body">
                <h5 class="media-heading">{{ $child->comment->fullname }}</h5>
                <p style="background-color: #F1F3F4">
                    <span>{{ $child->description }}</span><br>
                    <span style="font-size: 12px; font-weight:bold"><i>Ngày đăng : {{ $child->created_at }}</i></span>
                </p>
                <hr>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endforeach
