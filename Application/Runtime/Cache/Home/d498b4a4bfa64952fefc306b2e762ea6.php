<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>个人资料修改</title>
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
		height:50px;
	}
</style>
</head>
<body>
<div class="header">
	<div class="head-blue"></div>
	<div class="container">
		<div class="col-md-2"><h2><a href="/index.php/Home/Index/index">文学中文网</a></h2></div>
		
		<div class="pull-right">
			<div class="col-md-3">
			<img alt="" src="<?php echo ($reader["img"]); ?>" class="img-circle">
			</div>
			<div class="col-md-9">
			<p class="name"><?php echo ($reader["nickname"]); ?></p>
			</div>
		</div>
	</div>
</div>

<!-- ------下边是整个页面的体部分-------------------------- -->
<div class="container body-top">
	
		<div class="my-list pull-left">
			<div class="list-group">
				<a class="list-group-item active" href="/index.php/Home/Reader/readerData"><span class="glyphicon glyphicon-user">&nbsp;</span>个人资料</a>
				<a class="list-group-item " href="/index.php/Home/Reader/reader"><span class="glyphicon glyphicon-book">&nbsp;</span>我的书架</a>
				<a class="list-group-item" href="/index.php/Home/Reader/readerComment"><span class="glyphicon glyphicon-envelope">&nbsp;</span>我的评论</a>
				<a class="list-group-item" href="/index.php/Home/Reader/readerPassword"><span class="glyphicon glyphicon-lock">&nbsp;</span>更改密码</a>
				<a class="list-group-item" href="/index.php/Home/Login/quit"><span class="glyphicon glyphicon-remove-sign">&nbsp;</span>退出登录</a>
			</div>
			
		</div>
	<!-- ---------------------------下面是中间部分------------------------ -->
		<div class="left-block pull-left">
			
			<div>
				<ol class="breadcrumb">
				   <li><h5>个人资料</h5></li>
				</ol>
			</div>
			<div>
			<form action="/index.php/Home/Reader/readerDataAlter" method="post">
			<table class="table table-striped">
				<tr>
					<td>头像：</td>
					<td><img alt="" src="<?php echo ($reader["img"]); ?>" class="img-circle">
						<input type="hidden" name="RID" value="<?php echo ($reader["rid"]); ?>">
					</td>
				</tr>
				<tr>
					<td>昵称：</td>
					<td><input type="text" name="nickname" value="<?php echo ($reader["nickname"]); ?>" class="form-control"></td>
				</tr>
				<tr>
					<td>性别：</td>
					<td>
					<label class="radio-inline">
					  <input type="radio" name="sex"  value="男"  <?php echo ($reader['sex']=='男'?'checked="checked"':''); ?>> 男
					</label>
					<label class="radio-inline">
					  <input type="radio" name="sex"  value="女" <?php echo ($reader['sex']=='女'?'checked="checked"':''); ?>> 女
					</label>
					</td>
				</tr>
				<tr>
					<td>真实姓名：</td>
					<td><input type="text" name="name" value="<?php echo ($reader["name"]); ?>" class="form-control"></td>
				</tr>
				<tr>
					<td>手机号：</td>
					<td><input type="text" name="phone" value="<?php echo ($reader["phone"]); ?>" class="form-control"></td>
				</tr>
				<tr>
					<td>电子邮箱：</td>
					<td><input type="text" name="e_mail" value="<?php echo ($reader["e_mail"]); ?>" class="form-control"></td>
				</tr>
				<tr>
					<td>QQ</td>
					<td><input type="text" name="QQ" value="<?php echo ($reader["qq"]); ?>" class="form-control"></td>
				</tr>
				<tr>
					<td>所在地区：</td>
					<td><input type="text" name="address" value="<?php echo ($reader["address"]); ?>" class="form-control"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" class="btn btn-primary" value="保存"></td>
				</tr>
			</table>
			</form>
			</div>
		</div>
	
</div>
</body>
</html>