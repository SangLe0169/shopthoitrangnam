@extends('backend.dashboard')
@section('title','Trang chi tiết đơn hàng')
@section('contend')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi tiết đơn hàng
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
            <th>Mã hóa đơn</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng kho</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Kich thước</th>
            <th>Giá</th>
  
            
            <th style="width:30px;"></th>
       
          </tr>
        </thead>
        <tbody>
     @foreach($order_detail->all() as  $order)
          <tr class="color_qty_{{$order->pro_id}}">
          
            <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <td>{{$order->detail_Order}}</td>
            <td>{{$order->pro_Tensanpham}}</td>
            <td>{{$order->pro_Soluong}}</td>
            <td><img width="200px" src="{{asset('storage/app/avatar/'.$order->pro_Hinhanh)}}" class="thumbnail"></td>
            <td><input type="number" min="1" {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$order->pro_id}}" value="{{$order->detail_Soluong}}"  name="product_quantity" style="width: 60px">
            <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$order->pro_id}}" value="{{$order->pro_Soluong}}">
            <input type="hidden" name="order_code" class="order_code" value="{{$order->or_code}}">
            <input type="hidden" name="order_checkout_quantity" class="order_checkout_quantity" value="{{$order->pro_id}}">
            <!-- @if($order_status!=2)
               <button class ="btn btn-default update_quantity_order" data-product_id="{{$order->pro_id}}" name ="update_quantity_order">Cập nhật</button>
            @endif -->
            </td>
          
              <td>{{$order->size_name}}</td>
       
            <td>{{number_format($order->detail_Đonvigia,0,',','.')}} VNĐ</td>
           
            <td><span class="text-ellipsis"></span></td>
         
          </tr>
        @endforeach
       
        <tr>
            <td colspan="6">
          @foreach($orders as $or)
            @if($or->or_Trangthai==1)
    
            <form >
              @csrf
              <select class="form-control order_details">
                  <option value="">----Chọn hình thức----</option>
                  <option id="{{$or->or_id}}" selected value="1">Chưa xử lý</option>
                  <option id="{{$or->or_id}}" value="2">Đã xử lý</option>
                  <option id="{{$or->or_id}}" value="3">Hủy đơn hàng</option>
              </select>
            </form>
            @elseif($or->or_Trangthai==2)
            <form>
            @csrf
              <select class="form-control order_details">
                  <option value="">----Chọn hình thức----</option>
                  <option id="{{$or->or_id}}" value="1">Chưa xử lý</option>
                  <option id="{{$or->or_id}}" selected value="2">Đã xử lý</option>
                  <option id="{{$or->or_id}}" value="3">Hủy đơn hàng</option>
              </select>
            </form>
            @else
            <form>
            @csrf
              <select class="form-control order_details">
                  <option value="">----Chọn hình thức----</option>
                  <option id="{{$or->or_id}}" value="1">Chưa xử lý</option>
                  <option id="{{$or->or_id}}" value="2">Đã xử lý</option>
                  <option id="{{$or->or_id}}" selected value="3">Hủy đơn hàng</option>
              </select>
            </form>
          
       @endif
      
    @endforeach
            </td>
        </tr>

        </tbody>
      </table>
  
      <a href="{{url('admin/orders/print_order/' .$order->or_code)}}">In đơn hàng</a>
        

    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>


@stop