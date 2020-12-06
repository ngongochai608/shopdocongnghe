<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\CatePost;
use App\Post;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class PostController extends Controller
{
     public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_post(){
        $this->AuthLogin();
        $cate_post = CatePost::orderBy('cate_post_id','desc')->get(); 
        return view('admin.post.add_post')->with(compact('cate_post'));
    }
    public function save_post(Request $request){
        $this->AuthLogin();
    	$data = $request->all();
    	$post = new Post();

 		$post->post_title = $data['post_title'];
 		$post->post_desc = $data['post_desc'];
        $post->post_slug = $data['post_slug'];
 		$post->post_content = $data['post_content'];
 		$post->post_meta_desc = $data['post_meta_desc'];
 		$post->post_meta_keywords = $data['post_meta_keywords'];
 		$post->post_status = $data['post_status'];
 		$post->cate_post_id = $data['cate_post_id'];


        $get_image = $request->file('post_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            $post->post_image = $new_image;
            $post->save();
            Session::put('message','Thêm bài viết thành công');
            return Redirect()->back();
        }else{
        	Session::put('message','Làm ơn thêm ảnh đại diện cho bài viết');
        	return Redirect()->back();
        }
    }


    public function list_post(){
        $this->AuthLogin();
        $list_post = Post::orderBy('post_id')->paginate(10);
    	return view('admin.post.list_post')->with(compact('list_post'));
    }
    
    public function active_post($post_id){
         $this->AuthLogin();
        $post = Post::find($post_id);
        $post->post_status = 0;
        $post->save();
        Session::put('message','Đã hiển thị bài viết thành công');
        return Redirect()->back();
    }


    public function unactive_post($post_id){
         $this->AuthLogin();
        $post = Post::find($post_id);
        $post->post_status = 1;
        $post->save();
        Session::put('message','Đã ẩn bài viết thành công');
        return Redirect()->back();
    }

    public function edit_post($post_id){
        $this->AuthLogin();
        $post = Post::where('post_id',$post_id)->get();
        $cate_post = CatePost::orderBy('cate_post_id','desc')->get(); 
        return view('admin.post.edit_post')->with(compact('post','cate_post'));
    }
    public function update_post(Request $request,$post_id){
        $this->AuthLogin();
        $data = $request->all();
        $post = Post::find($post_id);
        $post->post_title = $data['post_title'];
        $post->post_desc = $data['post_desc'];
        $post->post_slug = $data['post_slug'];
        $post->post_content = $data['post_content'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_meta_keywords = $data['post_meta_keywords'];
        $post->post_status = $data['post_status'];
        $post->cate_post_id = $data['cate_post_id'];

        $get_image = $request->file('post_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            $post->post_image = $new_image;
            $post->save();
            Session::put('message','Update bài viết thành công');
            return Redirect::to('/list-post');
        }else{
            $post->save();
            Session::put('message','Update bài viết thành công');
            return Redirect::to('/list-post');
        }
    }
    public function delete_post($post_id){
        $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;
        if($post_image){
            $path = 'public/uploads/post/'.$post_image;
            unlink($path);
        }
        $post->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect()->back();
    }


     public function danh_muc_bai_viet(Request $request,$post_slug){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $category_post = CatePost::orderBy('cate_post_id','desc')->get();
        $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get(); 
        foreach($catepost as $key => $cate) {
            //seo 
            $meta_desc = $cate->cate_post_desc; 
            $meta_keywords = $cate->cate_post_slug;
            $meta_title = $cate->cate_post_name;
            $cate_id = $cate->cate_post_id;
            $url_canonical = $request->url();
        //--seo
       }
        $post = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_id)->paginate(3);

        return view('pages.baiviet.danhmucbaiviet')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('post',$post)->with('category_post',$category_post);
    }

    public function show_bai_viet(Request $request,$post_slug){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $category_post = CatePost::orderBy('cate_post_id','desc')->get();
        $post = Post::with('cate_post')->where('post_status',0)->where('post_slug',$post_slug)->take(1)->get();
        foreach($post as $key => $p) {
            //seo 
            $meta_desc = $p->post_meta_desc; 
            $meta_keywords = $p->post_meta_keywords;
            $meta_title = $p->post_title;
            $cate_id = $p->cate_post_id;
            $url_canonical = $request->url();
            $cate_post_id = $p->cate_post_id;
        //--seo
       }
       $related = Post::with('cate_post')->where('post_status',0)->where('cate_post_id',$cate_post_id)->whereNotIn('post_slug',[$post_slug])->take(5)->get();

        return view('pages.baiviet.showbaiviet')->with('category',$cate_product)->with('brand',$brand_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('post',$post)->with('category_post',$category_post)->with('related',$related);
    }
}
