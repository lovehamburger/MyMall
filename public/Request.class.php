<?php
/**
* 请求验证类
*/
	class Request
	{
		static private $_instance = null ;
		private $_check = null ;
		private $_model = null ;

		static public function getInstance($checkObj,$_model){
			if(!(self::$_instance instanceof self)){
				self::$_instance = new self();
				self::$_instance->_model = $_model;
			}
			return self::$_instance;
		}
		
		//私有克隆
		private function __clone() {}

		private function __construct(){

		}

		//获取参数处理
		public function getParam(Array $_param){
			$_getParam = array();
			foreach ($_param as $key => $value) {
				if($key == 'in'){
					$value = str_replace(',', "','", $value);
				}
				$_getParam[] = Tool::setFormString($value);
			}
			return $_getParam;
		}

		//增加数据
		public function add(Array $_fields){
			if(is_array($_POST) && count($_POST)){
				$_POST = Tool::setFormString($_POST);
				$_addData = $this->selectData($_POST,$_fields);
				return $_addData;
			}
		}

		//修改数据
		public function update(Array $_fields){
			if(is_array($_POST) && count($_POST)){
				$_POST = Tool::setFormString($_POST);
				$_updateData = $this->selectData($_POST,$_fields);
				return $_updateData;
			}
		}
		
		//数据的筛选
		private function selectData($_request,$_fields){
			$_selectData= '';
			foreach ($_request as $key => $value) {
				if(in_array($key, $_fields)){
					$_selectData[$key] = $value;
				}
			}
			return $_selectData;
		}
	}
?>