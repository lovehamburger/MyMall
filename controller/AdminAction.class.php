<?php
	class AdminAction extends Action
	{
		private $_manage;

		public function __construct(){
			parent::__construct();
			$this->_manage = new  ManageModel();
		}


		
		public function index(){
			if(!empty($_SESSION['user'])){
				$this->_tpl->display(SMARTY_ADMIN.'public/admin.tpl');
			}else{
				$this->_redirectObj->succ('?a=admin&m=login');
			}
			
		}

		public function main(){
			$this->_tpl->display(SMARTY_ADMIN.'public/main.tpl');
		}

		public function login(){
			if(!empty($_POST)){
				if($this->_manage->checkLogin()){
					$manageRes = $this->_manage->findOneLogin();
					$_SESSION['user']= $manageRes['0']['user'];
					$_SESSION['level_name']= $manageRes['0']['level_name'];
					$this->_manage->countLogin();
					$this->_redirectObj->succ('?a=admin&m=index','用户登录成功!');
				}
			}else{
				$this->_tpl->display(SMARTY_ADMIN.'public/login.tpl');
			}
		}



		public function loginOut(){
			session_unset();
			$this->_redirectObj->succ('?a=admin&m=login');	
		}

		public function ajaxCheckLogin(){
			if(!empty($_POST['user']) && !empty($_POST['pass'])){
				$this->_manage->ajaxCheckLogin($_POST['user'],$_POST['pass']);
			}
		}

		public function ajaxCheckCode(){
			if(!empty($_POST['code'])){
				$this->_manage->ajaxCheckCode();
			}
		}
	}
?>