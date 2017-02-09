<?php
	class ListAction extends Action
	{
		private $_nav = null;
		private $_goods = null;
		public function __construct(){
			parent::__construct();
			$this->_nav = new NavModel();
			$this->_goods = new GoodsModel();
		}

		public function index(){
			if(!empty($_GET['navid'])){
				$this->page($this->_goods->totalGoods(),PAGE_SIZE,$this->_goods);
				$this->_tpl->assign('topNav',$this->_nav->getTopNav());
				$this->_tpl->assign('BreadNav',$this->_nav->getBreadNav());
				$this->_tpl->assign('mainNav',$this->_nav->getMainNav());
				$this->_tpl->assign('navPrice',$this->_nav->findFrontPrice());
				$this->_tpl->assign('navBread',$this->_nav->findFrontBread());
				$this->_tpl->assign('navAttr',$this->_nav->findFrontAttr());
				$this->_tpl->assign('allGoods',$this->_goods->findListGoods());
				$this->_tpl->assign('hotProduct',$this->_goods->hotProduct());
				$this->_tpl->assign('url',Tool::setUrl());
				$this->_tpl->display(SMARTY_FRONT.'public/list.tpl');
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}
	}
?>