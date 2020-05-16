@extends('layout')
@section('title','Giỏ hàng')
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
		<div class="container" style="width: 850px;">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
			@if(Cart::count()>=1)
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
					  <a href="{{asset('/trangchu')}}" type="submit" class="btn btn-warning">Tiếp tục mua hàng</a>
					  <a href="{{asset('cart/delete/all')}}" type="submit" class="btn btn-danger">Xóa hết</a>
				  </div>
				</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container" style="width: 945px;">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
						
							<a class="btn btn-default check_out" href="{{asset('cart/checkout')}}">Check Out</a>
				
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	@else
	  <h3>Giỏ hàng rỗng</h3>
    @endif
@endsection