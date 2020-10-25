
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay: true,
    autoplayTimeout:5000,
    responsive:{
        0:{
            items:1
        },
        500:{
            items:2
        },

        800:{
            items:3
        }
        ,
        1000:{
            items:4
        },

        1400:{
            items:6
        },
       
        1800:{
            items:7
        }


    }
})


$('.carousel').carousel({
    interval: 4000
  })





