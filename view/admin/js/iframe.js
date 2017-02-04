window.onload = function () {(window.onresize = function () {
var width= $(window).width()-200;//浏览器宽度可视区域
	var height=$(window).height()-80;//浏览器高度可视区域
	$('#main').css('width',width + 'px');
	$('#main').css('height',height + 'px');
	$('#sidebar').css('height',height + 'px');
})()};

	


