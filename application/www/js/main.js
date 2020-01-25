'use strict';

/***********************************************************************************/
/****************************RESPONSIVE SECONDE NAV*********************************/
/***********************************************************************************/

$('.nav-second').css( 'display', 'none' );

let match = window.matchMedia("screen and (max-width:1024px)");
if (match.matches) {
	console.log('yes');
}else {
	console.log('nope');
	jQuery(function()
	{
		$(function ()
		{
			$(window).scroll(function ()
			{
				if ($(this).scrollTop() > 100 )
				{
					$('.nav-second').css( 'display', 'block' );
				} else
				{
					$('.nav-second').css( 'display', 'none' );
				}
			});
		});
	});
}

$('#burger-button').on('click', function() {
	$('.nav-column').toggleClass('hide');
	console.log('ok');
});

/***********************************************************************************/
/************************************ADD TO BASKET**********************************/
/***********************************************************************************/

let basket = new Basket();

$('.addToBasket').on('click', function(event){
	event.preventDefault();
	let id = $(this).data('id');
	// console.log(id);
	let name = $(this).data('name');
	// console.log(name);
	let price = $(this).data('price');
	// console.log(price);
	let quantity = $('#product-'+id).val();
	// console.log(quantity);
	if(isNaN(quantity) || quantity == '') {
		$('#errorPopUp').removeClass('hide');
		$('#product-'+id).val('');
	} else {
		basket.addBasket(id, name, quantity, price);
		$('#productPopUp').removeClass('hide');
		$('#productNumber').text(quantity);
		$('#product-'+id).val('');
	}
});

$('.closePopUp').on('click', function() {
	$('#productPopUp').addClass('hide');
	$('#errorPopUp').addClass('hide');
});

$('.empty').on('click', function() {
	basket.clearBasket();
	// console.log('ok');
});

/***********************************************************************************/
/****************************HREF LOCATION FUNCTIONS********************************/
/***********************************************************************************/

if (window.location.href.indexOf('/basket') != -1) {

	basket.displayBasketAll();
	$(document).on('click','.trash', function(event) {
		event.preventDefault();
		let id = $(this).data('index');
		console.log(id);
		basket.removeBasket(id);
	});
}

if(window.location.href.indexOf('/payment') != -1) {

	basket.loadBasketInput('#orders');
}

if(window.location.href.indexOf('/sucess') != -1) {

	basket.clearBasket();
}

// console.log(window.location.href);
// console.log(window.location.href.split('/'));

if(window.location.href.indexOf('/products') != -1) {
	$('.store').css('background','red');
	$('.store').css('color','black');
	console.log('products');
}else if(window.location.href.indexOf('/basket') != -1) {
	$('.basket').css('background','red');
	$('.basket').css('color','black');
	console.log('basket');
}else if(window.location.href.indexOf('/profil') != -1) {
	$('.profil').css('background','red');
	$('.profil').css('color','black');
	console.log('profil');
}else if(window.location.href.indexOf('/admin') != -1) {
	$('.admin').css('background','red');
	$('.admin').css('color','black');
	console.log('admin');
}else if(window.location.href.indexOf('/login') != -1) {
	$('.userlog').css('background','red');
	$('.userlog').css('color','black');
	console.log('login');
}else if(window.location.href.indexOf('/register') != -1) {
	$('.userlog').css('background','red');
	$('.userlog').css('color','black');
	console.log('register');
}else if(window.location.href.indexOf('/index') != -1) {
	$('.home').css('background','red');
	$('.home').css('color','black');
	console.log('home');
}
