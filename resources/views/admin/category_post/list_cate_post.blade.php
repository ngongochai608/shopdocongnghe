@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục bài viết
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
            <th>Thứ tự</th>
            <th>Tên danh mục</th>
            <th>Slug</th>
            <th>Mô tả</th>
            <th>Hiển thị</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 0;
          @endphp
          @foreach($category_post as $key => $cate_post)
          @php
              $i++;
          @endphp
          <tr>
            <td>{{$i}}</td>
            <td>{{ $cate_post->cate_post_name }}</td>
            <td>{{ $cate_post->cate_post_slug }}</td>
            <td>{{ $cate_post->cate_post_desc }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($cate_post->cate_post_status==0){
                ?>
                <a href="{{URL::to('/unactive-category-post/'.$cate_post->cate_post_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-category-post/'.$cate_post->cate_post_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
           
            <td>
              <a href="{{URL::to('/edit-category-post/'.$cate_post->cate_post_id)}}" class="active styling-edit" ui-toggle-class="">
                <i style="color: white;" class="btn btn-success btn-xs fa fa-pencil-square-o text-success text-active"> Sửa</i></a>
                &ensp;&ensp;&ensp;&ensp;
              <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục bài viết này này ko?')" href="{{URL::to('/delete-category-post/'.$cate_post->cate_post_id)}}" class="active styling-edit" ui-toggle-class="">
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
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$category_post->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection