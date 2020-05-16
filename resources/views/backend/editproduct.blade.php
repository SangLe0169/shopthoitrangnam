@extends('backend.dashboard')
@section('title','Sửa sản phẩm')
@section('contend')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm</h1>
			</div>
		</div><!--/.row-->
<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Sửa sản phẩm</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Tên sản phẩm</label>
										<input required type="text" name="name" class="form-control" value="{{$product->pro_Tensanpham}}"> 
									</div>
									<div class="form-group" >
										<label>Thương hiệu</label>
										<select required name="thuonghieu" class="form-control">
                                        @foreach($brands as $brand)
											<option value="{{$brand->brand_id}}" @if($product->pro_Thuonghieu==$brand->brand_id)) selected @endif>{{$brand->brand_name}}</option>
										@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Giá</label>
                                        <input required type="number" name="price" class="form-control" value="{{$product->pro_Gia}}">
										
									</div>
									<div class="form-group" >
										<label>Hình ảnh</label>
										<input id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
					                    <img id="avatar" class="thumbnail" width="300px" src="{{asset('storage/app/avatar/'.$product->pro_Hinhanh)}}">
									</div>
									<div class="form-group" >
										<label>Giảm giá</label>
										<input required type="number"  name='giamgia' class="form-control" value="{{$product->pro_Giamgia}}">
									</div>
									<div class="form-group" >
										<label>Khuyến mãi</label>
										<input required type="text" name="promotion" class="form-control" value="{{$product->pro_Khuyenmai}}">
									</div>
									<div class="form-group" >
										<label>Nhóm màu</label>
										<input required type="text" name='nhommau' class="form-control" value="{{$product->pro_Nhommau}}">
									</div>
                    
                                    <div class="form-group" >
										<label>Số lượng</label>
										<input required type="text" name='soluong' class="form-control" value="{{$product->pro_Soluong}}">
									</div>
									<div class="form-group" >
										<label>Kích thước</label>
										<select required name="size" class="form-control">
                                        @foreach($size as $sz)
											<option value="{{$sz->size_id}}" @if($product->pro_Kichthuoc==$sz->size_id)) selected @endif>{{$sz->size_name}}</option>
										@endforeach
					                    </select>
									</div>
                                    <div class="form-group" >
										<label>Mô tả</label>
                                        <textarea class="ckeditor" required name="description">{{$product->pro_Mota}}</textarea>
                                        <script type="text/javascript">
                                                var editor = CKEDITOR.replace('description',{
                                                language:'vi',
                                                filebrowserImageBrowseUrl:'../ckfinder/ckfinder.html?Type=Images',
                                                filebrowserFlashBrowseUrl:'../ckfinder/ckfinder.html?Type=Flash',
                                                filebrowserImageUploadUrl:'../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                                filebrowserFlashUploadUrl:'../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                                });
                                        </script>
									</div>
									<div class="form-group" >
										<label>Trạng thái</label>
										<select required name="trangthai" class="form-control">
											<option value="1" @if($product->pro_Trangthai==1)) checked @endif>Còn hàng</option>
											<option value="0" @if($product->pro_Trangthai==0)) checked @endif>Hết hàng</option>
					                    </select>
									</div>
									<div class="form-group">
									<label for="exampleInputName1">Sản phẩm nổi bật</label><br>
										Có: <input type="radio" name="featured" value ="1" @if($product->pro_featured == 1) selected @endif>
										Không: <input type="radio" checked name ="featured" value="0" @if($product->pro_featured == 0) selected @endif>
									<div>
									
									<div class="form-group" >
										<label>Danh mục</label>
										<select required name="cate" class="form-control">
                                        @foreach($listcate as $cate)
											<option value="{{$cate->cate_id}}" @if($product->pro_cate==$cate->cate_id)) selected @endif>{{$cate->cate_name}}</option>
										@endforeach
					                    </select>
									</div>
									
                                    <div class="modal-footer">
                                    <a href="{{asset('admin/product')}}" type="submit" class="btn btn-danger">Hủy</a>
                                    <button type="submit" class="btn btn-success">Cập nhật</button>
                                </div>
								</div>
							</div>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
        </div>
@stop