<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>作家资料</title>
<link rel="stylesheet" href="/Public/bs3.7/css/bootstrap.css">
<script src="/Public/bs3.7/js/jquery.min.js"></script>
<script src="/Public/bs3.7/js/bootstrap.min.js"></script>
<script src="/Public/bs3.7/js/docs.min.js"></script>
<style type="text/css">
	body{
		background-color: #EFEFEF;
	}
	.header{
		background-color: white;
	}
	.head-blue{
		height:3px;
		background: #50A8FF;
	}
	h2{
		color: #50A8FF;
	}
	.pull-right{
		padding-top: 15px;
		padding-bottom: 15px;
	}
	.name{
		
		margin: 15px;
	}	
	 .my-list{
		height:1000px;
		width: 140px;
		border:1px solid #EFEFEF;
	}
	.container{
		background-color: white;
	}
	.body-top{
		margin-top: 22px;
	}
	
	.container{
		padding-right: 0px;
  		padding-left: 0px;
		
	}
	.left-block{
		width:1030px;
		
	}
	.img-circle{
		width: 50px;
		height: 50px;
	}
</style>
</head>
<body>
<div class="header">
	<div class="head-blue"></div>
	<div class="container">
		<div class="col-md-2"><h2>作家专区</h2></div>
		
		<div class="pull-right">
			<div class="col-md-3">
			<img alt="" src="<?php echo ($_SESSION['writer']['img']); ?>" class="img-circle">
			</div>
			<div class="col-md-9">
			<p class="name"><?php echo ($writer["pen_name"]); ?></p>
			</div>
		</div>
	</div>
</div>

<!-- ------下边是整个页面的体部分-------------------------- -->
<div class="container body-top">
	
		<div class="my-list pull-left">
			<div class="list-group">
				<a class="list-group-item " href="/index.php/Home/Writer/writerHome"><span class="glyphicon glyphicon-folder-open">&nbsp;</span>作品管理</a>
				<a class="list-group-item active" href="/index.php/Home/Writer/writerData"><span class="glyphicon glyphicon-user">&nbsp;</span>作家资料</a>
				<a class="list-group-item" href="/index.php/Home/Writer/writerMessage"><span class="glyphicon glyphicon-envelope">&nbsp;</span>消息通知</a>
				<a class="list-group-item" href="/index.php/Home/Writer/writerCount"><span class="glyphicon glyphicon-stats">&nbsp;</span>数据统计</a>
				<a class="list-group-item" href="/index.php/Home/Writer/writerPassword"><span class="glyphicon glyphicon-lock">&nbsp;</span>更改密码</a>
				<a class="list-group-item" href="/index.php/Home/Login/quit"><span class="glyphicon glyphicon-remove-sign">&nbsp;</span>退出登录</a>
			</div>
			
		</div>
	<!-- ---------------------------下面是中间部分------------------------ -->
		<div class="left-block pull-left">
			
			<div>
				<ol class="breadcrumb">
				   <li><h5>作家资料</h5></li>
				</ol>
			</div>
			<table class="table table-striped">
				<tr>
					<td>头像：</td>
					<td><img alt="" src="<?php echo ($writer["img"]); ?>" class="img-circle"></td>
				</tr>
				<tr>
					<td>笔名：</td>
					<td><?php echo ($writer["pen_name"]); ?></td>
				</tr>
				<tr>
					<td>作家ID:</td>
					<td><?php echo ($writer["wid"]); ?></td>
				</tr>
				<tr>
					<td>性别：</td>
					<td><?php echo ($writer["sex"]); ?></td>
				</tr>
				<tr>
					<td>真实姓名：</td>
					<td><?php echo ($writer["name"]); ?></td>
				</tr>
				<tr>
					<td>手机号：</td>
					<td><?php echo ($writer["phone"]); ?></td>
				</tr>
				<tr>
					<td>电子邮箱：</td>
					<td><?php echo ($writer["e_mail"]); ?></td>
				</tr>
				<tr>
					<td>QQ</td>
					<td><?php echo ($writer["qq"]); ?></td>
				</tr>
				<tr>
					<td>所在地区：</td>
					<td><?php echo ($writer["address"]); ?></td>
				</tr>
				<tr>
					<td colspan="2"><a href="/index.php/Home/Writer/writerDataAlter" class="btn btn-primary">修改</a></td>
				</tr>
			</table>
			
		</div>
	
</div>
</body>
</html>