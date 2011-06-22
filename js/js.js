$(function() {
	$('a[rel*=ext]').click( function() { window.open(this.href); return false; });
	
	$('a[rel*=int]').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var $target = $(this.hash);
			$target = $target.length && $target
			|| $('[name=' + this.hash.slice(1) +']');
			if ($target.length) {
				var targetOffset = $target.offset().top;
				$('html,body').animate({scrollTop: targetOffset}, 1000);
				return false;
			}
		}
  });
	
	$('body').css( 'padding-bottom', '0' );
});