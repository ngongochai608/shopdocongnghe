<!DOCTYPE html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
    <link href="{{asset('public/backend/css/jquery.dataTables.min.css')}}" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>

    <!-- calendar -->
    <link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('public/backend/js/morris.js')}}"></script>

</head>
<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="#" class="logo">
                    ADMIN
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{('public/backend/images/4.png')}}">
                            <span class="username">
                             <?php
                             $name = Auth::user()->admin_name;
                             if($name){
                              echo $name;

                          }
                          ?>

                      </span>
                      <b class="caret"></b>
                  </a>
                  <ul class="dropdown-menu extended logout">
                    <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="{{URL::to('/logout-auth')}}"><i class="fa fa-key"></i>Đăng xuất</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->

        </ul>
        <!--search & user info end-->
    </div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-home"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>

                @hasrole(['admin','author','user'])
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-slideshare"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-slider')}}">Thêm Slider</a></li>
                        <li><a href="{{URL::to('/manage-slider')}}">Liệt kê Slider</a></li>                 
                    </ul>
                </li>
                @endhasrole

                @hasrole(['admin','author','user'])
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope-o"></i>
                        <span>Đơn hàng</span>
                    </a>
                    <ul class="sub">
                      <li><a href="{{URL::to('/manage-order')}}">Quản lý đơn hàng</a></li>


                  </ul>
              </li>
              @endhasrole

              @hasrole(['admin','author'])
              <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-gift"></i>
                    <span>Mã giảm giá</span>
                </a>
                <ul class="sub">
                    <li><a href="{{URL::to('/insert-coupon')}}">Quản lý mã giảm giá</a></li>
                    <li><a href="{{URL::to('/list-coupon')}}">Liệt kê mã giảm giá</a></li>
                </ul>
            </li>
            @endhasrole

            @hasrole(['admin','author','user'])
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-list-alt"></i>
                    <span>Danh mục sản phẩm</span>
                </a>
                <ul class="sub">
                  <li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
                  <li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>
              </ul>
          </li>
          @endhasrole

          @hasrole(['admin','author','user'])
          <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-yoast"></i>
                <span>Thương hiệu sản phẩm</span>
            </a>
            <ul class="sub">
              <li><a href="{{URL::to('/add-brand-product')}}">Thêm hiệu sản phẩm</a></li>
              <li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu sản phẩm</a></li>
          </ul>
      </li>
      @endhasrole

      @hasrole(['admin','author','user'])
      <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-clipboard"></i>
            <span>Danh mục bài viết</span>
        </a>
        <ul class="sub">
          <li><a href="{{URL::to('/add-category-post')}}">Thêm danh mục bài viết</a></li>
          <li><a href="{{URL::to('/all-category-post')}}">Liệt danh mục bài viết</a></li>
      </ul>
  </li>
  @endhasrole

  @hasrole(['admin','author'])
  <li class="sub-menu">
    <a href="javascript:;">
        <i class="fa fa-product-hunt"></i>
        <span>Sản phẩm</span>
    </a>
    <ul class="sub">
      <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
      <li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>

  </ul>
</li>
@endhasrole

@hasrole(['admin','author'])
<li class="sub-menu">
    <a href="javascript:;">
        <i class="fa fa-pencil-square-o"></i>
        <span>Bài viết</span>
    </a>
    <ul class="sub">
      <li><a href="{{URL::to('/add-post')}}">Thêm bài viết</a></li>
      <li><a href="{{URL::to('/list-post')}}">Liệt kê bài viết</a></li>
  </ul>
</li>
@endhasrole

@hasrole(['admin'])
<li class="sub-menu">
    <a href="javascript:;">
        <i class="fa fa-user"></i>
        <span>Users</span>
    </a>
    <ul class="sub">
        <li><a href="{{URL::to('/add-users')}}">Thêm user</a></li>
        <li><a href="{{URL::to('/users')}}">Liệt kê user</a></li>
    </ul>
</li>
@endhasrole

</ul>            
</div>
<!-- sidebar menu end-->
</div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
        @yield('admin_content')
    </section>
    <!-- footer -->
    <div class="footer">
       <div class="wthree-copyright">
         <p>© Copy All rights reserved 2018 - Copyright by shopbanhanglaravel.com</p>
     </div>
 </div>
 <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dataTables.min.js')}}"></script>

