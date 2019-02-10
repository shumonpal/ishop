
$(document).ready(function() {


	/*------------------------------------------
		      LOGIN-FORM
	 -------------------------------------------*/
	 $('.logout').click(function(evt){
	 	evt.preventDefault();
	 	$('#logout-form').submit();
	 	//alert('Hello');
	 });
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
				$('.modal-content').html(response);

			},
			error: function(errors){
				toastr.error('Something wrong!');
			}
		});

		$('#modal-default').modal('show');
		

	});


	/*------------------------------------------
		 Get sub category by changing category
	 -------------------------------------------*/

	$('body').on('change','.select_item', function(evt) {
		//evt.preventDefault();

		var me = $(this),
			url = me.data('url'),
			token = me.data('token'),
			item = me.val();

		$.ajax({
			url: url,
			type: 'post',
			dataType: 'html',
			data: {'item': item, '_token': token},
			success: function (response) {
				$('.get_item').html(response);
				$('.select2').select2();
				console.log(response);	
			},
			error: function(errors){
				toastr.error('Something wrong!');
			}
		});
		
	});

	/*------------------------------------------
		 Extended color input field
	 -------------------------------------------*/

	$('.extended-btn').on('click',  function(evt) {
		evt.preventDefault();

		
		var me = $(this),
			html = $('.extended-div').html();

		$('.increment').fadeIn(200, function(){
					$(this).append(html);
				});

		//Colorpicker
        $('.colorpicker1').colorpicker();
		//alert(html);
		
	});


	$('body').on('click', '.remove-div',  function(evt) {
		evt.preventDefault();

		
		var me = $(this);

		me.parents('.colors').fadeOut(200, function(){
					$(this).remove();
				});
		
	});



	$('.replace').on('click',  function(evt) {
		evt.preventDefault();

		var me = $(this).parents('.replace-parent');
		me.next().removeClass('hidden');
		me.addClass('hidden');
		
	});


	$('.fileinput-remove').on('click',  function(evt) {
		evt.preventDefault();
		//alert('Hello');
		var me = $(this).parents('.replace-parent');
		me.prev().removeClass('hidden');
		me.addClass('hidden');
	});


	/*------------------------------------------
	              Delete Item
	 -------------------------------------------*/
	
	$('body').on('click', '.delete-item', function(evt) {
		evt.preventDefault();

		var me = $(this),
			url = me.attr('href'),  
			token = me.data('token'),  
			method = 'DELETE';
			

		$.ajax({
			url: url,
			type: method,
			dataType: 'html',
			data: {'_token': token},
			success: function (response) {
				me.parents('.delete-parent').fadeOut(200, function(){
					$(this).remove();
				});
				
				toastr.success('Action success!');
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




});