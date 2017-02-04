//根据头部导航点击显示左侧导航
function channel(i){
	$('#sidebar dl').each(function(e){
		if(i == e){
			$(this).show();
		}else{
			$(this).hide();
		}
	})
}