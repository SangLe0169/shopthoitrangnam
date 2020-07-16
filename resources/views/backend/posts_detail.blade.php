@extends('backend.dashboard')
@section('title','Trang chi tiết bài viết')
@section('contend')
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Chi tiết bài viết
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
  Thêm bài viết
</button>
@include('errors.note')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Thêm bài viết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="form-group">
           <label for="exampleInputName1">Mã bài viết</label>
          <input required type="number" name='mabaiviet' class="form-control" value="" id="exampleInputName"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Tiêu đề bài viết</label>
          <input required type="text" name='tieude' class="form-control" id="exampleInputName"  aria-describedby="nameHelp">
          <label for="exampleInputName1">Nội dung</label>
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
          <label for="exampleInputName1">Nội dung chi tiết</label>
          <textarea class="ckeditor" required name="descriptions"></textarea>
          <script type="text/javascript">
                var editor = CKEDITOR.replace('description',{
                language:'vi',
                filebrowserImageBrowseUrl:'../ckfinder/ckfinder.html?Type=Images',
                filebrowserFlashBrowseUrl:'../ckfinder/ckfinder.html?Type=Flash',
                filebrowserImageUploadUrl:'../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                filebrowserFlashUploadUrl:'../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                });
          </script>
        <label for="exampleInputName1">Hình ảnh</label>
          <input required id="img" type="file" name="img" class="form-control hidden" onchange="changeImg(this)">
		     <img id="avatar" class="thumbnail" width="300px" src="../backend/image/new_seo-10-512.png">
         
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
            <th>Ma bài viết</th>
            <th>Tieu de bai viet</th>
            <th>Nội dung</th>
            <th>Nội dung chi tiết</th>
            <th>Hình ảnh</th>
            
            <th style="width:30px;"></th>
            <th>Tùy chọn</th>
          </tr>
        </thead>
        <tbody>
        @foreach($posdetail as $pd)
          <tr>
          
            <!-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> -->
            <td>{{$pd->posts_id}}</td>
            <td>{{$pd->pos_title}}</td>
            <td>{{$pd->pos_content}}</td>
            <td>{{$pd->pos_content_detail}}</td>
            <td> <img width="200px" src="{{asset('storage/app/avatar/'.$pd->pos_image)}}" class="thumbnail"></td>
            
           
            <td><span class="text-ellipsis"></span></td>
            <td>
            <a href="{{asset('admin/posts_detail/edit/'.$pd->pos_detail)}}"  class="btn btn-success" > <i class="fas fa-tools"></i>
  
</a>
         
  

      <a onclick="return confirm('Bạn có muốn xóa không!')" href="" type="button" class="btn btn-danger"  data-target="#exampleModal">
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