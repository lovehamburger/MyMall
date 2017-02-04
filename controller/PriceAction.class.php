<?php
/**
 * 价格区间设置控制器
 */
	class PriceAction extends Action
	{
		private $_nav = null;
		public function __construct() {
			parent::__construct();
			$this->_nav = new NavModel();
		}

		//价格区间设置
		public function index(){
			$this->page($this->_modelObj->totalPrice(),PAGE_SIZE);
			$this->_tpl->assign('allPrice',$this->_modelObj->getAllPrice());
			$this->_tpl->display(SMARTY_ADMIN.'price/index.tpl');
		}

		//添加价格区间设置
		public function add(){
			if(!empty($_POST)){
				if($this->_modelObj->addPrice()){
					$this->_redirectObj->succ('?a=price','价格区间设置添加成功!');
				}else{
					$this->_redirectObj->error('价格区间设置添加失败!');
				}
			}
			$this->_tpl->display(SMARTY_ADMIN.'price/add.tpl');
		}

		//修改价格区间设置
		public function update(){
			if(!empty($_POST)){
				if($this->_modelObj->updatePrice()){
					$this->_redirectObj->succ('?a=price','价格区间设置修改成功!');
				}else{
					$this->_redirectObj->error('价格区间设置修改失败!');
				}
			}else{
				$this->_tpl->assign('onePrice',$this->_modelObj->findOnePrice()['0']);
				$this->_tpl->display(SMARTY_ADMIN.'price/update.tpl');
			}
			
		}

		//删除价格区间设置
		public function delete(){
			if(!empty($_GET['id'])){
				$this->_modelObj->deletePrice() ? $this->_redirectObj->succ('?a=price','价格区间设置删除成功!') : $this->_redirectObj->error('价格区间设置删除失败!');
			}else{
				$this->_redirectObj->error('非法访问!');
			}
			
		}

		//ajax判断价格区间设置名称是否存在
		public function ajaxName(){
			if(!empty($_POST['name'])){
				$this->_modelObj->ajaxName();
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}
	}
?>