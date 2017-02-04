<?php
/**
 * 管理员控制器
 */
	class ManageAction extends Action
	{
		private $_level = null;
		public function __construct() {
			parent::__construct();
			$this->_level= new LevelModel();
		}

		//管理员首页
		public function index(){
			$this->page($this->_modelObj->totalManage(),PAGE_SIZE);
			$this->_tpl->assign('allManage',$this->_modelObj->getAllManage());
			$this->_tpl->display(SMARTY_ADMIN.'manage/index.tpl');
		}

		//添加管理员
		public function add(){
			if(!empty($_POST)){
				$_state = $this->_modelObj->addManage();
				if($_state){
					$this->_redirectObj->succ('?a=manage','管理员添加成功');
				}else{
					$this->_redirectObj->error('管理员添加失败');
				}
			}else{
				$this->_tpl->assign('allLevel',$this->_level->getAllLevel());
				$this->_tpl->display(SMARTY_ADMIN.'manage/add.tpl');
			}
		}

		//更新管理员信息
		public function update(){
			if(!empty($_POST)){
				$_state = $this->_modelObj->updateManage();
				if($_state){
					$this->_redirectObj->succ('?a=manage','管理员修改成功');
				}else{
					$this->_redirectObj->error('管理员修改失败');
				}
			}else{
				$this->_tpl->assign('allLevel',$this->_level->getAllLevel());
				$this->_tpl->assign('OneManage',$this->_modelObj->findOneManage());
				$this->_tpl->display(SMARTY_ADMIN.'manage/update.tpl');
			}
			
		}

		//删除管理员信息
		public function delete(){
			if(!empty($_GET['id'])){
				$_state = $this->_modelObj->deleteManage(array('id'=>$_GET['id']));
				if($_state){
					$this->_redirectObj->succ('?a=manage','管理员删除成功');
				}else{
					$this->_redirectObj->error('管理员删除失败');
				}
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}


		//获取用户名是否被使用
		public function ajaxUser(){
			if(!empty($_POST)){
				if($return = $this->_modelObj->OneManage(array("user='{$_POST['user']}'"))){
					$_return['msg'] = "用户名已注册,请更换";
					$_return['state'] = "1";
				}else{
					$_return['msg'] = "用户名可注册";
					$_return['state'] = "0";
				}
				echo json_encode($_return);
			}
			
		}
	}
?>