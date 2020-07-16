@extends('backend.dashboard')
@section('title','Phí vận chuyển')
@section('contend')
  <section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Phí vận chuyển
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
      <button type="button" class="btn btn-success" data-toggle="modal"  data-target="#exampleModal">
      <i class="fas fa-plus"></i>
  Thêm phí vận chuyển
</button>
@include('errors.note')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <label for="exampleInputName1">Chọn thành phố</label>
          <select required name="city" id="city" class="form-control choose city">
          <option value ="">--Chọn tỉnh thành phố--</option>
        @foreach($thanhpho as $ci)
             
             <option value ="{{$ci->matp}}">{{$ci->name_city}}</option>
        @endforeach
  
          </select>
          <label for="exampleInputName1">Chọn quận huyện</label>
          <select required name="province" id="province" class="form-control province choose">
        
             <option value ="">--Chọn quận huyện--</option>
  
          </select>
          <label for="exampleInputName1">Chọn xã phường</label>
          <select required name="wards" id="wards" class="form-control wards">
        
             <option value ="">--Chọn xã phường--</option>
  
          </select>
          <label for="exampleInputName1">Phí vận chuyển</label>
          <input required type="text" name='fee_ship' class="form-control fee_ship" id="exampleInputName"  aria-describedby="nameHelp">
        </div>
      
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i></button>
        <button type="button" name="add_delivery" class="btn btn-success add_delivery"><i class="fas fa-save"></i></button>
      </div>
  </form>
      </div>
     
    </div>
  </div>
</div>
      </div>
    </div>
    <div class="table-responsive" id="load_delivery">
      
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
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