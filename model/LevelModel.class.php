<?php
	/**
	 * 控制器基类
	 */
	class LevelModel extends Model
	{
		public function __construct(){
			parent::__construct(Factory::setCheck(),$this);//验证对象及本模型对象
			$this->_fields = array('id','level_name');
			$this->_tables = array(DB_FREFIX.'level');
		}
		//获取所有等级
		public  function  getAllLevel(){
			return $this->select(array('id','level_name'));
		}

	}
?>