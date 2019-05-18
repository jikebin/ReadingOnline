<?php
namespace Home\Model;
use Think\Model;

class SupportModel extends Model{
	
	//点赞方法
	public function onclick($bid){
		//添加字段
		$this-> BID = $bid;
		$rid = session('user')['rid'];
		$this-> RID = $rid;
		//调用查询方法
		$flag = $this->where("bid=$bid and rid=$rid")->find();
		
		if($flag){
			//查询成功，则删除该数据
			$this->delete($this->sid);
		}else{
			//没有找到则添加该数据
			$this->add();
		}
	}
	
	//统计点赞数量
	public function countClick($bid){
		return $this->where("BID=$bid")->count();
	}
	
}