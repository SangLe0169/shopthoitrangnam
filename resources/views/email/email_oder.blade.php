<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<h2> Cảm ơn quý khách đã đặt hàng của chúng tôi</h2>
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
   <div class="table-responsive cart_info">
		
				<table class="table table-condensed" style="boder: 1px">
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
								
							</td>
							<td class="cart_price">
								<p>{{number_format($item->price,0,',','.')}} $</p>
							</td>
							<td class="cart_quantity">
							  <p>{{$item->qty}}</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{number_format($item->price*$item->qty,0,',','.')}} $</p>
							</td>
							
						</tr>
                    @endforeach
					</tbody>
				</table>
			
			</div>
            <div class="row" id="total-price">
				  <div class="col-md-12">
				      <h3>Tổng thanh toán: {{$total}} đ</h3>
					  @if(Session::get('fee'))
					     <h3>Phí vận chuyển: {{number_format(Session::get('fee'),0,',','.')}}đ</h3>
					  @endif
				  </div>
				</div>
   
</body>
</html>