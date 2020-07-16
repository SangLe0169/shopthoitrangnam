@if(Session::has('error'))
    <p class="alert alert-danger">{{Session::get('error')}}</p>
@endif



@if(Session::has('Thanhcong'))
		<div class="alert alert-success">{{Session::get('Thanhcong')}}</div>
 @endif