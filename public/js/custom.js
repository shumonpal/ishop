
						

$(document).ready(function(){

	
	/*------------------------------------------
	      Hover effect on cart button
	 -------------------------------------------*/
	 dropdown();

	 function dropdown() {
		 	$('.dropdown').hover(
		 	function(){
		 			$(this).find('.dropdown-menu').first()
		 			.stop(true, true).delay(50).fadeIn();
		 	},
		 	function(){
		 			$(this).find('.dropdown-menu').first()
		 			.stop(true, true).delay(50).fadeOut();
		 	}
		 );
	 }


	 
	/*------------------------------------------
		      Show Modal windows
	 -------------------------------------------*/
	$('body').on('click', '.show-modal', function(evt) {
		evt.preventDefault();

		var me = $(this),
			url = me.attr('href');

		$.ajax({
			url: url,
			dataType: 'html',
			success: function (response) {
				$('.modal-body').html(response);
			},
			error: function(errors){
				toastr.error('Something wrong!');
			}
		});

		$('#pdtModal').modal('show');

	});


	/*------------------------------------------
	               products filter
	 -------------------------------------------*/
	$('body').on('click','#filter-bar', function(evt) {
		//evt.preventDefault();
		
		var me = $(this),
			url = me.data('url'),
			href = me.data('href'),
			min = $('#value-lower').text(),
			max = $('#value-upper').text(),
			sort = $('.select_item').val(),
			color = $('.active-color').val();

				

		$.ajax({
			url: href,
			dataType: 'html',
			data: {'url':url, 'min':min, 'max':max, 'color':color, 'sort':sort},
			success: function (response) {
				$('#products-body').html(response);	
			},
			error: function(errors){
				toastr.error('Something wrong!');
			}
		});

		

	});

	

	$('body').on('click','.products-filter', function(evt) {
		//evt.preventDefault();

		var outerData = $('#filter-bar'),
			url = outerData.data('url'),
			href = outerData.data('href'),
			sort = $('.select_item').val(),
			color = $(this).val(),
			min = $('#value-lower').text(),
			max = $('#value-upper').text();

		$.ajax({
			url: href,
			dataType: 'html',
			data: {'url':url, 'min':min, 'max':max, 'color':color, 'sort':sort},
			success: function (response) {
				$('#products-body').html(response);	
			},
			error: function(errors){
				toastr.error('Something wrong!');
			}
		});

		$(this).closest('.flex-w').find('.products-filter').removeClass('active-color');
		$(this).addClass('active-color');
		
	});




	$('body').on('change','.select_item', function(evt) {
		//evt.preventDefault();

		var outerData = $('#filter-bar'),
			url = outerData.data('url'),
			href = outerData.data('href'),
			color = $('.active-color').val(),
			min = $('#value-lower').text(),
			max = $('#value-upper').text(),
			sort = $(this).val();

		$.ajax({
			url: href,
			dataType: 'html',
			data: {'url':url, 'min':min, 'max':max, 'color':color, 'sort':sort},
			success: function (response) {
				$('#products-body').html(response);	
				//console.log(href);	
			},
			error: function(errors){
				toastr.error('Something wrong!');
			}
		});
		
	});

	/*------------------------------------------
	              Add to Cart
	 -------------------------------------------*/
	
	$('body').on('click', '.add-to-cart', function(evt) {
		evt.preventDefault();

		var me = $(this),
			form = me.closest('form'),
			data = form.serialize(),
			url = form.attr('action');  

			if (form.find('input[name=_method]').val() !== 'PUT') {
				method = 'post' ;
			}else{
				method = 'put' ;
			}

		$.ajax({
			url: url,
			type: method,
			dataType: 'html',
			data: data,
			success: function (response) {
				if (me.hasClass('btn-wishlist')) {
					$('.wishlistMini').html(response);
				}else{
					$('.cartMini').html(response);
				}
				toastr.success('Product successfully add to cart...');
				dropdown();	
				$('#pdtModal').modal('close');

			},
			error: function(errors){
				toastr.error('Something wrong!');
			}
		});		
		
	});


	function priceUpdator(data) {
		$('.sub-total').text('$' + $.parseJSON(data).subtotal);
		$('.grand-total').text('$' + $.parseJSON(data).total);
		$('.tax').text('$' + $.parseJSON(data).tax);
	}


	$('body').on('change','.product-qty', function(evt) {
		//evt.preventDefault();

		var me = $(this),
			href = me.data('url'),
			rowId = me.data('id'),
			qty = me.val(),
			priceStr = me.parent().parent().find('.price').text(),
			price = priceStr.replace('$', '');

		me.parent().parent().find('.pdt-total').text('$' + (parseFloat(price)*qty));
		

/*		sum = 0;

		$('.pdt-total').each(function(index, value){
			totalStr = $(this).text();
			total = totalStr.replace('$', '');
			sum += parseFloat(total);
		});

		$('.sub-total').text('$' + sum);
*/
		$.ajax({
			url: href,
			dataType: 'text',
			data: {'qty':qty, 'rowId':rowId},
			success: function (response) {
				priceUpdator(response);
			},
			error: function(errors){
				toastr.error('Something wrong!');
			}
		});

		
	});

	/*------------------------------------------
	              Delete Cart
	 -------------------------------------------*/
	
	$('body').on('click', '.cart-delete', function(evt) {
		evt.preventDefault();

		var me = $(this),
			url = me.attr('href'),  
			token = me.data('token'),  
			method = 'post';
			

		$.ajax({
			url: url,
			type: method,
			dataType: 'html',
			data: {'_token': token},
			success: function (response) {
				me.parent().parent().fadeOut(100, function(){
					$(this).remove();
				});
				priceUpdator(response);
				toastr.success('Product successfully deleted...');
				toastr.options.preventDuplicates = false;
				toastr.options.timeOut = 10;
			},

			error: function(errors){
				toastr.error('Something wrong!');
			}
		});		

		cartCounter = $('.cart-div').length - 1;

		if (me.hasClass('wishlist')) {
			$('.wishlist-counter').text('('+cartCounter+')');
		}else{
			$('.cart-counter').text('('+cartCounter+')');
		}
		if (cartCounter < 1) {
			$('.cart-details').addClass('hidden');
			$('.alert-warning').fadeIn(400, function(){
				$(this).removeClass('hidden');
			});
		}	
	});



	/*------------------------------------------
		      Customer registration
	 -------------------------------------------*/
	$('body').on('click', '.customer_regi', function(evt) {
		evt.preventDefault();

		var me = $(this),
			form = me.closest('form'),
			url = form.attr('action'),
			data = me.closest('form').serialize();

		form.find('.form-group').removeClass('has-error');
		form.find('.help-block').remove();

		$.ajax({
			url: url,
			type:'post',
			data: data,
			dataType:'json',
			success: function (response) {
				toastr.success('Thank you', 'Your account created successfully!');
				location.reload();
			},
			error: function(jqXhr, json, errorThorwn){
				var errors = jqXhr.responseText;

				$.each($.parseJSON(errors), function(key, value){
					$(form).find('.'+key).closest('.form-group').addClass('has-error')
					.append('<span class="help-block">'+value[0]+'</span>');
				});
				
			}
		});


	});

});