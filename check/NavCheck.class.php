<?php
	
	/**
	* 导航条验证
	*/
	class NavCheck extends Check
	{
		public function addCheck(Model $_modelObj,$_param){
			if(parent::isNullString($_POST['name'])){
				$this->_message[] = "导航名称不能为空!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['name'],'20','max')){
				$this->_message[] = "导航名称不能大于20个字符!";
				$this->_flag = false;
			}

			if(parent::stringLen($_POST['info'],'200','max')){
				$this->_message[] = "导航简介不能大于200个字符!";
				$this->_flag = false;
			}

			if($_modelObj->OneNav($_param)){
				$this->_message[] = "该导航名称已被占用!";
				$this->_flag = false;
			}

			return $this->_flag;
		}

		public function updateCheck(Model $_modelObjt){
			if(parent::stringLen($_POST['info'],'200','max')){
				$this->_message[] = "导航简介不能大于200个字符!";
				$this->_flag = false;
			}
			return $this->_flag;
		}


		public function findOneCheck(Model $_modelObj,Array $_param){
			if(!$_modelObj->OneNav($_param)){
				$this->_message[] = "找不到指定导航条！";
				$this->_flag = false;
			}
			return $this->_flag;
		}

	}

?>