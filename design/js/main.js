$.fn.preload = function(f) {
    this.each(function(){
    	console.log('loaded:' + this);
        $('<img/>')[0].src = this;
    });
    if (typeof f == "function") f();
}

$(document).ready(function(){
	var filesource = 'img/empty_road.jpg';
	$([filesource]).preload(function() {
		console.log('using image...');
		$('body').css('background-image', 'url('+filesource+')');
		console.log($('body').css('background'));
	})
});