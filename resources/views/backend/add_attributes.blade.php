@extends('backend.dashboard')
@section('title','Thêm size')
@section('contend')
<section id="main-content">
	<section class="wrapper">
  <h3>Thêm size Sản Phẩm</h3><br>
    <form method="post">
    {{csrf_field()}}
    @include('errors.note')
    <input type ="hidden" name ="size_product" value="{{$productDetails->pro_id}}">
  <div class="form-group"  name="add_attribute" id="add_attribute">
    <label>Tên danh mục :</label>
    <label>{{$productDetails->pro_Tensanpham}}</label>
  </div>
  <div class="form-group">
    <label>Màu sắc : </label>
    <label>{{$productDetails->pro_Nhommau}}</label>
  </div>
  <div class="form-group">
                    
                        <div class="field_wrapper">
                        <div>
                        <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width:120px;" required/>
                        <input type="text" name="size[]" id="size" placeholder="Size" style="width:120px;" required/>
                        <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                            </div>
                        </div>
                </div>
  <button type="submit" class="btn btn-primary">Cập nhật</button>
  <a href="{{asset('admin/category')}}" type="submit" class="btn btn-danger">Hủy</a>
</form>

<div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>ID</th>
            <th>SKU</th>
            <th>SIZE</th>
            
            <th style="width:30px;"></th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
      @foreach($productDetails['attributes'] as $at)
          <tr>
          
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$at->id}}</td>
            <td>{{$at->sku}}</td>
            <td>{{$at->size}}</td>
           
            <td><span class="text-ellipsis"></span></td>
            <td>
           

      <a onclick="return confirm('Bạn có muốn xóa không!')" href="{{asset('admin/product/delete-attributes/'.$at->id)}}" type="button" class="btn btn-danger"  data-target="#exampleModal"><i class="fas fa-backspace"></i>
        Xóa
      </a>

            </td>
          </tr>
        @endforeach   
        </tbody>
      </table>
    </div>
        
</section>
@stop