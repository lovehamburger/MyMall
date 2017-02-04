<?php
	
	/**
	* 管理员验证
	*/
	class ManageCheck extends Check
	{
		public function addCheck(Model $_modelObj,$_param){
			if(parent::isNullString($_POST['user'])){
				$this->_message[] = "用户名不能为空!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['pass'])){
				$this->_message[] = "密码不能为空!";
				$this->_flag = false;
			}


			if($_val = parent::stringLength($_POST['user'],array(3,10))){
				switch ($_val) {
					case '-1':
						$this->_message[] = "需要输入一个或两个值";
						$this->_flag = false;
						break;
					case '-2':
						$this->_message[] = "请输入数组格式";
						$this->_flag = false;
						break;
					case '-3':
						$this->_message[] = "长度未达到要求";
						$this->_flag = false;
						break;
					case '-4':
						$this->_message[] = "长度要在指定范围内";
						$this->_flag = false;
						break;
					case '-5':
						$this->_message[] = "必须是数字";
						$this->_flag = false;
						break;
					default:
						$this->_message[] = "未知错误";
						$this->_flag = false;
						break;
				}
			}

			if($a = parent::isSameString($_POST['pass'],$_POST['notpass'])){
				$this->_message[] = "您输入的密码不一致！";
				$this->_flag = false;
			}

			if($_POST['level'] == 0){
				$this->_message[] = "请输入管理员等级";
				$this->_flag = false;
			}

			if($_modelObj->OneManage($_param)){
				$this->_message[] = "该账号已被占用!";
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
			if(!$_modelObj->OneManage($_param)){
				$this->_message[] = "找不到需要的管理员！";
				$this->_flag = false;
			}
			return $this->_flag;
		}

		public function loginCheck(Model $_modelObj,Array $_request,Array $_param){
			if(parent::isNullString($_request['user'])){
				$this->_message[] = "用户名不能为空!";
				$this->_flag = false;
			}
			if(parent::isNullString($_request['pass'])){
				$this->_message[] = "密码不能为空!";
				$this->_flag = false;
			}
			if(parent::isNullString($_request['code'])){
				$this->_message[] = "验证码不能为空!";
				$this->_flag = false;
			}elseif(strtoupper($_request['code']) !== strtoupper($_SESSION['code'])){
				$this->_message[] = "验证码输入错误!";
				$this->_flag = false;
			}
			if(!parent::isNullString($_request['user']) && !parent::isNullString($_request['pass']) && empty($this->_message)) {
				if(!$_modelObj->OneManage($_param)){
					$this->_message[] = "用户名或密码错误!";
					$this->_flag = false;
				}
			}
			return $this->_flag;
		}

		//检查用户名或者密码是否输入正确
		public function ajaxCheckLogin(Model $_modelObj,Array $_param){
			if(!$_modelObj->OneManage($_param)){
					$info['state'] = 0;
			}else{	
					$info['state'] = 1;
			}
			echo  json_encode($info);
		}


		//检查验证码是否输入正确
		public function checkCode($_code){
			strtoupper($_code) !== strtoupper($_SESSION['code']) ? $info['state'] = 0 : $info['state'] = 1;
			echo  json_encode($info);
		}
	}

?>