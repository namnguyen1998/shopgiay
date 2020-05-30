<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login and Registration</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/login1.css')}}">
</head>
<body>
    <div class="hero">
    	<div class="from-box">
    		<div class="button-box">
    			<div id="btn"></div>
    			<button type="button" class="toggle-btn">Đăng ký</button>
    			
    		</div>
    		<div class="social-icons">
	    		<img src="{{URL::to('public/frontend/images/icons/fb.png')}}">
	    		<img src="{{URL::to('public/frontend/images/icons/gp.png')}}">
	    		<img src="{{URL::to('public/frontend/images/icons/tw.png')}}">
    		</div>
            <?php
                            $message = Session::get('message'); 
                            if($message){
                                echo '<div style="margin-left: 44px;color: green;font-weight: bold;font-size: 15px;">'.$message.'</div>';
                                Session::put('message',null);
                            }
                        ?>
    		<form id="login" class="input-group" action="{{URL::to('/register/ss')}}" method="post">@csrf
            <input type="email" name="email" id="email" class="input-field" placeholder="Nhập Email" >
                @if($errors->has('email'))
				<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('email')!!}</p>
                @endif
    			<input type="password"  name="password" id="password" class="input-field" placeholder="Nhập Mật Khẩu" >
                @if($errors->has('password'))
				<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('password')!!}</p>
                @endif
				<input type="password"  name="password_confirmation" id="password_confirmation" class="input-field" placeholder="Nhập Lại Mật Khẩu" >
                @if($errors->has('password_confirmation'))
				<p style="position:absolute;font-size: 12px;color: red;margin-left:120px;margin-top:-10%;}">{!!$errors->first('password_confirmation')!!}</p>
                @endif
                <input type="text" name="name" id="name" class="input-field" placeholder="Nhập Tên Người Dùng" >
    			@if($errors->has('name'))
				<p style="position:absolute;font-size: 12px;color: red;margin-left:150px;margin-top:-10%;}">{!!$errors->first('name')!!}</p>
                @endif
                <input type="checkbox" checked="checked" class="chech-box"><span>Tôi đồng ý với điều khoản</span>
    			
                <button type="submit" class="submit-btn"> Đăng Ký</button>
    		</form>
    	</div>
    </div>
   <script>
   	var x=document.getElementById("login");
	var y=document.getElementById("register");
	var z=document.getElementById("btn");

	function register(){
    x.style.left="-400px";
    y.style.left="50px";
    z.style.left="100px";
	}
    function login(){
    x.style.left="50px";
    y.style.left="450px";
    z.style.left="0";
}
   </script>
</body>
</html>