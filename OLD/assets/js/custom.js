new WOW().init();

$(window).scroll(function() {
	if ($(this).scrollTop() > 400) {
		$('#scrolltop').fadeIn(500);
	} else {
		$('#scrolltop').fadeOut(500);
	}
});

function bouclevote(id2, pseudo2) {
	$.post("index.php?action=voter",
	{
		id: id2,
		pseudo: pseudo2
	},function(data, status){
		console.log(data);
		if(data == "success")
		{
			$("#vote-success").fadeIn(500);setTimeout(function(){ $("#vote-success").fadeOut(500);}, 5000);
			$("#btn-verif-" + id2).fadeOut(500);setTimeout(function(){ $("#btn-after-" + id2).fadeIn(500);}, 500);
		}
		else {
			setTimeout(function(){
				bouclevote(id2, pseudo2);
			}, 500);
		}
    });
}

$(document).ready(function() {
	if ($('.content-item').first().hasClass('grey')) {
		$('body').css("background-color","#f0f0f0");
	}
	$('#addforuma').click(function(){
        if ($("#nav-add_cat").hasClass("in"))
            $("#nav-add_cat").removeClass("in");     
    });
	$('#addcata').click(function(){
        if ($("#nav-add_forum").hasClass("in"))
            $("#nav-add_forum").removeClass("in");     
    });
	$('#monprofiladmin').click(function(){
        if ($("#configforumnav").hasClass("d-none"))
			$("#configforumnav").removeClass("d-none");
		else     
			$("#configforumnav").addClass("d-block");
    });
	/*------------------------------
		MAGNIFIC POPUP
	------------------------------*/
  	$('.show-image').magnificPopup({type:'image'});
	/*------------------------------
		TOGGLE RESET PASSWORD
	------------------------------*/
	$('#reset-password-toggle').click(function() {
        $('#reset-password').slideToggle(500);
    });
	/*------------------------------
		SCROLL FUNCTION
	------------------------------*/
	function scrollToObj(target, offset, time) {
		$('html, body').animate({scrollTop: $( target ).offset().top - offset}, time);
	}
	$("a.scroll[href^='#']").click(function(){
		scrollToObj($.attr(this, 'href'), 0, 1000);
		return false;
	});
	$("#scrolltop").click(function() {
		scrollToObj('body', 0, 1000);
    });
	/*------------------------------
		PORTFOLIO - ISOTOPE
	------------------------------*/
	var $container = $('.portfolio-init');
	$container.isotope({
	  	itemSelector: '.portfolio-item',
	});
	$('.portfolio-filter .btn-group a').click(function(e) {
		$('.portfolio-filter .btn-group a').removeClass('active');
		$(this).addClass('active');

        var category = $(this).attr('data-filter');
		$container.isotope({
			filter: category
		});
    });
	/*------------------------------
		OWL CAROUSEL
	------------------------------*/
	$("#homepage-1-carousel").owlCarousel({
    	items : 1,
		loop : true,
		autoplay : true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
		responsive:{
			0:{
				nav:false,
			},
			768:{
				nav:true,
			}
		}
  	});
	$("#testimonials-carousel").owlCarousel({
    	items : 1,
		loop : true,
		autoplay : true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive:{
			0:{
				nav:false,
			},
			768:{
				nav:true,
			}
		}
  	});
	$("#reference-carousel").owlCarousel({
		margin : 10,
		dots : false,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive:{
			0:{
				items:1,
				nav:false,
				loop:false
			},
			360:{
				items:2,
			},
			768:{
				items:2,
				nav:true,
				loop:true
			},
			992:{
				items:3,
				nav:true,
				loop:true
			}
		}
  	});
	$('#portfolio-carousel').owlCarousel({
		items: 1,
		loop : true,
		autoplay : true,
		dots : false,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		responsive:{
			0:{
				nav:false,
			},
			768:{
				nav:true,
			}
		}
	})
	/*------------------------------
		REFERENCE DESCRIPTION
	------------------------------*/
	if($(window).width() > 767) {
		$('#reference-carousel .item').mouseenter(function() {
			$(this).find('p').slideDown(400);
		});

		$('#reference-carousel .item').mouseleave(function() {
			$(this).find('p').stop().slideUp(400);
		});
	}
	/*------------------------------
		TEAM MEMBER SOCIALS
	------------------------------*/
	if($(window).width() > 767) {
		$('.team-member').mouseenter(function() {
			$(this).find('.overlay').slideDown(400);
		});

		$('.team-member').mouseleave(function() {
			$(this).find('.overlay').slideUp(400);
		});
	}
	$('.overlay-wrapper').mouseenter(function() {
		$(this).find('.overlay a:first-child').addClass('animated slideInLeft');
		$(this).find('.overlay a:last-child').addClass('animated slideInRight');
    });
	$('.overlay-wrapper').mouseleave(function() {
		$(this).find('.overlay a:first-child').removeClass('animated slideInLeft');
		$(this).find('.overlay a:last-child').removeClass('animated slideInRight');
    });
	$(".player").YTPlayer();

	$(".project-typed").typed({
    	strings: ["Creative.", "Modern."],
		startDelay: 500,
		typeSpeed: 100,
		backDelay: 2000,
		loop: true
    });
});
