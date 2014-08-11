$.fn.preload = function(f) {
    this.each(function(){
    	console.log('loaded:' + this);
        $('<img/>')[0].src = this;
    });
    if (typeof f == "function") f();
}

$(document).ready(function(){
	$(['../img/empty_road.png']).preload(function() {
		console.log('using image...');
		$('body').css({
			'background-image': 'url("../img/empty_road.png")',
			'background-position': 'center center',
			'background-size': 'cover',
			'background-attachment': 'fixed',
			'background-repeat': 'no-repeat'
		});
	})
});