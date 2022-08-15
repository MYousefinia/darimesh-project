// START 

$(document).ready(function(){

   // main-page OWL-Carousel START -----

   $('.owl-carousel').owlCarousel({
      rtl: true,
      margin: 10,
      loop: true,
      items: 4,
      nav: true,
      autoplay: true,
      autoplayTimeout: 2000,
      autoplayHoverPause: true,

      responsive: {
         0:{
            items: 1
         },

         480:{
            items: 2
         },

         760: {
            items: 3
         },

         960: {
            items: 4
         },

         1200:{
            items: 4
         }
      }
   });

   // main-page OWL-Carousel END -----

});

// END