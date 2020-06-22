@extends('backend.dashboard')
@section('title','Sửa slider')
@section('contend')
<section id="main-content">
	<section class="wrapper">
  <h3>Sửa Slider</h3>
    <form method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    @include('errors.note')
  <div class="form-group">
    <label>Hình ảnh</label>
    <input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
    <img id="avatar" class="thumbnail" width="300px" src="{{asset('storage/app/avatar/'.$slider->images)}}">
  </div>
  <button type="submit" class="btn btn-primary">Cập nhật</button>
  <a href="{{asset('admin/slider')}}" type="submit" class="btn btn-danger">Hủy</a>
</form>
        
</section>
@stop