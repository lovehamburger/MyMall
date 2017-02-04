<?php
	//定义绝对路径
	define('ROOT_PATH',substr(dirname(__FILE__),0,-8));
	//引入入口文件
	require ROOT_PATH."/smarty/Smarty.class.php";
	require ROOT_PATH.'/configs/profile.inc.php';
	/*require ROOT_PATH."/public/Tpl.class.php";*///采用自动加载引入Tpl.class.php
	//设置编码方式
	header("Content-type:text/html;charset=utf-8");
	//设置时区
	date_default_timezone_set('Asia/Shanghai');
	session_start();
	//自动加载类
	function __autoload($_className) {
		if (substr($_className, -6) == 'Action') {
			require ROOT_PATH.'/controller/'.$_className.'.class.php';
		} elseif (substr($_className, -5) == 'Model') {
			require ROOT_PATH.'/model/'.$_className.'.class.php';
		}  elseif (substr($_className, -5) == 'Check') {
			require ROOT_PATH.'/check/'.$_className.'.class.php';
		} else {
			require ROOT_PATH.'/public/'.$_className.'.class.php';
		}
	}
	//调用简单工厂实现控制器的调用
	Factory::setAction()->run();
?>