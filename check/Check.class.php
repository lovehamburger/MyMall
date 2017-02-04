<?php
	/**
	* 验证类信息
	*/
	class Check extends Validate
	{
		protected $_flag = true;

		protected $_message = array();

		protected $_tpl = null;

		public function __construct(){
			$this->_tpl = Tpl::getInstance();
		}

		//获取消息集
		private function getMessage() {
			return $this->_message;
		}

		//数据检查不到后返回的内容
		public function error($_url = '',$_message = ''){
			if(empty($_url)){
				$this->_tpl->assign('message',$this->getMessage());
				$this->_tpl->assign('prev', Tool::getPrevPage());
				$this->_tpl->display(SMARTY_ADMIN.'public/error.tpl');
			}else if(!empty($_url) && !empty($_message)){
				Redirect::getInstance()->succ($_url,$_message);
			}else{
				Redirect::getInstance()->succ($_url);
			}
			exit();
		}
	}
?>