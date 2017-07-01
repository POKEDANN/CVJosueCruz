$( document ).ready(function() {
    $('.parallax-window').parallax({imageSrc: '/img/tecCode2.png'});
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})
    $(".rotate-btn").click(function(){
    $("#card-1").addClass("flipped");
});
    $(".rotate-btn.back").click(function(){
    $("#card-1").removeClass("flipped");
});
    $('.collapse.in').prev('.panel-heading').addClass('active');
  $('#accordion, #bs-collapse')
    .on('show.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').addClass('active');
    })
    .on('hide.bs.collapse', function(a) {
      $(a.target).prev('.panel-heading').removeClass('active');
    });
});