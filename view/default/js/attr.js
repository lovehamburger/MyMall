$(function(){
	$.ajax({
		url: '?a=goods&m=ajaxAttr',
		type: 'POST',
		dataType: 'json',
		data: {id: $('input[name=navid]').val()},
		success : function (data,response, status) {
			if(status.responseText !== 'null'){
				for (var i = 0; i < data.length; i++) {
					if($('input[name=attr]').val().indexOf(data[i].name) != -1){
						$('.attr').show();
						if(data[i].name.length == 2){
							var array = data[i].name.split("");//将字符串转成数组，没有任何标识的情况下
							$('.attr:last').append('<dd class="attr">'+array['0']+'&nbsp;&nbsp;'+array['1']+'：');
						}else if(data[i].name.length == 3){
							var array = data[i].name.split("");
							$('.attr:last').append('<dd class="attr">'+array['0']+' '+array['1']+' '+array['2']+'：');
						}else{
							$('.attr:last').append('<dd class="attr">'+data[i].name+'：');
						}
					}
					for (var z = 0; z < data[i].info.length; z++) {
						if($('input[name=attr]').val().indexOf(data[i].info[z]) != -1 && data[i].way ==1){
							$('.attr:last').append("<span style='margin-left:20px'><input type='checkbox' name='attr["+data[i].name+"][]'  value='"+data[i].info[z]+"'>"+data[i].info[z]+'</span>');
						}else if($('input[name=attr]').val().indexOf(data[i].info[z]) != -1 && data[i].way == 0 && z==0){
							$('.attr:last').append("<span style='margin-left:20px'><input type='radio' checked=checked name='attr["+data[i].name+"][]'  value='"+data[i].info[z]+"'>"+data[i].info[z]+'</span>');
						}else if($('input[name=attr]').val().indexOf(data[i].info[z]) != -1 && data[i].way == 0){
							$('.attr:last').append("<span style='margin-left:20px'><input type='radio'  name='attr["+data[i].name+"][]'  value='"+data[i].info[z]+"'>"+data[i].info[z]+'</span>');
						}
					}
					$('.attr:last').append('</dd><br/>');
				}
			}
		},
	});
})
/*window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];*/
window._bd_share_config = {"common": {"bdSnsKey": {}, "bdText": "", "bdMini": "2", "bdMiniList": false, "bdPic": "", "bdStyle": "0", "bdSize": "16"}, "share": {}};
    with (document)
        0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];

