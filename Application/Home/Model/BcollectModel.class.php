<?php
namespace Home\Model;
use Think\Model;

class BcollectModel extends Model{
	
	//查找读者图书ID集合
	public function bookList($rid){
		//查找图书集合
		$list = $this->where("RID=".$rid)->select();
		//将图书ID拼接成字符串返回
		$str = "";
		foreach ($list as $li){
			$str .=$li['bid'].",";
		}
		return $str;
	}
	
	//图书收藏功能
	public function bookCollect($bid){
		//添加字段
		$this-> BID = $bid;
		$rid = session('user')['rid'];
		$this-> RID = $rid;
		//查找该图书是否已经被收藏
		$flag = $this->where("bid=$bid and rid=$rid")->find();
		
		if($flag){
			return 1; //表示书架已存在该图书
		}else{
			//没有找到则添加该数据
			$this->add();
			return 0; //表示添加成功该图书
		}
	}
	
	//统计图书收藏数量
	public function countCollect($bid){
		
		return $this->where("BID=$bid")->count();
	}
	
	
	
	
	
	
	
	
	
	
	
	
}