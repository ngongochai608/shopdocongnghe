<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Post;
use App\CatePost;
use App\Category;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryPost extends Controller
{
	public function AuthLogin(){
		$admin_id = Auth::id();
		if($admin_id){
			return Redirect::to('dashboard');
		}else{
			return Redirect::to('admin')->send();
		}
	}

    public function add_category_post(){
        $this->AuthLogin();
    	return view('admin.category_post.add_cate_post');
    }
    public function all_category_post(){
        $this->AuthLogin();
        $category_post = CatePost::orderBy('cate_post_id','desc')->paginate(5);

    	return view('admin.category_post.list_cate_post')->with(compact('category_post'));


    }
    public function save_category_post(Request $request){
        $this->AuthLogin();
    	$data = $request->all();
        $category_post = new CatePost();
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
    	
    	Session::put('message','Thêm danh mục bài viết thành công');
    	return Redirect()->back();
    }
    
    public function edit_category_post($edit_category_post_id){
        $this->AuthLogin();
        $category_post = CatePost::find($edit_category_post_id);

        return view('admin.category_post.edit_cate_post')->with(compact('category_post'));
    }

    public function update_category_post(Request $request,$edit_category_post_id){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = CatePost::find($edit_category_post_id);
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
       
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return Redirect::to('all-category-post');
    }

    public function delete_category_post($edit_category_post_id){
        $this->AuthLogin();
        $category_post = CatePost::find($edit_category_post_id);
        $category_post->delete();
        Session::put('message','Xóa danh mục bài viết thành công thành công');
        return Redirect::to('all-category-post');
    }  
}   
