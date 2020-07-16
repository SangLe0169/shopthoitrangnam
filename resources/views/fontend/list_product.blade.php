@extends('layout')
@section('title','Trang danh sách sản phẩm')
@section('content')
<div class="features_items"><!--features_items-->
						<h2 class="title text-center">{{$cateName->cate_name}}</h2>
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
									
									</ul>
								</div>
							</div>
						</div>
						
					@endforeach	
                    <div class="row text-center">
                     <div class="col-md-12">
						<ul class="pagination">
                             {{$items->links()}}
							
						</ul>
                        </div>
                    </div>
                        
			</div><!--features_items-->
@endsection