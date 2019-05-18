<?php
namespace Home\Model;
use Think\Model;

class CommentModel extends Model{
	
	//用户评论方法
	public function comm($bid,$comText){
		//判断内容是否符合规格
		$pattern = "/\x{5988}\x{7684}|\x{64cd}|\x{50bb}\x{903c}|\x{72d7}\x{65e5}/u";
		preg_match($pattern, $comText,$arr);
		
		if($arr){
			//字符不符合内容
			return 0;
		}else {
			//添加字段
			$this-> BID = $bid;
			$rid = session('user')['rid'];
			$this-> RID = $rid;
			$this-> comText =$comText;
			//添加数据
			$this->add();
			return 1;
		}
	}
	
	//查找前五个评论内容
	public function select5($bid){
		$model = M();
		$result = $model->field('t1.*,t2.img as img,t2.nickname as name')->limit(5)->table('comment as t1,user as t2')->where('t1.RID = t2.RID and t1.bid='.$bid)->select();
		return $result;
	}
	//查找全部
	public function selectAll($bid){
		$model = M();
		$result = $model->field('t1.*,t2.img as img,t2.nickname as name')->table('comment as t1,user as t2')->where('t1.RID = t2.RID and t1.bid='.$bid)->select();
		
		return $result;
	}
	
	//查找指定读者的全部评论
	public function select_reader(){
		$model = M();
		$rid = session('user')['rid'];
		$result = $model->field('t1.*,t2.bname as bname')->table('comment as t1,book as t2')->where('t1.BID = t2.BID and t1.rid='.$rid)->select();
		
		return $result;
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}