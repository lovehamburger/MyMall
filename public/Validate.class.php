<?php
/**
* 数据验证类
*/
class Validate {
	
	public function __construct(){}

	//验证字符串是否为空
	public function isNullString($_string){
		return empty($_string) ? true : false;
	}

	//判断两个字符串是否一致
	public function isSameString($_string,$_string2){
		return trim($_string) !== trim($_string2) ? true : false;
	}

	/**
	 * [验证字符串长度]
	 * @param  [type] $_string      [description]
	 * @param  [type] $_lengthArray [是一个数组,max:2个值，最少一个值]
	 * @return [type] 错误提示      [-1：需要输入一个或两个值,-2:请输入数组格式,-3:长度未达到要求,-4:长度要在指定范围内,-5:必须是数字]
	 */
	public function stringLength($_string,$_lengthArray){
		if(is_array($_lengthArray)){
			if(count($_lengthArray) > 2 || count($_lengthArray) <= 0){
				return "-1";
			}else{
					if(count($_lengthArray) ==1){
						if(is_numeric($_lengthArray[0])){
							if(mb_strlen($_string,'utf8') !== $_lengthArray[0]){
								return "-3";
							}
						}else{
							return "-5";
						}
					}else{
						if(is_numeric($_lengthArray[0]) && is_numeric($_lengthArray[1])){
							if($_lengthArray[0]>mb_strlen($_string,'utf8') || $_lengthArray[1] < mb_strlen($_string,'utf8') ){
								return "-4"; 
							}
						}else{
							return "-5";
						}
					}
				}
		}else{
			return "-2";
		}
	}

	/**
	 * 计算字符串长度
	 * @param  [str] $str  [字符串]
	 * @param  [int] $num  [要求的长度]
	 * @param  [type] $type [max、min、eq]
	 * @return [type]  $_charset     [字符描述]
	 */
	public function stringLen($str,$num,$type,$_charset = 'utf-8'){
		switch ($type) {
			case 'max':
				if(mb_strlen($str,$_charset) > $num){
					return true;
				}
				return false;
				break;
			case 'min':
				if(mb_strlen($str,$_charset) < $num){
					return true;
				}
				return false;
				break;
			case 'eq':
				if(mb_strlen($str,$_charset) != $num){
					return true;
				}
				return false;
				break;
		}
	}
	//验证邮箱格式
	public function checkEmail($email){
	$reply = "";
    if ( isset($email) )
	    {
			$email_address = $email;
			$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
			if ( preg_match( $pattern, $email_address ) )
			{
				return true;
			}else{
				return false;
			}
		}
	}

	public function checkTel($tel){
		if(preg_match("/^1[34578]{1}\d{9}$/",$tel)){
			return true;
		}else{
			return false;
		}
	}


}

?>