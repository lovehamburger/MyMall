	$(function(){
		$('input[name=name]').blur(function(event) {
				$.ajax({
				url: '?a=bread&m=ajaxName',
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
	})
	function addBread(){
		if($('input[name=name]').val() == ""){
			alert('品牌名称不能为空!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=ajaxName]').attr("val") != 1){
			alert('品牌已被注册，请更换!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=name]').val().length > 20 ){
			alert('品牌名称不能大于20个字符!');
			$('input[name=name]').focus();
			return false;
		}
		if($('textarea[name=info]').val().length > 200){
			alert('品牌简介不能大于200个字符!');
			$('textarea[name=info]').focus();
			return false;
		}
		if($('input[name=url]').val().length > 200){
			alert('官方网站不能大于200个字符!');
			$('input[name=url]').focus();
			return false;
		}
		return true;
	}

	function updateBread(){
		if($('input[name=url]').val().length > 200){
			alert('官方网站不能大于200个字符!');
			$('input[name=url]').focus();
			return false;
		}
		if($('textarea[name=info]').val().length > 200){
			alert('品牌简介不能大于200个字符!');
			$('textarea[name=info]').focus();
			return false;
		}
		return true;
	}


