<?php
	class IndexAction extends Action
	{
		private $_nav;
		public function __construct(){
			parent::__construct();
			$this->_nav = new NavModel();
		}

		public function index(){
			$this->_tpl->assign('topNav',$this->_nav->getTopNav());
			$this->_tpl->display(SMARTY_FRONT.'public/index.tpl');
		}

		public function update(){
			echo "更新数据";
		}
	}
?>