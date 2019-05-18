<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>消息通知</title>
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
		<div class="col-md-2"><h2>作家专区</h2></div>
		
		<div class="pull-right">
			<div class="col-md-3">
			<img alt="" src="<?php echo ($_SESSION['writer']['img']); ?>" class="img-circle">
			</div>
			<div class="col-md-9">
			<p class="name"><?php echo ($_SESSION['writer']['pen_name']); ?></p>
			</div>
		</div>
	</div>
</div>

<!-- ------下边是整个页面的体部分-------------------------- -->
<div class="container body-top">
	
		<div class="my-list pull-left">
			<div class="list-group">
				<a class="list-group-item " href="/index.php/Home/Writer/writerHome"><span class="glyphicon glyphicon-folder-open">&nbsp;</span>作品管理</a>
				<a class="list-group-item" href="/index.php/Home/Writer/writerData"><span class="glyphicon glyphicon-user">&nbsp;</span>作家资料</a>
				<a class="list-group-item active" href="/index.php/Home/Writer/writerMessage"><span class="glyphicon glyphicon-envelope">&nbsp;</span>消息通知</a>
				<a class="list-group-item" href="/index.php/Home/Writer/writerCount"><span class="glyphicon glyphicon-stats">&nbsp;</span>数据统计</a>
				<a class="list-group-item" href="/index.php/Home/Writer/writerPassword"><span class="glyphicon glyphicon-lock">&nbsp;</span>更改密码</a>
				<a class="list-group-item" href="/index.php/Home/Login/quit"><span class="glyphicon glyphicon-remove-sign">&nbsp;</span>退出登录</a>
			</div>
			
		</div>
	<!-- ---------------------------下面是中间部分------------------------ -->
		<div class="left-block pull-left">
			
			<div>
				<ol class="breadcrumb">
				   <li><h5>消息通知</h5></li>
				</ol>
			</div>
			<table class="table">
				<tr>
					<td>
						<div class="media">
							<div class="media-left">
								<a href="#">
								<img class="media-object img-circle" src="holder.js/50x50">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">系统通知</h4>
								<p>作者您好，非常抱歉您的作品不符合网络文学原创发展方向，无法通过审核，感谢您的关注，期待您的下一部作品。</p>
							</div>
						</div>
					</td>
					<td>
						<ul class="list-unstyled">
							<li>2018.07.23 14:09</li>
							<li><a href="#">删除</a></li>
						</ul>
					</td>
				</tr>
				<tr>
					<td>
						<div class="media">
							<div class="media-left">
								<a href="#">
								<img class="media-object img-circle" src="holder.js/50x50">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">系统通知</h4>
								<p>作者您好，非常抱歉您的作品不符合网络文学原创发展方向，无法通过审核，感谢您的关注，期待您的下一部作品。</p>
							</div>
						</div>
					</td>
					<td>
						<ul class="list-unstyled">
							<li>2018.07.23 14:09</li>
							<li><a href="#">删除</a></li>
						</ul>
					</td>
				</tr>
			</table>
			
		</div>
	
</div>
</body>
</html>