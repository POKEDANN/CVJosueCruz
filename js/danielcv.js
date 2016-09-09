var filterizd = $('.filtr-container').filterizr({
   //options object
});

$(function(){
          $(".sentences").typed({
            strings: ["Buen dia,", "Soy Daniel Cruz", "Estoy a tu servicio", "¿Que vamos a crear hoy?", ""],
            typeSpeed: 0
          });
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
            percent: 20,
        });
            $(".test-circle5").circliful({
            animationStep: 5,
            foregroundBorderWidth: 5,
            backgroundBorderWidth: 15,
            percent: 40,
        });
        });