<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller{
	
	//读者登陆
	public function readerLogin(){
		if(session('user')){
			//登陆成功
			$this->redirect('Reader/reader');
		}else{
			if(IS_POST){
				//创建管理员表模型
				$user = M('User');
				//接收数据
				$post = I('post.');
				
				//查询用户名密码
				$data=$user->where("phone=".$post['phone'])->find();
				if($data['phone']==$post['phone'] && $data['password']==$post['password']){
					session('user',$data);
					//登陆成功
					$this->redirect('Reader/reader');
				}else{
					//登陆失败
					$this->assign('hint','用户名或密码错误');
					$this->display();
				}
				
				
			}else{
				$this->display();
			}
		}
		
	}
	//读者注册
	public function registerReader(){
		if(IS_POST){
			//接收数据
			$data = I("post.");
			//验证码验证
			$verify = new \Think\Verify();
			$result = $verify->check($data['captcha']);
			if($result){
				//创建用户模型
				$reader = D("User");
				$flag = $reader->addUser($data);
				switch ($flag){
					case -1:
						$this->error("该账户已经注册");
						break;
					case 0:
						$this->error("注册失败");
						break;
					case 1:
						$this->success("注册成功",U("readerLogin"));
						break;
				}
			}else {
				$this->error("验证码错误！");
			}
			
		}else{
			$this->display();
		}
		
	}
	
	
	//作者登陆
	public function writerLogin(){
		if(session('writer')){
			//登陆成功
			$this->redirect('Writer/writerHome');
		}else{
			if(IS_POST){
				//创建管理员表模型
				$user = M('Writer');
				//接收数据
				$post = I('post.');
				
				//查询用户名密码
				$data=$user->where("phone=".$post['phone'])->find();
				if($data['phone']==$post['phone'] && $data['password']==$post['password']){
					session('writer',$data);
					//登陆成功
					$this->redirect('Writer/writerHome');
				}else{
					//登陆失败
					$this->assign('hint','用户名或密码错误');
					$this->display();
				}
				
				
			}else{
				$this->display();
			}
		}
		
	}
	
	//作者注册
	public function registerWriter(){
		if(IS_POST){
			//接收数据
			$data = I("post.");
			//验证码验证
			$verify = new \Think\Verify();
			$result = $verify->check($data['captcha']);
			if($result){
				//创建用户模型
				$reader = D("Writer");
				$flag = $reader->addWriter($data);
				switch ($flag){
					case -1:
						$this->error("该账户已经注册");
						break;
					case 0:
						$this->error("注册失败");
						break;
					case 1:
						$this->success("注册成功",U("writerLogin"));
						break;
				}
			}else {
				$this->error("验证码错误！");
			}
			
		}else{
			$this->display();
		}
	}
	
	public function quit(){
		//退出登录
		session(null);
		//跳转到登陆页面
		$this->redirect('Index/index');
	}
	
	//定义验证码方法
	public function captcha(){
		//配置验证码属性
		$cfg = array(
				'fontSize'  =>  13,              // 验证码字体大小(px)
				'useCurve'  =>  true,            // 是否画混淆曲线
				'useNoise'  =>  false,            // 是否添加杂点
				'length'    =>  4,               // 验证码位数
		);
		//创建验证码对象
		$verify = new \Think\Verify($cfg);
		//输出验证码
		$verify->entry();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}