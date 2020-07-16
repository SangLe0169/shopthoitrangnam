@extends('backend.dashboard')
@section('title','Sản phẩm')
@section('contend')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       Sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <!-- <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                 -->
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-times"></i>
  Thêm sản phẩm
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @include('errors.note')
      <form method="post" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputName1">Tên sản phẩm</label>
          <input required type="text" name='name' class="form-control"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Thương hiệu</label>
          <select required name="thuonghieu" class="form-control">
           @foreach($brand as $brands)
             <option value ="{{$brands->brand_id}}">{{$brands->brand_name}}</option>
            @endforeach
          </select>
          <label for="exampleInputName1">Giá</label>
          <input required type="number" name='price' class="form-control"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Hình ảnh</label>
					<input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					    <img id="avatar" class="thumbnail" width="300px" src="../backend/image/new_seo-10-512.png">
          <label for="exampleInputName1">Giảm giá</label>
          <input required type="number" name='giamgia' class="form-control"   aria-describedby="nameHelp">
          <label for="exampleInputName1">Khuyến mãi</label>
          <input required type="text" name='promotion' class="form-control"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Màu</label>
          <input required type="text" name='nhommau' class="form-control"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Kích thước</label>
          <select required name="size" class="form-control">
           @foreach($size as $sz)
             <option value ="{{$sz->size_id}}">{{$sz->size_name}}</option>
            @endforeach
          </select>
          <label for="exampleInputName1">Số lượng</label>
          <input required type="number" name='soluong' class="form-control"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Mô tả</label>
          <textarea class="ckeditor" required name="description"></textarea>
          <script type="text/javascript">
                var editor = CKEDITOR.replace('description',{
                language:'vi',
                filebrowserImageBrowseUrl:'../ckfinder/ckfinder.html?Type=Images',
                filebrowserFlashBrowseUrl:'../ckfinder/ckfinder.html?Type=Flash',
                filebrowserImageUploadUrl:'../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl:'../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                });
          </script>
          <label for="exampleInputName1">Trạng thái</label>
            <select required name="trangthai" class="form-control">
                <option value="1">Còn hàng</option>
                <option value="0">Hết hàng</option>
            </select>
          <label for="exampleInputName1">Danh mục</label>
          <select required name="cate" class="form-control">
           @foreach($catelist as $cate)
             <option value ="{{$cate->cate_id}}">{{$cate->cate_name}}</option>
            @endforeach
          </select>
          <label for="exampleInputName1">Sản phẩm nổi bật</label><br>
             Có: <input type="radio" name="featured" value ="1">
             Không: <input type="radio" checked name ="featured" value="0">
        </div>
      
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success"><i class="fas fa-times"></i>Save changes</button>
      </div>
  </form>
      </div>
     
    </div>
  </div>
</div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <!-- <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th> -->
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Thương hiệu</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
    @foreach($productlist as $product)
    
          <tr>
            <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <td>{{$product->pro_id}}</td>
            <td>{{$product->pro_Tensanpham}}</td>
            <td>{{$product->brand_name}}</td>
            <td>{{$product->pro_Soluong}}</td>
            <td>{{number_format($product->pro_Gia,0,',','.')}}$</td>
            <td>
              <img width="200px" src="{{asset('storage/app/avatar/'.$product->pro_Hinhanh)}}" class="thumbnail">
            </td>
            <td>{{$product->cate_name}}</td>
            <td><span class="text-ellipsis"></span></td>
            <td><span class="text-ellipsis"></span></td>
            <td>
            <a href="{{asset('admin/product/edit/'.$product->pro_id)}}"  class="btn btn-success" ><span class="glyphicon glyphicon-edit"></span><i class="fas fa-tools"></i>
  Sửa
</a>
         
  

      <a onclick="return confirm('Bạn có muốn xóa không!')" href="{{asset('admin/product/delete/'.$product->pro_id)}}" type="button" class="btn btn-danger"  data-target="#exampleModal"><i class="fas fa-backspace"></i>
        Xóa
      </a>

            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <!-- <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul> -->
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
@stop