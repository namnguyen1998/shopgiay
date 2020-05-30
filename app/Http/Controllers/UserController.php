<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use DB;
use Sentinel;
use Reminder;
use Mail;
session_start();

class UserController extends Controller
{
   public function AuthLogin(){
        $user_id = Session::get('id');
        if($user_id){
            return Redirect::to('/');
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function getLogin(){
        return view('user.loginuser');
    }
    
    public function saveLogin(Request $request){
       
    	$rules=[
            'email' => 'required',
            'password' => 'required',
        ];

        $message = [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập password',

        ];

        $input = $request->all();

        $validator = \Validator::make($input, $rules, $message);

        if($validator->fails()){
            return redirect::to('/login')->withErrors($validator);
        }
       
    	$result = DB::table('users')->where('email',$input['email'])
        ->where('password',$input['password'])->first();
    	if($result){
    		Session::put('name',$result->name);
    		Session::put('id',$result->id);
    		return Redirect::to('/');
    	}else{
    		Session::put('message','Tài khoản hoặc mật khẩu không đúng');
    		return Redirect::to('/login');
    	}
    }

    public function getRegister(){
        return view('user.register');
    }

    public function saveRegister(Request $request){
       
        $rules=[
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'name' => 'required',
        ];

        $message = [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập password',
            'password_confirmation.required' => 'Vui lòng xác nhận password',
            'password_confirmation.same' => 'Password không khớp',
            'name.required' => 'Vui lòng nhập tên',

        ];

        $input = $request->all();

        $validator = \Validator::make($input, $rules, $message);

        if($validator->fails()){
            return redirect::to('/register')->withErrors($validator);
        }

        $param=[
            'email' => $input['email'],
            'password' => $input['password'],
            'name' => $input['name'],
        ];


        $result = DB::table('users')
                    -> insert($param);
        
    	
            Session::put('message','Đăng ký thành công');
            
    		return Redirect::to('/register');
    	
    }
    public function logout(){
        $this->AuthLogin();
    	Session::forget('name');//,null);
        Session::put('id');
        return Redirect::to('./');
    }

    public function danhsachuser(){
    	$this->AuthLogin();
    	$dsuser = DB::table('chucvu')->join('nhanvien','nhanvien.id_chucvu','=','chucvu.id')->get();
    	$qlydsuser = view('admin.danhsachuser')->with('dsuser',$dsuser);
    	return view('admin')->with('admin.danhsachuser',$qlydsuser);

    }

    public function forgotPassword()
    {
    	return view('user/forgot');
    }

    public function sendMail(Request $request)
    {
        $user = DB::table('users')->where('email',$request->email)->first();

        //print_r($user);exit;
        if(($user)== null){
            return redirect()->back()->with(['Lỗi' => 'Email không có trong hệ thống']);
        }

        $str = \Str::random(32);
        $url = \URL::to('/user/reset_password/'.$user->id.'?key='.$str);
        
        $details = [
            'url' => $url
        ];

        \Mail::to($user->email)->send(new \App\Mail\SendMailForgetPassword($details));
        
        return redirect()->back()->with(['Thành công' => 'Email đã được gửi. Vui lòng kiểm tra mail để cập nhật thông tin.']);
    }

    public function formResetPassword($user_id =null)
    {
        return view('user/resetpassword')->with('user_id', $user_id);
    }


    public function resetPassword(Request $request)
    {
        $rules=[
            'password_new' => 'required',
            'password_new_confirmation' => 'required|same:password_new',
        ];

        $message = [
            'password_new.required' => 'Vui lòng nhập password mới',
            'password_new_confirmation.required' => 'Vui lòng xác nhận password mới',
            'password_new_confirmation.same' => 'Password xác nhận không khớp',

        ];

        $input = $request->all();

        $validator = \Validator::make($input, $rules, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }


        $result = DB::table('users')
                    ->where('id', $input['user_id'])
                    ->update(['password' => $input['password_new']]);
        
    	
            Session::put('message','Cập nhật thành công');
            
            return redirect()->back();
    }


    public function sua_admin(Request $req){
        $quyen = $req->property;
        $id = $req->id;
        echo $id;
        $dsuser = DB::table('nhanvien')->where('id', $id)->update(['roles' => $quyen]);
        if($dsuser){
            Session::put('message','Cập nhật thành công');
        }
        return Redirect::to('danh-sach-user');
    }

}
