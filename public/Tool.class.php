<?php
/**
* 工具类
*/
	class Tool
	{
		//设置字符转义
		static public function setFormString($_Data){
			if(is_array($_Data)){
				foreach ($_Data as $key => $value) {
					$_Data[$key] = self::setFormString($value);
				}
			}else{
				return	addslashes($_Data);
			}
			return $_Data;
		}

		//html过滤
		static public function setHtmlString($_data) {
			$_string = null;
			if (is_array($_data)) {
				foreach ($_data as $_key=>$_value) {
					$_string[$_key] = self::setHtmlString($_value);  //递归
				}
			} elseif (is_object($_data)) {
				foreach ($_data as $_key=>$_value) {
					$_string->$_key = self::setHtmlString($_value);  //递归
				}
			} else {
				$_string = htmlspecialchars($_data);
			}
			return $_string;
		}

		//得到上一页
		static public function getPrevPage() {
			return empty($_SERVER["HTTP_REFERER"]) ? '###' : $_SERVER["HTTP_REFERER"];
		}
		//错误弹窗
		static public function alertBack($_message) {
			echo "<script type='text/javascript'>alert('$_message');</script>";
			exit();
		}

		static public function setUrl(){
			$_url= $_SERVER['QUERY_STRING'];
			parse_str($_url,$_query);
			$_url='?'.http_build_query($_query);
			return $_url;
		}
	}
?>