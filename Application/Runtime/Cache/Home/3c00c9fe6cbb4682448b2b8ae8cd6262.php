<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>图书阅读页面</title>
<link rel="stylesheet" href="/Public/bs3.7/css/bootstrap.css">
<script src="/Public/bs3.7/js/jquery.min.js"></script>
<script src="/Public/bs3.7/js/bootstrap.min.js"></script>
<script src="/Public/bs3.7/js/docs.min.js"></script>
<style type="text/css">
	body{
		background-color: #EDE8D5;
	}
	.container{
		background-color: #FAF7ED;
	}
	.myheight{
		display: block;
		height: 100px;
		padding-top:40px;
		text-align: center;
		
	}
	.list{
		margin-bottom: 15px;
	}
</style>
</head>
<body>
<script type="text/javascript">
	jQuery(function(){
		//获取置顶按钮
		jQuery("#top").on("click",function(){
			  $('body,html').stop().animate({
		            'scrollTop': 0,
		            'duration': 100,
		            'easing': 'ease-in'
		        })
			
		});
	});
</script>
<div class="container">
	<h1 class="page-header"><?php echo ($data["chapter"]); ?></h1>
	<div class="row">
		<div class="col-md-1">
			<div data-spy="affix" data-offset-top="200" >
				<a href="/index.php/Home/Index/bookShow/BID/<?php echo ($data["bid"]); ?>" class="list-group-item text-center">
					<span class="glyphicon glyphicon-arrow-left"></span>
				</a>
			</div>
		</div>
		<div class="col-md-10">
			
			<p class="lead"><?php echo (htmlspecialchars_decode($data["booktext"])); ?></p>
		</div>
		<div class="col-md-1">
			<div data-spy="affix" data-offset-top="200" >
				<div class="list-group">
				  <a href="#" class="list-group-item text-center" data-toggle="modal" data-target="#myTab"><span class="glyphicon glyphicon-list"></span></a>
				  <a href="/index.php/Home/Index/bookRead/CID/<?php echo ($left); ?>" class="list-group-item myheight"><span class="glyphicon glyphicon-chevron-left"></span></a>
				  <a href="/index.php/Home/Index/bookRead/CID/<?php echo ($right); ?>" class="list-group-item myheight"><span class="glyphicon glyphicon-chevron-right"></span></a>
				  <a href="javascript:" class="list-group-item text-center" id="top">置顶</a>
				  
				</div>
			</div>
		</div>
	</div>
	<!-- -------------------------则是目录部分----------------------------- -->
	<div id="myTab" class="modal fade ">
	<div class="modal-dialog ">
	<div class="modal-content">
		<div class="modal-header">
			<div class="close" data-dismiss="modal">&times;</div>
			<h3 class="">目录</h3>
		</div>
		<div class="modal-body">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-md-4 list">
					<a href="/index.php/Home/Index/bookRead/CID/<?php echo ($vol["cid"]); ?>"><?php echo (mb_substr($vol["chapter"],0,10,"utf-8")); ?></a>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>

		</div>
		<div class="modal-footer"></div>
	</div>
	</div>
	</div>	
	






















</div>
</body>
</html>