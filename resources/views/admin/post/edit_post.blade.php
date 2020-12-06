@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật bài viết
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
                                @foreach($post as $key => $edit_post)
                                <form role="form" action="{{URL::to('/update-post/'.$edit_post->post_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" name="post_title" class="form-control" id="exampleInputEmail1" value="{{$edit_post->post_title}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="post_slug" class="form-control" id="exampleInputEmail1" value="{{$edit_post->post_slug}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tóm tắt bài viết</label>
                                    <textarea id="ckeditor" name="post_desc" class="form-control" id="exampleInputEmail1">{{$edit_post->post_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nội dung bài viết</label>
                                    <textarea id="ckeditor2" name="post_content" class="form-control" id="exampleInputEmail1">{{$edit_post->post_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả bài viết</label>
                                    <textarea name="post_meta_desc" class="form-control" id="exampleInputEmail1">{{$edit_post->post_meta_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Từ khóa bài viết</label>
                                    <textarea name="post_meta_keywords" class="form-control" id="exampleInputEmail1">{{$edit_post->post_meta_keywords}}</textarea>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Ảnh đại diện</label>
                                    <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/post/'.$edit_post->post_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục bài viết</label>
                                    <select name="cate_post_id" class="form-control input-sm m-bot15">
                                        @foreach($cate_post as $key => $cate)
                                        @if($cate->cate_post_id==$edit_post->cate_post_id)
                                        <option selected value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                        @else
                                        <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                        @endif
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="post_status" class="form-control input-sm m-bot15">
                                            @if($edit_post->post_status==0)
                                            <option selected value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            @else
                                            <option value="0">Hiển thị</option>
                                            <option selected value="1">Ẩn</option>
                                            @endif
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="update_post" class="btn btn-info">Cập nhật</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection