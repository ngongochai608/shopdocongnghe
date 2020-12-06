@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
             Thêm bài viết
         </header>
         <?php
         $message = Session::get('message');
         if($message){
            echo '<span class="text-alert">'.$message.'</span>';
            Session::put('message',null);
        }
        ?>
        <div class="panel-body">

            <div class="position-center">
                <form role="form" action="{{URL::to('/save-post')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên bài viết</label>
                        <input type="text" name="post_title" class="form-control" id="exampleInputEmail1" placeholder="Tên bài viết">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" name="post_slug" class="form-control" id="exampleInputEmail1" placeholder="Slug">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tóm tắt bài viết</label>
                        <textarea  name="post_desc" style="resize: none" rows="8" class="form-control" id="ckeditor2" placeholder="Tóm tắt bài viết"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung bài viết</label>
                        <textarea  name="post_content" style="resize: none" rows="8" class="form-control" id="ckeditor" placeholder="Mô tả bài viết"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả bài viết</label>
                        <textarea rows="5" name="post_meta_desc" class="form-control" id="exampleInputEmail1" placeholder="Mô tả bài viết"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Từ khóa bài viết</label>
                        <textarea rows="5" name="post_meta_keywords" class="form-control" id="exampleInputEmail1" placeholder="Mô tả bài viết"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ảnh đại diện</label>
                        <input type="file" name="post_image" class="form-control" id="exampleInputEmail1" placeholder="Ảnh đại diện">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục bài viết</label>
                        <select name="cate_post_id" class="form-control input-sm m-bot15">
                            @foreach($cate_post as $key => $cate)
                            <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Chọn tình trạng</label>
                        <select name="post_status" class="form-control input-sm m-bot15">
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option> 
                        </select>
                    </div>

                    <button type="submit" name="add_post" class="btn btn-info">Thêm</button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection