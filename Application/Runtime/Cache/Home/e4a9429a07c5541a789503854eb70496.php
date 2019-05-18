<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>我的导航条页面</title>
<link rel="stylesheet" href="/Public/bs3.7/css/bootstrap.css">
<script src="/Public/bs3.7/js/jquery.min.js"></script>
<script src="/Public/bs3.7/js/bootstrap.min.js"></script>
<script src="/Public/bs3.7/js/docs.min.js"></script>
<style type="text/css">
	body{
		padding-top: 110px;
		background-color: #F6F5EE;
	}
</style>
</head>
<body>

	<nav class="navbar navbar-default navbar-fixed-top well">
	<div class="container ">
		<!-- 导航头部 -->
		<div class="navbar-header">
			 <a class="navbar-brand" href="/index.php/Home/Index/index">文学中文网</a>
			 <button class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
			 	<span class="icon-bar"></span>
			 	<span class="icon-bar"></span>
			 	<span class="icon-bar"></span>
			 </button>
		</div>
		<!-- 合并区部分 -->
		<div id="mynavbar" class="collapse navbar-collapse">
				<!-- 导航体部分 -->
				<ul class="nav navbar-nav">
					<li class=""><a href="/index.php/Home/Index/index">首页</a></li>
					<li><a href="javascript:;" data-toggle="modal" data-target="#login">我的</a></li>
					<li><a href="#">作者专区</a></li>
				</ul>
				<!-- form表单搜索部分  -->
				<form action="#" class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" class="form-control" placeholder="穷查理宝典">
		        </div>
		        <button type="submit" class="btn btn-danger">
		        	<span class="glyphicon glyphicon-search"></span>
		        </button>
		      </form>
		    
		      
		     <!-- ----------按钮下拉菜单测试开始------------------ -->
		     	<div class="btn-group navbar-right">
				  <button type="button" class="btn btn-default dropdown-toggle navbar-btn" data-toggle="dropdown">
				    图书分类 <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu">
				    <li><a href="#">小说</a></li>
				    <li class="divider"></li>
				    <li><a href="#">成功励志</a></li>
				    <li class="divider"></li>
				    <li><a href="#">历史传记</a></li>
				    <li class="divider"></li>
				    <li><a href="#">计算机</a></li>
				  </ul>
				</div>
		     <!-- ----------按钮下拉菜单测试结束------------------ -->
		       <!-- 分类下拉菜单 -->
		    
		      
		      <!-- ---------------- -->
		</div>
	</div>
	</nav>
<!-- ------------------------登陆页面----------------------------------------- -->
	<div id="login" class="modal fade ">
	<div class="modal-dialog ">
	<div class="modal-content">
		<div class="modal-header">
			<div class="close" data-dismiss="modal">&times;</div>
			<h3 class="">文学中文网</h3>
			
		</div>
		<div class="modal-body">
			<form action="#">
				<div class="form-group input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input type="text" class="form-control" name="" placeholder="手机号">
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-lock"></span>
					</span>
					<input type="password" class="form-control" name="" placeholder="密码">
				</div>
				 <div style="height:50px">
				<div class="col-md-2">自动登陆</div>
				
				<div class="col-md-2 col-md-offset-8">免费注册</div>
				</div>
				<input type="submit" class="btn btn-primary btn-block" value="登陆">
			</form>
		</div>
		<div class="modal-footer"></div>
	</div>
	</div>
	</div>	

</body>
</html>