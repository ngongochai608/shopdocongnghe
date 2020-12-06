@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tiêu đề</th>
            <th>Ảnh đại diện</th>
            <th>Tóm tắt bài viết</th>
            <th>Từ khóa</th>
            <th>Thuộc danh mục</th>
            <th>Tình trạng</th>
            
            <th colspan="2"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($list_post as $key => $all_post)
          <tr>
            <td>{{ $all_post->post_title }}</td>
            <td><img src="public/uploads/post/{{ $all_post->post_image }}" height="100" width="100"></td>
            <td>{{ $all_post->post_meta_desc }}</td>
            <td>{{ $all_post->post_meta_keywords }}</td>
            <td>{{ $all_post->cate_post_id }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($all_post->post_status==0){
                ?>
                <a href="{{URL::to('/unactive-post/'.$all_post->post_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-post/'.$all_post->post_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
           
            <td>
              <a href="{{URL::to('/edit-post/'.$all_post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                <i style="color: white;" class="btn btn-success btn-xs fa fa-pencil-square-o text-success text-active"> Sửa</i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-post/'.$all_post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                <i style="color: white;" class="btn btn-danger btn-xs fa fa-times text-danger text"> Xóa</i>
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
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$list_post->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection