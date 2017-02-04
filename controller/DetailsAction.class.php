<?php
	class DetailsAction extends Action
	{
		private $_nav = null;
		private $_goods = null;
		public function __construct(){
			parent::__construct();
			$this->_nav = new NavModel();
			$this->_goods = new GoodsModel();
		}

		public function index(){
			$this->_tpl->assign('topNav',$this->_nav->getTopNav());
			$this->_tpl->assign('BreadNav',$this->_nav->getBreadNav());
			$this->_tpl->assign('mainNav',$this->_nav->getMainNav());
			$this->_tpl->assign('detailGoods',$this->_goods->findDetailGoods()['0']);
			$this->_tpl->display(SMARTY_FRONT.'public/details.tpl');
		}
	}
?>