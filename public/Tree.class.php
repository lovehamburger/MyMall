<?php
/**
* 获取二级树形结构
*/
class Tree {
	static private $_instance = null ;
	static public function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self();
		}
		return self::$_instance;
	}
		
	//私有克隆
	private function __clone() {}

	private function __construct(){

	}

	public function getTree(Array $_allNav,$_val){
		foreach ($_allNav as $key => $value) {
			$value['sid'] != '0' ? $_childNav[] = $value : $_mainNav[] = $value;
		}
		foreach ($_allNav as $key => $value) {
			if($value['id'] == $_val){
				$_resultNav = $value;
				if($_resultNav['sid'] == 0){
					foreach ($_childNav as $key => $value) {
						if($value['sid'] == $_resultNav['id']){
							$_resultNav['sub'][] = $value;
						}
					}
				}else{
					foreach ($_mainNav as $key => $value) {
						if($value['id'] == $_resultNav['sid']){
							$_resultNav = $value;
							foreach ($_childNav as $key => $value) {
								if($value['sid'] == $_resultNav['id']){
									$_resultNav['sub'][] = $value;
								}
							}
						}
					}
				}
			}
		}
		return $_resultNav;
	}
}

?>