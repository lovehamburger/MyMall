<?php
	/**
	* 工厂类
	*/
	class Factory
	{
		static public $_obj = null;

		static public function setAction(){
			//接收链接地址参数，包含控制器名称，以及方法
			$_a = self::getA();
			if (in_array($_a, array('manage', 'nav', 'level'))) {
				if (!isset($_SESSION['user'])) {
					Redirect::getInstance()->succ('?a=admin&m=login');	
				}
			}
			if(!file_exists(ROOT_PATH.'/controller/'.ucfirst($_a).'Action.class.php')){
				$_a = 'index';
			}
			eval('self::$_obj = new '.ucfirst($_a).'Action();');
			return self::$_obj;
		}

		static public function setModel(){
			$_a = self::getA();
			if(file_exists(ROOT_PATH.'/model/'.ucfirst($_a).'Model.class.php')){
				eval('self::$_obj = new '.ucfirst($_a).'Model();');
			}
			return self::$_obj;
		}

		static public function setCheck(){
			$_a = self::getA();
			if(file_exists(ROOT_PATH.'/check/'.ucfirst($_a).'Check.class.php')){
				eval('self::$_obj = new '.ucfirst($_a).'Check();');
			}
			return self::$_obj;
		}

		static private function getA(){
			return $_a = isset($_GET['a']) ? $_GET['a']:'index';
		}
	}

?>