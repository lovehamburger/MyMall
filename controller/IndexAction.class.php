<?php
	class IndexAction extends Action
	{
		private $_nav = null;
		private $_bread = null;
	
		public function __construct() {
			parent::__construct();
			$this->_nav = new NavModel();
			$this->_goods = new GoodsModel();
			$this->_bread = new BreadModel();
		}

		public function index(){
			$this->_tpl->assign('topNav',$this->_nav->getTopNav());
			$this->_tpl->assign('allBread',$this->_bread->getAllBread());
			$this->_tpl->assign('hotProduct',$this->_goods->hotProduct());
			$this->_tpl->assign('recommend',$this->_goods->recommend());
			$this->_tpl->display(SMARTY_FRONT.'public/index.tpl');
		}

	}
?>

