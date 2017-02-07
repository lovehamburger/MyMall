<?php
/**
 * 订单控制器
 */
	class OrderAction extends Action
	{
		public function __construct() {
			parent::__construct();
		}

		//订单
		public function index(){
			$this->page($this->_modelObj->totalOrder(),PAGE_SIZE);
			$this->_tpl->assign('allOrder',$this->_modelObj->getAllOrder());
			$this->_tpl->display(SMARTY_ADMIN.'order/index.tpl');
		}

		//修改订单
		public function update(){
			if(!empty($_POST)){
				if($this->_modelObj->updateOrder()){
					$this->_redirectObj->succ('?a=order','订单修改成功!');
				}else{
					$this->_redirectObj->error('订单修改失败!');
				}
			}else{
				$this->_tpl->assign('oneOrder',$this->_modelObj->orderDetais()['0']);
				$this->_tpl->display(SMARTY_ADMIN.'order/update.tpl');
			}
			
		}

		//删除订单
		public function delete(){
			if(!empty($_GET)){
				$this->_modelObj->deleteOrder() ? $this->_redirectObj->succ('?a=goods','订单删除成功!') : $this->_redirectObj->error('订单删除失败,请确认该订单是否处于取消状态!');
			}
			
		}
	}
?>