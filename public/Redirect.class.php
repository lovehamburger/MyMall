<?php
/**
* 跳转类
*/
	class  Redirect
	{
		static private $_instance = null ;
		private $_tpl = null ;

		static public function getInstance(){
			if(!(self::$_instance instanceof self)){
				self::$_instance = new self();
				self::$_instance->_tpl = Tpl::getInstance();
			}
			return self::$_instance;
		}
		
		//私有克隆
		private function __clone() {}

		private function __construct(){}

		//成功跳转
		public function succ($_url,$_info = null){
			if(!empty($_info)){
				$this->_tpl->assign('message',$_info);
				$this->_tpl->assign('url',$_url);
				$this->_tpl->display(SMARTY_ADMIN.'public/succ.tpl');
			}else{
				header('Location:'. $_url);
			}
			exit();
		}
		//失败返回
		public function error($_info){
			$this->_tpl->assign('message',$_info);
			$this->_tpl->assign('prev', Tool::getPrevPage());
			$this->_tpl->display(SMARTY_ADMIN.'public/error.tpl');
			exit();
		}

		//关闭窗口并刷新
		public function close($_info){
			echo "<script language=JavaScript>alert('".$_info."');self.opener.location.reload();</script>";
			echo "<script>window.opener=null;window.close();</script>";
		}

	}
?>