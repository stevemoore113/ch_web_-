////////////////////////////////////////
//　SCRIPT
////////////////////////////////////////
$(function(){
	var rwdTab = $('#tabAccordion'),
	switchPoint = 768,
	fadeSpeed = 500,
	slideSpeed = 500;

	var btnElm = rwdTab.children('dl').children('dt'),
	contentsArea = rwdTab.children('dl').children('dd');

	btnElm.on('click', function(){
		if(!$(this).hasClass('btnAcv')){
			btnElm.removeClass('btnAcv');
			$(this).addClass('btnAcv');

			if(window.innerWidth > switchPoint){
				contentsArea.fadeOut(fadeSpeed);
				$(this).next().fadeIn(fadeSpeed);
			} else {
				contentsArea.slideUp(slideSpeed);
				$(this).next().slideDown(slideSpeed);
			}
		}
	});

	btnElm.first().click();
});

