/*
* ProWPTheme Info Tabs
*/

;(function($) {

	$('.brooklyn-lite-tab-nav a').on('click',function (e) {
		e.preventDefault();
		$(this).addClass('active').siblings().removeClass('active');
	});

	$('.brooklyn-lite-tab-nav .begin').on('click',function (e) {		
		$('.brooklyn-lite-tab-wrapper .begin').addClass('show').siblings().removeClass('show');
	});	
	$('.brooklyn-lite-tab-nav .actions, .brooklyn-lite-tab .actions').on('click',function (e) {		
		e.preventDefault();
		$('.brooklyn-lite-tab-wrapper .actions').addClass('show').siblings().removeClass('show');

		$('.brooklyn-lite-tab-nav a.actions').addClass('active').siblings().removeClass('active');

	});	
	$('.brooklyn-lite-tab-nav .support').on('click',function (e) {		
		$('.brooklyn-lite-tab-wrapper .support').addClass('show').siblings().removeClass('show');
	});	
	$('.brooklyn-lite-tab-nav .table').on('click',function (e) {		
		$('.brooklyn-lite-tab-wrapper .table').addClass('show').siblings().removeClass('show');
	});	

})(jQuery);
