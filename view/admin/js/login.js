	$(function(){
		$('input[name=code]').blur(function(event) {
				$.ajax({
				url: '?a=admin&m=ajaxCheckCode',
				type: 'POST',
				dataType: 'json',
				data: {code: $('input[name=code]').val()},
				success : function (data,response, status) {
					if(data.state == 1){
						$('input[name=ajaxcode]').attr("val",1);
					}else{
						$('input[name=ajaxcode]').attr("val",0);
					}
				},
			});
		});
	})
	function adminLogin(){
		if($('input[name=user]').val() == ""){
			alert('用户名不能为空!');
			$('input[name=user]').focus();
			return false;
		}
		if($('input[name=pass]').val() == ""){
			alert('密码不能为空!');
			$('input[name=pass]').focus();
			return false;
		}
		if($('input[name=code]').val() == ""){
			alert('验证码不能为空!');
			$('input[name=code]').focus();
			return false;
		}
		if( $('input[name=ajaxcode]').attr("val") !== "1"){
			alert("验证码输入错误!");
			$('input[name=ajaxcode]').focus();
			return false;
		}
		$.ajax({
				url: '?a=admin&m=ajaxCheckLogin',
				type: 'POST',
				dataType: 'json',
				async:false,
				data : {user: $('input[name=user]').val(),
						pass: $('input[name=pass]').val()
						},
				success : function (data,response,status) {
					if(data.state == 1){
						$('input[name=ajaxlogin]').attr("val",1);
					}else{
						alert('用户名或密码错误!');
						$('input[name=ajaxlogin]').attr("val",0);
					}
				},
			});
		if($('input[name=ajaxlogin]').attr("val") == 0){
			return false;
		}else{
			return true;
		}
		
	}


