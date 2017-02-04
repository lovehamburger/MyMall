<?php
/**
 * 公共调用功能类控制器
 */
	class CallAction extends Action
	{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			Redirect::getInstance()->succ('./');
		}

		//获取验证码
		public function validateCode(){
			$code = new ValidateCode();
			$code->doimg();
			$_SESSION['code'] = $code->getCode();
		}
		//获取前台验证码
		public function validateFrontCode(){
			$code = new ValidateCode();
			$code->doimg();
			$_SESSION['frontcode'] = $code->getCode();
		}

		//图片上传
		public function upimg(){
			$_fileupload = new FileUpload('upimg',20000);
			$_path = $_fileupload->getPath();//获取上传图片的路径地址
			$_fileupload->showImg($_path);//显示图片加赋值
			$_img = new Image($_path);
			$_img->thumb(300,300);
			$_img->out();
			$_img->thumb(220,220);
			$_img->out('220X220');
		}
	}
?>