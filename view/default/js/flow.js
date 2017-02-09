$(function(){
	$('#delivery').html($('input[name=delivery_radio]:checked').val());
	$('#pay').html($('input[name=pay_radio]:checked').val());
	$('#total .delivery').html($('#delivery').html());
	$('#total .pay').html($('#pay').html());
	setTimeout(function(){
		$('#total .sumprice').html($('.sumprice').html());
		$('#price').html(parseInt(parseInt($('.sumprice').html())+parseInt($('#total .delivery').html())+parseInt($('#total .pay').html())));
	},0.001);

		$('div[name=sendOrder]').click(function(event) {
		var info = '';
		var goods=[];
		$('.cart').each(function(tr, el) {
			var good=[];
			$(this).find('td').each(function(td, el) {
				info= $(this).html();
				good.push(info);
			});
			goods.push(good);
		});
		var selected = $(".ress:checked");
		var name = selected.next().find('td[name=name]').html();//收件人
		var email = selected.next().find('td[name=email]').html();//收件人邮箱
		var address = selected.next().find('td[name=address]').html();//收件人地址
		var code = selected.next().find('td[name=code]').html();//收件人邮政编码
		var tel = selected.next().find('td[name=tel]').html();//收件人电话
		var text = $('textarea[name=text]').val();//商品备注
		var buildings = $('td[name=buildings]').html();//收件人建筑性标志
		var delivery = $('input[name=delivery_radio]:checked').attr('title');//收件方式
		var pay = $('input[name=pay_radio]:checked').attr('title');//支付方式
		var ps = $('input[name=ps]:checked').val();//缺货处理
		var price = $('#price').html();//总金额
		var delivery_price = $('#delivery').html();//运费
		var pay_price = $('#pay').html();//支付手续费
		var cartid = '';
		$('td[name=cartid]').each(function(index) {
			cartid+= $(this).text()+',';
		});
		$.ajax({
			url: '?a=cart&m=order',
			type: 'post',
			dataType: 'json',
			data: {name: name,
					email: email,
					address: address,
					code: code,
					tel: tel,
					text: text,
					buildings: buildings,
					delivery: delivery,
					pay: pay,
					ps: ps,
					goods: goods,
					price:price,
					delivery_price:delivery_price,
					pay_price:pay_price,
					cartid:cartid,
					},
			success:function(data){
				location.href='?a=member&m=yeepay&id='+data+'';
			}
		})		
	});
	/*$('.ress').change(function(event) {
		 window.location.reload();
	});*/
})
	//改变快递方式
	function changeDelivery(logistics){
		$('#delivery').html($(logistics).val());
		$('#total .delivery').html($('#delivery').html());
		all();
	}
	//改变支付方式
	function changePay(logistics){
		$('#pay').html($(logistics).val());
		$('#total .pay').html($('#pay').html());
		all();
	}

	//结算总金额
	function all(){
		$('#price').html(parseInt($('.sumprice').html())+parseInt($('#delivery').html())+parseInt($('#pay').html()));
	}

	function openwindow(url,name,iWidth,iHeight){
		var url; //转向网页的地址;
		var name; //网页名称，可为空;
		var iWidth; //弹出窗口的宽度;
		var iHeight; //弹出窗口的高度;
		//window.screen.height获得屏幕的高，window.screen.width获得屏幕的宽
		var iTop = (window.screen.height-30-iHeight)/2; //获得窗口的垂直位置;
		var iLeft = (window.screen.width-10-iWidth)/2; //获得窗口的水平位置;
		window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');
	}

	

