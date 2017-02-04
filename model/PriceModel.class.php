<?php
	/**
	 * 价格区间设置模型类
	 */
	class PriceModel extends Model
	{
		public function __construct(){
			parent::__construct();//验证对象及本模型对象
			$this->_fields = array('id','price_left','price_right');
			$this->_tables = array(DB_FREFIX.'Price');
			$this->_checkObj = new PriceCheck();
		}
		/**
		 * 添加价格区间设置方法
		 */
		public function addPrice(){
			if(!$this->_checkObj->addCheck($this)){
				$this->_checkObj->error();
			}
			$_addData = $this->getRequest()->add($this->_fields);
			return parent::add($_addData);
		}

		/**
		 * 查找指定数据是否存在
		 */
		public function onePrice(Array $_param){
			return parent::isOne($_param);
		}

		//获取条数
		public function totalPrice(){
			return parent::total();
		}

		//删除指定内容
		public function deletePrice(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			return parent::delete($_where);
		}

		//获取指定的一条数据
		public function findOnePrice(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			$_onePrice = parent::select(array('*'),array('where'=>$_where,'limit' =>'1'));
			return $_onePrice;
		}


		//修改指定的一条数据
		public function updatePrice(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			if(!$this->_checkObj->updateCheck()){
				$this->_checkObj->error();
			}
			$_updataData = $this->getRequest()->update($this->_fields);
			if(!empty($_updataData['nav'])){
				$_updataData['nav'] = implode(",",$_updataData['nav']);
			}
			return parent::update($_updataData,array('where'=>$_where));
		}


		//获取所有价格区间设置
		public  function  getAllPrice(){
			$_allPrice = $this->select(array('*'),array('limit' =>$this->_limit));
			if(!empty($_allPrice)){
				foreach ($_allPrice as $key => $value) {
					$_allPrice[$key]['price'] = $value['price_left'].'-'.$value['price_right'];
				}
			}
			return $_allPrice;

		}
	}
?>