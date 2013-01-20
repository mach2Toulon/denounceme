$(document).ready(function() {
  $('.gallery').flexslider({controlNav: false});
  
	initScrollNav({
		nav:'#mainNav a'
	});

  var navItems = $('#mainNav li');
	navItems.find('a').click(function (){
		navItems.removeClass('active');
		this.parentNode.className += ' active';
	});
});

function initIeFunctions(){
	if(jQuery.browser.msie){
		createFormValues();
		clearInputs();
	}
}

function createFormValues(){
	jQuery("input[type='text'], textarea").each(function (){
		this.value = jQuery(this).attr('placeholder');
	});
}

function clearInputs(){
	jQuery('input:text, input:password, textarea').each(function(){
		var _el = jQuery(this);
		_el.data('val', _el.val());
		_el.bind('focus', function(){
			if(_el.val() == _el.data('val')) _el.val('');
		}).bind('blur', function(){
			if(_el.val() == '') _el.val(_el.data('val'));
		});
	});
}

function initScrollNav(_options){
	var options = jQuery.extend({
		nav:'#nav a',
		animSpeed:750
	}, _options);
	var window = jQuery('html,body');
	var addingHeight = jQuery("#header").outerHeight(true);
	
	var nav = jQuery(options.nav);;
	nav.each(function (){
		var hold = jQuery(this);
		var block = jQuery(hold.attr('href'));
		if(block.length){
			hold.click(function (){
				var curPos = window.scrollTop();
				var blockPost = block.offset().top - addingHeight;
				
				window.stop().animate({scrollTop: blockPost},{duration: options.animSpeed});
				return false;
			});
		}
	});
}