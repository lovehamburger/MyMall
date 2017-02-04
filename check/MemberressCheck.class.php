<?php
	
	/**
	* 自定义属性验证
	*/
	class MemberressCheck extends Check
	{
		public function addCheck(){
			if(parent::isNullString($_POST['name'])){
				$this->_message[] = "收货人不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'25','max')){
				$this->_message[] = "长度不能大于25个字符!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['address'])){
				$this->_message[] = "收货人地址不能为空!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['email'])){
				$this->_message[] = "电子邮件不能为空!";
				$this->_flag = false;
			}

			if(!parent::checkEmail($_POST['email'])){
				$this->_message[] = "电子邮件格式不正确!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['tel'])){
				$this->_message[] = "电话号码不能为空!";
				$this->_flag = false;
			}

			if(!parent::checkTel($_POST['tel'])){
				$this->_message[] = "电话号码格式不正确!";
				$this->_flag = false;
			}

			return $this->_flag;
		}

		public function updateCheck(){
			if(parent::isNullString($_POST['name'])){
				$this->_message[] = "收货人不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'25','max')){
				$this->_message[] = "长度不能大于25个字符!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['address'])){
				$this->_message[] = "收货人地址不能为空!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['email'])){
				$this->_message[] = "电子邮件不能为空!";
				$this->_flag = false;
			}

			if(!parent::checkEmail($_POST['email'])){
				$this->_message[] = "电子邮件格式不正确!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['tel'])){
				$this->_message[] = "电话号码不能为空!";
				$this->_flag = false;
			}

			if(!parent::checkTel($_POST['tel'])){
				$this->_message[] = "电话号码格式不正确!";
				$this->_flag = false;
			}

			return $this->_flag;
		}


		public function findOneCheck(Model $_modelObj,Array $_param){
			if(!$_modelObj->OneRess($_param)){
				$this->_message[] = "找不到指定地址！";
				$this->_flag = false;
			}
			return $this->_flag;
		}

		public function ajaxNameCheck(Model $_modelObj,Array $_param){
			echo $_modelObj->OneAttr($_param) ?  -1 :  1;
		}
	}

?>