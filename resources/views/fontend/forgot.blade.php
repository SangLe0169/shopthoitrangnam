@extends('layout')
@section('title','Nhap email')
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
                          <label for="email">Vui lòng nhập email để xác nhận</label>
							<input required type="email" name="email" class="form-control{{$errors->has('email')? ' is-invalid' : ' '}}"  placeholder="Email">
                            @if($errors->has('email'))
                              <span class='invalid-feedback' role="alert">
                              <strong>{{$errors->first('email')}}</strong>
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