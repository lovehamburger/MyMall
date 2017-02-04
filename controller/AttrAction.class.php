<?php
/**
 * 自定义商品属性控制器
 */
	class AttrAction extends Action
	{
		private $_nav = null;
		public function __construct() {
			parent::__construct();
			$this->_nav = new NavModel();
		}

		//自定义商品属性
		public function index(){
			$this->page($this->_modelObj->totalAttr(),PAGE_SIZE);
			$this->_tpl->assign('allAttr',$this->_modelObj->getAllAttr());
			$this->_tpl->display(SMARTY_ADMIN.'attr/index.tpl');
		}

		//添加自定义商品属性
		public function add(){
			if(!empty($_POST)){
				if($this->_modelObj->addAttr()){
					$this->_redirectObj->succ('?a=attr','自定义商品属性添加成功!');
				}else{
					$this->_redirectObj->error('自定义商品属性添加失败!');
				}
			}
			$this->_tpl->assign('addNav',$this->_nav->getAddGoodsNav());
			$this->_tpl->display(SMARTY_ADMIN.'attr/add.tpl');
		}

		//修改自定义商品属性
		public function update(){
			if(!empty($_POST)){
				if($this->_modelObj->updateAttr()){
					$this->_redirectObj->succ('?a=attr','自定义商品属性修改成功!');
				}else{
					$this->_redirectObj->error('自定义商品属性修改失败!');
				}
			}else{
				$this->_tpl->assign('addNav',$this->_nav->getAddGoodsNav());
				$this->_tpl->assign('oneAttr',$this->_modelObj->findOneAttr()['0']);
				$this->_tpl->display(SMARTY_ADMIN.'attr/update.tpl');
			}
			
		}

		//删除自定义商品属性
		public function delete(){
			if(!empty($_GET)){
				$this->_modelObj->deleteAttr() ? $this->_redirectObj->succ('?a=attr','自定义商品属性删除成功!') : $this->_redirectObj->error('自定义商品属性删除失败!');
			}
			
		}

		//ajax判断自定义商品属性名称是否存在
		public function ajaxName(){
			if(!empty($_POST)){
				$this->_modelObj->ajaxName();
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}
	}
?>