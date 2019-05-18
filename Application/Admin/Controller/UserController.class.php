<?php
//定义命名空间
namespace Admin\Controller;
use Think\Page;
//继承安全控制控制器
class UserController extends CommonController{
	
	//定义作者信息显示方法
	public function writer(){
		//创建模型
		$model = M('Writer');
		$data = null;
		if(IS_POST){
			//接收数据
			$result = I("post.");
			//dump($result); die;
			if($result['info']==""){
				$data = $model ->select();
			}else {
				//$data = $model ->where($result['kind'].'="'.$result['info'].'"') ->select();
				//模糊查询测试
				//接收字段信息
				$kind = $result['kind'];
				$where[$kind] = array('like','%'.$result['info'].'%');
				$data = $model ->where($where)->select();
			}
		}else {
			//调用查询方法
			$data = $model ->select();
		}
		//变量分配
		$this->assign('data',$data);
		//显示模板
		$this->display();
	}
	//定义作者重置密码方法
	public function initWirter(){
		//创建模型
		$model = M('Writer');
		$test = I('get.WID');
		//接收数据
		$model->WID = $test;
		$model->password = "0000";
		//调用修改方法
		$result = $model->save();
		if($result){
			//成功
			$this->success('修改成功，密码为：0000');
		}else {
			$this->error('密码已经重置，重置密码为：0000');
		}
		
	}
	
	//定义作者详细信息显示
	public function writerData(){
		//创建模型
		$model = M('Writer');
		//接收数据
		$model->create();
		//调用方法
		$data = $model->find();
		//传递数据
		$this->assign('data',$data);
		//显示模板
		$this->display();
		
	}
	
	//文章审核方法
	public function writerText(){
		//创建模型
		$model = M('Bcontent');
	
		$data = null;
		$show = null;
		if(IS_POST){
			//接收数据
			$result = I("post.");
			//dump($result); die;
			if($result['info']==""){
				//查询总记录数
				$count = $model->count();
				//实例化分页类
				$page = new Page($count,20);
				//分页显示输出
				$show = $page->show();
				$data = $model->limit($page->firstRow.",".$page->listRows) ->select();
//				$data = $model ->select();
			}else {
				//模糊查询测试
				$kind = $result['kind'];//接收字段信息
				$where[$kind] = array('like','%'.$result['info'].'%');
				//查询总记录数
				$count = $model->where($where)->count();
				//实例化分页类
				$page = new Page($count,20);
				//分页显示输出
				$show = $page->show();
				$data = $model->limit($page->firstRow.",".$page->listRows) ->where($where)->select();
// 				$data = $model->where($where)->select();
			}
		}else {
			//调用查询方法
			$data = $model->field('CID,BID,chapter,loadtime,number,flag')->where("flag=0") ->select();
		}
		//变量分配
		$this->assign('data',$data);
		$this->assign('show',$show);
		//显示模板
		$this->display();
	}
	
	//显示文章内容
	public function showText(){
		
		//创建模型
		$model = M('Bcontent');
		//接收数据
		$CID =  I('request.CID');
		//调用查询方法
		$data = $model->find($CID);
		//输出内容
		echo htmlspecialchars_decode($data['booktext']);
		//echo $model->CID;
		
	}
	
	//更改图书审核状态
	public function alterflage(){
		//创建模型
		$model = M('Bcontent');
		//接收数据
		$model->CID =  I('get.CID');
		$model->flag = I('get.flag');
		//调用查询方法
		$data = $model->save();
		$this->success('审核已完成',U('writerText'));
	}
	
/*_______________________________________________________________________________________________*/
	//下面是读者区域
	
	//读者管理
	public function reader(){
		//创建模型
		$model = M('User');
		$data = null;
		if(IS_POST){
			//接收数据
			$result = I("post.");
			
			if($result['info']==""){
				$data = $model ->select();
			}else {
			
				//模糊查询测试
				
				$kind = $result['kind'];//接收字段信息
				$where[$kind] = array('like','%'.$result['info'].'%');
				$data = $model ->where($where)->select();
			}
		}else {
			//调用查询方法
			$data = $model ->select();
		}
		//变量分配
		$this->assign('data',$data);
		//显示模板
		$this->display();
	}
	
	
	//显示读者详细信息
	public function readerData(){
		//创建模型
		$model = M('User');
		//接收数据
		$model->create();
		//调用方法
		$data = $model->find();
		//传递数据
		$this->assign('data',$data);
		//显示模板
		$this->display();
	}
	
	//重置读者密码
	public function initReader(){
		//创建模型
		$model = M('User');
		$test = I('get.RID');
		//接收数据
		$model->RID = $test;
		$model->password = "0000";
		//调用修改方法
		$result = $model->save();
		if($result){
			//成功
			$this->success('修改成功，密码为：0000');
		}else {
			$this->error('密码已经重置，重置密码为：0000');
		}
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}