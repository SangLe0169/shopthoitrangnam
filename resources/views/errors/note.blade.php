@if(Session::has('error'))
    <p class="alert alert-danger">{{Session::get('error')}}</p>
@endif

@foreach($errors->all() as $error)
     <p class="alert alert-danger">{{$error}}<p>
@endforeach

@if(Session::has('Thanhcong'))
		<div class="alert alert-success">{{Session::get('Thanhcong')}}</div>
 @endif