jQuery(document).ready(function($){


	$('.blog-nav h2').on('click', function(){
		$('.page-blog ').toggleClass('show-category');
		if ($('.page-blog ').hasClass('show-category')) {
			$('.blog-nav h2').text('Category -');
		}else{
			$('.blog-nav h2').text('Category +');
		}
		
	});

	if (window.matchMedia('(max-width: 1024px)').matches) {
		$('.blog-nav h2').text('Category +');
	}

	$(window).on('resize', function(){
		if (window.matchMedia('(max-width: 1024px)').matches) {
			$('.blog-nav h2').text('Category +');
		}else{
			$('.blog-nav h2').text('Category');
		}

	});

	

});