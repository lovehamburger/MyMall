	$(function(){
		$('input[name=frontcode]').blur(function(event) {
				$.ajax({
				url: '?a=member&m=ajaxCheckFrontCode',
				type: 'POST',
				dataType: 'json',
				data: {code: $('input[name=frontcode]').val()},
				success : function (data,response, status) {
					if(data == 1){
						$('input[name=ajaxcode]').attr("val",1);
					}else{
						$('input[name=ajaxcode]').attr("val",0);
					}
				},	
			});
		});
	})
	function loginUser(){
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
		if($('input[name=frontcode]').val() == ""){
			alert('验证码不能为空!');
			$('input[name=frontcode]').focus();
			return false;
		}
		if( $('input[name=ajaxcode]').attr("val") !== "1"){
			alert("验证码输入错误!");
			$('input[name=ajaxcode]').focus();
			return false;
		}
		$.ajax({
				url: '?a=member&m=ajaxCheckFrontLogin',
				type: 'POST',
				dataType: 'json',
				async:false,
				data : {user: $('input[name=user]').val(),
						pass: $('input[name=pass]').val()
						},
				success : function (data,response,status) {
					if(data == 1){
						$('input[name=ajaxlogin]').attr("val",1);
					}else{
						alert('用户名或密码错误!');
						$('input[name=ajaxlogin]').attr("val",0);
					}
				},
			});
		if($('input[name=ajaxlogin]').attr("val") == 0){
			return false;
		}
			return true;
	}


