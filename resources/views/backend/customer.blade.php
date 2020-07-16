@extends('backend.dashboard')
@section('title','Trang khách hàng')
@section('contend')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Khách hàng
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
      <!-- <div class="col-sm-3">
      <button type="button" class="btn btn-success" data-toggle="modal"  data-target="#exampleModal">
      <i class="fas fa-plus"></i>
  Thêm khách hàng
</button> -->
@include('errors.note')
<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Thêm khách hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
      <form method="post">
      {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputName1">Họ khách hàng</label>
          <input required type="text" name='fname' class="form-control" id="exampleInputName"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Tên khách hàng</label>
          <input required type="text" name='lname' class="form-control" id="exampleInputName"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Số điện thoại</label>
          <input required type="number" name='number' class="form-control" id="exampleInputName"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Địa chỉ</label>
          <input required type="text" name='diachi' class="form-control" id="exampleInputName"  aria-describedby="nameHelp">
        </div>
      
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i></button>
      </div>
  </form>
      </div> 
     
    </div>
  </div>
</div>
      </div>-->
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
            <th>Họ khách hàng</th>
            <th>Ten khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            
            <th style="width:30px;"></th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
        @foreach($cuslist as $customer)
          <tr>
          
            <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <td>{{$customer->cus_Hokhachhang}}</td>
            <td>{{$customer->cus_Tenkhachhang}}</td>
            <td>{{$customer->cus_Sodienthoai}}</td>
            <td>{{$customer->cus_Diachi}}</td>
           
            <td><span class="text-ellipsis"></span></td>
            <td>
            <a href="{{asset('admin/customer/edit/'.$customer->cus_id)}}"  class="btn btn-success" > <i class="fas fa-tools"></i>
  
</a>
         
  

      <a onclick="return confirm('Bạn có muốn xóa không!')" href="{{asset('admin/customer/delete/'.$customer->cus_id)}}" type="button" class="btn btn-danger"  data-target="#exampleModal">
      <i class="fas fa-backspace"></i>
        
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