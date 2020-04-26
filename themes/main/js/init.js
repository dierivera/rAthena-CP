$(".navbar-burger").click(function() {
	// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
	$(".navbar-burger").toggleClass("is-active");
	$(".navbar-menu").toggleClass("is-active");
});

$("#deleteServerNoti").click(function() {
	$("#serverNoti").fadeOut();
});

$("#deleteServerSuccess").click(function() {
	$("#serverSuccess").fadeOut();
});

var carousels = bulmaCarousel.attach();