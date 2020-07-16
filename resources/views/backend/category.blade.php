@extends('backend.dashboard')
@section('title','Trang danh mục sản phẩm')
@section('contend')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh mục sản phẩm
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <!-- <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button> -->
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-times"></i>
  Thêm danh mục
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @include('errors.note')
      <form method="post">
      {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputName1">Tên danh mục</label>
          <input required type="text" name='name' class="form-control" id="exampleInputName"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Từ khóa danh mục</label>
          <input required type="text" name='meta_keywords' class="form-control" id="exampleInputName"  aria-describedby="nameHelp">
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
            <th>Tên danh mục</th>
            
            <th style="width:30px;"></th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
        @foreach($catelist as $cate)
          <tr>
          
            <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <td>{{$cate->cate_name}}</td>
           
            <td><span class="text-ellipsis"></span></td>
            <td>
            <a href="{{asset('admin/category/edit/'.$cate->cate_id)}}"  class="btn btn-success" > <i class="fas fa-tools"></i><span class="glyphicon glyphicon-edit"></span>
  Sửa
</a>
         
  

      <a onclick="return confirm('Bạn có muốn xóa không!')" href="{{asset('admin/category/delete/'.$cate->cate_id)}}" type="button" class="btn btn-danger"  data-target="#exampleModal"><i class="fas fa-backspace"></i>
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
        <!-- <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div> -->
      </div>
    </footer>
  </div>
</div>
</section>
@stop