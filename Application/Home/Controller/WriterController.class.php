<?php
namespace Home\Controller;

class WriterController extends CommonWriterController{
	
	//作品管理
	public function writerHome(){
		//创建图书模型
		$book = D('Book');
		//调用方法
		$data = $book->writer_book();
		//传递数据
		$this->assign("data",$data);
		$this->display();
	}
	
	//作者个人资料
	public function writerData(){
		//传递数据
		$this->assign("writer",session("writer"));
		$this->display();
	}
	//修改作者资料
	public function writerDataAlter(){
		if(IS_POST){
			//创建模型
			$model = D("Writer");
			//接收ID
			$id = I("post.WID");
			//接收数据
			$model->create();
			//调用修改方法
			$flag = $model->save();
			if($flag){
				//修改成功，调用查询方法
				$data = $model->find($id);
				//更新session值
				session('writer',$data);
				//跳转
				$this->success('修改成功',U('writerData'));
			}else {
				//修改失败，返回上一级
				$this->error("修改失败");
			}
			
		}else {
			$this->assign("writer",session("writer"));
			$this->display();
		}
	}
	
	//修改作者密码
	public function writerPassword(){
		if(IS_POST){
			//接收数据
			$old = I('post.old');
			$new1 = I('post.new1');
			$new2 = I('post.new2');
			if($new1 == $new2){
				//创建User对象
				$user = D('Writer');
				//调用方法
				$flag = $user->alter($old,$new1);
				switch ($flag){
					case 1:
						$this->success("密码修改成功");
						break;
					case 0:
						$this->success("密码修改失败");
						break;
					case -1:
						$this->success("原始密码不正确");
						break;
				}
			}else {
				$this->error('新密码输入不一致');
			}
			
		}else{
			$this->display();
		}
		
		
	}
	
	//作品创作
	public function writerCreate(){
		if(IS_POST){
			//创建图书模型
			$book = D('Book');
			//接收数据
			$data = I('post.');
			//调用方法
			$flag = $book->add_book($data);
			if($flag){
				$this->success('添加成功',U("writerHome"));
			}else {
				$this->error('添加失败');
			}
		}else{
			//创建图书种类模型
			$kind = M('Bkind');
			//查找数据
			$data = $kind->select();
			//输出数据
			$this->assign('kind',$data);
			
			$this->display();
		}
		
	}
	
	//数据统计
	public function writerCount(){
		if(IS_AJAX){
			//接收图书编号
			$bid = I('get.bid');
			//创建点赞模型
			$support = D('Support');
			//统计点赞数量
			$count_support = $support->countClick($bid);
			//创建收藏模型
			$bcollect = D('Bcollect');
			//统计收藏数量
			$count_bcollect = $bcollect->countCollect($bid);
			//传递数据
			//$this->assign("count_s",$count_support);
			//$this->assign("count_b",$count_bcollect);
			$count = array(
					'support' => $count_support,
					'bcollect' => $count_bcollect
			);
			//该头告诉ajax，将json自动转换为js对象
			header('Content-Type: application/json'); 
			//转换为json数据发送
			echo json_encode($count);
			
		}else {
			$this->display();
		}
	}
	
	//编写新章节
	public function writerManage(){
		if(IS_POST){
			//获取数据
			$data = I("post.");
			//创建图书内容模型
			$model = D("Bcontent");
			//调用方法
			$flag = $model->addContent($data);
			switch ($flag){
				case 1:
					//修改成功
					$this->success("修改成功");
					break;
				case 2:
					//修改失败
					$this->error("修改失败");
					break;
				case 3:
					//添加成功
					$this->success("添加成功");
					break;
				case 4:
					//添加失败
					$this->error("添加失败");
					break;
			}
		}else{
			//创建book模型
			$book = D('book');
			//接收图书id
			$bid = I('get.bid');
			//查找数据
			$data = $book->find($bid);
			
			//接收图书内容id
			$cid = I('get.cid');
			if($cid){
				//创建图书内容模型
				$bcontent = M('Bcontent');
				//查找数据
				$con = $bcontent->find($cid);
				//发送数据
				$this->assign('content',json_encode($con));
				$this->assign("con",$con);
			}else{
				$this->assign('content',"-1");
			}
			//发送数据
			$this->assign('book',$data);
			$this->display();
		}
		
	}
	
	//已发布章节
	public function writerContent(){
		//创建book模型
		$book = D('book');
		//接收图书id
		$bid = I('get.bid');
		//查找数据
		$book_data = $book->find($bid);
		//创建图书内容模型
		$bcontent = M('Bcontent');
		$data_content = $bcontent->field('cid,chapter')->where('bid='.$bid)->select();
		//定义内容变量
		$data = array();
		//接收图书内容id
		$cid = I('get.cid');
		if($cid){
			$data = $bcontent->find($cid);
		}else if($data_content){
			$data = $bcontent->find($data_content[0]['cid']);
		}
		//dump(htmlspecialchars_decode($data['booktext']));die;
		//发送数据
		$this->assign('book',$book_data);
		$this->assign('list',$data_content);
		$this->assign('data',$data);
		$this->assign("content",htmlspecialchars_decode($data['booktext']));
		$this->display();
	}
	
	//删除文章内容
	public function deleteContent(){
		//创建内容对象
		$model = M("Bcontent");
		//接收内容id
		$cid = I('get.cid');
		//调用删除方法
		$flag = $model->delete($cid);
		if($flag){
			//删除成功
			$this->assign("删除成功");
		}else {
			$this->assign("删除失败");
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
