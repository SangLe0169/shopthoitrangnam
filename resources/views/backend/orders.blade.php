@extends('backend.dashboard')
@section('title','Trang đơn hàng')
@section('contend')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Đơn hàng
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
     
@include('errors.note')
<!-- Modal -->

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
            <th>Mã đơn hàng</th>
            <th>Họ khách hàng</th>
            <th>Ten khách hàng</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Thanh toán</th>
            
            <th style="width:30px;"></th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
     @foreach($orders->all() as $order)
          <tr>
          
            <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <td>{{$order->or_id}}</td>
            <td>{{$order->cus_Hokhachhang}}</td>
            <td>{{$order->cus_Tenkhachhang}}</td>
            <td>{{$order->or_Ngaydat}}</td>
            <td>{{$order->or_Tongtien}}</td>
            <td>{{$order->or_Payment}}</td>
           
            <td><span class="text-ellipsis"></span></td>
            <td>
            <a href="{{URL::to('/admin/orders/view/' .$order->or_code )}}"  class="btn btn-success"  > <i class="fas fa-eye"></i></a>
          
         
  

      <a onclick="return confirm('Bạn có muốn xóa không!')" href="{{URL::to('/admin/orders/delete-oder/' .$order->or_id )}}" type="button" class="btn btn-danger"  data-target="#exampleModal">
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