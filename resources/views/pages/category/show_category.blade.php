@extends('layout')
@section('content')
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
                
                <div class="col-sm-9 padding-right">




<div class="features_items"><!--features_items-->
                        @foreach($category_name as $key => $name)
                       
                        <h2 class="title text-center"><i class="fa fa-star-o" aria-hidden="true"></i> &nbsp;{{$name->category_name}}&nbsp; <i class="fa fa-star-o" aria-hidden="true"></i></h2>

                        @endforeach
                        @foreach($category_by_id as $key => $product)
                        
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">

                                <div class="single-products">
                                        <div class="productinfo text-center">
                                           <form class="san-pham">
                                                @csrf
                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                            <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                           
                                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_slug)}}">
                                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                            <h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
                                            <p>{{$product->product_name}}</p>
                                            </a>
                                             <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
                                            </form>
                                        </div>
                                      
                                </div>

                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </div><!--features_items-->
                    
        

                </div>
            </div>
        </div>
    </section>
@endsection