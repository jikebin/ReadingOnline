<?php
namespace Admin\Controller;


class AdminUploadController extends CommonController{

	//图书的上传功能
	public function adminUpload(){
		if(IS_POST){
			//接收数据
			$post = I("post.");
			//创建Book模型对象
			$bookModel = D('Book');
			//调用上传方法
			$result = $bookModel->saveData($post,$_FILES);
			if($result){
				//创建图书内容模型
				$bcontent = D('Bcontent');
				//调用图书内容分章节功能
				
				$flag = $bcontent->prceData($result);
				if($flag){
					//添加成功
					$this->success('添加成功');
				}else {
					//失败
					$this->error('章节分割失败');
				}
				
			}else {
				//失败
				$this->error('上传失败');
			}
			
		}else {
			//创建图书种类模型
			$model = M('Bkind');
			//调用查询方法
			$kinds = $model->select();
			//传递数据
			$this->assign('kind',$kinds);
			$this->display(); 
		}
		
	}
	//章节拆分测试方法
	public function test(){
		$model = D('Bcontent');
		$model->prceData1(WORKING_PATH.'/Public/Upload/2018-09-26/5bab4946700a1.txt');
		
	}
	
	//图书精彩推荐
	public function adminTesimonial(){
		//创建模型
		$model = D('Recommend');
		//查找数据
		$data = $model->select();
		//传递数据
		$this->assign('data',$data);
		//显示页面
		$this->display();
	}
	//图书精彩推荐修改页面   待完善。。。。。。
	public function adminTesimonialAlter(){
		$this->display();
	}
	
	//图书管理页面
	public function adminBook(){
		if(IS_POST){
			
		}else{
			//创建图书模型
			$model = D('Book');
			//调用查询方法
			$list = $model->selectAll();
			//变量分配
			$this->assign('result',$list['result']);
			$this->assign('show',$list['show']);
			$this->display();
		}
		 
	}
	
	//下载图书方法
	public function download(){
		//接收id
		$id = I('get.id');
		//查询数据
		$data = M('Book')->find($id);
		//下载代码
		$file = WORKING_PATH . $data['path'];
		//输出文件
		header("Content-type: application/octet-stream");
		header('Content-Disposition:attachment; filename="'.basename($file).'"');
		header("Content-Length:".filesize($file));
		readfile($file);
		
	}
	
	//添加图书种类
	public function addkind(){
		//创建模型
		$model = M('Bkind');
		//调用方法
		$model->create();
		//添加数据
		$result = $model->add();
		//重定向跳转
		if($result){
			$this->success('添加成功');
		}else {
			$this->error('添加失败');
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


}