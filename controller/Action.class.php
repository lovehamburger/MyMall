<?php
	/**
	 * 控制器基类
	 */
	class Action
	{
		protected $_tpl;
		protected $_modelObj;//模型类
		protected $_redirectObj;//重定向类

		protected function __construct(){
			//实例化smarty对象
			$this->_modelObj = Factory::setModel();
			$this->_redirectObj = Redirect::getInstance();
			$this->_tpl = Tpl::getInstance();
		}

		protected function page($_total,$_pagesize = PAGE_SIZE,$_obj = ''){
			$this->_modelObj = $_obj ? $_obj : $this->_modelObj;
			$_page = new Page($_total,$_pagesize);
			$this->_modelObj->getLimit($_page->getLimit());
			$this->_tpl->assign('page',$_page->showpage());
		}

		//执行需要运行的类方法
		public function run(){
			$_m = isset($_GET['m']) ? $_GET['m']:'index';//接收方法值
			method_exists ($this,$_m) ? eval('$this->'.$_m.'();') : $this->index();//检测在本类中是否存在此方法
		}
	}
?>