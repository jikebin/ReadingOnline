<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>读者评论</title>
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
			<img alt="" src="<?php echo ($_SESSION['user']['img']); ?>" class="img-circle">
			</div>
			<div class="col-md-9">
			<p class="name"><?php echo ($_SESSION['user']['nickname']); ?></p>
			</div>
		</div>
	</div>
</div>

<!-- ------下边是整个页面的体部分-------------------------- -->
<div class="container body-top">
	
		<div class="my-list pull-left">
			<div class="list-group">
				<a class="list-group-item " href="/index.php/Home/Reader/readerData"><span class="glyphicon glyphicon-user">&nbsp;</span>个人资料</a>
				<a class="list-group-item " href="/index.php/Home/Reader/reader"><span class="glyphicon glyphicon-book">&nbsp;</span>我的书架</a>
				<a class="list-group-item active" href="/index.php/Home/Reader/readerComment"><span class="glyphicon glyphicon-envelope">&nbsp;</span>我的评论</a>
				<a class="list-group-item" href="/index.php/Home/Reader/readerPassword"><span class="glyphicon glyphicon-lock">&nbsp;</span>更改密码</a>
				<a class="list-group-item" href="/index.php/Home/Login/quit"><span class="glyphicon glyphicon-remove-sign">&nbsp;</span>退出登录</a>
			</div>
			
		</div>
	<!-- ---------------------------下面是中间部分------------------------ -->
		<div class="left-block pull-left">
			
			<div>
				<ol class="breadcrumb">
				   <li><h5>我的评论</h5></li>
				</ol>
			</div>
			<div>
			<table class="table">
			<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
					<td>
						<div class="media">
							<div class="media-left">
								<a href="#">
								<img class="media-object img-circle" src="holder.js/50x50">
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">《<?php echo ($vol["bname"]); ?>》</h4>
								<p><?php echo ($vol["comtext"]); ?></p>
							</div>
						</div>
					</td>
					<td>
						<ul class="list-unstyled">
							<li><?php echo ($vol["comtime"]); ?></li>
							<li><a href="/index.php/Home/Reader/deleteCom/cid/<?php echo ($vol["cid"]); ?>">删除</a></li>
						</ul>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				
			</table>
			</div>
		</div>
	
</div>
</body>
</html>