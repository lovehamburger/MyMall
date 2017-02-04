<?php
	/**
	* TPL继承Smarty
	*/
	class Tpl extends smarty
	{
		//设置静态变量保存数据
		static private $instance = null;
		//设置静态方法供客户端调用
		static public function getInstance(){
			if(!(self::$instance instanceof self)){
				self::$instance = new self();
			}
				return self::$instance;
		}

		//私有克隆
		private function __clone (){}

		private function __construct()
		{
			$this->setConfigs();
		}

		//设置Smarty配置
		private function setConfigs(){
			$this->template_dir = SMARTY_TEMPLATE_DIR;//修改模板存放文件名

			$this->compile_dir = SMARTY_COMPILE_DIR;//修改模板编译存放文件名

			$this->config_dir = SMARTY_CACHE_DIR;//修改smarty设置文件名

			$this->caching = SMARTY_CACHING;//是否开启缓存

			$this->cache_lifetime = SMARTY_CACHE_LIFETIME;//设置缓存时间

			$this->left_delimiter = SMARTY_LEFT_DELIMITER;//设置边界符号

			$this->right_delimiter = SMARTY_RIGHT_DELIMITER;//设置边界符号

		}
	}

?>