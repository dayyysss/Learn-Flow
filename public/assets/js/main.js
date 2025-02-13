document.addEventListener("DOMContentLoaded", function () {
// sticky header related funtionality
stickystickyHeader();

// dropdown functionalities
dropdownController();

// tab related funtioanlities
tabsController();

// mobile menu related funtionality
mobileMenu();

// accorfion related funtionality
accordions();

// project filter related funtionality
filter();

//hover effect parallex
VanillaTilt.init(document.querySelectorAll(".tilt"), {
  perspective: 2000,
});

// counter up
const counters = document.querySelectorAll(".counter");
counters.forEach((counter) => {
  new countUp(counter);
});
// quick view modal
modalProductDetails();

// video modal
videoModal();

// theme mode controller
theme();

//preloader
preloader();

// scroll up
scrollUp();

// swiper slider
slider();
// AOS Scroll Animation

AOS.init({
  offset:  0,
  duration: 1000,
  once: true,
  easing: "ease",
});

// images popup
popup();

// count down
countDown();

// charts
// lineChart();
// pieChart();

// click count
count();

// // smooth scroll
smoothScroll();


})

 /*-------------------------------------
    Header Search Form
    -------------------------------------*/
    document.addEventListener("DOMContentLoaded", function () {
      // Tombol search
      document.getElementById("searchButton").addEventListener("click", function () {
          document.querySelector(".pbmit-search-overlay").classList.add("st-show");
          document.body.classList.add("st-prevent-scroll");
      });
  
      // Tombol close modal search
      document.querySelector(".pbmit-icon-close").addEventListener("click", function () {
          document.querySelector(".pbmit-search-overlay").classList.remove("st-show");
          document.body.classList.remove("st-prevent-scroll");
      });
  
      // Cegah modal tertutup saat klik di dalam form
      document.querySelector(".pbmit-site-searchform").addEventListener("click", function (event) {
          event.stopPropagation();
      });
  
      // Tutup modal jika klik di luar form pencarian
      document.querySelector(".pbmit-search-overlay").addEventListener("click", function () {
          this.classList.remove("st-show");
          document.body.classList.remove("st-prevent-scroll");
      });
  });
  