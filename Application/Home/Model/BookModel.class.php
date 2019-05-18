<?php
namespace Home\Model;
use Think\Model;
class BookModel extends Model{
	
	//定义查询前12个小说页面
	public function selectHead1(){
		//定义查询语句
		$result = $this->field("bid,bname,pen_name,bookImg")->where("kid=1")->limit(12)->select();
		return $result;
	}
	
	//定义查询前12个历史传记
	public function selectHead2(){
		//定义查询语句
		$result = $this->field("bid,bname,pen_name,bookImg")->where("kid=2")->limit(12)->select();
		return $result;
	}
	
	//定义查询收藏图书
	public function selectCollect($list){
		$result = $this->field("bid,bname,pen_name,bookImg")->select($list);
		return $result;
	}
	
	//添加图书作品
	public function add_book($data){
		//添加字段
		$this->KID = $data['KID'];
		$this->bname = $data['bname'];
		$this->WID = session('writer')['wid'];
		$this->pen_name = session('writer')['pen_name'];
		$this->intro = $data['intro'];
		
		//添加数据
		$flag = $this->add();
		return $flag;
	}
	
	//查找指定作者书籍
	public function writer_book(){
		//获取作者id
		$wid = session('writer')['wid'];
		//通过id查找图书
		$model = M();
		$result = $model->field('t1.*,t2.kind as kind')->table('book as t1,bkind as t2')->where("t1.kid=t2.kid and t1.wid=$wid")->select();
		return $result;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}