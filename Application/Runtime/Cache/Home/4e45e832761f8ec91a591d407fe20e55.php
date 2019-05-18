<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登陆页面</title>
<link rel="stylesheet" href="/Public/bs3.7/css/bootstrap.css">
<script src="/Public/bs3.7/js/jquery.min.js"></script>
<script src="/Public/bs3.7/js/bootstrap.min.js"></script>
<script src="/Public/bs3.7/js/docs.min.js"></script>
<style type="text/css">
	.blank-bar{
		height: 100px;
	}
	.img-height{
		height: 382px;
	}
	#color{
		color: red;
	}
</style>
</head>
<body>

<div class="container">
	<h1 class="page-header"><b>文学中文网</b></h1>
	<div class="blank-bar"></div>
	<div class="col-md-6"><img src="/Public/Admin/Img/loginBg.jpg" class="img-rounded img-height"></div>
	<div class="col-md-5 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading"><p class="lead text-center">读者登陆</p></div>
			<div class="panel-body">
			<div class="col-md-1 "></div>
			<div class="col-md-10 ">
				<form action="/index.php/Home/Login/readerLogin" method="post">
				<div class="form-group input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input type="text" class="form-control" name="phone" placeholder="手机号">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-lock"></span>
					</span>
					<input type="password" class="form-control" name="password" placeholder="密码">
				</div>
				 <div style="height:50px">
				<div class="col-md-4"></div>
				
				<div class="col-md-4 col-md-offset-4"><a href="/index.php/Home/Login/registerReader" target="_blank">注册用户</a></div>
				</div>
				<input type="submit" class="btn btn-danger btn-block" value="登陆">
				<h4 id="color" class="text-center well">&nbsp;<?php echo ($hint); ?></h4>
			</form>
			</div>
			
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</div>
</body>
</html>