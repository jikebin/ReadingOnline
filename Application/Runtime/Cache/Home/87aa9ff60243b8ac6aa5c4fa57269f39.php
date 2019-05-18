<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>注册页面</title>
<link rel="stylesheet" href="/Public/bs3.7/css/bootstrap.css">
<script src="/Public/bs3.7/js/jquery.min.js"></script>
<script src="/Public/bs3.7/js/bootstrap.min.js"></script>
<script src="/Public/bs3.7/js/docs.min.js"></script>
<style type="text/css">
	.blank-bar{
		height: 100px;
	}
	.form-group{
		margin-bottom: 30px;
	}
</style>
</head>
<body>
<script type="text/javascript">
	$(function(){
		//获取验证码对象
		$("#captcha").on("click",function(){
			this.src = '/index.php/Home/Login/captcha';
		});
		//验证手机号只能输入数字
		$("#phone").on("keyup",function(){
			this.value = this.value.replace(/\D/g,'');
		});
		//提交按钮
		$("#sub").on("click",function(){
			//获取手机号、验证码、密码1和密码2的值
			var phone = $("#phone").val();
			var captcha = $("#cap").val();
			var psw1 = $("#psw1").val();
			var psw2 = $("#psw2").val();
			if(phone.length ==0){
				alert('手机号不能为空');
				return false;
			}else if(captcha.length == 0){
				alert('验证码不能为空');
				return false;
			}else if(psw1.length == 0 || psw2.length==0){
				alert("密码不能为空");
				return false;
			}else if(psw1 != psw2){
				alert("密码不一致");
				return false;
			}else{
				$("form").submit();
			}
		});
		
	});
</script>
<div class="container">
	<h1><b>文学中文网</b></h1>
	<div class="blank-bar"></div>
	<div class="row">
	<!-- 下是方面的导航条部分-- -->
	<div class="col-md-4 col-md-offset-4">
		<ul class="nav nav-tabs">
				<li  class="active"><a href="#regist" data-toggle="tab" class="lead">填写注册信息</a></li>
				<li ><a href="#success"  class="lead"><span class="glyphicon glyphicon-ok"></span>注册成功</a></li>
		</ul>
	</div>
	</div>
	<hr>
	<div class="row">
	<div class="col-md-6 col-md-offset-3">
		
		<div class="tab-content">
			<div id="regist" class="tab-pane active">
			<form action="/index.php/Home/Login/registerWriter" method="post" class="form-horizontal">
				<div class="form-group">
					<label  class="col-sm-2">手机号</label>
					<div  class="col-sm-8">
					<input id="phone" class="form-control" name="phone" type="text" placeholder="请输入手机号">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2">验证码</label>
					<div  class="col-sm-5">
						<input class="form-control" id="cap" name="captcha" type="text" placeholder="输入右侧验证码">
					</div>
					<div  class="col-sm-5">
						<img src="/index.php/Home/Login/captcha" id="captcha">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2">密码</label>
					<div  class="col-sm-8">
					<input class="form-control" id="psw1"  type="password" placeholder="请输入密码">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2">确认密码</label>
					<div  class="col-sm-8">
					<input class="form-control" id="psw2" name="password"  type="password" placeholder="再次确认密码">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2"></div>
					<label>我已阅读并同意《用户服务协议》</label>
					
				</div>
				<div class="form-group">
				<div class="col-sm-2"></div>
					<label class="col-sm-8">
						<button id="sub" class="btn btn-danger btn-block btn-lg">立即注册</button>
					</label>
					
				</div>
			</form>
			</div>
			<div id="success" class="tab-pane fade">
			成功</div>
		</div>
	</div>
	</div>















</div>
</body>
</html>