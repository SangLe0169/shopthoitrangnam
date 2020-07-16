@extends('layout')
@section('title','Trang chủ')
@section('content')
<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Sản phẩm đặt biệt</h2>
						@foreach($featured as $item)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset('storage/app/avatar/' .$item->pro_Hinhanh)}}" alt="" />
											<h2>{{number_format($item->pro_Giamgia,0,',','.')}} $</h2>
											<span style="text-decoration:line-through">{{number_format($item->pro_Gia,0,',','.')}} $</span>
											
											<p>{{$item->pro_Tensanpham}}</p>
											<a href="{{asset('/detail/' .$item->pro_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											<h2>{{number_format($item->pro_Giamgia,0,',','.')}} $</h2>
											<span style="text-decoration:line-through">{{number_format($item->pro_Gia,0,',','.')}} $</span>
												
												<p>{{$item->pro_Tensanpham}}</p>
												<a href="{{asset('/detail/' .$item->pro_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
									
									</ul>
								</div>
							</div>
						</div>
						
					@endforeach	
						
						
					
						
						
					</div><!--features_items-->

					<div class="features_items">
						<h2 class="title text-center">Sản phẩm mới</h2>
						@foreach($news as $new)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{asset('storage/app/avatar/' .$new->pro_Hinhanh)}}" alt="" />
										<h2>{{number_format($new->pro_Giamgia,0,',','.')}} $</h2>
										<span style="text-decoration:line-through">{{number_format($new->pro_Gia,0,',','.')}} $</span>
										
										<p>{{$new->pro_Tensanpham}}</p>
										<a href="{{asset('/detail/' .$new->pro_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>{{number_format($new->pro_Giamgia,0,',','.')}} $</h2>
											<span style="text-decoration:line-through">{{number_format($new->pro_Gia,0,',','.')}} $</span>
											<p>{{$new->pro_Tensanpham}}</p>
											<a href="{{asset('/detail/' .$new->pro_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
										</div>
									</div>
									<img src="images/home/new.png" class="new" alt="" />
								</div>
								<div class="choose">
									
								</div>
							</div>
						</div>
					@endforeach
						
</div>
                    
              <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Khuyến mãi</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item">	
								@foreach($promotion as $promotions)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('storage/app/avatar/' .$promotions->pro_Hinhanh)}}" alt="">
													<h2>{{number_format($promotions->pro_Giamgia,0,',','.')}} $</h2>
													<span style="text-decoration:line-through">{{number_format($promotions->pro_Gia,0,',','.')}} $</span>
													<p>{{$promotions->pro_Tensanpham}}</p>
													<a href="{{asset('/detail/' .$promotions->pro_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
												</div>
												
											</div>
										</div>
									</div>
								@endforeach	
								
								</div>
								<div class="item active">	
								@foreach($promotion as $promotions)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('storage/app/avatar/' .$promotions->pro_Hinhanh)}}" alt="">
													<h2>{{number_format($promotions->pro_Gia,0,',','.')}} $</h2>
													<p>{{$promotions->pro_Tensanpham}}</p>
													<a href="{{asset('/detail/' .$promotions->pro_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
												</div>
												
											</div>
										</div>
									</div>
								@endforeach
									
								</div>
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>	
								
						</div>
						
					</div>
					
</div>
@endsection