<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h3>Thông tin khách hàng</h3>
   <p>Khách hàng
     {{$info['ten']}}
   </p>
   <p>Email:
      {{$info['email']}}
   </p>
   <p>Điện thoại:
      {{$info['sodienthoai']}}
   </p>
   <p>Địa chỉ:
      {{$info['diachi']}}
   </p>
   <tbody>
   <table>
                    @foreach($cart as $item)
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
   
</body>
</html>