<?php
	/**
	 * 品牌模型类
	 */
	class BreadModel extends Model
	{
		public function __construct(){
			parent::__construct();
			$this->_fields = array('id','name','info','url');
			$this->_tables = array(DB_FREFIX.'bread');
			$this->_checkObj = new BreadCheck();
		}

		public function addBread(){
			list($_name) = $this->getRequest()->getParam(array($_POST['name']));
			$_where = array("name='$_name'");
			if(!$this->_checkObj->addCheck($this,$_where)){
				$this->_checkObj->error();
			}
			$addData = $this->getRequest()->add($this->_fields);
			$addData['reg_time'] = time();
			return parent::add($addData);
		}
 
		public function totalBread(){
			return parent::total();
		}

		//分页显示所有数据
		public function getAllBread(){
			return parent::select(array('*'),array('limit'=>$this->_limit,'order'=>'reg_time ASC'));
		}

		//显示所有数据
		public function getBreads(){
			return parent::select(array('id','name'),array('order'=>'reg_time ASC'));
		}

		//获取指定的一条数据
		public function findOneBread(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='$_id'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			return parent::select(array('id','name','info','url'),array('where'=>array("id='$_id'"),'limit' =>'1'));
		}

		public function updateBread(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='$_id'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			if(!$this->_checkObj->updateCheck($this)){
				$this->_checkObj->error();
			}
			$upData = $this->getRequest()->update($this->_fields);
			return parent::update($upData,array('where'=>$_where));
		}

		/**
		 * 验证品牌是否重复
		 * @param [type:array] $_where [品牌名]
		 */
		public function OneBread($_where){
			return parent::isOne($_where);
		}

		public function deleteBread(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='$_id'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			return parent::delete($_where);
		}

		public function ajaxName(){
			list($_name) = $this->getRequest()->getParam(array($_POST['name']));
			$_where = array("name='$_name'");
			$this->_checkObj->ajaxNameCheck($this,$_where);
		}

		public function getAddGoodBread(){
			list($_id)= $this->getRequest()->getParam(array($_POST['id']));
			$this->_tables = array(DB_FREFIX.'nav');
			$_OneNav = parent::select(array('bread'),array('where'=>array("id='$_id'")));
			if($_OneNav['0']['bread'] == ''){
				$return['state'] = 0;
				$return['msg'] = "其他品牌";
				echo json_encode($return);
				return;
			}
			$this->_tables = array(DB_FREFIX.'bread');
			$_ajaxBread = parent::select(array('id,name,reg_time'),array('where'=>array("id in ({$_OneNav['0']['bread']})")));
			
			$return['state'] = 1;
			$return['msg'] = $_ajaxBread;
		 	echo json_encode($return);
		}
	}
?>