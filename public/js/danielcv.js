var filterizd = $('.filtr-container').filterizr({
   //options object
});

$('.tecnologias').parallax({imageSrc: 'img/tecnologias4.png'});
$('.miContacto').parallax({imageSrc: '/img/patterns_blue_white_black.jpg'});

// ===== Scroll to Top ==== 
$(window).scroll(function() {
  if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
    $('#return-to-top').fadeIn(200); // Fade in the arrow
  } else {
    $('#return-to-top').fadeOut(200); // Else fade out the arrow
  }
});
$('#return-to-top').click(function() { // When arrow is clicked
  $('body,html').animate({
    scrollTop: 0 // Scroll to top of body
  }, 500);
});

$('.portfolio').imagesLoaded().done( function( instance ) {
  console.log('Imagenes cargadas');
});

$( document ).ready(function() {

            $(".rotate").textrotator({
                animation: "flip",
                separator: ",",
            speed: 2000
        });
            $(".test-circle").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 60,
        });
            $(".test-circle1").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 60,
        });
            $(".test-circle2").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 30,
        });
            $(".test-circle3").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 30,
        });
            $(".test-circle4").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 30,
        });
            $(".test-circle5").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 30,
        });
            $(".test-circle6").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 20,
        });
            $(".test-circle7").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 70,
        });
            $(".test-circle8").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 30,
        });
            $(".test-circle9").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 40,
        });
            $(".test-circle10").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 30,
        });

        });

        // window.sr = ScrollReveal({ reset: true });
        // // Customizing a reveal set
        // sr.reveal('#carousel-example-generic, .danielTitle, .webParag, .fa-github, .fa-bitbucket-square, .fa-facebook-square, .contactBtn, .text-center, .Learning, .style-two, .danielPhoto, .profileParag, .descargarPerfil, .myProfile, .tecnologias, .test-circle, .test-circle1, .test-circle2, .test-circle3, .test-circle4, .test-circle5, .test-circle6, .portfolio, .simplefilter, .search-row, .style-twos, .panel-default, .img-rounded, .timeline-panel, .fa-briefcase, .style-four, .blanco, .timeline-badge, .fa-globe, .ingles, .rotate, .progress-bar, .glyphicon-check, .margen, .miContacto, .contactTitle, .contactSubtitle, label, input, .divider, textarea', 
        //     { duration: 1300});
        
    
















