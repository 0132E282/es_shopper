<!doctype html>
<html>
<head>
<title>Official Signup Form Flat Responsive widget Template :: w3layouts</title>
<?php require dirname(__DIR__) .'../../../global/global.php'?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript">( addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1);})</script>

<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href=  "<?=$ASSETS_URL ?>/css/font-awesome.min.css" rel="stylesheet">
<link href=  "<?=$ASSETS_URL ?>/css/login.css" rel="stylesheet">
<link href= "<?=$ASSETS_URL ?>/css/modal.css" rel="stylesheet">
</head>
<body>
<h1 class="w3ls">eshop login </h1>
<div class="content-w3ls">
	<div class="content-agile1" >
		<h2 class="agileits1">Official</h2>
		<p class="agileits2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
	</div>
	<div class="content-agile2">
		<form  method="POST"  action="UserController.php?user=login&method=put">
			<div class="form-control w3layouts"> 
				<input type="text" id="firstname" name="username" placeholder="Tên đăng nhập" title="Please enter your First Name" required="">
			</div>
			<div class="form-control agileinfo">	
				<input type="password" class="lock" name="password" placeholder="Mật khẩu " id="password1" required="">
			</div>
			<div class='err'><?=$err ?></div>
			<input type="submit" class="register" value="Đăng Nhập">
		</form>
		<script type="text/javascript">
			window.onload = function () {
				document.getElementById("password1").onchange = validatePassword;
				document.getElementById("password2").onchange = validatePassword;
			}
			function validatePassword(){
				var pass2=document.getElementById("password2").value;
				var pass1=document.getElementById("password1").value;
				if(pass1!=pass2)
					document.getElementById("password2").setCustomValidity("Passwords Don't Match");
				else
					document.getElementById("password2").setCustomValidity('');	 
					//empty string means no validation error
			}
		</script>
		<p class="wthree w3l">Liên kết tài khoảng cá nhân của bạn</p>
		<ul class="social-agileinfo wthree2">
			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa fa-youtube"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
		</ul>
	</div>
	<?php 
	 $titleModal = 'thất bại';
	 $contentModal = 'tên hoạt mật khẩu không đúng';
	 $icon = '<i class="far fa-times-circle"></i>';
	 require dirname(__DIR__) . '../components/modal.php' ?>
	<div class="clear"></div>
</div>
<p class="copyright w3l">© 2017 Official Signup Form. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">W3layouts</a></p>

</body>
</html>