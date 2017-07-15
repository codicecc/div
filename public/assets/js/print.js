$(document).ready(function() {
	$('[data-target=#print]')
	.on('click', function() {
		$('[data-visibility=print]').css("float","right");
		$('[data-visibility=print]').show();
		window.print();
	});
});
