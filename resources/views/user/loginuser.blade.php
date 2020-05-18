<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login and Registration</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/login.css')}}">
</head>
<body>
    <div class="hero">
    	<div class="from-box">
    		<div class="button-box">
    			<div id="btn"></div>
    			<button type="button" class="toggle-btn" onclick="login()">Log In</button>
    			<button type="button" class="toggle-btn" onclick="register()">Register</button>
    		</div>
    		<div class="social-icons">
	    		<img src="{{URL::to('public/frontend/images/icons/fb.png')}}">
	    		<img src="{{URL::to('public/frontend/images/icons/gp.png')}}">
	    		<img src="{{URL::to('public/frontend/images/icons/tw.png')}}">
    		</div>
			<?php
                            $message = Session::get('message'); 
                            if($message){
                                echo '<div style="margin-left: 44px;color: red;font-weight: bold;font-size: 15px;">'.$message.'</div>';
                                Session::put('message',null);
                            }
                        ?>
    		<form id="login" class="input-group" action="{{URL::to('/login/ss')}}" method="post">@csrf
    			<input type="text" class="input-field" name="username" placeholder="Tên Tài Khoản" required>
    			<input type="password" class="input-field" name="password" placeholder="Nhập Mật Khẩu" required>
    			<input type="checkbox" class="chech-box"><span>Nhớ Mật Khẩu</span>
    			<button type="submit" name="login" class="submit-btn"> Đăng Nhập</button>
    		</form>
    		<form id="register" class="input-group">
    			<input type="text" class="input-field" placeholder="Tên Tài Khoản" required>
    			<input type="email" class="input-field" placeholder="Nhập Email" required>
    			<input type="text" class="input-field" placeholder="Nhập Mật Khẩu" required>
    			<input type="checkbox" class="chech-box"><span>Tôi đồng ý với điều khoản</span>
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