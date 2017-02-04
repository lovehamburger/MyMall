<?php
/**
 * 商品控制器
 */
	class GoodsAction extends Action
	{
		private $_nav = null;
		private $_bread = null;
		private $_attr = null;
		public function __construct() {
			parent::__construct();
			$this->_nav = new NavModel();
			$this->_bread = new BreadModel();
			$this->_attr = new AttrModel();
		}

		//商品
		public function index(){
			$this->page($this->_modelObj->totalGoods(),PAGE_SIZE);
			$this->_tpl->assign('allGoods',$this->_modelObj->getAllGoods());
			$this->_tpl->display(SMARTY_ADMIN.'goods/index.tpl');
		}

		//添加商品
		public function add(){
			if(!empty($_POST)){
				if($this->_modelObj->addGoods()){
					$this->_redirectObj->succ('?a=goods','商品添加成功!');
				}else{
					$this->_redirectObj->error('商品添加失败!');
				}
			}
			$this->_tpl->assign('addNav',$this->_nav->getAddGoodsNav());
			$this->_tpl->display(SMARTY_ADMIN.'goods/add.tpl');
		}

		//修改商品
		public function update(){
			if(!empty($_POST)){
				if($this->_modelObj->updateGoods()){
					$this->_redirectObj->succ('?a=goods','商品修改成功!');
				}else{
					$this->_redirectObj->error('商品修改失败!');
				}
			}else{
				$this->_tpl->assign('addNav',$this->_nav->getAddGoodsNav());
				$this->_tpl->assign('oneGoods',$this->_modelObj->findOneGoods());
				$this->_tpl->display(SMARTY_ADMIN.'goods/update.tpl');
			}
			
		}

		//删除商品
		public function delete(){
			if(!empty($_GET)){
				$this->_modelObj->deleteGoods() ?$this->_redirectObj->succ('?a=goods','商品删除成功!') : $this->_redirectObj->error('商品删除失败!');
			}
			
		}

		//ajax获取指定品牌
		public function ajaxBread(){
			if(!empty($_POST['id'])){
				$this->_bread->getAddGoodBread();
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}

		//ajax判断商品编号是否存在
		public function ajaxSn(){
			if(!empty($_POST['sn'])){
				$this->_modelObj->ajaxSn();
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}

		//ajax获取商品分类属性
		public function ajaxAttr(){
			if(!empty($_POST['id'])){
				$this->_attr->ajaxAttr();
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}

		//异步修改是否上架下架
		public function up_down(){
			if(!empty($_POST)){
				echo $this->_modelObj->is_up_down() ? 1 : 2;
			}else{
				$this->_redirectObj->error('非法访问');
			}
		}
	}
?>