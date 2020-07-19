@extends('layout')
@section('title','Tin tức')
@section('content')

<div class="col-sm-9">
  @foreach($blog as $bl)
					<div class="blog-post-area">
               
						<h2 class="title text-center"></h2>
						<div class="single-blog-post">
							<h3>{{$bl->pos_Tieudebaiviet}}</h3>
							<div class="post-meta">
							
								<span>
										<!-- <i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i> -->
								</span>
							</div>
							<a href="">
						        <img src="{{asset('storage/app/avatar/'.$bl->pos_image)}}" class="thumbnail">
							</a>
							<p>{!!$bl->pos_content!!}</p>
							<a class="btn btn-primary" href="{{asset('/blog_detail/' .$bl->pos_id)}}">Đọc thêm</a>
						</div>
						
						
						
					</div>
                   
                    @endforeach
                    <div class="pagination-area">
							<!-- <ul class="pagination">
								<li><a href="" class="active">1</a></li>
								<li><a href="">2</a></li>
								<li><a href="">3</a></li>
								<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
							</ul> -->
						</div>
				</div>

@endsection