<?php
namespace Admin\Model;
use Think\Model;
use Think\Upload;
use Think\Page;
class BookModel extends Model{
	
	//添加上传图书方法
	public function saveData($post,$files){
		//处理提交
		if($files){
			$cfg = array(
					//配置上传路径
					'rootPath'      => WORKING_PATH . UPLOAD_ROOT_PATH
			);
			
			$upload = new \Think\Upload($cfg);
			$info = $upload->upload($files);
			//补全信息
			if($info){
				$name = str_getcsv($info['book']['name'])[0];
				$post['bname'] = $name;
				$post['path'] = UPLOAD_ROOT_PATH . $info['book']['savepath'].$info['book']['savename'];
				$post['bookImg'] = empty($info['img']) ? DEFAULT_IMG : UPLOAD_ROOT_PATH . $info['img']['savepath'].$info['img']['savename'];
			}
			
			
		}
		//添加操作
		$id = $this->add($post);
		//将ID 和  存储路径以数组的形式返回。
		return array('id' => $id ,'file_path' =>WORKING_PATH . $post['path']);
	}
	
	//添加联表查询  bkind表
	public function selectAll(){
		//查询总记录数
		$count = $this->count();
		//实例化分页类
		$page = new Page($count,10);
		//分页显示输出
		$show = $page->show();
		
		$model = M();
		$result = $model->field('t1.*,t2.kind as kind')->limit($page->firstRow.",".$page->listRows)->table('book as t1,bkind as t2')->where('t1.kid = t2.kid')->select();
		return array('show' => $show,'result' =>$result);
	}
	//添加下载方法
	
	
}