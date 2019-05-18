<?php
namespace Home\Controller;

class ReaderController extends CommonController{
	
	//读者书架
	public function reader(){
		//创建收藏表模型
		$bcollect = D('Bcollect');
		//获取读者ID字符串集合
		$str = $bcollect->bookList(session('user')['rid']);
		//创建图书表模型
		$book = D("Book");
		//查找收藏的图书
		$result = $book->selectCollect($str);
		//添加数据
		$this->assign("data",$result);
		$this->display();
	}
	
	//读者个人资料
	public function readerData(){
		//传递数据
		$this->assign("reader",session("user"));
		$this->display();
	}
	//修改读者资料
	public function readerDataAlter(){
		if(IS_POST){
			//创建模型
			$model = D("User");
			//接收id
			$id = I('post.RID');
			//接收数据
			$model->create();
			//调用修改方法
			$flag = $model->save();
			if($flag){
				//修改成功，调用查询方法
				$data = $model->find($id);
				//更新session值
				session('user',$data);
				//跳转
				$this->success('修改成功',U('readerData'));
			}else {
				//修改失败，返回上一级
				$this->error("修改失败");
			}
			
		}else {
			$this->assign("reader",session("user"));
			$this->display();
		}
	}

	//我的评论
	public function readerComment(){
		//创建评论模型
		$model = D('Comment');
		//调用方法
		$result = $model->select_reader();
		//传递数据
		$this->assign('data',$result);
		//dump($result);die;
		$this->display();
	}
	
	//删除评论
	public function deleteCom(){
		//创建评论模型
		$model = M('Comment');
		//接收评论ID
		$cid = I('get.cid');
		//调用删除方法
		$flag = $model->delete($cid);
		if($flag){
			//删除成功
			$this->success('删除成功',U('readerComment'));
		}else {
			//删除失败
			$this->error('删除失败');
		}
		
	
	}
	
	//修改用户密码
	public function readerPassword(){
		if(IS_POST){
			//接收数据
			$old = I('post.old');
			$new1 = I('post.new1');
			$new2 = I('post.new2');
			if($new1 == $new2){
				//创建User对象
				$user = D('User');
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
