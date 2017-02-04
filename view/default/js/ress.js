function selected(id,IS) {
	$.ajax({
		url: '?a=member&m=selected',
		type: 'POST',
		dataType: 'json',
		data: {id: id},
		success:function(data,response, status){
			if(data == 1){
				var selected = $('.selected').attr('val');
				$(IS).text('是').css("color","green").removeAttr('onclick');
				$('.select').not(IS).text('首选').attr("onclick","selected('"+selected+"',this);").css('color','#000000');
				$('.selected').not(IS).text('首选').attr("onclick","selected('"+selected+"',this);").css('color','#000000');
			}
		}
	})
}

