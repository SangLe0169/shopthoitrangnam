@extends('layout')
@section('title','Nhap lại email')
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
                          <label for="password">Vui lòng nhập mật khẩu mới</label>
                            <input required type="password" name="password" class="form-control"  placeholder="Password">
							@if($errors->has('password'))
                              <span class='invalid-feedback' role="alert">
                               <strong>{{$errors->first('password')}}</strong>
                              </span>
                            @endif
                            <input required type="password" name="password_confirm" class="form-control"  placeholder="Enter the password">
                            @if($errors->has('password_confirm'))
                              <span class='invalid-feedback' role="alert">
                               <strong>{{$errors->first('password_confirm')}}</strong>
                              </span>
                            @endif
							<button type="submit" class="btn btn-default">Gửi</button>
						</form>
					
					</div><!--/login form-->
				</div>
				
			
			
				</div>
			</div>
		</div>
	</section>
@endsection