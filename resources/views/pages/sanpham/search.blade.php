@extends('layout')
@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2><i class="fa fa-bars" aria-hidden="true"></i>Danh mục sản phẩm</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                      @foreach($category as $key => $cate)
                      
                      <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->slug_category_product)}}"><i class="fa fa-chevron-right" aria-hidden="true"></i>{{$cate->category_name}}</a></h4>
                        </div>
                    </div>
                    @endforeach
                </div><!--/category-products-->
                
                <div class="brands_products"><!--brands_products-->
                    <h2><i class="fa fa-bars" aria-hidden="true"></i>Thương hiệu sản phẩm</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($brand as $key => $brand)
                            <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_slug)}}"> <span class="pull-right">(50)</span><i class="fa fa-chevron-right" aria-hidden="true"></i>{{$brand->brand_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div><!--/brands_products-->
                
                
                
            </div>
        </div>
        
        <div class="col-sm-9 padding-right">


            <div class="features_items"><!--features_items-->
                <h2 class="title text-center"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;Kết quả tìm kiếm</h2>
                @foreach($search_product as $key => $product)
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
                                        <h2>{{number_format($product->product_price).' '.'đ'}}</h2>
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