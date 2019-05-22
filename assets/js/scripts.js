

// all navbar related scripts


// function to make the navbar collapse after click.

$(document).on("click", ".navbar-collapse.in", function (e) {
	if ($(e.target).is("a") && $(e.target).attr("class") != "dropdown-toggle") {
		$(this).collapse("hide");
	}
});

// function to make navbar smaller when scrolling

$(window).scroll(function () {
	if ($(document).scrollTop() > 50) {
		$("nav").addClass("shrink");
	} else {
		$("nav").removeClass("shrink");
	}
});

// javascript script to allow smooth scrolling.

$(document).ready(function () {
	$("body").scrollspy({ target: ".navbar", offset: 70 });

	$("a").on("click", function (event) {
		if (this.hash !== "") {
			event.preventDefault();

			var hash = this.hash;

			$("html, body").animate(
				{ scrollTop: $(hash).offset().top },
				{
					duration: 800,
					easing: "easeOutExpo",
					queue: false,
					complete: function () {
						window.location.hash = hash;
					}
				}
			);
		}
	});
});

// animations

// scroll to top function

$(document).ready(function () {
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			$(".scrollToTop").fadeIn();
		} else {
			$(".scrollToTop").fadeOut();
		}
	});

	$(".scrollToTop").click(function () {
		$("html, body").animate({ scrollTop: 0 },
			{
				duration: 900,
				easing: "easeOutExpo",
				queue: false
			});
		return false;
	});
});

