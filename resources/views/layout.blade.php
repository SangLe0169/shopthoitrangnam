<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{$meta_desc}}">
	<meta name="keywords" content="{{$meta_keywords}}">
	<meta name="robots" content="">
	<link rel="canonical" href="http://localhost/shoptt/trangchu">
    <meta name="author" content="">

	<meta property="og:image" content="" />
    <meta property="og:site_name" content="http://localhost/shoptt/trangchu" />
    <meta property="og:description" content="{{$meta_desc}}" />
    <meta property="og:title" content="{{$meta_title}}" />
    <meta property="og:url" content="{{$url_canonical}}" />
    <meta property="og:type" content="website" />


    <title>Shop thời trang nam</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" type="text/css" rel="stylesheet">
	<link href="{{asset('public/fontend/css/font-awesome.min.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" type="text/css" rel="stylesheet">
	<link href="{{asset('public/fontend/css/main.css')}}" type="text/css" rel="stylesheet">
	<link href="{{asset('public/fontend/css/responsive.css')}}" type="text/css" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('public/fontend/image/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{('public/fontend/image/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{('public/fontend/image/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{('public/fontend/image/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{('public/fontend/image/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>

	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
							@if(Auth::check())
								<li><a href="#"><i class="fa fa-phone"></i> {{Auth::user()->phone}}</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i>{{Auth::user()->email}}</a></li>
							@endif
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right" style="padding-top:9px">
							<ul class="nav navbar-nav">
								<li><div class="fb-share-button" data-href="http://localhost/shoptt/trangchu" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div></li>
							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{asset('/trangchu')}}"><img src="{{('public/fontend/image/logo-thoi-trang(9).jpg')}}" width="100px" height="100px" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
							
							
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('cart/checkout')}}"><i class="fa fa-crosshairs"></i> Đặt hàng</a></li>
								<li><a href="{{URL::to('/cart/show')}}"><i class="fa fa-shopping-cart"></i>{{Cart::count()}} Giỏ hàng</a></li>
								@if(Auth::check())
								<li><a href=""><i class="fa fa-lock"></i>Chào bạn: {{Auth::user()->name}}</a></li>
								<li><a href="{{route('logout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
								@else
								<li><a  href="{{route('login')}}" >Đăng nhập</a>
             
								</li>
								<li><a href="{{route('signin')}}">Đăng ký</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trangchu')}}" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
									@foreach($categories as $cates)
                                        <li><a href="{{asset('/danhsachsanpham/' .$cates->cate_id. '/' .$cates->cate_slug.'.html')}}">{{$cates->cate_name}}</a></li>
									@endforeach
	
									

                                    </ul>
                                </li> 
								<li><a href="{{URL::to('/blog')}}">Tin tức</a>
                                   
                                </li> 
							
								<li><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
					<div id="search-bar" class="col-md-6">
					   <form class="navbar-form" role="search" method="get" action="{{asset('search/')}}" >
					   <div class="input-group"> 
					      <div class="input-group-btn">
						  <input type="text" class="form-control" name="result" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2" style="
    width: 206px;">
					   </div>
					   <div class="input-group-btn">
					   <button class="btn btn-default" type="submit" style="height: 34px;"><i class="fa fa-search" aria-hidden="true"></i></button>
					   <div>
					</div>
					</form>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider" width="1290px"><!--slider-->
		<div class="container" width="1290px">
			<div class="row" width="1290px">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						<?php $i=0; ?>
						@foreach($slide as $sl)
							<li data-target="#slider-carousel" data-slide-to="{{$i}}" 
							@if($i == 0)
							  class="active"
							  @endif
							  ></li>
							<?php $i++; ?>
							@endforeach
						</ol>
						
						<div class="carousel-inner">
						<?php $i=0; ?>
						@foreach($slide as $sl)
							<div 
							@if($i == 0)
							   class="item active"
							@else
							   class="item"
							@endif
							>
							<?php $i++; ?>
								<div class="col-sm-6">
									<img src="{{asset('storage/app/avatar/' .$sl->images)}}" width="900px" height="400px"  alt="" />
							
								</div>
						     
							</div>
							@endforeach
					
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->




	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
					
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						@foreach($categories as $cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a href="{{asset('/danhsachsanpham/' .$cate->cate_id. '/' .$cate->cate_slug.'.html')}}"  >
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											{{$cate->cate_name}}
										</a>
									</h4>
								</div>
								<!--<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="#">Nike </a></li>
											<li><a href="#">Under Armour </a></li>
											<li><a href="#">Adidas </a></li>
											<li><a href="#">Puma</a></li>
											<li><a href="#">ASICS </a></li>
										</ul>
									</div>
								</div>-->
							</div>
							@endforeach
							
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								   @foreach($vp_brand as $pr)
									<li><a href="{{asset('/thuonghieu/' .$pr->brand_id)}}"> <span class="pull-right"></span>{{$pr->brand_name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						
						
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					
						@yield('content')
						
						
						
				</div><!--features_items-->

					
					
					<!--<div class="category-tab"> 
						<div class="col-sm-12">
							
						</div>

						<div class="tab-content">
							<div class="tab-pane fade active in" id="tshirt" >
								
								
								
								
							</div>
							
					<div class="tab-pane fade" id="blazers" >
							
					</div>-->
					
				
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper-man</h2>
							<p>Xin cám ơn tất cả khách hàng đã luôn ủng hộ shop của tôi</p>
						</div>
					</div>
					<div class="col-sm-7">
						
						
						
					
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>Dịch vụ</h2>
							<ul class="nav nav-pills nav-stacked">
							
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Tin tức</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>Cửa hàng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Áo thun nam</a></li>
								<li><a href="#">Áo sơ mi nam</a></li>
								<li><a href="#">Quần jean nam</a></li>
								<li><a href="#">Quần tây nam</a></li>
							
							</ul>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="single-widget">
							<h2>Giới thiệu cửa hàng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>website bán shop thời trang nam</li>
								<li><a href="#">Địa chỉ: Trần Văn Ơn, Phú Hoà, Thủ Dầu Một, Bình Dương</a></li>
								<li><a href="#">Số điện thoại : 0377 4111 30</a></li>
								<li><a href="#">Email: lesang0169@gmail.com</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2020 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Thiết kế bởi <span><a target="_blank" href="#">Sang Lê</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('public/fontend/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('public/fontend/js/main.js')}}"></script>
	
	<div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0"></script>
	<script>
		   $('#paypalbtn').hide();
		   $('#cashbtn').hide();

		   $(':radio[id=paypal]').change(function(){
			   $('#paypalbtn').show();
			   $('#cashbtn').hide();
		   });

		   $(':radio[id=cash]').change(function(){
			  $('#paypalbtn').hide();
			   $('#cashbtn').show();
		   });


		</script>
		<script>
		  
		</script>
	
	<!--<style>.fb-livechat, .fb-widget{display: none}.ctrlq.fb-button, .ctrlq.fb-close{position: fixed; right: 24px; cursor: pointer}.ctrlq.fb-button{z-index: 999; background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEyOCAxMjgiIGhlaWdodD0iMTI4cHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAxMjggMTI4IiB3aWR0aD0iMTI4cHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnPjxyZWN0IGZpbGw9IiMwMDg0RkYiIGhlaWdodD0iMTI4IiB3aWR0aD0iMTI4Ii8+PC9nPjxwYXRoIGQ9Ik02NCwxNy41MzFjLTI1LjQwNSwwLTQ2LDE5LjI1OS00Niw0My4wMTVjMCwxMy41MTUsNi42NjUsMjUuNTc0LDE3LjA4OSwzMy40NnYxNi40NjIgIGwxNS42OTgtOC43MDdjNC4xODYsMS4xNzEsOC42MjEsMS44LDEzLjIxMywxLjhjMjUuNDA1LDAsNDYtMTkuMjU4LDQ2LTQzLjAxNUMxMTAsMzYuNzksODkuNDA1LDE3LjUzMSw2NCwxNy41MzF6IE02OC44NDUsNzUuMjE0ICBMNTYuOTQ3LDYyLjg1NUwzNC4wMzUsNzUuNTI0bDI1LjEyLTI2LjY1N2wxMS44OTgsMTIuMzU5bDIyLjkxLTEyLjY3TDY4Ljg0NSw3NS4yMTR6IiBmaWxsPSIjRkZGRkZGIiBpZD0iQnViYmxlX1NoYXBlIi8+PC9zdmc+) center no-repeat #0084ff; width: 60px; height: 60px; text-align: center; bottom: 30px; border: 0; outline: 0; border-radius: 60px; -webkit-border-radius: 60px; -moz-border-radius: 60px; -ms-border-radius: 60px; -o-border-radius: 60px; box-shadow: 0 1px 6px rgba(0, 0, 0, .06), 0 2px 32px rgba(0, 0, 0, .16); -webkit-transition: box-shadow .2s ease; background-size: 80%; transition: all .2s ease-in-out}.ctrlq.fb-button:focus, .ctrlq.fb-button:hover{transform: scale(1.1); box-shadow: 0 2px 8px rgba(0, 0, 0, .09), 0 4px 40px rgba(0, 0, 0, .24)}.fb-widget{background: #fff; z-index: 1000; position: fixed; width: 360px; height: 435px; overflow: hidden; opacity: 0; bottom: 0; right: 24px; border-radius: 6px; -o-border-radius: 6px; -webkit-border-radius: 6px; box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -webkit-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -moz-box-shadow: 0 5px 40px rgba(0, 0, 0, .16); -o-box-shadow: 0 5px 40px rgba(0, 0, 0, .16)}.fb-credit{text-align: center; margin-top: 8px}.fb-credit a{transition: none; color: #bec2c9; font-family: Helvetica, Arial, sans-serif; font-size: 12px; text-decoration: none; border: 0; font-weight: 400}.ctrlq.fb-overlay{z-index: 0; position: fixed; height: 100vh; width: 100vw; -webkit-transition: opacity .4s, visibility .4s; transition: opacity .4s, visibility .4s; top: 0; left: 0; background: rgba(0, 0, 0, .05); display: none}.ctrlq.fb-close{z-index: 4; padding: 0 6px; background: #365899; font-weight: 700; font-size: 11px; color: #fff; margin: 8px; border-radius: 3px}.ctrlq.fb-close::after{content: "X"; font-family: sans-serif}.bubble{width: 20px; height: 20px; background: #c00; color: #fff; position: absolute; z-index: 999999999; text-align: center; vertical-align: middle; top: -2px; left: -5px; border-radius: 50%;}.bubble-msg{width: 120px; left: -140px; top: 5px; position: relative; background: rgba(59, 89, 152, .8); color: #fff; padding: 5px 8px; border-radius: 8px; text-align: center; font-size: 13px;}</style><div class="fb-livechat"> <div class="ctrlq fb-overlay"></div><div class="fb-widget"> <div class="ctrlq fb-close"></div><div class="fb-page" data-href="https://www.facebook.com/quanlyshopthoitrang" data-tabs="messages" data-width="360" data-height="400" data-small-header="true" data-hide-cover="true" data-show-facepile="false"> </div><div class="fb-credit"> <a href="https://thanhtrungmobile.vn" target="_blank" rel="sponsored">Powered by TT</a> </div><div id="fb-root"></div></div><a href="https://m.me/quanlyshopthoitrang" title="Gửi tin nhắn cho chúng tôi qua Facebook" class="ctrlq fb-button"> <div class="bubble">1</div><div class="bubble-msg">Bạn cần hỗ trợ?</div></a></div><script src="https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><script>jQuery(document).ready(function($){function detectmob(){if( navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i) ){return true;}else{return false;}}var t={delay: 125, overlay: $(".fb-overlay"), widget: $(".fb-widget"), button: $(".fb-button")}; setTimeout(function(){$("div.fb-livechat").fadeIn()}, 8 * t.delay); if(!detectmob()){$(".ctrlq").on("click", function(e){e.preventDefault(), t.overlay.is(":visible") ? (t.overlay.fadeOut(t.delay), t.widget.stop().animate({bottom: 0, opacity: 0}, 2 * t.delay, function(){$(this).hide("slow"), t.button.show()})) : t.button.fadeOut("medium", function(){t.widget.stop().show().animate({bottom: "30px", opacity: 1}, 2 * t.delay), t.overlay.fadeIn(t.delay)})})}});</script>-->
	<!-- Load Facebook SDK for JavaScript -->
	<!--<div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v7.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <!--<div class="fb-customerchat"
        attribution=setup_tool
        page_id="103194241396473"
  theme_color="#44bec7"
  logged_in_greeting="Xin chào! Tôi giúp gì được cho bạn!"
  logged_out_greeting="Xin chào! Tôi giúp gì được cho bạn!">
      </div>-->
<!-- Subiz -->

<script>
   $(function(){
	   $('.orderby').change(function(){
		   $("#form_order").submit();
	   })
   })
</script>


<script type="text/javascript">
    $(document).ready(function(){
		$('.choose').on('change',function(){
                 var action = $(this).attr('id');
                 var ma_id = $(this).val();
                 var _token = $('input[name="_token"]').val();
                 var $result = '';
        
                if(action =='city'){
                   result ='province';
                }else{
                    result ='wards';
                }
                $.ajax({
                      url : '{{url('cart/seclect-delivery-home')}}',
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
		  var maqh =$('.province').val();
		  var xaid = $('.wards').val();
		  var _token = $('input[name="_token"]').val();
		  if(matp == '' && maqh == '' && xaid == ''){
			  alert('Hãy chọn tên thành phố');
		  }else{
			$.ajax({
                      url : '{{url('cart/calculate-fee')}}',
                      method: 'POST',
                      data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                      success:function(data){
                          location.reload();
                     }

                  });
				
		  }
		});
 });
</script>
<script>
	(function(s, u, b, i, z){
	u[i]=u[i]||function(){
		u[i].t=+new Date();
		(u[i].q=u[i].q||[]).push(arguments);
	};
	z=s.createElement('script');
	var zz=s.getElementsByTagName('script')[0];
	z.async=1; z.src=b; z.id='subiz-script';
	zz.parentNode.insertBefore(z,zz);
	})(document, window, 'https://widgetv4.subiz.com/static/js/app.js', 'subiz');
	subiz('setAccount', 'acqqyyocnposerpfmxtq');
</script>
<!-- End Subiz -->
</body>

</html>