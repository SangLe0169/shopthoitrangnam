@extends('layout')
@section('title','Thanh toán')
@section('content')
<script type="text/javascript">
   function updateCart(qty,rowId){
       $.get(
		   '{{asset('cart/update')}}',
		   {qty:qty,rowId:rowId},
		   function(){
			   location.reload();
		   }
	   );
   }
</script>
<section id="cart_items">
		<div class="container"  style="width: 850px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->
            <div class="review-payment">
				<h2>Review &amp; Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
                          <td class="image" style="width:100px;">Hình</td>
							<td class="description">Tên sp</td>
							<td class="price" style="width:95px;">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total" style="width:118px;">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    @foreach($items as $item)
						<tr>
                        <td class="cart_product">
								<a href=""><img src="{{asset('storage/app/avatar/' .$item->options->img)}}" style="width:50px;height:70px;" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$item->name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($item->price,0,',','.')}} đ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
		
									<input class="cart_quantity_input" type="number" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2" onchange="updateCart(this.value,'{{$item->rowId}}')">
	
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($item->price*$item->qty,0,',','.')}} đ</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{asset('cart/delete/' .$item->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        @endforeach
					
					</tbody>
				</table>
			</div>
            <div class="row" id="total-price">
				  <div class="col-md-12">
				      <h3>Tổng thanh toán: {{$total}} đ</h3>
				  </div>
				</div>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-6">
						<div class="shopper-info">
							<p>Thông tin khách hàng</p>
							<form method="post" >
							{{csrf_field()}}
                                  <input required type="text" placeholder="Họ đệm"  name="hodem">
                                  <input required type="text" placeholder="Tên" name="ten">
									<input required type="text" placeholder="Số điện thoại*" name="sodienthoai">
									<input required type="text" placeholder="Địa chỉ" name="diachi">
									@if(Auth::check())
									<input required type="text" placeholder="Email *"  name="email" value="{{Auth::user()->email}}">
									@endif
                                    <textarea required name="message" placeholder="Ghi chú" rows="16"></textarea>
								<span>
									<label><input type="radio" class="input-radio" name="payment_method" checked="checked" > Thanh toán trực tiếp</label>
								</span>
								<span>
								
								
								</span>
								<span>
									<button type="submit" class="btn btn-primary">Thanh toán</button>
                                </span>
                    
							</form>
							
							
						</div>
					</div>
						
				</div>
			
			</div>
			
			<div class="payment-options">
		
            <div class="row" id="total-price">
				  <div class="col-md-12">
				      <h3>Thanh toán online</h3>
				  </div>
				</div>
				@include('fontend.paypal')
			
				</div>
    
		
		</div>
	</section>

@endsection