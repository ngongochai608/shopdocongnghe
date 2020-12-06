<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------Seo--------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link  rel="icon" type="image/x-icon" href="" />
    
    {{--   <meta property="og:image" content="{{$image_og}}" />  
    <meta property="og:site_name" content="http://localhost/tutorial_youtube/shopbanhanglaravel" />
    <meta property="og:description" content="{{$meta_desc}}" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:url" content="{{$url_canonical}}" />
    <meta property="og:type" content="website" /> --}}
    <!--//-------Seo--------->
    <title>{{$meta_title}}</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">

    <!-- Light Slider -->
    <link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
    <!-- /Light Slider -->

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->       
<link rel="shortcut icon" href="{{('public/frontend/images/favicon.ico')}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +0969710597</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> ngongochai608@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/trend.fs9"><i class="fa fa-facebook-square"> Fanpage</i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"> Instagram</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="logo pull-left">
                            <a href="{{url('/trang-chu')}}"><img src="{{('public/frontend/images/logo.png')}}" width="200" height="50" alt="" /></a>
                        </div>
                        
                    </div>
                    <div class="col-sm-5">
                        <form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{csrf_field()}}
                            <div class="search_box pull-right">
                                <input type="text" class="box_search" name="keywords_submit" placeholder="Tìm kiếm sản phẩm"/>
                                <input type="submit" name="search_items" class="btn btn-primary btn-sm btn-search" value="Tìm kiếm">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-5">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                             
                                <li><a href="#"><i class="fa fa-heart"></i> Yêu thích</a></li>
                                <?php
                                $customer_id = Session::get('customer_id');
                                $shipping_id = Session::get('cart');
                                if($customer_id!=NULL && $shipping_id!=NULL){ 
                                   ?>
                                   <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-money"></i> Thanh toán</a></li>
                                   
                                   <?php

                                    }elseif($customer_id!=NULL && $shipping_id==NULL){

                                   ?>

                                   <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-money"></i> Thanh toán</a></li>

                                   <?php 

                                    }else{
                                    ?>
                                    <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-money"></i> Thanh toán</a></li>
                                    <?php
                                    }
                            ?>
                            

                            <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                            
                            <?php
                            $customer_id = Session::get('customer_id');
                            if($customer_id!=NULL){ 
                               ?>
                               <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-power-off" aria-hidden="true"></i> Đăng xuất</a></li>
                               
                               <?php
                           }else{
                               ?>
                               <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                               <?php 
                           }
                           ?>
                           
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </div><!--/header-middle-->
   
   <div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{URL::to('/trang-chu')}}" class="active"><i class="fa fa-home" aria-hidden="true"></i> &nbsp;Trang chủ</a></li>

                        <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                @foreach($category as $key => $danhmuc)
                                <li><a href="{{url::to('/danh-muc-san-pham/'.$danhmuc->slug_category_product)}}">{{$danhmuc->category_name}}</a></li>
                                @endforeach                     
                            </ul>
                        </li> 

                        <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                @foreach($category_post as $key => $cate_post)
                                <li><a href="{{url::to('/danh-muc-bai-viet/'.$cate_post->cate_post_slug)}}">{{$cate_post->cate_post_name}}</a></li>
                                @endforeach        
                            </ul>
                        </li> 
                         <li class="dropdown"><a href="#">Hỗ trợ<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href=""></a></li>    
                            </ul>
                        </li> 
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div><!--/header-bottom-->
</header><!--/header-->





@yield('content')



<footer id="footer"><!--Footer-->
    
<div class="footer-widget">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="single-widget">
                    <h2><i class="fa fa-cogs" aria-hidden="true"></i>Giới thiệu - Hỗ trợ</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#"><i class="fa fa-share" aria-hidden="true"></i>Thông tin về shop</a></li>
                        <li><a href="#"><i class="fa fa-share" aria-hidden="true"></i>Chính sách bảo hành</a></li>
                        <li><a href="#"><i class="fa fa-share" aria-hidden="true"></i>Hướng dẫn đặt hàng</a></li>
                        <li><a href="#"><i class="fa fa-share" aria-hidden="true"></i>Chính sách hủy giao dịch , đổi trả</a></li>
                        <li><a href="#"><i class="fa fa-share" aria-hidden="true"></i>Chính sách giải quyết khiếu nại</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="single-widget">
                    <h2><i class="fa fa-lightbulb-o" aria-hidden="true"></i>Chăm sóc khách hàng</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#"><i class="fa fa-phone-square" aria-hidden="true"></i>ĐT:0969710597</a></li>
                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>Email:ngongochai608@gmail.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="single-widget">
                    <h2><i class="fa fa-map-marker" aria-hidden="true"></i>Địa chỉ</h2>
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#"><i class="fa fa-location-arrow" aria-hidden="true"></i>đường Nguyễn Văn Linh - TP:Đà Nẵng</a></li>
                        <li><a href="#"><i class="fa fa-location-arrow" aria-hidden="true"></i>đường Lý Tự Trọng - TP:Hồ Chí Minh</a></li>
                        <li><a href="#"><i class="fa fa-location-arrow" aria-hidden="true"></i>đường Duy Tân - Cầu Giấy - Hà Nội</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <div class="single-widget">
                    <div class="fb-page" data-href="https://www.facebook.com/trend.fs9/" data-tabs="message" data-width="400" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/trend.fs9/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/trend.fs9/">Trend.FS</a></blockquote></div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <p class="pull-left">Copy All rights reserved 2018 - Copyright by shopbanhanglaravel.com</p>
        </div>
    </div>
</div>

</footer><!--/Footer-->



<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>

<script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
<script src="{{asset('public/frontend/js/prettify.js')}}"></script>

<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=2339123679735877&autoLogAppEvents=1"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#imageGallery').lightSlider({
        gallery:true,
        item:1,
        loop:true,
        thumbItem:3,
        slideMargin:0,
        enableDrag: false,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageGallery .lslide'
            });
        }   
    });  
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.send_order').click(function(){
        var shipping_email = $('.shipping_email').val();
        var shipping_name = $('.shipping_name').val();
        var shipping_address = $('.shipping_address').val();
        var shipping_phone = $('.shipping_phone').val();
        var shipping_notes = $('.shipping_notes').val();
        var order_fee = $('.order_fee').val();
        var order_coupon = $('.order_coupon').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: '{{url('/confirm-order')}}',
            method: 'POST',
            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon},
            success:function(){

                swal({
                    title: "Cảm ơn bạn",
                    text: "Đơn hàng của bạn đã được gửi , chúng tôi sẽ liên lạc với bạn sớm nhất !",
                    showCancelButton: true,
                    cancelButtonText: "Hủy",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    closeOnConfirm: false
                },
                function() {
                    window.location.href = "{{url('/trang-chu')}}";
                });
            }
        });
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.add-to-cart').click(function(){
            var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
               
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                    success:function(){

                        swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{url('/gio-hang')}}";
                        });

                    }

                });
            });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.add-cart').click(function(){
            var id = $(this).data('id_product');
                // alert(id);
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                 if (parseInt(cart_product_qty)>parseInt(cart_product_quantity)) {
                    alert('Làm ơn đặt số lượng nhỏ hơn '+cart_product_quantity);
                }else{
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                    success:function(){

                        window.location.href = "{{url('/gio-hang')}}";

                    }

                });
            }
            });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                 $('#'+result).html(data);     
             }
         });
        });
    });
    
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp == '' && maqh =='' && xaid ==''){
                alert('Làm ơn chọn để tính phí vận chuyển');
            }else{
                $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                     location.reload(); 
                 }
             });
            } 
        });
    });
</script>

</body>
</html>