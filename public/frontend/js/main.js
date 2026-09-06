
(function() {
  "use strict";

  /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  /**
   * Easy event listener function
   */
  const on = (type, el, listener, all = false) => {
    let selectEl = select(el, all)
    if (selectEl) {
      if (all) {
        selectEl.forEach(e => e.addEventListener(type, listener))
      } else {
        selectEl.addEventListener(type, listener)
      }
    }
  }

  /**
   * Easy on scroll event listener 
   */
  const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }

  /**
   * burgerMenu
   */
  const burgerMenu = select('.burger')
  on('click', '.burger', function(e) {
    burgerMenu.classList.toggle('active');
  })

   // home_slider
   if (select(".home_area_swiper")) {
     new Swiper(".home_area_swiper", {
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        clickable: true
      },
      speed: 600,
      loop: true,
      effect: 'fade',
      slidesPerView: 1,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
     });
   }

  // brand slider
  if (select('.mySwipers')) {
    new Swiper('.mySwipers', {
      slidesPerView: 5,
      spaceBetween: 20,
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      breakpoints: {  
        '0': {
          slidesPerView: 2,
          spaceBetween: 20,},
          '375': {
            slidesPerView: 2,
            spaceBetween: 20,},
          '480': {
            slidesPerView: 2,
            spaceBetween: 30,},
            '768': {
              slidesPerView: 2,
              spaceBetween: 30,},
        '992': {
          slidesPerView: 5,
          spaceBetween: 20, },
      }
    });
  }

  // resources_Swiper
  if (select('.resources_Swiper')) {
    new Swiper('.resources_Swiper', {
      slidesPerView: 3,
      spaceBetween: 40,
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        clickable: true
      },
      breakpoints: {  
        '0': {
          slidesPerView: 1,
          spaceBetween: 0,},
          '375': {
            slidesPerView: 1,
            spaceBetween: 0,},
          '480': {
            slidesPerView: 2,
            spaceBetween: 30,},
            '768': {
              slidesPerView: 2,
              spaceBetween: 30,},
        '992': {
          slidesPerView: 3,
          spaceBetween: 40, },
      }
    });
  }

  // service_tourists_Swiper
  if (select('.service_tourists_Swiper')) {
    new Swiper('.service_tourists_Swiper', {
      slidesPerView: 2,
      spaceBetween: 40,
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {  
        '0': {
          slidesPerView: 1,
          spaceBetween: 0,},
          '375': {
            slidesPerView: 1,
            spaceBetween: 0,},
          '480': {
            slidesPerView: 2,
            spaceBetween: 30,},
            '768': {
              slidesPerView: 2,
              spaceBetween: 30,},
        '992': {
          slidesPerView: 2,
          spaceBetween: 40, },
      }
    });
  }

  // choose_country_Swiper
  if (select('.choose_country_Swiper')) {
    new Swiper('.choose_country_Swiper', {
      slidesPerView: 2,
      spaceBetween: 40,
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {  
        '0': {
          slidesPerView: 1,
          spaceBetween: 0,},
          '375': {
            slidesPerView: 1,
            spaceBetween: 0,},
          '480': {
            slidesPerView: 2,
            spaceBetween: 30,},
            '768': {
              slidesPerView: 2,
              spaceBetween: 30,},
        '992': {
          slidesPerView: 2,
          spaceBetween: 40, },
      }
    });
  }

  // securce_visa_Swiper
  if (select('.securce_visa_Swiper')) {
    new Swiper('.securce_visa_Swiper', {
      slidesPerView: 2,
      spaceBetween: 25,
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {  
        '0': {
          slidesPerView: 1,
          spaceBetween: 0,},
          '375': {
            slidesPerView: 1,
            spaceBetween: 0,},
          '480': {
            slidesPerView: 2,
            spaceBetween: 30,},
            '768': {
              slidesPerView: 2,
              spaceBetween: 30,},
        '992': {
          slidesPerView: 2,
          spaceBetween: 25, },
      }
    });
  }

  // Testimonials slider
  if (select('.testimonial_Swiper')) {
    new Swiper('.testimonial_Swiper', {
      slidesPerView: 3,
      spaceBetween: 30,
      speed: 600,
      loop: true,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false
      },
      pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: true
      },
      breakpoints: {  
        '0': {
          slidesPerView: 1,
          spaceBetween: 0,},
          '375': {
            slidesPerView: 1,
            spaceBetween: 0,},
          '480': {
            slidesPerView: 2,
            spaceBetween: 30,},
            '768': {
              slidesPerView: 2,
              spaceBetween: 30,},
        '992': {
          slidesPerView: 3,
          spaceBetween: 20, },
      }
    });
  }

  //Animation on scroll
  window.addEventListener('load', () => {
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true,
        mirror: false
      });
    }
  });

})()




  $(window).on('load', function(){
  

    if (window.matchMedia('(max-width: 991.98px)').matches) {
        $('.dropdown_wrap>a').click(function(e) {
            e.preventDefault();
            var $this = $(this);
            // $('.drop_box>a').removeClass('open');
            // $this.toggleClass('open');

            if ($this.next().hasClass('show')) {
                $this.next().removeClass('show');
                $this.next().slideUp(350);
                $('.drop_box>a').removeClass('open');
                
            } else {
                $this.parent().parent().find('ul').removeClass('show');
                $this.parent().parent().find('ul').slideUp(350);
                $this.next().toggleClass('show');
                $this.next().slideToggle(350);

            }
        }); 
    }
});
  $(document).ready(function () {
      //05. sticky header
      function sticky_header(){
          var wind = $(window);
          var sticky = $('header');
          wind.on('scroll', function () {
              var scroll = wind.scrollTop();
              if (scroll < 100) {
                  sticky.removeClass('sticky');
              } else {
                  sticky.addClass('sticky');
              }
          });
      }
      sticky_header();
      function helpArea(){
        var wind = $(window);
        var fiexd = $('#help_left');
        wind.on('scroll', function () {
            var scroll = wind.scrollTop();
            if (scroll < 400) {
              fiexd.removeClass('poss');
              fiexd.removeClass('d-none');
            }
            else {
                fiexd.addClass('poss');
                fiexd.removeClass('d-none');
                if (scroll > 2100) {
                  console.log(scroll);
                  fiexd.removeClass('poss');
                  fiexd.addClass('d-none');
                }
            }
        });
    }
    helpArea();
      //===== Back to top

      // Show or hide the sticky footer button
      $(window).on('scroll', function () {
          if ($(this).scrollTop() > 600) {
              $('.back-to-top').fadeIn(200)
          } else {
              $('.back-to-top').fadeOut(200)
          }
      });

      //Animate the scroll to yop
      $('.back-to-top').on('click', function (event) {
          event.preventDefault();

          $('html, body').animate({
              scrollTop: 0,
          }, 1500);
      });

       // Hamburger-menu
       $('.hamburger-menu').on('click', function () {
        $('.hamburger-menu .line-top, .menu, header').toggleClass('current');
        $('.hamburger-menu .line-center').toggleClass('current');
        $('.hamburger-menu .line-bottom').toggleClass('current');
    });

    $('.dropdown-menu').on('click', function(event){
        event.stopPropagation();
    }); 
      
  });

