<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>作品发布</title>
<link rel="stylesheet" href="/Public/bs3.7/css/bootstrap.css">
<script src="/Public/bs3.7/js/jquery.min.js"></script>
<script src="/Public/bs3.7/js/bootstrap.min.js"></script>
<script src="/Public/bs3.7/js/docs.min.js"></script>
<script src="/Public/plugin/ue/ueditor.config.js"></script>
<script src="/Public/plugin/ue/ueditor.all.min.js"></script>
<script src="/Public/plugin/ue/lang/zh-cn/zh-cn.js"></script>

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
	.nav-form{
		
		background-color: #f5f5f5;
		padding: 8px 15px;
		
	}
	.book-title{
		outline-color: invert ;
		outline-style: none ;
		outline-width: 0px ;
		border: none ;
		font-size: 30px;
		text-align: center;
		padding-top: 50px;
		padding-bottom: 30px;
	}
	.img-circle{
		width: 50px;
		height:50px;
	}
	
</style>
</head>
<body>
<script type="text/javascript">
	$(function(){
		//实例化编辑器
		 var ue = UE.getEditor('editor');
		if(<?php echo ($content); ?>!=-1){
			//接收数据
			 var data = <?php echo (htmlspecialchars_decode($content)); ?>;
			//初始化赋值ue
			ue.ready(function(){
				ue.setContent(data.booktext);
			});

		}
		
		
		
		$("#send").on("click",function(){
			//触发提交
			$("form").submit();
		});
		
		
	});
</script>
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
				    <li><a href="/index.php/Home/Writer/writerHome" class="lead"><h5>作品管理</h5></a></li>
				   <li class="active" class="lead"><?php echo ($book["bname"]); ?></li>
				</ol>
			</div>
		<!-- 标签页 -->
			<ul class="nav nav-tabs">
				<li class="active"><a href="#home1" data-toggle="tab">草稿箱</a></li>
				<li><a href="/index.php/Home/Writer/writerContent/bid/<?php echo ($book["bid"]); ?>" >已发布章节</a></li>
			</ul>
			<div class="tab-content">
				<div id="home1" class="tab-pane fade in active">
					<div class="nav-form">
						<a href="#" class="btn"></a>
						<a href="javascript:;" id="send" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span>发布</a>
					</div>
					<div>
						<form action="/index.php/Home/Writer/writerManage" method="post">
							<input type="text" name="chapter" class="form-control book-title" value="<?php echo ($con["chapter"]); ?>" placeholder="此处输入章节名  示例：第十章  天降奇缘">
							<input type="hidden" name="BID" value="<?php echo ($book["bid"]); ?>">
							<input type="hidden" name="CID" value="<?php echo ($con["cid"]); ?>">
							<div class="form-group">
							 <script id="editor" type="text/plain" style="width:1024px;height:1000px;"></script>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>

	
</div>
</body>
</html>