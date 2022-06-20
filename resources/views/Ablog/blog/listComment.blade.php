<div>
    <h5>Bình luận Blog này : </h5>
    <form action="" method="POST">
        @csrf
        @if (Auth::check())
            {{-- <input type="hidden" name="idBlog" value="{{$idBlog}}"> --}}
            {{-- <label for="">Nội dung bình luận</label>
            <br> --}}
            <textarea name="content" id="comment" cols="60" rows="3" placeholder="viết bình luận (*)" required></textarea>
            <br>
            <a id="btn-comment" class="btn btn-primary">bình luận</a>
        @else
            <p><a href="{{Route('Ablog.auth.login')}}">Vui lòng đăng nhập để bình luận</a></p>
        @endif

    </form>
</div>
<br><br>
<div class="headings d-flex justify-content-between align-items-center mb-3">
    <h5>Các bình luận</h5>

</div>
<div >
    @foreach ($objComments as $item)
    @php
        $comment_id = $item->comment_id;
        $username = $item->User->username;
        $blog_id = $item->blog_id;
        $description = $item->description;
        $created_at = $item->created_at;
        // $parent = $item->parent_id;

    @endphp
    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div class="form-comment user align-items-center">
                <div>
                    <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2">
                    <span><small class="font-weight-bold text-primary">{{$username}}</small>&emsp;<small class="created-at">{{$created_at}}</small>

                    </span>
                </div>
                <p class="comment-content">{{$description}}</p>
            </div>

        </div>
        <div class="action d-flex justify-content-between mt-2 align-items-center">
            <div class="reply px-4">

                @if (Auth::check())
                    {{-- @if (Auth::user()->username == 'admin' || Auth::user()->username==$username)
                    <a href=""><small>Remove</small></a>
                    @endif --}}
                <a class="btn-rep-comment" data-id="{{$comment_id}}"><small>Trả lời</small></a>
                @endif
                {{-- form rep comment --}}
                <form action="" method="POST" style="display:none;" class="formrep form-rep-{{$comment_id}}">
                    @csrf
                    @if (Auth::check())
                        <textarea name="content" id="comment-rep-{{$comment_id}}" cols="60" rows="3" placeholder="viết bình luận (*)" required></textarea>
                        <br>
                        <a id="btn-comment" data-id="{{$comment_id}}" class="btn btn-primary btn-submit-rep">bình luận</a>
                    @else
                        <p><a href="{{Route('Ablog.auth.login')}}">Vui lòng đăng nhập để bình luận</a></p>
                    @endif

                </form>
                 {{-- form rep comment --}}
            </div>
        </div>
        {{-- <hr> --}}
    {{-- ///// --}}
    @foreach ($objCommentreps as $item)
        @php
        $comment_idrep = $item->comment_id;
        $usernamerep = $item->User->username;
        $blog_idrep = $item->blog_id;
        $descriptionrep = $item->description;
        $created_atrep = $item->created_at;
        $parentrep = $item->parent_id;
        @endphp
        @if ($parentrep==$comment_id)
        <div class="action d-flex justify-content-between mt-2 align-items-center">
            <div class="reply px-4">
                <div class="form-comment user align-items-center">
                    <div>
                        <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2">
                        <span>
                            <small class="font-weight-bold text-primary">{{$usernamerep}}</small>&emsp;
                            <small class="created-at">{{$created_atrep}}</small>
                        </span>
                    </div>
                    <p class="comment-content">{{$descriptionrep}}</p>
                    <div class="reply px-4">
                        @if (Auth::check())
                            @if (Auth::user()->username == 'admin' || Auth::user()->username==$username)
                            <a href=""><small>Remove</small></a>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach
    {{-- end nội dung rep comment --}}
    </div>

    <br>
    @endforeach
</div>

