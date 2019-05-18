<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>图书展示</title>
<link rel="stylesheet" href="/Public/bs3.7/css/bootstrap.css">
<script src="/Public/bs3.7/js/jquery.min.js"></script>
<script src="/Public/bs3.7/js/bootstrap.min.js"></script>
<script src="/Public/bs3.7/js/docs.min.js"></script>
<script src="/Public/plugin/layer/layer.js"></script>
<style type="text/css">
	body{
		padding-top: 110px;
		
	}
	.green{
		background-color: #F6F5EE;
		padding-bottom: 15px;
		padding-top: 15px;
		
	}
	.intro{
		height:95px;
		margin-bottom: 15px;
	}
	#imgshow{
		width:156px;
		height:200px;
	}
	.list{
		margin-bottom: 15px;
	}
	.content{
		margin-top: 20px;
		
	}
	.img-circle{
		width:50px;
		height:50px;
	}
</style>
</head>
<body>
<script type="text/javascript">
	$(function(){
		//获取点赞按钮对象
		$("#support").on("click",function(){
			$.get("/index.php/Home/Index/support/bid/<?php echo ($book["bid"]); ?>",function(res){
				if(res==-1){
					window.location.href="/index.php/Home/Login/readerLogin";
				}else{
					//查找到点赞数量对象
					$(".badge").text(res);
				}
				
			});		
		});
		
		//获取收藏图书按钮
		$("#collect").on("click",function(){
			$.get("/index.php/Home/Index/bcollect/bid/<?php echo ($book["bid"]); ?>",function(res){
				if(res==-1){
					window.location.href="/index.php/Home/Login/readerLogin";
				}else if(res==0){
					layer.msg('成功加入书架');
				}else{
					layer.msg('已经加入书架');
				}
				
			});		
		});
		
		//获取评论按钮
		$("#comment").on("click",function(){
				//获取评论框内容，并输出
				var text = $("textarea.form-control").val();
				//获取图书id
				//var id = <?php echo ($book["bid"]); ?>;
				if(text!=""){
					$.get("/index.php/Home/Index/comment/bid/<?php echo ($book["bid"]); ?>/comText/"+text,function(res){
						if(res==-1){
							window.location.href="/index.php/Home/Login/readerLogin";
						}else if(res==0){
							layer.msg('评论内容不合法');
							window.location.reload();
						}else{
							layer.msg('评论成功');
							window.location.reload();
						}
						
					});	
				}
				
		});
		
		
	});
	
	
	
</script>
<div class="container">
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
					<li><a href="/index.php/Home/Login/readerLogin" >我的</a></li>
					<li><a href="/index.php/Home/Login/writerLogin">作者专区</a></li>
				</ul>
				<!-- form表单搜索部分  -->
				<form action="/index.php/Home/Index/bookAll" method="get" class="navbar-form navbar-left">
		        <div class="form-group">
		          <input type="text" name="bname" class="form-control" placeholder="穷查理宝典">
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
				  <?php if(is_array($kind)): $i = 0; $__LIST__ = $kind;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/Index/bookAll/KID/<?php echo ($vol["kid"]); ?>"><?php echo ($vol["kind"]); ?></a></li>
				     <li class="divider"></li><?php endforeach; endif; else: echo "" ;endif; ?>
				   <li><a href="/index.php/Home/Index/bookAll">全部</a></li>
				  </ul>
				</div>
		     <!-- ----------按钮下拉菜单测试结束------------------ -->
		       <!-- 分类下拉菜单 -->
		    
		      
		      <!-- ---------------- -->
		</div>
	</div>
	</nav>

<!-- ------------------------导航条部分结束----------------------------------------- -->
	<div class="row green" >
		<div class="col-md-2" >
			<img alt="" src="<?php echo ($book["bookimg"]); ?>" id="imgshow">
		</div>
		<div class="col-md-10">
			<h1 class="page-header"><?php echo ($book["bname"]); ?></h1>
			
			<ul class="list-inline">
				<li>作者：<?php echo ($book["pen_name"]); ?></li>
				<li>更新：<?php echo ($book["time"]); ?></li>
			</ul>
		<div class="intro">简介：
			<p><?php echo ($book["intro"]); ?></p>
		</div>
		<div class="col-md-2"><a href="/index.php/Home/Index/bookRead/CID/<?php echo ($list[0]['cid']); ?>" class="btn btn-primary">点击阅读</a></div>
		<div class="col-md-2"><a href="javascript:;" class=" btn btn-danger " id="support">点赞&nbsp;<span class="badge"><?php echo ($count); ?></span></a></div>
		<div class="col-md-2"><a href="javascript:;" class="btn btn-success" id="collect">收藏本书</a></div>
		<div class="col-md-2"></div>
		<div class="col-md-2 col-md-offset-2">
		<a href="/index.php/Home/Index/download/id/<?php echo ($book["bid"]); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span>下载</a>
		</div>
		
		</div>
	</div>

<!-- ---------------------------------------下面是目录部分--------------------------------- -->
	<h2 class="page-header">目&nbsp;录</h2>
	<div class="content">
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-md-4 list">
			<a href="/index.php/Home/Index/bookRead/CID/<?php echo ($vol["cid"]); ?>"><?php echo (mb_substr($vol["chapter"],0,22,"utf-8")); ?></a>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
		
	</div>
<!-- ----------------------------下面是评论区------------------------------- -->

<h2 class="page-header text-center">简&nbsp;评</h2>

	<form action="javascript:;">
		<div class="form-group">
		<textarea class="form-control" rows="4" placeholder="140字评论区"></textarea>
		</div>
		<div class="col-md-2 col-md-offset-10">
			<input type="button" class="btn btn-lg btn-primary" id="comment" value="提交评论">
		</div>
	</form>
	
	<!-- -----------评论展示---------- -->

	
<h1 class="page-header"></h1>


	<?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="media">
		<div class="media-left">
			<img class="media-object img-circle" src="<?php echo ($vol["img"]); ?>">
		</div>
		<div class="media-body">
			<h4 class="media-heading"><?php echo ($vol["name"]); ?></h4>
			<p>评论内容：<?php echo ($vol["comtext"]); ?></p>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>



<h1 class="page-header"></h1>
	<div>
		<button class="btn btn-warning  center-block"><h3>查看全部评论<h3></button>
	</div>

<!-- ------------------最下面的说明条------------------ -->










</div>
<!-- 说明条写在最下面 -->
<div class="text-center green">
	<h1 class="page-header"></h1>
	<h3>作者：1140111116吉克斌</h3>
</div>
</body>
</html>