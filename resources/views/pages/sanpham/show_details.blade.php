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
			<!-- right -->
			<div class="col-sm-9 padding-right">
				@foreach($product_details as $key => $value)
				<!--product-details-->
				<div class="product-details">
					<style type="text/css">
						.lSSlideOuter .lSPager.lSGallery img {
							display: block;
							max-width: 100%;
							height: 100px;
						}
						li.active {
							border: 2px solid #fdb45e;
						}
					</style>
					<div class="col-sm-5">
						<ul id="imageGallery">
							@foreach($gallery_product as $key => $gallery)
							<li data-thumb="{{asset('public/uploads/gallery/'.$gallery->gallery_image)}}" data-src="{{asset('public/uploads/gallery/'.$gallery->gallery_image)}}">
								<img width="100%" alt="{{$gallery->gallery_name}}" src="{{asset('public/uploads/gallery/'.$gallery->gallery_image)}}" />
							</li>
							@endforeach
							
						</ul>			
					</div>

					<div class="col-sm-7">
						<!--product-information-->
						<div class="product-information">
							<form>
								@csrf
								<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
								<input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
								<input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">
								<input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
								<input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">

								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>{{number_format($value->product_price ,0,',','.')}}đ</span>						
									<label>Số lượng:</label>
									<input name="qty" type="number" min="1"  value="1" class="cart_product_qty_{{$value->product_id}}"/>
									<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" /><br/>		
								</form>				
							</span>
							<button class="btn btn-fefault add-cart" data-id_product="{{$value->product_id}}" name="add-cart" aria-hidden="true" style="background: #00CC00;color: #FFFFFF;">
								<i class="fa fa-shopping-cart"></i>
								Thêm vào giỏ hàng
							</button>
							<p><b>Tình trạng:</b> Còn hàng</p>
							<p><b>Điều kiện:</b> Mơi 100%</p>
							<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
							<p><b>Danh mục:</b> {{$value->category_name}}</p>

							<div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
							<div class="fb-share-button" data-href="http://localhost/tutorial_youtube/shopbanhanglaravel" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
						</div>
						<!--/product-information-->
					</div>
				</div>
				<!--/product-details-->

				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
							<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
							

						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade active in" id="details" >
							<p>{!!$value->product_desc!!}</p>

						</div>

						<div class="tab-pane fade" id="companyprofile" >
							<p>{!!$value->product_content!!}</p>
						</div>
					</div>

				</div>		
				@endforeach

				<div class="fb-comments" data-href="http://localhost:81/shopbanhanglaravel/chi-tiet-san-pham/Adidas-limitit-a1" data-numposts="20" data-width=""></div>

				<!-- recommended_items -->
				<div class="recommended_items">
					<h2 class="title text-center">Sản phẩm liên quan</h2>

					@foreach($relate as $key => $lienquan)
					<div class="col-sm-4">
						<div class="product-image-wrapper">

							<div class="single-products">
								<div class="productinfo text-center">
									<form class="san-pham">
										@csrf
										<input type="hidden" value="{{$lienquan->product_id}}" class="cart_product_id_{{$lienquan->product_id}}">
										<input type="hidden" value="{{$lienquan->product_name}}" class="cart_product_name_{{$lienquan->product_id}}">
										<input type="hidden" value="{{$lienquan->product_image}}" class="cart_product_image_{{$lienquan->product_id}}">
										<input type="hidden" value="{{$lienquan->product_price}}" class="cart_product_price_{{$lienquan->product_id}}">
										<input type="hidden" value="1" class="cart_product_qty_{{$lienquan->product_id}}">

										<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_slug)}}">
											<img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
											<h2>{{number_format($lienquan->product_price).' '.'đ'}}</h2>
											<p>{{$lienquan->product_name}}</p>


										</a>
										<input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$lienquan->product_id}}" name="add-to-cart">
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
				</div>
			</div>
		</div>
		<!--/recommended_items-->

			</div>
		</div>
	</div>
</section>
@endsection