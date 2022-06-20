@extends('templates.ablog.master')
@section('content')
<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Giới thiệu</div>
                </div>
                {{-- @foreach ($objAbout as $item) --}}
                <div class="row pb-4">
                    <div class="col-12 animate-box">
                        <div>
                            <a href="javascript:void(0)" class="fh5co_magna py-2">
                               {!!$objAbout->name!!}
                           </a></div>
                        <a href="javascript:void(0)" class="fh5co_mini_time py-3">
                            {{$objAbout->create_at}}
                        </a>
                        <div class="fh5co_consectetur">
                            {!!$objAbout->description!!}
                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}


            </div>
            <!-- Sidebar -->
            @include('templates.ablog.inc.sidebar')
        </div>
    </div>
</div>
@endsection
