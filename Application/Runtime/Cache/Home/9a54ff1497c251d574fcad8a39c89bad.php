<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>作品管理</title>
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
	.nav-add{
		padding: 0px 15px;
	}
	.nav-add button{
		float: right;
	}
	.table .td{
		vertical-align:middle;
		
		
	}
	.img-thumbnail{
		width :84px;
		height: 109px;
	}
	.img-circle{
		width :50px;
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
			<p class="name"><?php echo ($_SESSION['writer']['pen_name']); ?></p>
			</div>
		</div>
	</div>
</div>

<!-- ------下边是整个页面的体部分-------------------------- -->
<div class="container body-top">
	
		<div class="my-list pull-left">
			<div class="list-group">
				<a class="list-group-item active" href="/index.php/Home/Writer/writerHome"><span class="glyphicon glyphicon-folder-open">&nbsp;</span>作品管理</a>
				<a class="list-group-item" href="/index.php/Home/Writer/writerData"><span class="glyphicon glyphicon-user">&nbsp;</span>作家资料</a>
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
				  <li><h5>作品管理</h5></li>
				</ol>
			</div>
			<div class="nav-add">
				<a href="/index.php/Home/Writer/writerCreate" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>创建作品</a>
			</div>
			<table class="table  table-hover ">
				<tr class="active">
					<th>图书封面</th>
					<th>图书名称</th>
					<th>编辑分组</th>
					<th>图书编号</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
					<td><img alt="" src="<?php echo ($vol["bookimg"]); ?>" class="img-thumbnail"></td>
					<td class="td"><?php echo ($vol["bname"]); ?></td>
					<td class="td"><?php echo ($vol["kind"]); ?></td>
					<td class="td"><?php echo ($vol["bid"]); ?></td>
					<td class="td">
						<a href="/index.php/Home/Writer/writerManage/bid/<?php echo ($vol["bid"]); ?>"><img alt="" src="/Public/img/write.png" class="img-rounded"></a>
						<a href="/index.php/Home/Writer/writerContent/bid/<?php echo ($vol["bid"]); ?>"><img alt="" src="/Public/img/publish.png" class="img-rounded"></a>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				
			</table>
			
		</div>
	
</div>
</body>
</html>