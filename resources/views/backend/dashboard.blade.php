<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<base href="{{asset('public/backend/')}}/">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link rel="stylesheet" href="css/colap.css" type="text/css"/>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<link href="Stype/datepicker3.css" rel="stylesheet">
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="javascript/lumino.glyphs.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.html" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
        <!-- <input type="text" class="form-control search" placeholder=" Search" src="image/search-icon.png"> -->
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
            
                <span class="username">
                 <?php
                  $email = Session::get('email');
                  if($email){
                      echo $email;
                  }
                 ?>
                  
                </span>
        
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="{{URL::to('admin/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
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
                    <a class="active" href="{{asset('admin/home')}}">
                    <i class="fas fa-home"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>
                
                <li class="sub-menu">
                    <a href="{{asset('admin/category')}}">
                    <i class="fas fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="{{asset('admin/product')}}">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span>Sản phẩm</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="{{asset('admin/customer')}}">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                        <span>Khách hàng</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="{{asset('admin/posts')}}">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                        <span>Bài viết</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="{{asset('admin/orders')}}">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                        <span>Đơn hàng</span>
                    </a>
            
                    
                </li>

                <li class="sub-menu">
                    <a href="{{asset('admin/delivery')}}">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                        <span>Quản lý phí vận chuyển</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="{{asset('admin/slider')}}">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                        <span>Quản lý Slider</span>
                    </a>
                </li>
               
              
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
   @yield('contend')
<!-- footer -->
<!-- <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div> -->
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->
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
	<script type="text/javascript" src="js/monthly.js"></script>
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
    <script src="javascript/jquery-1.11.1.min.js"></script>
	<script src="javascript/chart.min.js"></script>
	<script src="javascript/chart-data.js"></script>
	<script src="javascript/easypiechart.js"></script>
	<script src="javascript/easypiechart-data.js"></script>
	<script src="javascript/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            fetch_delivery();
            function fetch_delivery(){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                      url : '{{url('admin/delivery/seclect-fee')}}',
                      method: 'POST',
                      data:{_token:_token},
                      success:function(data){
                          $('#load_delivery').html(data);
                     }

                  });
            }
         
        $(document).on('blur','.fee_feeship_edit',function() {
            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{url('admin/delivery/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id,fee_value:fee_value,_token:_token},
                success:function(data){
                        fetch_delivery();
                }
            });
            
        });
        $('.add_delivery').click(function(){

                  var city = $('.city').val();
                  var province = $('.province').val();
                  var wards = $('.wards').val();
                  var fee_ship = $('.fee_ship').val();
                  var _token = $('input[name="_token"]').val();
                //   alert(city);
                //   alert(province);
                //   alert(wards);
                //   alert(fee_ship);
                $.ajax({
                      url : '{{url('admin/delivery/insert-delivery')}}',
                      method: 'POST',
                      data:{city:city,province:province,_token:_token,wards:wards,fee_ship:fee_ship},
                      success:function(data){
                         alert('Thêm phí vận chuyển thành công');
                         fetch_delivery();
                     }

                  });
                  

            });
          
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
                      url : '{{url('admin/delivery/seclect-delivery')}}',
                      method: 'POST',
                      data:{action:action,ma_id:ma_id,_token:_token},
                      success:function(data){
                          $('#'+result).html(data);
                     }

                  });
             });
        })
    </script>


<script type="text/javascript">
  $('.update_quantity_order').click(function(){
      var order_checkout_quantity = $(this).data('product_id');
      var order_qty = $('.order_qty_'+order_checkout_quantity).val();
      var order_code = $('.order_code').val();
      var _token = $('input[name="_token"]').val();
      $.ajax({
                       url : '{{url('admin/orders/update-qty')}}',
                       method: 'POST',
                       data:{_token:_token,order_checkout_quantity:order_checkout_quantity,order_qty:order_qty,order_code:order_code},
                       success:function(data){
                           alert("Cập nhật số lượng thành công");
                           location.reload();
                      }

             });

  });
</script>
        <script type="text/javascript">
          $('.order_details').change(function(){
              var order_status = $(this).val();
              var order_id = $(this).children(":selected").attr("id");
             var _token = $('input[name="_token"]').val();

             quantity = [];
                    $("input[name='product_quantity']").each(function(){
                   quantity.push($(this).val());

              });
              order_checkout_quantity =[];
                     $("input[name='order_checkout_quantity']").each(function(){
                    order_checkout_quantity.push($(this).val());

               });
            j = 0;
            for(i=0;i<order_checkout_quantity.length;i++){
                //so luong khach dat
                var order_qty = $('.order_qty_' + order_checkout_quantity[i]).val();
                //so luong tồn kho
                var order_qty_storage = $('.order_qty_storage_' + order_checkout_quantity[i]).val();

                if(parseInt(order_qty)>parseInt(order_qty_storage)){
                    j = j+1;
                    if(j==1){
                        alert('Số lượng không đủ trong kho!');
                    }
                    $('.color_qty_'+ order_checkout_quantity[i]).css('background','#000');
                }

            }
            if(j==0){
                $.ajax({
                        url : '{{url('admin/orders/update-order-quantity')}}',
                        method: 'POST',
                        data:{_token:_token,order_status:order_status,order_id:order_id,quantity:quantity,order_checkout_quantity:order_checkout_quantity},
                        success:function(data){
                            alert("Cập nhật thành công");
                            location.reload();
                       }

                 });
            }
                
          
              
             
          });
        </script>

    <script>
		$('#calendar').datepicker({
		});
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		});
		function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		        var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
		    $('#avatar').click(function(){
		        $('#img').click();
		    });
		});
	</script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="sku[]" id="sku" placeholder="SKU"/><input type="text" name="size[]" id="size" placeholder="Size"/><a href="javascript:void(0);" class="remove_button">remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
    </body>
</html>