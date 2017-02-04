<?php
	
	/**
	* 会员验证
	*/
	class MemberCheck extends Check
	{
		public function addCheck(Model $_modelObj,$_param){
			if(parent::isNullString($_POST['user'])){
				$this->_message[] = "会员名不能为空!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['pass'])){
				$this->_message[] = "密码不能为空!";
				$this->_flag = false;
			}

			if($a = parent::isSameString($_POST['pass'],$_POST['notpass'])){
				$this->_message[] = "您输入的密码不一致！";
				$this->_flag = false;
			}

			if($_modelObj->OneMember($_param)){
				$this->_message[] = "该会员已被占注册";
				$this->_flag = false;
			}

			return $this->_flag;
		}

		public function updateCheck(Model $_modelObj){
			if(parent::isNullString($_POST['pass'])){
				$this->_message[] = "密码不能为空!";
				$this->_flag = false;
			}
			if($a = parent::isSameString($_POST['pass'],$_POST['notpass'])){
				$this->_message[] = "您输入的密码不一致！";
				$this->_flag = false;
			}
			if($_POST['level'] == 0){
				$this->_message[] = "请输入管理员等级";
				$this->_flag = false;
			}
			return $this->_flag;
		}

		public function findOneCheck(Model $_modelObj,Array $_param){
			if(!$_modelObj->OneMember($_param)){
				$this->_message[] = "找不到需要的管理员！";
				$this->_flag = false;
			}
			return $this->_flag;
		}

		public function loginCheck(Model $_modelObj,Array $_request,Array $_param){
			if(parent::isNullString($_request['user'])){
				$this->_message[] = "会员名不能为空!";
				$this->_flag = false;
			}
			if(parent::isNullString($_request['pass'])){
				$this->_message[] = "密码不能为空!";
				$this->_flag = false;
			}
			if(parent::isNullString($_request['frontcode'])){
				$this->_message[] = "验证码不能为空!";
				$this->_flag = false;
			}elseif(strtoupper($_request['frontcode']) !== strtoupper($_SESSION['frontcode'])){
				$this->_message[] = "验证码输入错误!";
				$this->_flag = false;
			}
			if(!parent::isNullString($_request['user']) && !parent::isNullString($_request['pass']) && empty($this->_message)) {
				if(!$_modelObj->OneMember($_param)){
					$this->_message[] = "会员名或密码错误!";
					$this->_flag = false;
				}
			}
			return $this->_flag;
		}

		//检查会员名或者密码是否输入正确
		public function ajaxCheckLogin(Model $_modelObj,Array $_param){
			echo  $_modelObj->OneMember($_param) ? 1 : -1;
		}


		//检查验证码是否输入正确
		public function checkCode($_code){
			echo strtoupper($_code) !== strtoupper($_SESSION['frontcode']) ? 0 : 1;
		}
	}

?>