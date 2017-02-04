<?php
	/**
	 * 模型基类
	 */
	class Model extends DB
	{
		protected $_db = null;//父类对象
		protected $_fields = array();//数据库存在的字段
		protected $_limit = '';//分页条数
		protected $_checkObj;//验证对象

		//是否使用请求类
		protected function getRequest(){
			return Request::getInstance($this->_checkObj,$this);
		}

		protected function __construct(){
			$this->_db = parent::getInstance();
		}

		protected function add($_addData){
			return $this->_db->addData($this->_tables,$_addData);
		}

		protected function isOne(Array $_param){
			return $this->_db->isOneData($this->_tables,$_param);
		}

		protected function total(Array $_param = array()){
			return $this->_db->totalData($this->_tables,$_param);
		}

		protected  function  select(Array $_fields,Array $_param = array()){
			return $this->_db->selectData($this->_tables,$_fields,$_param);
		}

		protected  function  update(Array $_updataData,Array $_param){
			return $this->_db->updateData($this->_tables,$_updataData,$_param);
		}

		protected  function  delete(Array $_param){
			return $this->_db->deleteData($this->_tables,$_param);
		}

		protected  function  tableInfo(){
			return $this->_db->tableInfoData($this->_tables);
		}

		protected  function  lastID(){
			return $this->_db->lastID();
		}

		public function getLimit($_limit){
			$this->_limit = $_limit;
		}
	}
?>