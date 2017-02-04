<?php
	/**
	 * 导航条模型类
	 */
	class NavModel extends Model
	{
		public function __construct(){
			parent::__construct();//验证对象
			$this->_fields = array('id','name','info','sort','sid','bread','price');
			$this->_tables = array(DB_FREFIX.'nav');
			$this->_checkObj = new NavCheck();
		}
		/**
		 * 添加导航条方法
		 */
		public function addNav(){
			list($_name) = $this->getRequest()->getParam(array($_POST['name']));
			$_where = array("name='$_name'");
			if(!$this->_checkObj->addCheck($this,$_where)){
				$this->_checkObj->error();		
			}
			$_addData = $this->getRequest()->add($this->_fields);
			if(!empty($_addData['bread'])){
				$_addData['bread'] = implode(',',$_addData['bread']);
			}
			if(!empty($_addData['price'])){
				$_addData['price'] = implode(',',$_addData['price']);
			}
			$_addData['sort'] = parent::tableInfo();
			return parent::add($_addData);
		}

		/**
		 * 验证管导航条是否重复
		 * @param [type:array] $_where [导航名]
		 */
		public function OneNav($_where){
			return parent::isOne($_where);
		}

		//获取导航条条数
		public function totalNav(){
			list($_id) = !empty($_GET['id']) ? $this->getRequest()->getParam(array($_GET['id'])) : '0';
			return parent::total(array('where'=>array("sid='$_id'")));
		}

		//删除指定内容
		public function deleteNav(){
			list($_id)= $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='$_id'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			return parent::delete($_where);
		}

		//获取指定的一条数据
		public function findOneNav(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='$_id'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			$_getNav = parent::select(array('id','name','info','sort','sid','bread','price'),array('where'=>array("id='$_id'"),'limit' =>'1'));
			if(!empty($_getNav['0']['bread'])){
				$_getNav['0']['bread'] = explode(',', $_getNav['0']['bread']);
			}else{
				$_getNav['0']['bread'] = array();
			}
			if(!empty($_getNav['0']['price'])){
				$_getNav['0']['price'] = explode(',', $_getNav['0']['price']);
			}else{
				$_getNav['0']['price'] = array();
			}
			return $_getNav;
		}
		//获取指定的一条导航价格
		public function findFrontPrice(){
			if(list($_navid) = $this->getRequest()->getParam(array($_GET['navid']))){
				$_getNavPrice = parent::select(array('price'),array('where'=>array("id='$_navid'"),'limit' =>'1'));
				if(!empty($_getNavPrice['0']['price'])){
					foreach ($_getNavPrice as $key => $value) {
						$_getNavPrice = explode(',',$value['price']);
						foreach ($_getNavPrice as $key1 => $value1) {
							$_newPrice[$key1] = str_replace("-",",",$value1);
							$_getNewPrice[$_newPrice[$key1]] = $value1;
						}
					}
				}else{
					$_getNewPrice = null;
				}
				return $_getNewPrice;
			}
		}

		//获取指定的一条导航价格
		public function findFrontBread(){
			list($_navid) = $this->getRequest()->getParam(array($_GET['navid']));
			if($_navid){
				$_subNav= parent::select(array('id'),array('where'=>array("sid = '$_navid'")));
				if(!empty($_subNav)){
					$_navid = '';
					foreach ($_subNav as $key => $value) {
						$_navid.=$value['id'].',';
					}
					$_navid = substr($_navid,0,-1);
				}
				$_Bread= parent::select(array('bread'),array('where'=>array("id in ($_navid)")));
				if(!empty($_Bread['0']['bread'])){
					$this->_tables = array(DB_FREFIX.'bread');
					foreach ($_Bread as $key => $value) {
						if(!empty($value['bread'])){
							$_breadIdName = parent::select(array('id','name'),array('where'=>array("id in ({$value['bread']})")));
						}
						foreach ($_breadIdName as $key1 => $value1) {
							$_breadName[$value1['id']] = $value1['name'];
						}
					}
				}else{
					$_breadName['0'] = '其他品牌';
				}
				$this->_tables = array(DB_FREFIX.'nav');
				return $_breadName;
			}
		}

		//获取指定的一条导航价格
		public function findFrontAttr(){
			list($_navid)= $this->getRequest()->getParam(array($_GET['navid']));
			if(intval($_navid)){
				$_subNavId= parent::select(array('id'),array('where'=>array("sid = '$_navid'")));
				$this->_tables = array(DB_FREFIX.'attr');
				$_attr = array();
				if(!empty($_subNavId)){
					foreach ($_subNavId as $key => $value) {
						$_attrNameInfo = parent::select(array('name','info'),array('like'=>array('nav'=>$value['id'])));
						if(!empty($_attrNameInfo)){
							foreach ($_attrNameInfo as $key1 => $value1) {
								if(!empty($value1)){
									$_attr[$value1['name']] = $value1['info'];
									$_attr[$value1['name']] = explode('|',$_attr[$value1['name']]);
								}
							}
						}
					}
				}else{
					$_attrNameInfo = parent::select(array('name','info'),array('like'=>array('nav'=>$_navid)));
					if(!empty($_attrNameInfo)){
						foreach ($_attrNameInfo as $key => $value) {
							$_attr[$value['name']] = $value['info'];
							$_attr[$value['name']] = explode('|',$value['info']);
						}
					}
				}
			return $_attr;
		}
	}
			

		//修改指定的一条数据
		public function updateNav(){
			list($_id)= $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='$_id'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			if(!$this->_checkObj->updateCheck($this)){
				$this->_checkObj->error();
			}
			$_updataData = $this->getRequest()->update($this->_fields);
			if(!empty($_updataData['bread'])){
				$_updataData['bread'] = implode(',',$_updataData['bread']);
			}else{
				$_updataData['bread'] = '';
			}
			if(!empty($_updataData['price'])){
				$_updataData['price'] = implode(',',$_updataData['price']);
			}else{
				$_updataData['price'] = '';
			}
			return parent::update($_updataData,array('where'=>$_where));
		}

		//修改导航条排序
		public function sortEdit(){
			foreach ($_POST as $key => $value) {
				if(is_numeric($value)){
					parent::update(array('sort'=>$value),array('where'=>array("id='$key'")));
				}else{
					continue;
				}
			}
			return true;
		}
		//获取顶级导航条
		public function getTopNav(){
			return parent::select(array('id','name'),array('limit'=>10,'where'=>array("sid='0'"),'order'=>'sort asc'));
		}

		//获取下级导航条
		public function getsubNav(){
			list($_id)= $this->getRequest()->getParam(array($_GET['id']));
			if(!$this->_checkObj->findOneCheck($this,array("id=$_id"))){
				$this->_checkObj->error('./');
			}
			$a = parent::select(array('id','name','sid'),array('limit'=>10,'where'=>array("id='$_id'"),'order'=>'sort asc'));
			if($a['0']['sid'] !== '0'){
				$b['sub'] = parent::select(array('id','name','sid'),array('where'=>array("sid='{$a['0']['sid']}'"),'order'=>'sort asc'));
					$b['top']['topid'] = $a['0']['sid'];
			}else{
				$b['sub'] = parent::select(array('id','name','sid'),array('limit'=>10,'where'=>array("sid='$_id'"),'order'=>'sort asc'));
				if(!empty($b)){
					$b['top']['topid'] = $a['0']['id'];
				}
			}
			$b['top']['topname']= $a['0']['name'];
			
			return $b;
		}

		public function getAddGoodsNav() {
		$_allNav = parent::select(array('id','name','sid'), 
													array('order'=>'sort ASC'));
		foreach ($_allNav as $_key=>$_value) {
			$_value['sid'] == 0 ? $_mainNav[] = $_value : $_childNav[] = $_value;
		}
		
		foreach ($_mainNav as $_key=>$_value) {
			foreach ($_childNav as $_key1=>$_value2) {
				if($_value2['sid'] == $_value['id']){
					$_mainNav[$_key]['sub'][$_value2['id']] = $_value2['name'];
				}
			}
		}
		return $_mainNav;
	}

		//获取所有导航条
		public function  getAllNav(){
			list($_id) = !empty($_GET['id']) ? $this->getRequest()->getParam(array($_GET['id'])) : '0';
			$_AllNav = parent::select(array('id','name','info','sort','bread'),array('limit'=>$this->_limit,'where'=>array("sid='$_id'"),'order'=>'sort asc'));
			if(!empty($_AllNav)){
				foreach ($_AllNav as $key => $value) {
					if(!empty($value['bread'])){
						$this->_tables = array(DB_FREFIX.'bread');
						$_getBread= parent::select(array('name'),array('where'=>array("id in ({$value['bread']})"),'order'=>'reg_time asc'));
						$_and = null;
						foreach ($_getBread as $key1 => $value1) {
							$_and.=$value1['name'].',';
							$_AllNav[$key]['bread'] = substr($_and, 0, -1);
						}
					}else{
						$_AllNav[$key]['bread'] = '其他品牌';
					}
				}
			}
			return $_AllNav;
		}

		//获取主导航
		public function getMainNav(){
			list($_navid)= $this->getRequest()->getParam(array($_GET['navid']));
			if(!$this->_checkObj->findOneCheck($this,array("id=$_navid"))){
				$this->_checkObj->error('./');
			}
			$_mainNav = $_childNav = $_allNav = array();
			$_allNav = parent::select(array('*'));
			return Tree::getInstance()->getTree($_allNav,$_navid);
		}

		//制作面包屑导航
		public function getBreadNav(){
			list($_navid)= $this->getRequest()->getParam(array($_GET['navid']));
			if(!$this->_checkObj->findOneCheck($this,array("id=$_navid"))){
				$this->_checkObj->error('./');
			}
			$_breadNavArr = array();
			while ($_navid) {
				$_breadNavArr[] = parent::select(array('id,name,sid'),array('where'=>array("id='{$_navid}'"),'limit'=>1));
				foreach ($_breadNavArr as $key => $value) {
					foreach ($value as $key1 => $value1) {
						$_navid = $value1['sid'];
					}
				}
			}
			return array_reverse($_breadNavArr);
		}
	}
?>