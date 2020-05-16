@extends('layout')
@section('title','Tìm kiếm')
@section('content')
<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Kết quả tìm kiếm: {{$keyword}}</h2>
						@foreach($items as $item)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset('storage/app/avatar/' .$item->pro_Hinhanh)}}" alt="" />
											<h2>{{number_format($item->pro_Gia,0,',','.')}} đ</h2>
											<p>{{$item->pro_Tensanpham}}</p>
											<a href="{{asset('/detail/' .$item->pro_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{number_format($item->pro_Gia,0,',','.')}} đ</h2>
												<p>{{$item->pro_Tensanpham}}</p>
												<a href="{{asset('/detail/' .$item->pro_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						
					@endforeach	
						
						
					
						
						
					</div><!--features_items-->				
</div>
@endsection