<!-- Bắt đầu Gallery -->
<script type="text/javascript">
    $(document).ready(function(){
        load_gallery();
        function load_gallery(){
            var pro_id = $('.pro_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/select-gallery')}}",
                method:"POST",
                data:{pro_id:pro_id,_token:_token},
                success:function(data){
                    $('#gallery_load').html(data);
                }                
            });
        }

        // Kiểm tra file ảnh
        $('#file').change(function(){
            var error = '';
            var files = $('#file')[0].files;
            if (files.length>5) {
                error+='<p>Bạn chỉ được chọn tối đa 5 ảnh</p>';
            }
            else if(files.length==''){
               error+='<p>Bạn không được bỏ trống ảnh</p>';
           }
           else if(files.size>2000000){
               error+='<p>File không được lơn hơn 2MB</p>';
           }
           if (error=='') {

           }
           else{
            $('#file').val('');
            $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
            return false;
        }
    });

        // Sửa tên ảnh
        $(document).on('blur','.edit_gal_name',function(){
            var gal_id = $(this).data('gal_id');
            var gal_text = $(this).text();     
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/update-gallery-name')}}",
                method:"POST",
                data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Đổi tên thành công</span>');
                }                
            });
        });

       //Xóa gallery
       $(document).on('click','.delete-gallery',function(){
        var gal_id = $(this).data('gal_id');
        var _token = $('input[name="_token"]').val();
        if (confirm('Bạn muốn xóa hình ảnh này không ?')){
            $.ajax({
                url:"{{url('/delete-gallery')}}",
                method:"POST",
                data:{gal_id:gal_id,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Xóa hình ảnh thành công </span>');
                }                
            });
        }
    });

        //Sửa hình ảnh gallery
        $(document).on('change','.file_image',function(){
            var gal_id = $(this).data('gal_id');
            var image = document.getElementById('file-'+gal_id).files[0];
            var form_data = new FormData();
            form_data.append('file',document.getElementById('file-'+gal_id).files[0]);
            form_data.append('gal_id',gal_id);
            $.ajax({
                url:"{{url('/update-gallery')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Cập nhập ảnh thành công </span>');
                }                
            });
        });


    });
</script>

<!-- Kết thúc Gallery -->


<!-- Bắt đầu order -->
<script type="text/javascript">
    $('.update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+order_product_id).val();
        var order_code =$('.order_code').val();
        var _token = $("input[name='_token']").val();
        $.ajax({
            url : '{{url('/update-qty')}}',
            method: 'POST',
            data:{_token:_token,order_qty:order_qty,order_code:order_code,order_product_id:order_product_id},
            success:function(data){
               alert('Cập nhập số lượng thành công');
               location.reload();
           }
       });
    });
</script>
<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $("input[name='_token']").val();

        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        // lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        j = 0;
        for(i=0;i<order_product_id.length;i++){
            var order_qty = $('.order_qty_'+order_product_id[i]).val();
            var order_qty_storage = $('.order_qty_storage_'+order_product_id[i]).val();
            if (parseInt(order_qty)>parseInt(order_qty_storage)) {
                j += 1;
                if(j==1){
                    alert('số lượng sản phẩm trong kho không đủ');
                }
                
                $('.color_qty_'+order_product_id[i]).css('background','red');
            }
        }
        if (j==0) {
            $.ajax({
                url : '{{url('/update-order-qty')}}',
                method: 'POST',
                data:{_token:_token,order_status:order_status,order_id:order_id,quantity:quantity,order_product_id:order_product_id},
                success:function(data){
                   alert('Thay đổi tình trạng đơn hàng thành công');
                   location.reload();
               }
           });
        }

    });
</script>
<!-- Kết thúc Order -->


<script type="text/javascript">
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>


<script type="text/javascript">
    $.validate({

    });
</script>


<script>
 CKEDITOR.replace('ckeditor');
 CKEDITOR.replace('ckeditor1');
 CKEDITOR.replace('ckeditor2');
 CKEDITOR.replace('ckeditor3');
 CKEDITOR.replace('id4');
</script>


<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>

<script>
 $(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

	    //CHARTS
	    function gd(year, day, month) {
           return new Date(year, month - 1, day).getTime();
       }

       graphArea2 = Morris.Area({
           element: 'hero-area',
           padding: 10,
           behaveLikeLine: true,
           gridEnabled: false,
           gridLineColor: '#dddddd',
           axes: true,
           resize: true,
           smooth:true,
           pointSize: 0,
           lineWidth: 0,
           fillOpacity:0.85,
           data: [
           {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
           {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
           {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
           {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
           {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
           {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
           {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
           {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
           {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

           ],
           lineColors:['#eb6f6f','#926383','#eb6f6f'],
           xkey: 'period',
           redraw: true,
           ykeys: ['iphone', 'ipad', 'itouch'],
           labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
           pointSize: 2,
           hideHover: 'auto',
           resize: true
       });


   });
</script>

<!-- calendar -->
<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
<script type="text/javascript">
  $(window).load( function() {

   $('#mycalendar').monthly({
    mode: 'event',

});

   $('#mycalendar2').monthly({
    mode: 'picker',
    target: '#mytarget',
    setWidth: '250px',
    startHidden: true,
    showTrigger: '#mytarget',
    stylePast: true,
    disablePast: true
});

   switch(window.location.protocol) {
      case 'http:':
      case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
  }

});
</script>
<!-- //calendar -->
</body>
</html>
