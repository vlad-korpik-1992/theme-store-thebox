/* Header fixed */
$(function() {
	let header = $('.header');
	let hederHeight = header.height();
	$(window).scroll(function() {
	  let height = $(window).scrollTop();
	  if($(this).scrollTop() > 1) {
	  	header.addClass('header--fixed');
	  	} else {
	   		header.removeClass('header--fixed');
	  	}
	});
});
/* Scroll */
window.onload = function () {
	let scr = $(".hero__box--scroll");
	scr.mousedown(function () {
		let startX = this.scrollLeft + event.pageX;
		let startY = this.scrollTop + event.pageY;
		scr.mousemove(function () {
			this.scrollLeft = startX - event.pageX;
			this.scrollTop = startY - event.pageY;
			return false;
		});
	});
	$(window).mouseup(function () {
		scr.off("mousemove");
	});
}
$(document).ready(function() {
	let windowWidth = $(window).width();
	if(windowWidth < 767)$(".hero__discount").addClass("hero__box--scroll");
    else $(".hero__discount").removeClass("hero__box--scroll");
	if(windowWidth < 767)$(".hero__box").removeClass("hero__box--scroll");
    else $(".hero__box").addClass("hero__box--scroll");
            
    $(window).resize(function(){
        let windowWidth = $(window).width();
        if(windowWidth < 767)$(".hero__discount").addClass("hero__box--scroll");
        else $(".hero__discount").removeClass("hero__box--scroll");
		if(windowWidth < 767)$(".hero__box").removeClass("hero__box--scroll");
    	else $(".hero__box").addClass("hero__box--scroll");
	});
	$('.about__btn__link').on('click', function (e) {
        e.preventDefault();
        $('.about__inner__hidden').addClass('about__inner__show');
		$('.about__inner__show').removeClass('about__inner__hidden');
		$('.about__btn').remove();
	});
	/* Tabs */
	$('.card__supplements__link').click(function (e) {
        e.preventDefault();
        let elem = e.target;
		let id = '1' + elem.getAttribute('id');
		let idSvg = '2' + elem.getAttribute('id');
		jQuery("#"+id).toggleClass('card__supplements__box--active');
		jQuery("#"+idSvg).toggleClass('card__svg--active');	
	});
	/* Tabs */
	$('.card__box__nutrition').on('click', function (e) {
		e.preventDefault();
		$('.nutrition__box').toggleClass('nutrition__box--active');
	});
	$('.put_in_cart').on('click', function (e) {
		e.preventDefault();
		$('.modal').addClass('modal--open');
	});
	$('.modal__close').on('click', function (e) {
		e.preventDefault();
		$('.modal').removeClass('modal--open');
	});
	$('.normal').on('click', function (e) {
        e.preventDefault();
		$('.card__sizes__link--active').removeClass('card__sizes__link--active');
		$('.normal').addClass('card__sizes__link--active');
		$('.card__picture--pizza').removeClass('card__picture--pizza');
		$('.card__picture--pizza--big').removeClass('card__picture--pizza--big');
		$('.card__picture').addClass('card__picture--pizza--normal');
		let dataCart = $(this).attr('data-cart');
		let dataPrice = $(this).attr('data-price');
		let dataGramme = $(this).attr('data-gramme');
		let blockGramme = $(this).parent().parent();
		let grammeContent = blockGramme.find('.card__gramme');
		grammeContent.text(dataGramme);
		let newHref = `${ window.location.href }?add-to-cart=${ dataCart }:1`;
		if($(this).hasClass('normal--modal')){
			$("a.card__box__btn__add--modal").attr("href", newHref);
			$('.add__price__modal').text(dataPrice);
		}
		else{
			$("a.card__box__btn__add").attr("href", newHref);
			$('.add__price').text(dataPrice);
		}
		$('.amount').text('1');
		if ($('.card__supplements__box__items').hasClass('card__supplements__box__items--active')){
			$('.card__supplements__box__items').removeClass('card__supplements__box__items--active');
			$('.supplements__checked__circle').removeClass('supplements__checked__circle--active');
		}
	});
	$('.small').on('click', function (e) {
        e.preventDefault();
		$('.card__sizes__link--active').removeClass('card__sizes__link--active');
		$('.small').addClass('card__sizes__link--active');
		$('.card__picture--pizza--big').removeClass('card__picture--pizza--big');
		$('.card__picture--pizza--normal').removeClass('card__picture--pizza--normal');
		$('.card__picture').addClass('card__picture--pizza');
		let dataCart = $(this).attr('data-cart');
		let dataPrice = $(this).attr('data-price');
		let dataGramme = $(this).attr('data-gramme');
		let blockGramme = $(this).parent().parent();
		let grammeContent = blockGramme.find('.card__gramme');
		grammeContent.text(dataGramme);
		let newHref = `${ window.location.href }?add-to-cart=${ dataCart }:1`;
		if($(this).hasClass('small--modal')){
			$("a.card__box__btn__add--modal").attr("href", newHref);
			$('.add__price__modal').text(dataPrice);
		}
		else{
			$("a.card__box__btn__add").attr("href", newHref);
			$('.add__price').text(dataPrice);
		}
		$('.amount').text('1');
		if ($('.card__supplements__box__items').hasClass('card__supplements__box__items--active')){
			$('.card__supplements__box__items').removeClass('card__supplements__box__items--active');
			$('.supplements__checked__circle').removeClass('supplements__checked__circle--active');
		}
	});
	$('.big').on('click', function (e) {
        e.preventDefault();
		$('.card__sizes__link--active').removeClass('card__sizes__link--active');
		$('.big').addClass('card__sizes__link--active');
		$('.card__picture--pizza--normal').removeClass('card__picture--pizza--normal');
		$('.card__picture--pizza').removeClass('card__picture--pizza');
		$('.card__picture').addClass('card__picture--pizza--big');
		let dataCart = $(this).attr('data-cart');
		let dataPrice = $(this).attr('data-price');
		let dataGramme = $(this).attr('data-gramme');
		let blockGramme = $(this).parent().parent();
		let grammeContent = blockGramme.find('.card__gramme');
		grammeContent.text(dataGramme);
		let newHref = `${ window.location.href }?add-to-cart=${ dataCart }:1`;
		if($(this).hasClass('big--modal')){
			$("a.card__box__btn__add--modal").attr("href", newHref);
			$('.add__price__modal').text(dataPrice);
		}
		else{
			$("a.card__box__btn__add").attr("href", newHref);
			$('.add__price').text(dataPrice);
		}
		$('.amount').text('1');
		if ($('.card__supplements__box__items').hasClass('card__supplements__box__items--active')){
			$('.card__supplements__box__items').removeClass('card__supplements__box__items--active');
			$('.supplements__checked__circle').removeClass('supplements__checked__circle--active');
		}
	});
	$('.amount__minus').on('click', function (e) {
		e.preventDefault();
		let blockAmount = $(this).next('.amount');
		let amount = blockAmount.text();
		let blockParent = $(this).parent().parent();
		let blockPrice = blockParent.find('.add__price');
		if(blockParent.hasClass('card__box__btn--modal')){
			blockPrice = blockParent.find('.add__price__modal');
		}
		if(Number(amount) > 1){
			if ($('.card__supplements__box__items').hasClass('card__supplements__box__items--active')){
				$('.card__supplements__box__items').removeClass('card__supplements__box__items--active');
				$('.supplements__checked__circle').removeClass('supplements__checked__circle--active');
			}
			let newAmount = Number(amount) - 1;
			let price = $('.card__sizes__link--active').attr('data-price');
			price = price.replace(/[\s,%]/g, '');
			let newPrice = price * newAmount;
			newPrice = newPrice.toFixed(2);
			blockAmount.text(newAmount);
			blockPrice.text(newPrice);
			let dataCart = $('.card__sizes__link--active').attr('data-cart');
			let newHref = `${ window.location.href }?add-to-cart=${ dataCart }:${ newAmount }`;
			if(blockParent.hasClass('card__box__btn--modal')){
				$("a.card__box__btn__add--modal").attr("href", newHref);
			}
			else{
				$("a.card__box__btn__add").attr("href", newHref);
			}
		}
	});
	$('.amount__plus').on('click', function (e) {
		e.preventDefault();
		if ($('.card__supplements__box__items').hasClass('card__supplements__box__items--active')){
			$('.card__supplements__box__items').removeClass('card__supplements__box__items--active');
			$('.supplements__checked__circle').removeClass('supplements__checked__circle--active');
		}
		let blockAmount = $(this).prev('.amount');
		let amount = blockAmount.text();
		let blockParent = $(this).parent().parent();
		let blockPrice = blockParent.find('.add__price');
		if(blockParent.hasClass('card__box__btn--modal')){
			blockPrice = blockParent.find('.add__price__modal');
		}
		let price = $('.card__sizes__link--active').attr('data-price');
		price = price.replace(/[\s,%]/g, '');
		let newAmount = Number(amount) + 1;
		let newPrice = price * newAmount;
		newPrice = newPrice.toFixed(2);
		blockAmount.text(newAmount);
		blockPrice.text(newPrice);
		let dataCart = $('.card__sizes__link--active').attr('data-cart');
		let newHref = `${ window.location.href }?add-to-cart=${ dataCart }:${ newAmount }`;
		if(blockParent.hasClass('card__box__btn--modal')){
			$("a.card__box__btn__add--modal").attr("href", newHref);
		}
		else{
			$("a.card__box__btn__add").attr("href", newHref);
		}
	});
	$('.supplements__price__col__minus').on('click', function (e) {
		e.preventDefault();
		let blockAmount = $(this).next('.supplements__price__col__value');
		let supplementsAmount = blockAmount.text();
		if(Number(supplementsAmount) > 1){
			let zeroBlcok = $(this).parent().parent().parent();
			let blockParent = $(this).parent().parent();
			let blockPrice = blockParent.find('.supplements__price__span');
			let price = blockPrice.text();
			price = price.replace(/[\s,%]/g, '');
			let newSupplementsAmount = Number(supplementsAmount) - 1;
			let startingPrice = price / Number(supplementsAmount);
			startingPrice = startingPrice.toFixed(2);
			newPrice = startingPrice * newSupplementsAmount;
			newPrice = newPrice.toFixed(2);
			blockAmount.text(newSupplementsAmount);
			blockPrice.text(newPrice);
			if (zeroBlcok.hasClass('card__supplements__box__items--active')){
				let cartId = zeroBlcok.attr('data-cart');
				let searchString = `,${ cartId }:${ supplementsAmount }`;
				let newString = `,${ cartId }:${ newSupplementsAmount }`;
				let btnLink = $('.card__box__btn__add').prop('href');
				let newLink = btnLink.replace(searchString, newString);
				$("a.card__box__btn__add").attr("href", newLink);
				let blockBtnPrice = $('.add__price');
				let btnPrice = $('.add__price').text();
				if (zeroBlcok.hasClass('card__supplements__box__items--modal')){
					btnLink = $('.card__box__btn__add--modal').prop('href');
					newLink = btnLink.replace(searchString, newString);
					$("a.card__box__btn__add--modal").attr("href", newLink);
					blockBtnPrice = $('.add__price__modal');
					btnPrice = $('.add__price__modal').text();
				}
				btnPrise = btnPrice.replace(/[\s,%]/g, '');
				btnPrice = Number(btnPrice) - Number(startingPrice);
				btnPrice = btnPrice.toFixed(2);
				blockBtnPrice.text(btnPrice);
			}
		}
	});
	$('.supplements__price__col__plus').on('click', function (e) {
		e.preventDefault();
		let blockAmount = $(this).prev('.supplements__price__col__value');
		let zeroBlcok = $(this).parent().parent().parent();
		let blockParent = $(this).parent().parent();
		let blockPrice = blockParent.find('.supplements__price__span');
		let price = blockPrice.text();
		price = price.replace(/[\s,%]/g, '');
		let supplementsAmount = blockAmount.text();
		let newSupplementsAmount = Number(supplementsAmount) + 1;
		let startingPrice = price / Number(supplementsAmount);
		startingPrice = startingPrice.toFixed(2);
		newPrice = startingPrice * newSupplementsAmount;
		newPrice = newPrice.toFixed(2);
		blockAmount.text(newSupplementsAmount);
		blockPrice.text(newPrice);
		if (zeroBlcok.hasClass('card__supplements__box__items--active')){
			let cartId = zeroBlcok.attr('data-cart');
			let searchString = `,${ cartId }:${ supplementsAmount }`;
			let newString = `,${ cartId }:${ newSupplementsAmount }`;
			let btnLink = $('.card__box__btn__add').prop('href');
			let newLink = btnLink.replace(searchString, newString);
			$("a.card__box__btn__add").attr("href", newLink);
			let blockBtnPrice = $('.add__price');
			let btnPrice = $('.add__price').text();
			if (zeroBlcok.hasClass('card__supplements__box__items--modal')){
				btnLink = $('.card__box__btn__add--modal').prop('href');
				newLink = btnLink.replace(searchString, newString);
				$("a.card__box__btn__add--modal").attr("href", newLink);
				blockBtnPrice = $('.add__price__modal');
				btnPrice = $('.add__price__modal').text();
			}
			btnPrise = btnPrice.replace(/[\s,%]/g, '');
			btnPrice = Number(btnPrice) + Number(startingPrice);
			btnPrice = btnPrice.toFixed(2);
			blockBtnPrice.text(btnPrice);
		}
	});
	$('.supplements__checked').on('click', function (e) {
		e.preventDefault();
		let blockParent = $(this).parent();
		if (blockParent.hasClass('card__supplements__box__items--active')){
			let blockCircle = $(this).find('.supplements__checked__circle');
			blockParent.removeClass('card__supplements__box__items--active');
			blockCircle.removeClass('supplements__checked__circle--active');
			let cartId = blockParent.attr('data-cart');
			let blockAmount = blockParent.find('.supplements__price__col__value');
			let amount = blockAmount.text();
			if(Number(amount) == 0) {
				amount = 1;
			}
			let stringCardIdandAmount = `,${ cartId }:${ amount }`;		
			let blockPrice = blockParent.find('.supplements__price__span');
			let price = blockPrice.text();
			let blockBtnPrice = $('.add__price');
			let btnPrice = $('.add__price').text();
			if($(this).hasClass('supplements__checked--modal')){
				blockBtnPrice = $('.add__price__modal');
				btnPrice = $('.add__price__modal').text();
				let btnLink = $('.card__box__btn__add--modal').prop('href');
				let newLink = btnLink.replace(stringCardIdandAmount, '');
				$("a.card__box__btn__add--modal").attr("href", newLink);
			}
			else {
				let btnLink = $('.card__box__btn__add').prop('href');
				let newLink = btnLink.replace(stringCardIdandAmount, '');
				$("a.card__box__btn__add").attr("href", newLink);	
			}
			btnPrise = btnPrice.replace(/[\s,%]/g, '');
			btnPrice = Number(btnPrice) - Number(price);
			btnPrice = btnPrice.toFixed(2);
			blockBtnPrice.text(btnPrice);
		}
		else{
			$(this).parent().addClass('card__supplements__box__items--active');
			let blockCircle = $(this).find('.supplements__checked__circle');
			blockCircle.addClass('supplements__checked__circle--active');
			let cartId = blockParent.attr('data-cart');
			let blockAmount = blockParent.find('.supplements__price__col__value');
			let amount = blockAmount.text();
			if(Number(amount) == 0) {
				amount = 1;
			}
			let stringCardIdandAmount = `,${ cartId }:${ amount }`;
			let blockPrice = blockParent.find('.supplements__price__span');
			let price = blockPrice.text();
			let blockBtnPrice = $('.add__price');
			let btnPrice = $('.add__price').text();
			if($(this).hasClass('supplements__checked--modal')){
				blockBtnPrice = $('.add__price__modal');
				btnPrice = $('.add__price__modal').text();
				let btnLink = $('.card__box__btn__add--modal').prop('href');
				let newLink = btnLink + stringCardIdandAmount;
				$("a.card__box__btn__add--modal").attr("href", newLink);
			}
			else {
				let btnLink = $('.card__box__btn__add').prop('href');
				let newLink = btnLink + stringCardIdandAmount;
				$("a.card__box__btn__add").attr("href", newLink);
			}
			btnPrise = btnPrice.replace(/[\s,%]/g, '');
			console.log(btnPrice);
			console.log(price);
			btnPrice = Number(btnPrice) + Number(price);
			btnPrice = btnPrice.toFixed(2);
			blockBtnPrice.text(btnPrice);
		}
	});
})