<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>图书管理页面</title>
<link rel="stylesheet" href="/Public/bs3.7/css/bootstrap.css">
<script src="/Public/bs3.7/js/jquery.min.js"></script>
<script src="/Public/bs3.7/js/bootstrap.min.js"></script>
<script src="/Public/bs3.7/js/docs.min.js"></script>
<script src="/Public/plugin/layer/layer.js"></script>
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
	.page-center{
		padding-left:25%;
		
	}
</style>
</head>
<body>
<script type="text/javascript">
	$(function(){
		
		$(".show").on("click",function(){
			//获取data属性值
			var data = $(this).attr('data');
			layer.alert(data);
			/* layer.open({
				type: 2,
				title: '图书简介',
				shadeClose: true,
				shade: 0.8,
				area:['500px','90%'], 
				//这是显示内容的URL
				content: 'url地址'
				
			}); */
			
		});
		
			
	
		
	});
</script>
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
				<a class="list-group-item active" href="/index.php/Admin/AdminUpload/adminBook"><span class="glyphicon glyphicon-envelope">&nbsp;</span>图书管理</a>
				<a class="list-group-item" href="/index.php/Admin/User/writerText"><span class="glyphicon glyphicon-folder-open">&nbsp;</span>文章审核</a>
				<a class="list-group-item " href="/index.php/Admin/User/writer"><span class="glyphicon glyphicon-stats">&nbsp;</span>作者管理</a>
				<a class="list-group-item " href="/index.php/Admin/User/reader"><span class="glyphicon glyphicon-lock">&nbsp;</span>读者管理</a>
				<a class="list-group-item" href="/index.php/Admin/Login/quit"><span class="glyphicon glyphicon-remove-sign">&nbsp;</span>退出登录</a>
			</div>
			
		</div>
	<!-- ---------------------------下面是中间部分------------------------ -->
		<div class="left-block pull-left">
			
			<div>
				<ol class="breadcrumb">
				   <li><h5>图书管理</h5></li>
				</ol>
			</div>
			<div class="nav-add">
				<button class="btn btn-primary" data-toggle="modal" data-target="#addKind"><span class="glyphicon glyphicon-plus"></span>添加书类</button>
			</div>
	<!-- -----------------模态框部分------------------------- -->
	<div id="addKind" class="modal fade ">
	<div class="modal-dialog modal-sm">
	<div class="modal-content">
		<div class="modal-header">
			<div class="close" data-dismiss="modal">&times;</div>
			<h3 class="text-center">添加图书种类</h3>
			
		</div>
		<div class="modal-body">
			<form action="/index.php/Admin/AdminUpload/addKind" method="post">
				<div class="form-group input-group">
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-user"></span>
					</span>
					<input type="text" class="form-control" name="kind" placeholder="添加图书种类">
				</div>
				
				<input type="submit" class="btn btn-primary btn-block" value="提交">
			</form>
		</div>
		<div class="modal-footer"></div>
	</div>
	</div>
	</div>	
	<!-- -----------------模态框部分结束------------------------- -->
			<form action="#">
			<table class="table table-hover table-striped table-bordered">
				<tr class="active">
					<td>图书ID</td>
					<td>图书名称</td>
					<td>图书类别</td>
					<td>作者</td>
					<td>图书简介</td>
					<td>图书下载</td>
				</tr>
				<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vol["bid"]); ?></td>
					<td><?php echo ($vol["bname"]); ?></td>
					<td><?php echo ($vol["kind"]); ?></td>
					<td><?php echo ($vol["pen_name"]); ?></td>
					<td ><a href="javascript:;"  class="show btn btn-primary" data="<?php echo ($vol["intro"]); ?>">查看</a></td>
					<td><a href="/index.php/Admin/AdminUpload/download/id/<?php echo ($vol["bid"]); ?>" class="btn btn-primary">下载</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			</table>
		 </form>
		 <div class="page-center">
				<ul class="pagination">
					<li><?php echo ($show); ?></li>
				</ul>
			</div>
</div>
	
</div>
</body>
</html>