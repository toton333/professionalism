(function($){
wp.customize('logo_text', function(value){
 value.bind(function(newVal){
   $('.logo h1').html(newVal);
 });
});

wp.customize('theme_color', function(value){
	value.bind(function(newVal){
		$('.right-panel .contact-panel').css('background', newVal);

	});

});

wp.customize('buttons_background', function(value){
	value.bind(function(newVal){
		$('.controller .buttons').css('background', newVal);

	});

});


})(jQuery);


