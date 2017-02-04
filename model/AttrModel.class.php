<?php
	/**
	 * 自定义属性模型类
	 */
	class AttrModel extends Model
	{
		public function __construct(){
			parent::__construct();//验证对象及本模型对象
			$this->_fields = array('id','name','way','info','nav');
			$this->_tables = array(DB_FREFIX.'Attr');
			$this->_checkObj = new AttrCheck();
		}
		/**
		 * 添加自定义属性方法
		 */
		public function addAttr(){
			list($_name)= $this->getRequest()->getParam(array($_POST['name']));
			$_where = array("name='$_name'");
			if(!$this->_checkObj->addCheck($this,$_where)){
				$this->_checkObj->error();
			}
			$_addData = $this->getRequest()->add($this->_fields);
			if(!empty($_addData['nav'])){
				$_addData['nav'] = implode(",",$_addData['nav']);
			}
			return parent::add($_addData);
		}

		/**
		 * 验证自定义属性名称是否重复
		 * @param [type:array] $_where [用户名]
		 */
		public function oneAttr(Array $_param){
			return parent::isOne($_param);
		}

		//获取条数
		public function totalAttr(){
			return parent::total();
		}

		//删除指定内容
		public function deleteAttr(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			return parent::delete($_where);
		}

		//获取指定的一条数据
		public function findOneAttr(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			$_oneAttr = parent::select(array('*'),array('where'=>$_where,'limit' =>'1'));
			if(!empty($_oneAttr['0']['nav'])){
				$_oneAttr['0']['nav'] = explode(',',$_oneAttr['0']['nav']);
			}else{
				$_oneAttr['0']['nav'] = array();
			}
			return $_oneAttr;
		}


		//修改指定的一条数据
		public function updateAttr(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			list($_name) = $this->getRequest()->getParam(array($_POST['name']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			if(!$this->_checkObj->updateCheck($this,array("id<>$_id and name='{$_name}'"))){
				$this->_checkObj->error();
			}
			$_updataData = $this->getRequest()->update($this->_fields);
			if(!empty($_updataData['nav'])){
				$_updataData['nav'] = implode(",",$_updataData['nav']);
			}else{
				$_updataData['nav'] = '';
			}
			return parent::update($_updataData,array('where'=>$_where));
		}


		//获取指定自定义属性
		public function getAllAttr(){
			$_allAttr = parent::select(array('*'),array('limit'=>$this->_limit));
			if(!empty($_allAttr)){
				foreach ($_allAttr as $key => $value) {
					if($_allAttr[$key]['way'] == 0){
						$_allAttr[$key]['way'] = '单选';
					}else{
						$_allAttr[$key]['way'] = '多选';
					}
					$this->_tables = array(DB_FREFIX.'nav');
					if(!empty($value['nav'])){
							$_navName = parent::select(array('name'),array('where'=>array("id in ({$value['nav']})")));
							$_and = '';
							foreach ($_navName as $key1 => $value1) {
								$_and.=$value1['name'].',';
							}
							$_allAttr[$key]['nav'] = substr($_and,0,-1);
					}else{
						$_allAttr[$key]['nav'] = '没有选择任何类别';
					}
				}
			}
			return $_allAttr;
		}

		//通过AJAX调用商品属性
		public function ajaxAttr(){
			list($_id) = $this->getRequest()->getParam(array($_POST['id']));
			$this->_tables =array(DB_FREFIX.'attr');
			$_goodsAttr = parent::select(array('*'),array('like'=>array('nav'=>$_id)));
			if(!empty($_goodsAttr)){
				foreach ($_goodsAttr as $key => $value) {
					$_goodsAttr[$key]['info'] = explode('|',$value['info']);
				}
			}
			echo json_encode($_goodsAttr);
		}

		//查看属性名是否已经被使用
		public function ajaxName(){
			if(!empty($_POST['id'])){
				list($_id) = $this->getRequest()->getParam(array($_POST['id']));
				list($_name) = $this->getRequest()->getParam(array($_POST['name']));
				$_where = array("id<>$_id and name='{$_name}'");
			}else{
				list($_name) = $this->getRequest()->getParam(array($_POST['name']));
				$_where = array("name='{$_name}'");
			}
			$this->_checkObj->ajaxNameCheck($this,$_where);
		}

	}
?>