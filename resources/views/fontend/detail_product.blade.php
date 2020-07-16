@extends('layout')
@section('title','Trang chi tiết sản phẩm')
@section('content')
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{asset('storage/app/avatar/' .$item->pro_Hinhanh)}}" alt="" />
							
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="{{asset('storage/app/avatar/' .$item->pro_thumnails)}}" style="width:50px;heigh:60px" alt=""></a>
										  <a href=""><img src="{{asset('storage/app/avatar/' .$item->pro_thumnails1)}}" style="width:50px;heigh:60px" alt=""></a>
										  
										</div>
										<div class="item">
										<a href=""><img src="{{asset('storage/app/avatar/' .$item->pro_thumnails)}}" style="width:50px;heigh:60px" alt=""></a>
										</div>
									
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
			
								<h2>{{$item->pro_Tensanpham}}</h2>
								@foreach($brands as $brand)
								 <p>Thương hiệu: {{$brand->brand_name}}</p>
								@endforeach
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>Giá: {{number_format($item->pro_Giamgia,0,',','.')}} $</span><br>
									<p style="text-decoration:line-through">{{number_format($item->pro_Gia,0,',','.')}} $</p><br>
									@foreach($motion->all() as $pmo)
									 <p>Khuyến mãi: {{$pmo->prom_Tieude}}</p><br>
									@endforeach
									<p>Còn hàng: @if($item->pro_Trangthai==1) Còn hàng @else Hết hàng @endif</p><br>
									<p>Kích thước:  
									<select required class="form-control">
									@foreach($sizes as $size)
									  <option value ="{{$size->size_id}}">{{$size->size_name}}</option>
									@endforeach
									</select></p><br>
									<a href="{{asset('cart/add/' .$item->pro_id)}}" type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										 Thêm vào giỏ
									</a>
								</span>
							
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
						
								<li class="active"><a href="#reviews" data-toggle="tab">Chi tiết</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade" id="details">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="companyprofile">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade" id="tag">
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery1.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery2.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery3.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center">
												<img src="images/home/gallery4.jpg" alt="">
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane fade active in" id="reviews">
								<div class="col-sm-12">
									<ul>
									
									</ul>
									<p>{!!$item->pro_Mota!!}</p>
									@if(isset(Auth::user()->name))
									<p><b>Bình luận</b></p>
									
									<form action="#" method="post">
									{{csrf_field()}}
										<!-- <span>
											<input type="text" placeholder="Your Name">
											<input type="email" placeholder="Email Address">
										</span> -->
										<textarea name="content"></textarea>
										@endif
										<b> </b> <img src="images/product-details/rating.png" alt="">
										@if(count($comment)>0)
										@foreach($comment->all() as $cm)
										<b>{{$cm->name}}</b> 
										<p>{{$cm->com_content}}</p>
										<p>{{$cm->created_at}}</p>
										
										@endforeach
										@endif
										<button type="submit" class="btn btn-default pull-right">
											Gửi
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div>
						
							
						
				<!--/category-tab-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
								@foreach($related_product as $item)	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('storage/app/avatar/' .$item->pro_Hinhanh)}}" alt="" />
													<h2>{{number_format($item->pro_Gia,0,',','.')}} đ</h2>
													<p>{{$item->pro_Tensanpham}}</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
								
									</div>
								@endforeach
								</div>
								<div class="item">	
								@foreach($related_product as $item)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{asset('storage/app/avatar/' .$item->pro_Hinhanh)}}" alt="" />
													<h2>{{number_format($item->pro_Gia,0,',','.')}} đ</h2>
													<p>{{$item->pro_Tensanpham}}</p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
@endsection