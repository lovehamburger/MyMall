<?php
	
	/**
	* 购物车验证
	*/
	class CartCheck extends Check
	{
		public function addCheck(Model $_modelObj,$_param){
			
			if(parent::isNullString($_POST['name'])){
				$this->_message[] = "购物车名称不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'100','max')){
				$this->_message[] = "购物车名称不能大于100个字符!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'2','min')){
				$this->_message[] = "购物车名称不能小于2个字符!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['info'])){
				$this->_message[] = "购物车简介不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['info'],'200','max')){
				$this->_message[] = "购物车简介不能大于200个字符!";
				$this->_flag = false;
			}


			if($_modelObj->OneCart($_param)){
				$this->_message[] = "该购物车编号已被占用!";
				$this->_flag = false;
			}

			return $this->_flag;
		}

		public function updateCheck(Model $_modelObj,$_param){
			if(parent::isNullString($_POST['name'])){
				$this->_message[] = "购物车名称不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'6','max')){
				$this->_message[] = "购物车名称不能大于6个字符!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'2','min')){
				$this->_message[] = "购物车名称不能小于2个字符!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['info'])){
				$this->_message[] = "购物车简介不能为空!";
				$this->_flag = false;
			}
			
			if(parent::stringLen($_POST['info'],'200','max')){
				$this->_message[] = "购物车简介不能大于200个字符!";
				$this->_flag = false;
			}

			if($_modelObj->OneCart($_param)){
				$this->_message[] = "该购物车编号已被占用!";
				$this->_flag = false;
			}
			return $this->_flag;
		}


		public function findOneCheck(Model $_modelObj,Array $_param){
			if(!$_modelObj->OneCart($_param)){
				$this->_message[] = "找不到指定购物车数据！";
				$this->_flag = false;
			}
			return $this->_flag;
		}

		public function ajaxNameCheck(Model $_modelObj,Array $_param){
			echo $_modelObj->OneCart($_param) ?  -1 :  1;
		}
	}

?>