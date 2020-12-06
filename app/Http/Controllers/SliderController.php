<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use DB;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class SliderController extends Controller
{
	public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function unactive_slider($slider_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
        Session::put('message','Hủy hiển thị Slider thành công');
        return Redirect::to('manage-slider');

    }
    public function active_slider($slider_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>0]);
        Session::put('message','Kích hoạt hiển thị Slider thành công');
        return Redirect::to('manage-slider');

    }

    public function manager_slider(){
        $this->AuthLogin();
    	$all_slider = Slider::orderBy('slider_id','desc')->paginate(4);
    	return view('admin.slider.list_slider')->with(compact('all_slider'));
    }

    public function add_slider(){
        $this->AuthLogin();
    	return view('admin.slider.add_slider');
    }

    public function insert_slider(Request $request){
        $this->AuthLogin();
    	$data = $request->all();  	
        $get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);

            $slider = new Slider();
            $slider->slider_name=$data['slider_name'];
            $slider->slider_image=$new_image;
            $slider->slider_status=$data['slider_status'];
            $slider->slider_desc=$data['slider_desc'];
            $slider->save();
            Session::put('message','Thêm slider thành công');
            return Redirect::to('add-slider');
        }else{
        	Session::put('mesage','Bạn chưa thêm hình ảnh slider !');
        	return Redirect::to('add_slider');
        }
    	
    }
        public function delete_slider($slider_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
        Session::put('message','Xóa Slider thành công');
        return Redirect::to('manage-slider');
    }
}
