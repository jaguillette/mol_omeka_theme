jQuery(".question h2").on('click', function() {
	jQuery(".answer").removeClass("active")
	jQuery(this).siblings(".answer").addClass("active")
});

jQuery(".answer h3").on('click', function() {
	jQuery(".answer").removeClass("active");
})