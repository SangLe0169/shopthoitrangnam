@extends('layout')
@section('title','Đăng nhập')
@section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
					@include('errors.note')
						<h2>Login to your account</h2>
						<form role="form" method="post">
						{{ csrf_field() }}
							<input required type="email" name="email"  placeholder="Email">
							<input required type="password" name="password" placeholder="Mật khẩu">
							<a href="{{asset('/forgot_password')}}">Quên mật khẩu</a>
							
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
			
				<div class="col-sm-4">
				
					<div class="signup-form"><!--sign up form-->
				@if(count($errors)>0)
				   <div class="alert alert-danger">
				       @foreach($errors->all() as $err)
					     {{$err}}
					   @endforeach
				   </div>
				 @endif
				 @if(Session::has('thanhcong'))
				    <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
				  @endif
						<h2>New User Signup!</h2>
						<form action="{{route('signin')}}" method="post">
						{{ csrf_field() }}
							<input type="email" name="email" required placeholder="Email Address">
							<input type="text" name="Ten" required placeholder="Fullname">
							<input type="number" name="phone" required placeholder="Số dien thoai">
							<input type="text" name="Diachi" required placeholder="Dia chi">
							<input type="password" name="password" required placeholder="Password">
							<input type="password" name="re_password" required placeholder="Re_Password">
							<div class="g-recaptcha" data-sitekey="6LcZyPIUAAAAAHKGK3kHAv0NKjXqAkvuhSSZiilE"></div>
							<br/>
							@if($errors->has('g-recaptcha-response'))
							<span class="invalid-feedback" style="display:block">
								<strong>{{$errors->first('g-recaptcha-response')}}</strong>
							</span>
							@endif
							<button type="submit" class="btn btn-default">Signup</button>
						
						</form>
						
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	
	</section>
	
@endsection