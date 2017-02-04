<?php
/**
 * 导航控制器
 */
	class NavAction extends Action
	{
		private $_bread = null;
		private $_price = null;
		public function __construct() {
			parent::__construct();
			$this->_bread = new BreadModel();
			$this->_price = new PriceModel();
		}

		//导航条
		public function index(){
			$this->page($this->_modelObj->totalNav(),PAGE_SIZE);
				if(!empty($_GET['id'])){
					$this->_tpl->assign('oneNav',$this->_modelObj->findOneNav());
				}
			$this->_tpl->assign('allNav',$this->_modelObj->getAllNav());
			$this->_tpl->display(SMARTY_ADMIN.'nav/index.tpl');
		}

		//添加导航条
		public function add(){
			if(!empty($_POST) && is_array($_POST)){
				$returnInfo = $this->_modelObj->addNav();
				empty($returnInfo) ? $this->_redirectObj->error('导航条添加失败!') : $this->_redirectObj->succ('?a=Nav','导航条添加成功!');
			}else{
				if(!empty($_GET['id'])){
					$this->_tpl->assign('oneNav',$this->_modelObj->findOneNav());
				}
				$this->_tpl->assign('Breads',$this->_bread->getBreads());
				$this->_tpl->assign('Price',$this->_price->getAllPrice());
				$this->_tpl->display(SMARTY_ADMIN.'nav/add.tpl');
			}
		}

		//修改导航条
		public function update(){
			if(!empty($_POST)){
				$returnInfo = $this->_modelObj->updateNav();
				if($returnInfo){
					$this->_redirectObj->succ('?a=nav','导航条修改成功!');
				}else{
					$this->_redirectObj->error('导航条修改失败!');
				}
			}else{
				$this->_tpl->assign('Breads',$this->_bread->getBreads());
				$this->_tpl->assign('oneNav',$this->_modelObj->findOneNav());
				$this->_tpl->assign('Price',$this->_price->getAllPrice());
				$this->_tpl->display(SMARTY_ADMIN.'nav/update.tpl');
			}
			
		}

		//删除导航条
		public function delete(){
			if (!empty($_GET['id'])) {
				$returnInfo = $this->_modelObj->deleteNav();
				if($returnInfo){
					$this->_redirectObj->succ('?a=nav','导航条删除成功!');
				}else{
					$this->_redirectObj->error('导航条删除失败!');
				}
			}
		}

		//设置导航排序
		public function sort(){
			if($_POST){
				$returnInfo = $this->_modelObj->sortEdit();
				if($returnInfo){
					$this->_redirectObj->succ('?a=nav');
				}else{
					$this->_redirectObj->error('导航条排序失败!');
				}
			}else{
				$this->_redirectObj->error('非法访问!');
			}
		}

		//异步判断导航是否已被使用
		public function ajaxName(){
			if(!empty($_POST['name'])){
				$returnInfo = $this->_modelObj->OneNav(array("name='{$_POST['name']}'"));
				if($returnInfo){
					$info['state'] = '1';
				}else{
					$info['state'] = '0';
				}
				echo  json_encode($info);
			}else{
				$this->_redirectObj->error('非法访问!');
			}
		}
	}
?>