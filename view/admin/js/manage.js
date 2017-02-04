	$(function(){
		$('input[name=user]').blur(function(event) {
				$.ajax({
				url: '?a=manage&m=ajaxUser',
				type: 'POST',
				dataType: 'json',
				data: {user: $('input[name=user]').val()},
				success : function (data,response, status) {
					if(data.state == 1){
						$('input[name=pass]').focus();
						$('input[name=ajaxUser]').attr("val",1);
					}else{
						$(this).next().focus();
						$('input[name=ajaxUser]').attr("val",0);
					}
				},
			});
		});
	})
	function addManage(){
		if($('input[name=user]').val() == ""){
			alert('用户名不能为空');
			$('input[name=user]').focus();
			return false;
		}
		if($('input[name=ajaxUser]').attr("val") == 1){
			alert('用户名已被注册，请更换');
			$('input[name=user]').focus();
			return false;
		}
		if($('input[name=user]').val().length > 10 || $('input[name=user]').val().length < 3){
			alert('长度未达到要求');
			$('input[name=user]').focus();
			return false;
		}
		if($('input[name=pass]').val() == ""){
			alert('密码不能为空');
			$('input[name=pass]').focus();
			return false;
		}
		if($('input[name=notpass]').val() !== $('input[name=pass]').val()){
			alert('确认密码不一致');
			$('input[name=notpass]').focus();
			return false;
		}
		if($('select[name=level]').val() =='0' ){
			alert('需要选择管理员等级');
			$('input[name=level]').focus();
			return false;
		}
		return true;
	}

	function updateManage(){
		if($('input[name=pass]').val() == ""){
			alert('密码不能为空');
			$('input[name=pass]').focus();
			return false;
		}
		if($('input[name=notpass]').val() !== $('input[name=pass]').val()){
			alert('确认密码不一致');
			$('input[name=notpass]').focus();
			return false;
		}
		if($('select[name=level]').val() =='0' ){
			alert('需要选择管理员等级');
			$('input[name=level]').focus();
			return false;
		}
		return true;
	}

