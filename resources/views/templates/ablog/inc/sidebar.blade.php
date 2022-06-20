<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Danh mục</div>
    </div>
    <div class="clearfix"></div>
    <ul class="fh5co_tags_all">
    @foreach ($listCats as $item)
        @php
            $name = $item->name;
            $id = $item->cat_id;
            $slug = Str::slug($name);
            $url = route('Ablog.blog.blog',['slug'=>$slug,'id'=>$id])
        @endphp
         {{-- active --}}
        <li><a href="{{$url}}" class="fh5co_tagg"><i class="fa fa-angle-right"></i>{{$name}}</a></li>
    @endforeach

    </ul>
    <div>
        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Blog đọc nhiều</div>
    </div>
    @foreach ($listTopBlog as $item)
    @php
        $name = $item->name;
        $nameLM = Str::limit($item->name,45);
        $slug = Str::slug($name);
        $id = $item->blog_id;
        $createdAt = $item->created_at;
        $pic = $item->picture;
        $urlPic = 'storage/files/'.$pic;
        $url = Route('Ablog.blog.detail',['slug'=>$slug,'id'=>$id]);
    @endphp
    <div class="row pb-3">
        <div class="col-5 align-self-center">
            <img src="{{$urlPic}}" alt="img" class="fh5co_most_trading" />
        </div>
        <div class="col-7 paddding">
            <div class="most_fh5co_treding_font"><a href="{{$url}}">{{$nameLM}}</a></div>
            <div class="most_fh5co_treding_font_123">{{$createdAt}}</div>
        </div>
    </div>
    @endforeach


</div>
