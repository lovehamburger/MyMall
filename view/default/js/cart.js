$(function(){
	//购物车全选及价格计算
	$('input[name=allChecked]').click(function(event) {
		if($('input[name=allChecked]').is(':checked')){
			var tot=0;
			$('.checkbox').each(function(e) {
				$(this).prop('checked','checked');
				  tot+= parseInt($('.checkbox').eq(e).attr('val'));
			});
			$('.sumprice').html(tot);
		}else{
			$('.checkbox').each(function(e) {
				$(this).removeAttr('checked');
			});
			$('.sumprice').html(0);
		}
	});
	$('.checkbox').click(function(event) {
		if($('input[name=allChecked]').is(':checked')){
			$('input[name=allChecked]').removeAttr('checked');
		}
		var tot=0;
		$('.checkbox').each(function(e) {
			if($('.checkbox').eq(e).is(':checked')){
				tot+=parseInt($(this).attr('val'));
			}
		});
		$('.sumprice').html(tot);
	});
})

//结算订单并获取选择的订单
/*	function flow(){
			if($('.checkbox').is(':checked')){
				var con = [];
				$('tr').not(':first').each(function(e) {
					var content = '';
					if($('.checkbox').eq(e).is(':checked')){
						contents = [];
						$(this).children('td').each(function(a) {
							if(a !=0 && a !=6){
								content+='<td>'+$(this).html()+'</td>';
							}
						});
						contents.push('<tr class="cart">'+content+'</tr>');
						con.push(contents);
						sumprice = $('.sumprice').html();
					}
				});
				$.ajax({
					url: '?a=cart&m=flow',
					type: 'post',
					dataType: 'html',
					data: {content: con},
					success:function(data){
						$('body').html('');
						$('body').html(data);
						$('.sumprice').html(sumprice);
						plus(IS);
						minus(IS);
					}
				})
			}else{
				alert('需要选择一个商品哦亲');
			}
	}*/
	function minus(IS){
		var nums = $(IS).parent().find('input').val() - 1;
		if(nums>=1){
			var subtotal = $(IS).parent().prev().find('span').attr('val')*nums;
			$(IS).parent().next().find('.subtotal').html(subtotal+'/元');
			$(IS).parent().next().find('.subtotal').attr('val',subtotal);
			$(IS).parent().parent().find('td:first').find('input').attr('val',subtotal);
			$(IS).parent().find('input').attr('value',nums);
			if($(IS).parent().parent().find('td:first').find('input').is(':checked')){
				var sumprice = 0;
				$('.checkbox').each(function(e) {
					if($('.checkbox').eq(e).is(":checked")){
						sumprice+= parseInt($(this).parent().parent().find('.subtotal').attr('val'));
					}
					$('.sumprice').html(sumprice);
				});
			}else{
				var sumprice = 0;
				$('.cart').each(function(e) {
					sumprice+= parseInt($('.cart').eq(e).find('.subtotal').attr('val'));
				});
				$('.sumprice').html(sumprice);
			}
			$.ajax({
				url: '?a=cart&m=update',
				type: 'post',
				dataType: 'json',
				data: {nums: $(IS).parent().find('input').val(),
						id:$(IS).parent().find('input').attr('val')
					},
			})
		}else{
			alert('数量不能小于1哦!');
		}
		$('#price').html(parseInt($('.sumprice').html())+parseInt($('#delivery').html())+parseInt($('#pay').html()));
	}

	function plus(IS){
		var nums = parseInt($(IS).parent().find('input').val()) + 1;
		if(nums<=$(IS).attr('val')){
			var subtotal = $(IS).parent().prev().find('span').attr('val')*nums;
			$(IS).parent().next().find('.subtotal').html(subtotal+'/元');
			$(IS).parent().next().find('.subtotal').attr('val',subtotal);
			$(IS).parent().parent().find('td:first').find('input').attr('val',subtotal);
			$(IS).parent().find('input').attr('value',nums);
			if($(IS).parent().parent().find('td:first').find('input').is(':checked')){
				var sumprice = 0;
				$('.checkbox').each(function(e) {
					if($('.checkbox').eq(e).is(":checked")){
						sumprice+= parseInt($(this).parent().parent().find('.subtotal').attr('val'));
					}
				});
				$('.sumprice').html(sumprice);
			}else{
				var sumprice = 0;
				$('.cart').each(function(e) {
					sumprice+= parseInt($('.cart').eq(e).find('.subtotal').attr('val'));
				});
				$('.sumprice').html(sumprice);
			}
			$.ajax({
				url: '?a=cart&m=update',
				type: 'post',
				dataType: 'json',
				data: {nums: $(IS).parent().find('input').val(),
						id:$(IS).parent().find('input').attr('val')
					},
			})
		}else{
			alert('超过了最大库存了!');
		}
		$('#price').html(parseInt($('.sumprice').html())+parseInt($('#delivery').html())+parseInt($('#pay').html()));
	}