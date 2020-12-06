@extends('layout')
@section('content')

<!-- SiteBar -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <div class="brands_products"><!--brands_products-->
                    <h2><i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($category as $key => $cate)
                            <li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->slug_category_product)}}"> <span class="pull-right"></span><i class="fa fa-chevron-right" aria-hidden="true"></i> {{$cate->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="brands_products"><!--brands_products-->
                    <h2><i class="fa fa-bars" aria-hidden="true"></i> Thương hiệu sản phẩm</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($brand as $key => $brand)
                            <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_slug)}}"> <span class="pull-right"></span><i class="fa fa-chevron-right" aria-hidden="true"></i> {{$brand->brand_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div><!--/brands_products-->
                
                
                
            </div>
        </div>
        <!-- /SiteBar -->
        <div class="col-sm-9 padding-right">
            <!--features_items-->
            <div class="features_items">
                <h2 class="title text-center"><i class="fa fa-star-o" aria-hidden="true"></i> &nbsp; {{$meta_title}} &nbsp;<i class="fa fa-star-o" aria-hidden="true"></i></h2>
                @foreach($post as $key => $p)
                <div class="product-image-wrapper" style="border: none;">
                    <div class="single-products" style="margin: 10px 0px;padding: 2px;">
                       <div>
                        <img style="float: left;width:200px;height: 150px;padding-right: 15px;" src="{{URL::to('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_slug}}" />
                        <h4 style="padding:5px;text-align: left;">{{$p->post_title}}</h4>
                        <p style="text-align: left;">{!!$p->post_desc!!}</p>
                    </div>
                    <div class="text-right">
                        <a href="{{url('/bai-viet/'.$p->post_slug)}}" class="btn btn-default btn-sm">Xem chi tiết</a>
                    </div>
                </div>
            <div class="clearfix"></div>
            @endforeach
        </div><!--features_items-->

        <!-- paginate -->
        <div class="row">
            <div class="col-sm-7 text-right text-center-xs">                
                <ul class="pagination pagination-sm m-t-none m-b-none">
                     {!!$post->links()!!}
                </ul>
            </div>
        </div>
        <!-- paginate -->

       </div>
   </div>
</div>
</section>
@endsection