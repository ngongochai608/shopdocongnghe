<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Roles;
use Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function register_auth(){
    	return view('admin.custom_auth.register');
    }

    public function register(Request $request){
    	$this->validation($request);
    	$data = $request->all();
    	$admin = new Admin;
    	$admin->admin_name = $data['admin_name'];
    	$admin->admin_email = $data['admin_email'];
    	$admin->admin_phone = $data['admin_phone'];
    	$admin->admin_password = md5($data['admin_password']);
    	$admin->save();
    	return Redirect('/register-auth')->with('message','Đăng ký thành công !');

    }

    public function validation($request){
    	return $this->validate($request,[
    		'admin_name' => 'required|max:255',
    		'admin_email' => 'required|max:100',
    		'admin_phone' => 'required|max:12',
    		'admin_password' => 'required|max:30',
    	]);
    }

    public function login_auth(){
        return view('admin_login');
    }

    public function login(Request $request){
        $this->validate($request,[
            'admin_email' => 'required|max:100',
            'admin_password' => 'required|max:30'
        ]);
        // $data=$request->all();
        if(Auth::attempt(['admin_email'=>$request->admin_email , 'admin_password'=>$request->admin_password])){
            return Redirect('/dashboard');
        }else{
            return Redirect('/admin')->with('message','Lỗi sai tên đăng nhập hoặc mật khẩu !');
        }
    }

    public function logout_auth(){
        Auth::logout();
        return Redirect('/admin')->with('message','Đã đăng xuất tài khoản authentication thành công !');
    }
}
