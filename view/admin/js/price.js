	function addPrice(){
		if($('input[name=price_left]').val() == ""){
			alert('左区间价格不能为空!');
			$('input[name=price_left]').focus();
			return false;
		}
		if($('input[name=price_right]').val() == ""){
			alert('右区间价格不能为空!');
			$('input[name=price_right]').focus();
			return false;
		}
		if($('input[name=price_left]').val().length > 5 || $('input[name=price_right]').val().length > 5){
			alert('价格区间不能大于5个字符!');
			$('input[name=price_left]').focus();
			return false;
		}
		if(isNaN($('input[name=price_left]').val()) || isNaN($('input[name=price_left]').val())){
			alert('价格区间必须是数字!');
			$('input[name=price_left]').focus();
			return false;
		}
		if(parseInt($('input[name=price_left]').val()) > parseInt($('input[name=price_right]').val())){
			alert('左区间价格必须小于右区间!');
			$('input[name=price_left]').focus();
			return false;
		}
		return true;
	}

	function updatePrice(){
		if($('input[name=price_left]').val() == ""){
			alert('左区间价格不能为空!');
			$('input[name=price_left]').focus();
			return false;
		}
		if($('input[name=price_right]').val() == ""){
			alert('右区间价格不能为空!');
			$('input[name=price_right]').focus();
			return false;
		}
		if($('input[name=price_left]').val().length > 5 || $('input[name=price_right]').val().length > 5){
			alert('价格区间不能大于5个字符!');
			$('input[name=price_left]').focus();
			return false;
		}
		if(isNaN($('input[name=price_left]').val()) || isNaN($('input[name=price_left]').val())){
			alert('价格区间必须是数字!');
			$('input[name=price_left]').focus();
			return false;
		}
		if(parseInt($('input[name=price_left]').val()) > parseInt($('input[name=price_right]').val())){
			alert('左区间价格必须小于右区间!');
			$('input[name=price_left]').focus();
			return false;
		}
		return true;
	}
