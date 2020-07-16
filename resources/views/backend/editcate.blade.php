@extends('backend.dashboard')
@section('title','Sửa danh mục sản phẩm')
@section('contend')
<section id="main-content">
	<section class="wrapper">
  <h3>Sửa Danh Mục Sản Phẩm</h3>
    <form method="post">
    {{csrf_field()}}
    @include('errors.note')
  <div class="form-group">
    <label>Tên danh mục</label>
    <input  type="text" name='name' class="form-control" id="exampleInputName" style="width: 500px" value="{{$cate->cate_name}}"  aria-describedby="nameHelp">
    <label>Từ khóa danh mục</label>
    <input  type="text" name='meta_keywords' class="form-control" id="exampleInputName" style="width: 500px" value="{{$cate->meta_keywords}}"  aria-describedby="nameHelp">
  </div>
  <button type="submit" class="btn btn-primary">Cập nhật</button>
  <a href="{{asset('admin/category')}}" type="submit" class="btn btn-danger">Hủy</a>
</form>
        
</section>
@stop