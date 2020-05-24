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
    			<button type="button" class="toggle-btn">Đăng nhập</button>
    			
    		</div>
    		<div class="social-icons">
				<a href="{{ Route('redirect', ['facebook']) }}">
					<img src="{{URL::to('public/frontend/images/icons/fb.png')}}"></a>
				<a href="{{ Route('redirect', ['google']) }}">
	    			<img src="{{URL::to('public/frontend/images/icons/gp.png')}}"></a>
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
    			<input type="text" class="input-field" name="email" placeholder="Nhập email" >
				@if($errors->has('email'))
				<p style="font-size: 12px;color: red;}">{!!$errors->first('email')!!}</p>
                @endif
    			<input type="password" class="input-field" name="password" placeholder="Nhập Mật Khẩu" >
				@if($errors->has('password'))
				<p style="font-size: 12px;color: red;}">{!!$errors->first('password')!!}</p>
                @endif
    			<input type="checkbox" class="chech-box"><span>Nhớ Mật Khẩu</span>
    			<button type="submit" name="login" class="submit-btn"> Đăng Nhập</button>
    		</form>
    		
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