<?php
	
	/**
	* 品牌验证
	*/
	class BreadCheck extends Check
	{
		public function addCheck(Model $_modelObj,$_param){
			if(parent::isNullString($_POST['name'])){
				$this->_message[] = "品牌名称不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'20','max')){
				$this->_message[] = "品牌名称不能大于20个字符!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['info'],'200','max')){
				$this->_message[] = "品牌简介不能大于200个字符!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['url'],'200','max')){
				$this->_message[] = "官方网站不能大于200个字符!";
				$this->_flag = false;
			}

			if($_modelObj->OneBread($_param)){
				$this->_message[] = "该品牌名称已被占用!";
				$this->_flag = false;
			}

			return $this->_flag;
		}

		public function updateCheck(Model $_modelObjt){
			if(parent::stringLen($_POST['url'],'200','max')){
				$this->_message[] = "官方网站不能大于200个字符!";
				$this->_flag = false;
			}
			if(parent::stringLen($_POST['info'],'200','max')){
				$this->_message[] = "品牌简介不能大于200个字符!";
				$this->_flag = false;
			}
			return $this->_flag;
		}


		public function findOneCheck(Model $_modelObj,Array $_param){
			if(!$_modelObj->OneBread($_param)){
				$this->_message[] = "找不到指定品牌！";
				$this->_flag = false;
			}
			return $this->_flag;
		}

		public function ajaxNameCheck(Model $_modelObj,Array $_param){
			echo $_modelObj->OneBread($_param) ?  -1 :  1;
		}
	}

?>