<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Admin;
use App\Roles;
use Auth;
use Session;

class UserController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
        $this->AuthLogin();
    	$admin = Admin::with('roles')->orderBy('admin_id','desc')->paginate(5);
    	return view('admin.users.all_users')->with(compact('admin'));
    }

    public function add_users(){
        $this->AuthLogin();
    	return view('admin.users.add_users');
    }

    public function assign_roles(Request $request){
        $this->AuthLogin();
        if (Auth::id()==$request->admin_id) {
            return Redirect::back()->with('message','Bạn đã không được phân quyền cho chính mình !');
        }
    	$data=$request->all();
    	$user=Admin::where('admin_email',$data['admin_email'])->first();
    	$user->roles()->detach();
    	if($request->author_role){
    		$user->roles()->attach(Roles::where('name','author')->first());
    	}
    	if($request->admin_role){
    		$user->roles()->attach(Roles::where('name','admin')->first());
    	}
    	if($request->user_role){
    		$user->roles()->attach(Roles::where('name','user')->first());
    	}
    	return Redirect()->back()->with('message','Cấp quyền thành công');
    }
    public function store_users(Request $request){
        $this->AuthLogin();
    	$data = $request->all();
    	$admin = new Admin();
    	$admin->admin_name = $data['admin_name'];
    	$admin->admin_email = $data['admin_email'];
    	$admin->admin_phone = $data['admin_phone'];
    	$admin->admin_password = md5($data['admin_password']);
    	$admin->save();
    	$admin->roles()->attach(Roles::where('name','user')->first());
    	Session::put('message','Thêm user thành công !');
    	return Redirect::to('users');
    }
    public function delete_user_roles($admin_id){
        $this->AuthLogin();
        if (Auth::id()==$admin_id) {
            return Redirect::back()->with('message','Bạn không được quyền xóa chính mình !');
        }
        $admin = Admin::find($admin_id);
        if($admin){
            $admin->roles()->detach();
            $admin->delete();
        }
        return Redirect::back()->with('message','Bạn đã xóa user thành công !');
    }
}
