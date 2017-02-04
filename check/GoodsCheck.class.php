<?php
	
	/**
	* 商品验证
	*/
	class GoodsCheck extends Check
	{
		public function addCheck(Model $_modelObj,$_param){
			if($_POST['nav'] == -1){
				$this->_message[] = "必须选择商品类别!";
				$this->_flag = false;
			}

			if($_POST['bread'] == -1){
				$this->_message[] = "必须选择商品品牌!";
				$this->_flag = false;
			}
			
			if(parent::isNullString($_POST['name'])){
				$this->_message[] = "商品名称不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'100','max')){
				$this->_message[] = "商品名称不能大于100个字符!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'2','min')){
				$this->_message[] = "商品名称不能小于2个字符!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['sn'],'2','min')){
				$this->_message[] = "商品编号不能小于2个字符!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'50','max')){
				$this->_message[] = "商品编号不能大于50个字符!";
				$this->_flag = false;
			}

			if($_modelObj->OneGoods($_param)){
				$this->_message[] = "该商品编号已被占用!";
				$this->_flag = false;
			}

			return $this->_flag;
		}

		public function updateCheck(Model $_modelObj,$_param){
			if($_POST['nav'] == -1){
				$this->_message[] = "必须选择商品类别!";
				$this->_flag = false;
			}

			if($_POST['bread'] == -1){
				$this->_message[] = "必须选择商品品牌!";
				$this->_flag = false;
			}
			
			if(parent::isNullString($_POST['name'])){
				$this->_message[] = "商品名称不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'100','max')){
				$this->_message[] = "商品名称不能大于100个字符!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'2','min')){
				$this->_message[] = "商品名称不能小于2个字符!";
				$this->_flag = false;
			}
			if(parent::stringLen($_POST['sn'],'2','min')){
				$this->_message[] = "商品编号不能小于2个字符!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'50','max')){
				$this->_message[] = "商品编号不能大于50个字符!";
				$this->_flag = false;
			}

			if($_modelObj->OneGoods($_param)){
				$this->_message[] = "该商品编号已被占用!";
				$this->_flag = false;
			}
			return $this->_flag;
		}


		public function findOneCheck(Model $_modelObj,Array $_param){
			if(!$_modelObj->OneGoods($_param)){
				$this->_message[] = "找不到指定商品！";
				$this->_flag = false;
			}
			return $this->_flag;
		}

		public function ajaxSnCheck(Model $_modelObj,Array $_param){
			echo $_modelObj->OneGoods($_param) ?  -1 :  1;
		}
	}

?>