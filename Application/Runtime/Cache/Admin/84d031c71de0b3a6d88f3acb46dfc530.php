<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>文章审核页面</title>
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
	.page-center{
				padding-left:25%;
				
			}
</style>
</head>
<body>
<script type="text/javascript">
	$(function(){
		
		$(".showText").on("click",function(){
			//获取data属性值
			var id = $(this).attr('data');
			//layer.alert(id);
		 	 layer.open({
				type: 2,
				title: '图书内容',
				shadeClose: true,
				shade: 0.8,
				area:['800px','90%'], 
				//这是显示内容的URL
				content: '/index.php/Admin/User/showText/CID/' + id
				
			});   
			
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
				<a class="list-group-item" href="/index.php/Admin/AdminUpload/adminBook"><span class="glyphicon glyphicon-envelope">&nbsp;</span>图书管理</a>
				<a class="list-group-item active" href="/index.php/Admin/User/writerText"><span class="glyphicon glyphicon-folder-open">&nbsp;</span>文章审核</a>
				<a class="list-group-item " href="/index.php/Admin/User/writer"><span class="glyphicon glyphicon-stats">&nbsp;</span>作者管理</a>
				<a class="list-group-item " href="/index.php/Admin/User/reader"><span class="glyphicon glyphicon-lock">&nbsp;</span>读者管理</a>
				<a class="list-group-item" href="/index.php/Admin/Login/quit"><span class="glyphicon glyphicon-remove-sign">&nbsp;</span>退出登录</a>
			</div>
			
		</div>
	<!-- ---------------------------下面是中间部分------------------------ -->
		<div class="left-block pull-left">
			
			<div>
				<ol class="breadcrumb">
				   <li class="active">文章审核</li>
				</ol>
			</div>
			<!-- -搜索框 -->
			<div>
				<form action="/index.php/Admin/User/writerText" method="post" class="navbar-form ">
		        <div class="form-group">
		        	<select class="form-control" name="kind">
		        	<option value="flag">审核状态</option>
		        		<option value="BID">图书ID</option>
		        		<option value="chapter">章节名称</option>
		        	</select>
		          <input type="text" name="info" class="form-control" placeholder="查找文章">
		        </div>
		        <button type="submit" class="btn btn-danger">
		        	<span class="glyphicon glyphicon-search"></span>
		        </button>
		      </form>
			</div>
			<!-- 搜索结束 -->
			<table class="table  table-hover table-bordered table-striped">
				<tr class="active">
					<th>章节名称</th>
					<th>上传时间</th>
					<th>字数</th>
					<th>审核状态</th>
					<th>内容详情</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo (mb_substr($vol["chapter"],0,15,"utf-8")); ?></td>
					<td><?php echo ($vol["loadtime"]); ?></td>
					<td><?php echo ($vol["number"]); ?>字</td>
					<td><?php echo ($vol["flag"]); ?></td>
					<td><a href="javascript:;" class="showText btn btn-primary" data="<?php echo ($vol["cid"]); ?>">查看</a></td>
					<td>
					
						<a href="/index.php/Admin/User/alterflage/CID/<?php echo ($vol["cid"]); ?>/flag/-1" class="btn btn-danger">内容下架</a>
						<a href="/index.php/Admin/User/alterflage/CID/<?php echo ($vol["cid"]); ?>/flag/1" class="btn btn-success">通过审核</a>
					</td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				
			</table>
			<div class="page-center">
				<ul class="pagination">
					<li><?php echo ($show); ?></li>
				</ul>
			</div>	
		</div>
	
</div>
</body>
</html>