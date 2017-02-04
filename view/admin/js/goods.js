$(function(){
	//实例化编辑器
	//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
	if($('textarea[name=content]').length > 0){
		UE.getEditor('content',{initialFrameWidth:800,initialFrameHeight:300,});
		$('.article_val').hide();
		$('.article_val').eq(0).show();
		$('#type input').click(function(event) {
			var num=$(this).index();
			$('.article_val').hide();
			$('.article_val').eq(num).show();
		});
	}
//异步上传图片
	if($('input[name=upimg]').length > 0){
		$('input[name=upimg]').wrap('<form id="img" target="upload" action="?a=call&m=upimg" method="post" enctype="multipart/form-data"></form>');
		$('.img').change(function(event) {
			$('#img').submit();
		});
	}

//分类、品牌联动
	$('select[name=nav]').change(function(){
		$.ajax({
			url: '?a=goods&m=ajaxBread',
			type: 'POST',
			dataType: 'json',
			data: {id: $('select[name=nav]').val()},
			success : function (data,response, status) {
				$('select[name=bread] option').not(":first").remove();
				if(data.state == 1){
					for (var i = 0 ; i < data.msg.length ; i++) {
						$('select[name=bread]').append('<option value="'+data.msg[i].id+'" >'+data.msg[i].name+'</option>');
					}
				}else{
					$('select[name=bread]').append('<option value="'+data.state+'" >'+data.msg+'</option>');
				}
			},
		});
		$.ajax({
			url: '?a=goods&m=ajaxAttr',
			type: 'POST',
			dataType: 'json',
			data: {id: $('select[name=nav]').val()},
			success : function (data,response, status) {
				if(status.responseText !== 'null'){
					$('.attr').show();
					$('.attr').html('');
					for (var i = 0; i < data.length; i++) {
						if(data[i].name.length == 2){
							var array = data[i].name.split("");//将字符串转成数组，没有任何标识的情况下
							$('.attr').append(array['0']+'&nbsp;&nbsp;'+array['1']+'：');
						}else if(data[i].name.length == 3){
							var array = data[i].name.split("");
							$('.attr').append(array['0']+' '+array['1']+' '+array['2']+'：');
						}else{
							$('.attr').append(data[i].name+'：');
						}
						for (var z = 0; z < data[i].info.length; z++) {
							$('.attr').append("<span style='margin-left:20px'><input type='checkbox' name='attr["+data[i].name+"][]'  value='"+data[i].info[z]+"'>"+data[i].info[z]+'</span>');
						}
						$('.attr:last').append('<br/>');
					}
				}else{
					$('.attr').hide();
					$('.attr').html('');
				}
				
			},
		});
	});
	if($('input[name=get]').val() != ''){
		if($('select[name=nav]').val() != -1){
			$.ajax({
				url: '?a=goods&m=ajaxBread',
				type: 'POST',
				dataType: 'json',
				data: {id: $('select[name=nav]').val()},
				success : function (data,response, status) {
					$('select[name=bread] option').not(":first").remove();
					if(data.state == 1){
						for (var i = 0 ; i < data.msg.length ; i++) {
							if(data.msg[i].id == BREAD){
								$('select[name=bread]').append('<option selected="selected" value="'+data.msg[i].id+'" >'+data.msg[i].name+'</option>');
							}else{
								$('select[name=bread]').append('<option  value="'+data.msg[i].id+'" >'+data.msg[i].name+'</option>');
							}
							
						}
					}else{
						$('select[name=bread]').append('<option selected="selected" value="'+data.state+'" >'+data.msg+'</option>');
					}
				},
			});
			$.ajax({
			url: '?a=goods&m=ajaxAttr',
			type: 'POST',
			dataType: 'json',
			data: {id: $('select[name=nav]').val()},
			success : function (data,response, status) {
				if(status.responseText !== 'null'){
					$('.attr').show();
					$('.attr').html('');
					for (var i = 0; i < data.length; i++) {
						if(data[i].name.length == 2){
							var array = data[i].name.split("");//将字符串转成数组，没有任何标识的情况下
							$('.attr').append(array['0']+'&nbsp;&nbsp;'+array['1']+'：');
						}else if(data[i].name.length == 3){
							var array = data[i].name.split("");
							$('.attr').append(array['0']+' '+array['1']+' '+array['2']+'：');
						}else{
							$('.attr').append(data[i].name+'：');
						}
						for (var z = 0; z < data[i].info.length; z++) {
							if($('input[name=attr]').val().indexOf(data[i].info[z]) != -1){
								$('.attr').append("<span style='margin-left:20px'><input type='checkbox' checked='checked' name='attr["+data[i].name+"][]'  value='"+data[i].info[z]+"'>"+data[i].info[z]+'</span>');
							}else{
								$('.attr').append("<span style='margin-left:20px'><input type='checkbox' name='attr["+data[i].name+"][]'  value='"+data[i].info[z]+"'>"+data[i].info[z]+'</span>');
							}
						}
						$('.attr:last').append('<br/>');
					}
				}else{
					$('.attr').hide();
					$('.attr').html('');
				}
				
			},
		});
		}
	}
	if($('input[name=get]').val() != ''){
		$('input[name=sn]').blur(function(event) {
				$.ajax({
				url: '?a=goods&m=ajaxSn',
				type: 'POST',
				dataType: 'json',
				data: {sn: $('input[name=sn]').val(),
						id: $('input[name=get]').val()
						},
				success : function (data,response, status) {
					if(data == 1){
						$('input[name=ajaxSn]').attr("val",0);
					}else{
						$('input[name=ajaxSn]').attr("val",1);
					}
				},
			});
		});
	}else{
		$('input[name=sn]').blur(function(event) {
				$.ajax({
				url: '?a=goods&m=ajaxSn',
				type: 'POST',
				dataType: 'json',
				data: {sn: $('input[name=sn]').val()},
				success : function (data,response, status) {
					if(data == 1){
						$('input[name=ajaxSn]').attr("val",0);
					}else{
						$('input[name=ajaxSn]').attr("val",1);
					}
				},
			});
		});
	}
})
	function addGoods(){
		if($('select[name=nav]').val() =='-1' ){
			alert('必须选择商品类别!');
			$('input[name=nav]').focus();
			return false;
		}
		if($('select[name=bread]').val() =='-1' ){
			alert('必须选择商品品牌!');
			$('input[name=bread]').focus();
			return false;
		}
		if($('input[name=name]').val() == ""){
			alert('商品名称不能为空!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=name]').val().length > 100){
			alert('商品名称不能大于100个字符!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=name]').val().length < 2){
			alert('商品名称不能小于2个字符!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=sn]').val().length < 2){
			alert('商品编号不能小于2个字符!');
			$('input[name=sn]').focus();
			return false;
		}
		if($('input[name=sn]').val().length > 50){
			alert('商品编号不能大于50个字符!');
			$('input[name=sn]').focus();
			return false;
		}
		if($('input[name=ajaxSn]').attr("val") == 1){
			alert('商品编号已被使用，请更换');
			$('input[name=sn]').focus();
			return false;
		}
		return true;
	}

	function updateGoods(){
		if($('select[name=nav]').val() =='-1' ){
			alert('必须选择商品类别!');
			$('input[name=nav]').focus();
			return false;
		}
		if($('select[name=bread]').val() =='-1' ){
			alert('必须选择商品品牌!');
			$('input[name=bread]').focus();
			return false;
		}
		if($('input[name=name]').val() == ""){
			alert('商品名称不能为空!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=name]').val().length > 100){
			alert('商品名称不能大于100个字符!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=name]').val().length < 2){
			alert('商品名称不能小于2个字符!');
			$('input[name=name]').focus();
			return false;
		}
		if($('input[name=sn]').val().length < 2){
			alert('商品编号不能小于2个字符!');
			$('input[name=sn]').focus();
			return false;
		}
		if($('input[name=sn]').val().length > 50){
			alert('商品编号不能大于50个字符!');
			$('input[name=sn]').focus();
			return false;
		}
		if($('input[name=ajaxSn]').attr("val") == 1){
			alert('商品编号已被使用，请更换');
			$('input[name=sn]').focus();
			return false;
		}
		return true;
	}

	function is_down(it,id){
		$.ajax({
			url: '?a=goods&m=up_down',
			type: 'POST',
			dataType: 'json',
			data: {is_up: 0,
					id: id,
					},
			success	: function(data,response, status){
				if(data == 1){
					$(it).parent().parent().html('<span class="red">否<a onclick="is_up(this,'+id+')">[上架]</a></span>');
				}else if(data == 2){
					alert('修改商品下架失败！');
				}else{
					alert('找不到指定商品！');
				}
			}
		})

	}

	function is_up(it,id){
		$.ajax({
			url: '?a=goods&m=up_down',
			type: 'POST',
			dataType: 'json',
			data: {is_up: 1,
					id: id,
					},
			success	: function(data,response, status){
				if(data == 1){
					$(it).parent().parent().html('<span class="green">是<a onclick="is_down(this,'+id+')">[下架]</a></span>');
				}else if(data == 2){
					alert('修改商品上架失败！');
				}else{
					alert('找不到指定商品！');
				}
			}
		})
	}
/*
	function updateGoods(){
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
	*/