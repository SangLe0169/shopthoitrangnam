@extends('backend.dashboard')
@section('title','Sửa khách hàng')
@section('contend')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Khách hàng</h1>
			</div>
		</div><!--/.row-->
<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Sửa Khách hàng</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Họ khách hàng</label>
										<input required type="text" name="fname" class="form-control" value="{{$customer->cus_Hokhachhang}}"> 
									</div>
									<div class="form-group" >
										<label>Tên khách hàng</label>
										<input required type="text"  name='lname' class="form-control" value="{{$customer->cus_Tenkhachhang}}">
									</div>
									<div class="form-group" >
										<label>Số điện thoại</label>
                                        <input required type="number" name="number" class="form-control" value="{{$customer->cus_Sodienthoai}}">
										
									</div>
									<div class="form-group" >
										<label>Địa chỉ</label>
                                        <input required type="text" name="diachi" class="form-control" value="{{$customer->cus_Diachi}}">
										
									</div>
									
				
									
                                    <div class="modal-footer">
                                    <a href="{{asset('admin/customer')}}" type="submit" class="btn btn-danger">Hủy</a>
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