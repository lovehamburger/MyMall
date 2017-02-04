<?php
/**
 * 品牌控制器
 */
	class BreadAction extends Action
	{
		public function __construct() {
			parent::__construct();
		}

		//品牌
		public function index(){
			$this->page($this->_modelObj->totalBread(),PAGE_SIZE);
			$this->_tpl->assign('allBread',$this->_modelObj->getAllBread());
			$this->_tpl->display(SMARTY_ADMIN.'bread/index.tpl');
		}

		//添加品牌
		public function add(){
			if(!empty($_POST) && is_array($_POST)){
				$returnInfo = $this->_modelObj->addBread();
				$returnInfo ?  $this->_redirectObj->succ('?a=Bread','品牌添加成功!'):$this->_redirectObj->error('品牌添加失败!');
			}else{
				$this->_tpl->display(SMARTY_ADMIN.'bread/add.tpl');
			}
			
		}

		//修改品牌
		public function update(){
			if(!empty($_POST)){
				$this->_modelObj->updateBread() ? $this->_redirectObj->succ('?a=Bread','品牌修改成功!') : $this->_redirectObj->error('品牌修改失败!')  ;
			}else{
				$this->_tpl->assign('oneBread',$this->_modelObj->findOneBread());
				$this->_tpl->display(SMARTY_ADMIN.'bread/update.tpl');
			}
			
		}

		//删除品牌
		public function delete(){
			if(!empty($_GET['id'])){
				$this->_modelObj->deleteBread() ? $this->_redirectObj->succ('?a=Bread','品牌删除成功!') : $this->_redirectObj->error('品牌删除失败!');
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}

		//ajax验证是否存在品牌名称
		public function ajaxName(){
			if(!empty($_POST['name'])){
				$this->_modelObj->ajaxName();
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}



	}
?>