<?php
/**
* 分页类
*/
class Page {
	private $_total = null;			//总条数
	private $_page = null;			//当前页
	private $_pagesize = null;		//每页显示条数
	private $_pagenum = null;		//总页码
	private $_url = null;			//当前模块下的地址
	private $_limit = null;			//limit
	private $_bothnum = null;		//两边保持数字分页的量
	
	public function __construct($_total,$_pagesize){
		$this->_total = $_total ? $_total : 1;
		$this->_pagesize = $_pagesize;
		$this->_pagenum = ceil($this->_total / $this->_pagesize);
		$this->_page = $this->setPage();
		$this->_limit = ($this->_page - 1) * $this->_pagesize.','.$this->_pagesize;
		$this->_url = $this->setUrl();
		$this->_bothnum = 2;
	}

	//获取limit
	public function getLimit(){
		return $this->_limit;
	}

	//设置首页
	private function first(){
		if($this->_pagenum == 1){
			return;
		}
		return ' <a href="'.$this->_url.'"> 1 </a>....';
	}

	//设置尾页
	private function last(){
		if($this->_pagenum == 1){
			return;
		}
		return '....<a href="'.$this->_url.'&page='.$this->_pagenum.'">'.$this->_pagenum .'</a>';
	}

	//设置上一页
	private function prev(){
		if($this->_page == 1){
			return '<span class="disabled">上一页</span>';
		}
		return ' <a href="'.$this->_url.'&page='.($this->_page-1).'"> 上一页 </a> ';
	}

	//设置下一页
	private function next(){
		if($this->_page == $this->_pagenum){
			return '<span class="disabled">下一页</span>';
		}
		return ' <a href="'.$this->_url.'&page='.($this->_page+1).'"> 下一页 </a> ';
	}

	//设置url
	private function setUrl(){
		$_url= $_SERVER['QUERY_STRING'];
		parse_str($_url,$_query);
		unset($_query['page']);
		$_url='?'.http_build_query($_query);
		return $_url;
	}

	//设置数字目录(需要研究)
	private function pageList(){
		$pageList = '';
		for ($i=$this->_bothnum;$i>=1;$i--) {
			$_page = $this->_page-$i;
			if ($_page < 1) continue;
			$pageList .= ' <a href="'.$this->_url.'&page='.$_page.'">'.$_page.'</a> ';
		}
		$pageList .= ' <span class="me">'.$this->_page.'</span> ';
		for ($i=1;$i<=$this->_bothnum;$i++) {
			$_page = $this->_page+$i;
			if ($_page > $this->_pagenum) break;
			$pageList .= ' <a href="'.$this->_url.'&page='.$_page.'">'.$_page.'</a> ';
		}
		return $pageList;
	}

	private function setPage(){
		if(!empty($_GET['page'])){
			if ($_GET['page'] > 0) {
				if($_GET['page'] > $this->_pagenum){
					return $this->_pagenum;
				} else {
					return $_GET['page'];
				}
			}else{	
				return 1;
			}
		}else{
			return 1;
		}
	}

	public function showpage(){
		$_page = '';
		$_page.= $this->prev();
		$_page.= $this->first();
		$_page.= $this->pageList();
		$_page.= $this->last();
		$_page.= $this->next();
		return $_page;
	}
	
}

?>