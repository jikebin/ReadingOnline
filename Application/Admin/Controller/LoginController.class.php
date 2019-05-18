<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function login(){
		if(IS_POST){
			//创建管理员表模型
			$admin = M('admin');
			//接收数据
			$post = I('post.');
			
			//查询用户名密码
			$data=$admin->find('1');
			if($data['username']==$post['username'] && $data['password']==$post['password']){
				//设置session内容
				//session_start();
				//$_SESSION['admin'] =$data;
				session('admin',$data);        
				//登陆成功
				//$this->success('登陆成功',U('AdminUpload/adminUpload'),0);
				$this->redirect('AdminUpload/adminUpload');
			}else{
				//登陆失败
				$this->assign('hint','用户名或密码错误');
				$this->display();
			}
			
			
		}else{
			$this->display();
		}
	
	}
	
	public function quit(){
			//退出登录
			session(null);
			//跳转到登陆页面
			$this->redirect('Login/login');
	}
	
}