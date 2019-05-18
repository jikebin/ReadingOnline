<?php
namespace Home\Controller;
use Think\Controller;

class CommonWriterController extends Controller{
	
	public function _initialize(){
		//获取session数据
		$data = session('writer');
		//判断数据是否存在
		if(empty($data)){
			//该用户没有登录
			$this->error('请先登录...',U('Index/index'),3); exit;
		}
	}
}