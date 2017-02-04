	$(function(){
		$('input[name=name]').blur(function(event) {
				$.ajax({
				url: '?a=nav&m=ajaxName',
				type: 'POST',
				dataType: 'json',
				data: {name: $('input[name=name]').val()},
				success : function (data,response, status) {
					if(data.state == 1){
						$('input[name=name]').focus();
						$('input[name=ajaxUser]').attr("val",1);
					}else{
						$(this).next().focus();
						$('input[name=ajaxUser]').attr("val",0);
					}
				},
			});
		});
	})
	function addNav(){
		if($('input[name=name]').val() == ""){
			alert('导航名称不能为空!');
			$('input[name=user]').focus();
			return false;
		}
		if($('input[name=ajaxUser]').attr("val") == 1){
			alert('导航条已被注册，请更换!');
			$('input[name=user]').focus();
			return false;
		}
		if($('input[name=name]').val().length > 20 ){
			alert('导航名称不能大于20个字符!');
			$('input[name=user]').focus();
			return false;
		}
		if($('textarea[name=info]').val().length > 200){
			alert('导航简介不能大于200个字符!');
			$('textarea[name=user]').focus();
			return false;
		}
		return true;
	}

	function updateNav(){
		if($('textarea[name=info]').val().length > 200){
			alert('导航简介不能大于200个字符!');
			$('textarea[name=info]').focus();
			return false;
		}
		return true;
	}


