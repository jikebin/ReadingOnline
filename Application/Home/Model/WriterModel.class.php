<?php
namespace Home\Model;
use Think\Model;

class WriterModel extends Model{
	
	//修改用户密码
	public function alter($old,$new){
		//获取用户原始密码
		$psw = session('writer')['password'];
		if($psw === $old){
			//获取用户名ID
			$wid = session('writer')['wid'];
			//添加到user属性中
			$this->WID = $wid;
			$this->password = $new;
			$flag = $this->save();
			if($flag){
				//修改成功
				//更新session
				$writer = $this->find();
				session('writer',$writer);
				return 1;
			}else{
				//修改失败
				return 0;
			}
		}else{
			//原始密码不正确
			return -1;
		}
	}
	
	
	//添加用户
	public function addWriter($data){
		//查询手机号是否存在
		$result = $this->where("phone=".$data['phone'])->find();
		if($result){
			//该手机号已经注册
			return -1;
		}else{
			$this->phone = $data['phone'];
			$this->password = $data['password'];
			$this->pen_kname = $data['phone']."作者";
			//添加数据
			$flag = $this->add();
			if($flag){
				//添加成功
				return 1;
			}else{
				//添加失败
				return 0;
			}
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}