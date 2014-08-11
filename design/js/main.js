$.fn.preload = function(f) {
    this.each(function(){
        $('<img/>')[0].src = this;
    });
    if (typeof f == "function") f();
}

$(document).ready(function(){
	$(['../img/empty_road.png']).preload(function() {
		$('body').css({
			'background-image': 'url("../img/empty_road.png")',
			'background-position': 'center center',
			'background-size': 'cover',
			'background-attachment': 'fixed',
			'background-repeat': 'no-repeat'
		});
	})
});