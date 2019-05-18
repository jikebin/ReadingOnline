<?php
namespace Admin\Model;
use Think\Model;
class BcontentModel extends Model{
	//创建章节截取方法,参数为Book对象
	public function prceData($book){
		//接收图书ID 和  图书路径
		$id = $book['id'];
		$file_path = $book['file_path'];
		
		
		
		//进行章节拆分操作
		if(file_exists($file_path)){
			$file = file_get_contents($file_path);
			//定义正则匹配,匹配章节
			$pattern = "/\x{7b2c}.{1,10}[\x{7ae0}|\x{8282}|\x{8bdd}].{1,20}\s/u";
			//匹配标题
			preg_match_all($pattern, $file,$titl);
			$title = $titl[0];
			//截取数据(内容)
			$contents = preg_split($pattern, $file);
			//补全数据
			for($i=0;$i<count($title);$i++ ){
				//图书ID
				$this->BID = $id;
				//审核标识
				$this->flag = 1;
				//文件标题
				$this->chapter = $title[$i];
				//内容信息
				$this->bookText = $contents[$i+1];
				//上传字数
				$this->number = strlen($contents[$i+1]);
				//添加数据
				//$sql = $this->fetchSql(true)->add();
				//dump($sql);
				$this->add();
			}
			
		}else{
			return false;
		}
		
		return true;
	}
	
	
}