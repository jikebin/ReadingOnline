<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

	//首页
    public function index(){
    	//创建分类模型
    	$kind = M('Bkind');
    	//查询图书种类
    	$data_kind = $kind->select();
    	
    	//创建首页大图模型
    	$recommend = M('Recommend');
    	//查找数据
    	$data_recommend = $recommend->select();
    	//创建图书模型
    	$bookModel = D("Book");
    	//查找数据
    	$result = $bookModel->selectHead1();
    	$result2 = $bookModel->selectHead2();
    	//传递数据
    	//dump($result);die;
    	$this->assign('kind',$data_kind);
    	$this->assign('recommend',$data_recommend);
    	$this->assign("book1",$result);
    	$this->assign("book2",$result2);
	      $this->display();
    }
    
    //图书展示
    public function bookShow(){
    	//创建点赞模型
    	$model = D('Support');
    	//创建分类模型
    	$kind = M('Bkind');
    	//查询图书种类
    	$data_kind = $kind->select();
    	$this->assign('kind',$data_kind);
    	//创建图书模型
    	$book = M('Book');
    	//接送数据
    	$bid = I('get.BID');
    	//查询数据
    	$data_book = $book->find($bid);
    	$count = $model ->countClick($bid);
    	//创建图书内容模型
    	$bcontent = M('Bcontent');
    	//查找图书内容信息
    	$data_content = $bcontent->field('cid,chapter,loadTime')->where("bid=$bid and flag=1")->select();
    	//将最后一次更新时间添加到book数据中
    	$data_book['time'] = $data_content[count($data_content)-1]['loadtime'];
    	//创建评论模型
    	$comment = D('Comment');
    	//查找数据
    	$data_comment = $comment->select5($bid);
    	//传递数据
    	$this->assign('list',$data_content);
    	$this->assign('book',$data_book);
  		$this->assign('count',$count);
  		$this->assign('comment',$data_comment);
  		
    	$this->display();
    }
    
    //图书阅读
    public function bookRead(){
    	//创建图书内容模型
    	$bcontent = M('Bcontent');
    	//接收数据
    	$cid = I('get.CID');
    	//查找图书内容
    	$data = $bcontent->find($cid);
    	//根据获取的图书ID查找所有的目录信息
    	$data_content = $bcontent->field('cid,chapter')->where('bid='.$data['bid'])->select();
    	//获取cid 在 $data_content中的数组索引
    	$left = -1;
    	$right = -1;
    	for($i=0;$i<count($data_content);$i++){
    		if($data_content[$i]['cid']==$data['cid']){
    			
    			if($i==0){
    				$left = $data_content[$i]['cid'];
    				$right = $data_content[$i+1]['cid'];
    			}else if($i==count($data_content)-1){
    				$left = $data_content[$i-1]['cid'];
    				$right = $data_content[$i]['cid'];
    			}else {
    				$left = $data_content[$i-1]['cid'];
    				$right = $data_content[$i+1]['cid'];
    			}
    		}
    	}
    	//传递数据
    	$this->assign('data',$data);
    	$this->assign('list',$data_content);
    	$this->assign('left',$left);
    	$this->assign('right',$right);
    	
    	$this->display();
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
    
    //显示所有书籍
    public function bookAll(){
    	//创建分类模型
    	$kind = M('Bkind');
    	//查询图书种类
    	$data_kind = $kind->select();
    	$this->assign('kind',$data_kind);
    	//创建模型
    	$model = M('Book');
    	//接收数据
    	$get = I('get.');
    	//查询数据
    	if($get['KID']){
    		$data = $model->where("KID=".$get['KID'])->select();
    		$this->assign('data',$data);
    	}else if($get['bname']){
    		$where['bname'] = array('like','%'.$get['bname'].'%');
    		$data = $model ->where($where)->select();
    		$this->assign('data',$data);
    	}else{
    		$data = $model->select();
    		$this->assign('data',$data);
    	}
    	$this->display();
    }
    
    
    //图书点赞方法
    public function support(){
    	if(session('user')){
    		//创建点赞模型
    		$model = D('Support');
    		//接收数据
    		$bid = I('get.bid');
    		//调用点赞方法
    		$model->onclick($bid);
    		//调用数量统计方法
    		$count = $model->countClick($bid);
    		//输出
    		echo $count;
    	}else{
    		//$this->redirect("Login/readerLogin");
    		echo -1;
    	}
    }
   
    
    //图书收藏方法
    public function bcollect(){
    	if(session('user')){
    		//创建图书收藏模型
    		$model = D('Bcollect');
    		//接收数据
    		$bid = I('get.bid');
    		//调用图书收藏方法
    		$result = $model->bookCollect($bid);
    		echo $result;
    		
    	}else{
    		echo -1;
    	}
    }
    
    //评论方法
    public function comment(){
    	if(session('user')){
    		//创建评论模型
    		$model = D('Comment');
    		//接收数据
    		$bid = I('get.bid');
    		$comText = I('get.comText');
    		//调用插入评论方法
    		$result = $model->comm($bid,$comText);
    		echo $result;
    	}else{
    		echo -1;
    	}
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}