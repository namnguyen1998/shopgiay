<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đổi mật khẩu</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/login.css')}}">
</head>
<body>
    <div class="hero">
    	<div class="from-box">
    		<div class="button-box">
    			<div id="btn"></div>
    			<button type="button" class="toggle-btn">Đổi mật khẩu</button>
    			
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
    		<form id="login" class="input-group" action="{{URL::to('/reset_password/ss')}}" method="post">@csrf
				<input type="hidden" name="user_id" value={{$user_id}}>
    			<input type="password"  name="password_new" id="password" class="input-field" placeholder="Nhập Mật Khẩu Mới" >
                @if($errors->has('password_new'))
				<p style="font-size: 12px;color: red;}">{!!$errors->first('password_new')!!}</p>
                @endif
				<input type="password"  name="password_new_confirmation" id="password_confirmation" class="input-field" placeholder="Nhập Lại Mật Khẩu Mới" >
                @if($errors->has('password_new_confirmation'))
				<p style="font-size: 12px;color: red;}">{!!$errors->first('password_new_confirmation')!!}</p>
                @endif
    			
                <button type="submit" class="submit-btn"> Đổi mật khẩu</button>
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