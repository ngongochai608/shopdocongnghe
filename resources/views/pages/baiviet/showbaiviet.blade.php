@extends('layout')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 padding-left">
                    <!--features_items-->
                    <div class="features_items">
                        <h2 class="tieudebaiviet">{{$meta_title}}</h2>
                        @foreach($post as $key => $p)
                        <div class="product-image-wrapper" style="border: none;">
                            <div class="single-products" style="margin: 10px 0px;padding: 2px;">
                                <h5>{!!$p->post_desc!!}</h5>
                                {!!$p->post_content!!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        @endforeach
                    </div><!--features_items-->
            </div>
             <div class="col-sm-4 padding-right">
                <h3 class="title text-center baivietlienquan">Bài viết liên quan</h3>
                <ul class="tintuclienquan">
                    @foreach($related as $key => $related_post)
                    <li>
                        <a href="">
                        <img width="80" height="80" src="{{URL::to('public/uploads/post/'.$related_post->post_image)}}">
                        <h4>{{$related_post->post_title}}</h4>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
    </section>
    @endsection