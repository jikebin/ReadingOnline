<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>展示所有图书</title>
<link rel="stylesheet" href="/Public/bs3.7/css/bootstrap.css">
<script src="/Public/bs3.7/js/jquery.min.js"></script>
<script src="/Public/bs3.7/js/bootstrap.min.js"></script>
<script src="/Public/bs3.7/js/docs.min.js"></script>
<style type="text/css">
	body{
		padding-top: 110px;
		background-color: #F6F5EE;
	}
	.row{
			margin-bottom: 15px;
		}
	.white{
		background-color: white;
	}
	.dropdown-menu{
		background-color: #F6F5EE;
	}
	
	.myImgshow{
		position: absolute;
	
		  left:0;
		  top: 0;
		  width:80%;
		  height:100%;
  		  margin-left: 15px;
  		  margin-right:10%;
		  z-index: 10;
		  padding-top: 20px;
		  padding-bottom: 20px;
		  color: black;
		  text-align: center;
		  text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
		  background: #E9E8E7;
		  opacity : 0.9;
		  display: none;
		
	}
	.row .col-md-2{
		height: 200px;
	}
	.img-rounded{
		width: 125px;
		height: 166px;
	}

</style>
</head>
<body>
<script type="text/javascript">
	
		jQuery(function(){
			//获取图片元素
			jQuery(".col-md-2").on("mouseover",function(){
				jQuery(this).children(".myImgshow").stop().slideDown("fast");
				
			}).on("mouseout",function(){
				jQuery(this).children(".myImgshow").stop().slideUp("fast");
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

<!-- ---------------下面是展示区---------------------------- -->	
	
	<div class="row">
		<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><div class="col-md-2">
				<img alt="" src="<?php echo ($vol["bookimg"]); ?>" class="img-rounded center-block">
				<div class="myImgshow "><h3><?php echo ($vol["bname"]); ?></h3><p><?php echo ($vol["pen_name"]); ?></p><a href="/index.php/Home/Index/bookShow/BID/<?php echo ($vol["bid"]); ?>" class="btn btn-success">去看看</a></div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	
	
	
	
	
	
	
</div>	
</body>
</html>