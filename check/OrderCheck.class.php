<?php
	
	/**
	* 自定义属性验证
	*/
	class OrderCheck extends Check
	{
		public function findOneCheck(Model $_modelObj,Array $_param){
			if(!$_modelObj->OneOrder($_param)){
				$this->_message[] = "找不到指定订单！";
				$this->_flag = false;
			}
			return $this->_flag;
		}
	}

?>