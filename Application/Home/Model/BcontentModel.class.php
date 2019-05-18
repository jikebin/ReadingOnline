<?php
namespace Home\Model;
use Think\Model;

class BcontentModel extends Model{
	
	//添加和修改图书内容
	public function addContent($data){
		
		$this->BID = $data['BID'];
		$this->chapter = $data['chapter'];
		$this->bookText = $data['editorValue'];
		$this->flag = 0;
		$this->number = strlen($data['editorValue']);
		if($data['CID']){
			//修改内容
			$this->CID = $data['CID'];
			$result = $this->save();
			if($result){
				//修改成功
				return 1;
			}else {
				//修改失败
				return 2;
			}
		}else{
			//添加内容
			$result = $this->add();
			if($result){
				//添加成功
				return 3;
			}else {
				//添加失败
				return 4;
			}
		}
	}
	
	//删除图书内容
	public function deleteContent(){
		
	}
	
}