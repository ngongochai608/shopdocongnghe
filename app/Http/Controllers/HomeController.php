<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\CatePost;
use App\Brand;
use App\Category;
use Mail;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function send_mail(){
         //send mail
                $to_name = "Ngọc Hải";
                $to_email = "ngongochai608@gmail.com";//send to this email
               
             
                $data = array("name"=>"Mail từ tài khoản Khách hàng","body"=>'Mail gửi về vấn về hàng hóa'); //body of mail.blade.php
                
                Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){

                    $message->to($to_email)->subject('Test thử gửi mail google');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail

                });
                // return redirect('/')->with('message','');
                //--send mail
    }

    public function index(Request $request){
        //slider
        $slider = Slider::orderBy('slider_id','desc')->where('slider_status','0')->take(4)->get();


        //seo 
        $meta_desc = "Chuyên bán đồ công nghệ cao cấp chính hãng 100%"; 
        $meta_keywords = "di dong shop , điện thoại chính hãng , điên thoại chất lượng";
        $meta_title = "Didongshop.com | Sản phẩm chính hãng";
        $url_canonical = $request->url();
        //--seo
        
    	$cate_product = Category::orderBy('category_id','desc')->where('category_status','0')->get();
        $brand_product = Brand::orderBy('brand_id','desc')->where('brand_status','0')->get(); 
        $category_post = CatePost::orderBy('cate_post_id','desc')->get();
        
        $category_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')->get();
        $category_name = DB::table('tbl_category_product')->get();


         $all_product = DB::table('tbl_product')->where('product_status','0')->paginate(9); 

    	return view('pages.home')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('all_product',$all_product)
        ->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)
        ->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)
        ->with('slider',$slider)
        ->with('category_product',$category_product)
        ->with('category_name',$category_name)
        ->with('category_post',$category_post);
    }
    public function search(Request $request){
        //seo 
        $meta_desc = "Tìm kiếm sản phẩm"; 
        $meta_keywords = "Tìm kiếm sản phẩm";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //--seo
        $keywords = $request->keywords_submit;
        $category_post = CatePost::orderBy('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 


        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('category_post',$category_post);

    }
}
