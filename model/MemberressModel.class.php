<?php
	/**
	 * 会员地址模型类
	 */
	class MemberressModel extends Model
	{
		public function __construct(){
			parent::__construct();//验证对象及本模型对象
			$this->_fields = array('id','name','email','address','code','tel','buildings','user','selected','flag');
			$this->_tables = array(DB_FREFIX.'address');
			$this->_checkObj = new MemberressCheck();
		}
		/**
		 * 添加会员地址方法
		 */
		public function addMemberress(){
			if($this->totalMemberress() < 20){
				if(!$this->_checkObj->addCheck()){
					$this->_checkObj->error();
				}
				$_addData = $this->getRequest()->add($this->_fields);
				$_memberObj = new MemberModel();
				$_memberId = $_memberObj->findOneMember($_SESSION['member']);
				$_addData['user'] = $_memberId['0']['id'];
				$_updataData['selected'] = 0;
				parent::update($_updataData,array('where'=>array("user={$_memberId['0']['id']}")));
				if(isset($_addData['selected'])){
					$_addData['selected'] = 1;
				}
				return parent::add($_addData);
			}else{
				$this->_checkObj->error('?a=member&m=address','只能添加20条地址');
			}
		}

		//获取条数
		public function totalMemberress(){
			$_memberObj = new MemberModel();
			$_memberId = $_memberObj->findOneMember($_SESSION['member']);
			return parent::total(array('where'=>array("user={$_memberId['0']['id']}")));
		}

		/**
		 * 验证是否存在地址
		 * @param [type:array] $_where [用户名]
		 */
		public function OneRess(Array $_param){
			return parent::isOne($_param);
		}

		//获取地址
/*		public function getSelectedRess(){
			$_memberObj = new MemberModel();
			$_memberId = $_memberObj->findOneMember($_SESSION['member']);
			$ress = parent::select(array('*'),array('where'=>array("selected='1'","user={$_memberId['0']['id']}"),'limit'=>'1'));
			if(empty($ress)){
				$ress = parent::select(array('*'),array('where'=>array("user={$_memberId['0']['id']}"),'limit'=>'1'));
			}
			return $ress;
		}*/

		//删除指定会员地址
		public function deleteMemberress(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			return parent::delete($_where);
		}

		//获取指定的一条数据
		public function findOneMemberress(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			return parent::select(array('*'),array('where'=>$_where,'limit' =>'1'));
		}

		//修改指定的一条会员地址数据
		public function updateMemberress(){
			list($_id) = $this->getRequest()->getParam(array($_GET['id']));
			$_where = array("id='{$_id}'");
			if(!$this->_checkObj->findOneCheck($this,$_where)){
				$this->_checkObj->error();
			}
			if(!$this->_checkObj->updateCheck()){
				$this->_checkObj->error();
			}
			$_updataData = $this->getRequest()->update($this->_fields);
			
			if(isset($_updataData['selected'])){
				$_memberObj = new MemberModel();
				$_memberId = $_memberObj->findOneMember($_SESSION['member']);
				$_data['selected'] = 0;
				parent::update($_data,array('where'=>array("user={$_memberId['0']['id']}")));
				$_updataData['selected'] = 1;
			}
			return parent::update($_updataData,array('where'=>$_where));
		}


		//获取所有会员地址
		public  function  getAllMemberress(){
			$_memberObj = new MemberModel();
			$_memberId = $_memberObj->findOneMember($_SESSION['member']);
			return $this->select(array('*'),array('where'=>array("user={$_memberId['0']['id']}")));
		}

		//设置首选
		public function ajaxSelected(){
			list($_id) = $this->getRequest()->getParam(array($_POST['id']));
			$_where = array("id={$_id}");
			$info = $this->_checkObj->findOneCheck($this,$_where);
			if(!$info){
				echo -1;
				exit;
			}
			$_memberObj = new MemberModel();
			$_memberId = $_memberObj->findOneMember($_SESSION['member']);
			$_updataData['selected'] = 0;
			parent::update($_updataData,array('where'=>array("user={$_memberId['0']['id']}")));
			$_updataData['selected'] = 1;
			return parent::update($_updataData,array('where'=>array("id={$_id}")));
		}

	}
?>