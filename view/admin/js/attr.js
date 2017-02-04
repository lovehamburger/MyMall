	$(function(){
		if($('input[name=GET]').val()){
				$.ajax({
				url: '?a=attr&m=ajaxName',
				type: 'POST',
				data: {name: $('input[name=name]').val(),
						 id: $('input[name=GET]').val()
						},
				success : function (data,response, status) {
					if(data == 1){
						$('input[name=ajaxName]').attr('val',1);
					}else{
						$('input[name=ajaxName]').attr('val',0);
					}
				},
			});
		}else{
			$('input[name=name]').blur(function(event) {
				$.ajax({
				url: '?a=attr&m=ajaxName',
				type: 'POST',
				data: {name: $('input[name=name]').val()},
				success : function (data,response, status) {
					if(data == 1){
						$('input[name=ajaxName]').attr('val',1);
					}else{
						$('input[name=ajaxName]').attr('val',0);
					}
				},
			});
		});
		}
		
	})
	function addAttr(){
		if($('input[name=name]').val() == ""){
			alert('自定义属性名称不能为空!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=ajaxName]').attr("val") == 0){
			alert('该自定义属性编号已被占用!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=name]').val().length > 60 ){
			alert('自定义属性名称不能大于6个字符!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=name]').val().length < 2 ){
			alert('自定义属性名称不能小于2个字符!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=info]').val() == ""){
			alert('自定义属性简介不能为空!');
			$('input[name=info]').focus();
			return false;
		}
		if($('textarea[name=info]').val().length > 200){
			alert('自定义属性简介不能大于200个字符!');
			$('textarea[name=info]').focus();
			return false;
		}
		return true;
	}

	function updateAttr(){
		if($('input[name=name]').val() == ""){
			alert('自定义属性名称不能为空!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=ajaxName]').attr("val") != 1){
			alert('该自定义属性编号已被占用!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=name]').val().length > 60 ){
			alert('自定义属性名称不能大于6个字符!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=name]').val().length < 2 ){
			alert('自定义属性名称不能小于2个字符!');
			$('input[name=name]').focus();
			return false;
		}
		if($('textarea[name=info]').val().length > 200){
			alert('自定义属性简介不能大于200个字符!');
			$('textarea[name=info]').focus();
			return false;
		}
		return true;
	}
