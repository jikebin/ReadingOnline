<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>作者资料详情页面</title>
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
	#myimg{
		height: 50px;
		width: 50px;
	}
</style>
</head>
<body>
<div class="header">
	<div class="head-blue"></div>
	<div class="container">
		<div class="col-md-2"><h2>管理员</h2></div>
		
		
	</div>
</div>

<!-- ------下边是整个页面的体部分-------------------------- -->
<div class="container body-top">
	
		<div class="my-list pull-left">
			<div class="list-group">
				<a class="list-group-item " href="/index.php/Admin/AdminUpload/adminUpload"><span class="glyphicon glyphicon-folder-open">&nbsp;</span>图书上传</a>
				<a class="list-group-item " href="/index.php/Admin/AdminUpload/adminTesimonial"><span class="glyphicon glyphicon-user">&nbsp;</span>精彩推荐</a>
				<a class="list-group-item" href="/index.php/Admin/AdminUpload/adminBook"><span class="glyphicon glyphicon-envelope">&nbsp;</span>图书管理</a>
				<a class="list-group-item" href="/index.php/Admin/User/writerText"><span class="glyphicon glyphicon-folder-open">&nbsp;</span>文章审核</a>
				<a class="list-group-item active" href="/index.php/Admin/User/writer"><span class="glyphicon glyphicon-stats">&nbsp;</span>作者管理</a>
				<a class="list-group-item " href="/index.php/Admin/User/reader"><span class="glyphicon glyphicon-lock">&nbsp;</span>读者管理</a>
				<a class="list-group-item" href="/index.php/Admin/Login/quit"><span class="glyphicon glyphicon-remove-sign">&nbsp;</span>退出登录</a>
			</div>
			
		</div>
	<!-- ---------------------------下面是中间部分------------------------ -->
		<div class="left-block pull-left">
			
			<div>
				<ol class="breadcrumb">
				   <li><a href="/index.php/Admin/User/writer"><h5>作者管理</h5></a></li>
				   <li class="active">作者资料</li>
				</ol>
			</div>
			<div>
				<table class="table table-striped">
				<tr>
					<td>头像：</td>
					<td><img id="myimg" alt="" src= "<?php echo ($data["img"]); ?>" class="img-circle"></td>
				</tr>
				<tr>
					<td>笔名：</td>
					<td><?php echo ($data["pen_name"]); ?></td>
				</tr>
				<tr>
					<td>作者ID:</td>
					<td><?php echo ($data["wid"]); ?></td>
				</tr>
				<tr>
					<td>性别：</td>
					<td><?php echo ($data["sex"]); ?></td>
				</tr>
				<tr>
					<td>真实姓名：</td>
					<td><?php echo ($data["name"]); ?></td>
				</tr>
				<tr>
					<td>手机号：</td>
					<td><?php echo ($data["phone"]); ?></td>
				</tr>
				<tr>
					<td>电子邮箱：</td>
					<td><?php echo ($data["e_mail"]); ?></td>
				</tr>
				<tr>
					<td>QQ</td>
					<td><?php echo ($data["qq"]); ?></td>
				</tr>
				<tr>
					<td>所在地区：</td>
					<td><?php echo ($data["address"]); ?></td>
				</tr>
				<tr>
					<td colspan="2"><a href="/index.php/Admin/User/writer" class="btn btn-primary">返回</a></td>
				</tr>
			</table>
			</div>
			
		</div>
	
</div>
</body>
</html>