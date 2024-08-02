

document.addEventListener('DOMContentLoaded', function () {
  var swiper = new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 30,
      effect: "fade",
      pagination: {
          el: ".swiper-pagination",
          clickable: true,
      },
      autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      },
  });

  var navbarLinks = document.querySelectorAll('.pbar a');

  navbarLinks.forEach(function (link) {
      link.addEventListener('click', function (event) {

          event.preventDefault();

          var targetSlideId = link.getAttribute('href');

          var targetSlideIndex = Array.from(document.querySelectorAll('.swiper-slide')).findIndex(function (slide) {
              return '#' + slide.getAttribute('id') === targetSlideId;
          });

          if (targetSlideIndex !== -1) {
              swiper.slideTo(targetSlideIndex);
          }
      });
  });
});


/*Menu Bar */

const bar =document.getElementById('bar');
const close =document.getElementById('close');
const nav =document.getElementById('navbar2'); 

if(bar){
    bar.addEventListener('click',()=> {
        nav.classList.add('active');
    });
};

if(close){
    close.addEventListener('click',()=> {
        nav.classList.remove('active');
    });
};

/*Shooter*/

var swiper = new Swiper(".shoot-container", {
    slidesPerView: 5,
    spaceBetween: 20,
    loop: true,
    
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        568: {
            slidesPerView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        968: {
            slidesPerView: 4,
        },
    },
});

/*contact now button */

let popup = document.getElementById("popup");

function openPopup() {
  console.log("Opening popup");
  popup.classList.add("open-popup");
}

function closePopup() {
  console.log("Closing popup");
  popup.classList.remove("open-popup");
}


/* Game Swiper */


document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper(".mySwiper3", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        
      });
      var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });
});



