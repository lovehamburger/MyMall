<?php
	
	/**
	* 价格区间设置验证
	*/
	class PriceCheck extends Check
	{
		public function addCheck(Model $_modelObj){
			if(parent::isNullString($_POST['price_left'])){
				$this->_message[] = "左价格区间不能为空!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['price_right'])){
				$this->_message[] = "右价格区间不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['price_left'],'5','max') || parent::stringLen($_POST['price_right'],'5','max')){
				$this->_message[] = "价格区间设置不能大于5个字符!";
				$this->_flag = false;
			}

			if(!is_numeric($_POST['price_left']) || !is_numeric($_POST['price_right'])){
				$this->_message[] = "价格区间必须是数字!";
				$this->_flag = false;
			}

			if($_POST['price_left'] > $_POST['price_right']){
				$this->_message[] = "左区间价格必须小于右区间!";
				$this->_flag = false;
			}

			return $this->_flag;
		}

		public function updateCheck(){
			if(parent::isNullString($_POST['price_left'])){
				$this->_message[] = "左价格区间不能为空!";
				$this->_flag = false;
			}

			if(parent::isNullString($_POST['price_right'])){
				$this->_message[] = "右价格区间不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['price_left'],'5','max') || parent::stringLen($_POST['price_right'],'5','max')){
				$this->_message[] = "价格区间设置不能大于5个字符!";
				$this->_flag = false;
			}

			if(!is_numeric($_POST['price_left']) || !is_numeric($_POST['price_right'])){
				$this->_message[] = "价格区间必须是数字!";
				$this->_flag = false;
			}

			if($_POST['price_left'] > $_POST['price_right']){
				$this->_message[] = "左区间价格必须小于右区间!";
				$this->_flag = false;
			}

			return $this->_flag;
		}

		public function findOneCheck(Model $_modelObj,$_param){
			if(!$_modelObj->onePrice($_param)){
				$this->_message[] = "找不到指定数据!";
				$this->_flag = false;
			}
			return $this->_flag;
		}

	}

?>