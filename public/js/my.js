

(() => {

     const openNavMenu = document.querySelector(".open-nav-menu"),
          closeNavMenu = document.querySelector(".close-nav-menu"),
          navMenu = document.querySelector(".nav-menu"),
          menuOverlay = document.querySelector(".menu-overlay"),
          mediaSize = 991;

     openNavMenu.addEventListener("click", toggleNav);
     closeNavMenu.addEventListener("click", toggleNav);
     // close the navMenu by clicking outside
     menuOverlay.addEventListener("click", toggleNav);

     function toggleNav() {
          navMenu.classList.toggle("open");
          menuOverlay.classList.toggle("active");
          document.body.classList.toggle("hidden-scrolling");
     }

     navMenu.addEventListener("click", (event) => {
          if (event.target.hasAttribute("data-toggle") &&
               window.innerWidth <= mediaSize) {
               // prevent default anchor click behavior
               event.preventDefault();
               const menuItemHasChildren = event.target.parentElement;
               // if menuItemHasChildren is already expanded, collapse it
               if (menuItemHasChildren.classList.contains("active")) {
                    collapseSubMenu();
               }
               else {
                    // collapse existing expanded menuItemHasChildren
                    if (navMenu.querySelector(".menu-item-has-children.active")) {
                         collapseSubMenu();
                    }
                    // expand new menuItemHasChildren
                    menuItemHasChildren.classList.add("active");
                    const subMenu = menuItemHasChildren.querySelector(".sub-menu");
                    subMenu.style.maxHeight = subMenu.scrollHeight + "px";
               }
          }
     });
     function collapseSubMenu() {
          navMenu.querySelector(".menu-item-has-children.active .sub-menu")
               .removeAttribute("style");
          navMenu.querySelector(".menu-item-has-children.active")
               .classList.remove("active");
     }
     function resizeFix() {
          // if navMenu is open ,close it
          if (navMenu.classList.contains("open")) {
               toggleNav();
          }
          // if menuItemHasChildren is expanded , collapse it
          if (navMenu.querySelector(".menu-item-has-children.active")) {
               collapseSubMenu();
          }
     }

     window.addEventListener("resize", function () {
          if (this.innerWidth > mediaSize) {
               resizeFix();
          }
     });

})();



//    sticky header add 
let header = document.querySelector('.headerWarp');
window.addEventListener('scroll', function () {
     if (window.pageYOffset >= 200) {
          header.classList.add("sticky_header")
     }
     else {
          header.classList.remove("sticky_header")
     }
})

// Banner slider animation 
const swiperQuiz = new Swiper(".animeslide", {
     // Optional parameters
     effect: "fade",
     loop: true,
     speed: 900,
     centeredSlides: true,
     pagination: {
          el: ".animeslide-pagination",
          type: "custom",
          renderCustom: function (swiper, current, total) {
               let indT = total >= 5 ? total : `${total}`;
               let indC = current >= 5 ? current : `${current}`;
               return `<b>${indC}</b><span>/</span>${indT}`;
          }
     },
     navigation: {
          nextEl: ".animeslide-button-next",
          prevEl: ".animeslide-button-prev"
     },
     scrollbar: {
          el: ".animeslide-scrollbar",
          draggable: true
     },
     keyboard: {
          enabled: true,
          onlyInViewport: false
     },
     runCallbacksOnInit: true
});

$('.our_tour_slider').owlCarousel({
     loop: true,
     margin: 30,
     dots: false,
     nav: true,
     mouseDrag: true,
     autoplay: true,
     // animateOut: 'slideOutUp',
     navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
     autoplayTimeout: 4000,
     autoplaySpeed: 3000,
     responsive: {
          0: {
               items: 1,
               nav: false,
               autoplay: true,

          },
          600: {
               items: 2,
               nav: false,
               autoplay: true,
          },
          1000: {
               items: 2
          }
     }
});

$('.testi_slider').owlCarousel({
     loop: true,
     dots: false,
     margin: 30,
     nav: true,
     mouseDrag: true,
     autoplay: true,
     navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
     autoplayTimeout: 4000,
     autoplaySpeed: 3000,
     responsive: {
          0: {
               items: 1,
               nav: true,
               autoplay: true,
          },
          600: {
               items: 1,
               nav: true,
               autoplay: true,
          },
          1000: {
               items: 2
          }
     }
});

$('.blog_slider').owlCarousel({
     loop: true,
     margin: 30,
     dots: false,
     nav: true,
     mouseDrag: true,
     autoplay: true,
     // animateOut: 'slideOutUp',
     navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
     autoplayTimeout: 4000,
     autoplaySpeed: 2000,
     responsive: {
          0: {
               items: 1,
               nav: false,
               autoplay: true,

          },
          600: {
               items: 2.5,
               nav: false,
               autoplay: true,
          },
          1000: {
               items: 2
          }
     }
});

$('.service_slider').owlCarousel({
     loop: true,
     margin: 30,
     dots: false,
     nav: true,
     mouseDrag: true,
     autoplay: true,
     // animateOut: 'slideOutUp',
     navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
     autoplayTimeout: 4000,
     autoplaySpeed: 3000,
     responsive: {
          0: {
               items: 1,
               nav: false,
               autoplay: true,

          },
          600: {
               items: 2,
               nav: false,
               autoplay: true,
          },
          1000: {
               items: 2
          }
     }
});

//  =======================================================

$('.six_slider').owlCarousel({
     loop: true,
     margin: 30,
     dots: false,
     nav: true,
     mouseDrag: true,
     autoplay: true,
     // animateOut: 'slideOutUp',
     navText: ['<i class="fa-solid fa-arrow-left"></i>', '<i class="fa-solid fa-arrow-right"></i>'],
     autoplayTimeout: 4000,
     autoplaySpeed: 3000,
     responsive: {
          0: {
               items: 2,
               nav: false,
               autoplay: true,

          },
          600: {
               items: 4,
               nav: false,
               autoplay: true,
          },
          1000: {
               items: 5
          }
     }
});

// ========================================================

$('.interior-banner-slider').owlCarousel({
     loop: true,
     dots: false,
     autoplay: true,
     autoplayTimeout: 8000,
     autoplaySpeed: 3000,
     responsive: {
          0: {
               items: 1,
               nav: false,
               autoplay: true,

          },
          600: {
               items: 1
          },
          1000: {
               items: 1
          }
     }
})

$('.main-banner-slider').owlCarousel({
     loop: true,
     dots: false,
     autoplay: true,
     autoplayTimeout: 4000,
     autoplaySpeed: 2000,
     responsive: {
          0: {
               items: 1,
               nav: false,
               autoplay: true,

          },
          600: {
               items: 1
          },
          1000: {
               items: 1
          }
     }
})

// -----Country Code Selection
$("#mobile_code").intlTelInput({
     initialCountry: "in",
     onlyCountries: ["in"],
     separateDialCode: true,
     // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
});

$("#phone_code").intlTelInput({
     initialCountry: "in",
     separateDialCode: true,
     // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
});
// counter up 

var counted = 0;
$(window).scroll(function () {
     var oTop = $('#counter').offset().top - window.innerHeight;
     if (counted == 0 && $(window).scrollTop() > oTop) {
          $('.count').each(function () {
               var $this = $(this),
                    countTo = $this.attr('data-count');
               $({
                    countNum: $this.text()
               }).animate({
                    countNum: countTo
               },

                    {

                         duration: 2000,
                         easing: 'swing',
                         step: function () {
                              $this.text(Math.floor(this.countNum));
                         },
                         complete: function () {
                              $this.text(this.countNum);
                              //alert('finished');
                         }

                    });
          });
          counted = 1;
     }

});

// stepform js 

$('.rec_box').on("click", function () {
     $(this).toggleClass('ad_color');
});

//Validate partner form
function validatePartnerForm(currentStep) {
    
     if (currentStep == 1) {
          var full_name = $("#full_name").val();
          var mobile_no = $("#mobile_no").val();
          var email = $("#email").val();
          var firm_name = $("#firm_name").val();
          var firm_pan = $("#firm_pan").val();
          var firm_gst = $("#firm_gst").val();
          var firm_start_date = $("#firm_start_date").val();
          var city = $("#city").val();

          if (full_name == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your Full Name!",
                    footer: ''
               });
               return false;
          }

          if (email == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your email!",
                    footer: ''
               });
               return false;
          }

          if (mobile_no == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your mobile no!",
                    footer: ''
               });
               return false;
          }

          if (firm_name == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your Firm Name!",
                    footer: ''
               });
               return false;
          }

          if (firm_gst == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your Firm GST!",
                    footer: ''
               });
               return false;
          }

          if (firm_pan == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your Firm Pan!",
                    footer: ''
               });
               return false;
          }
         
          if (official_company_address == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your Official Company Address!",
                    footer: ''
               });
               return false;
          }

          if (city == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please select your city!",
                    footer: ''
               });
               return false;
          }

          if (how_many_years == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your How many years you have been  this line!",
                    footer: ''
               });
               return false;
          }

          return true;
     }

     if (currentStep == 2) {

          var major_category = $('input[name="major_category[]"]:checked').val();
          if(major_category == undefined){
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please choose your Line Of Work!",
                    footer: ''
               });
               return false;
          }
          return true;
     }

     if(currentStep == 3){
          var minor_category = $('input[name="minor_category"]:checked').val();
          var partnerportfolio = $("#partnerportfolio")[0].files[0];

          if(minor_category == undefined){
               Swal.fire({
                   icon: "error",
                   title: "Oops...",
                   text: "Please choose your Minor Category!",
                   footer: ''
               });
               return false;
           }

          //  if(partnerportfolio == undefined){
          //      Swal.fire({
          //          icon: "error",
          //          title: "Oops...",
          //          text: "Please choose your Share link your website!",
          //          footer: ''
          //      });
          //      return false;
          //  }

           return true;
     }

}

//validate form
function validateForm(formType, currentStep) {
     if (formType == "partnerRegister") {
          return validatePartnerForm(currentStep);
     }
}

function validateFormII(formTypeII, currentStep) {
     if (formTypeII == "HomeRegister") {
          return validatePartnerFormII(currentStep);
     }
}


//Validate partner form
function validatePartnerFormII(currentStep) {
    console.log(currentStep)
     if (currentStep == 1) {
          var firm_name = $("#firm_name").val();
          var mobile_no = $("#mobile_no").val();
          var mobile_code = $("#mobile_code").val();
          var pincode = $("#pincode").val();
          var email = $("#email").val();
          if (firm_name == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your Firm Name!",
                    footer: ''
               });
               return false;
          }
          if (pincode == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your Pin Code!",
                    footer: ''
               });
               return false;
          }
          if (firm_name == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your Firm Name!",
                    footer: ''
               });
               return false;
          }
          if (email == '') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your email!",
                    footer: ''
               });
               return false;
          }
          if (mobile_no == '' || mobile_code=='') {
               Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Please enter your mobile no!",
                    footer: ''
               });
               return false;
          }
          return true;
     }

     if (currentStep == 2) {
          // var home_requirements = $('input[name="home_requirements[]"]:checked').val();
          // var renovation = $('input[name="renovation[]"]:checked').val();

          // if(home_requirements == undefined){
          //      Swal.fire({
          //          icon: "error",
          //          title: "Oops...",
          //          text: "Please choose your Home Requirements!",
          //          footer: ''
          //      });
          //      return false;
          // }
          // else if(renovation == undefined){
          //      Swal.fire({
          //                icon: "error",
          //                title: "Oops...",
          //                text: "Please choose your Renovation!",
          //                footer: ''
          //           });
          //           return false;
          // }
          return true;
     }

     if(currentStep == 3){
          var services = $('input[name="services"]:checked').val();
          if(services == undefined){
               Swal.fire({
                   icon: "error",
                   title: "Oops...",
                   text: "Please choose your services!",
                   footer: ''
               });
               return false;
          }
          return true;
     }

     if(currentStep == 4){
          var budget = $("#budget").val();
          var clintpincode = $("#clintpincode").val();

          if(budget == ''){
               Swal.fire({
                   icon: "error",
                   title: "Oops...",
                   text: "Please choose your budget!",
                   footer: ''
               });
               return false;
          }

          if(clintpincode == ''){
               Swal.fire({
                   icon: "error",
                   title: "Oops...",
                   text: "Please choose your pin code!",
                   footer: ''
               });
               return false;
          }
          return true;
     }

     if(currentStep == 5 ){
          var date = $("#date").val();
          var time = $("#time").val();

          if(date == ''){
               Swal.fire({
                   icon: "error",
                   title: "Oops...",
                   text: "Please choose your date!",
                   footer: ''
               });
               return false;
          }

          if(time == ''){
               Swal.fire({
                   icon: "error",
                   title: "Oops...",
                   text: "Please choose your time!",
                   footer: ''
               });
               return false;
          }
          return true;
     }

     if(currentStep == 6){
          var expert_id = $("#expert_id").val();
          if(expert_id == ''){
               Swal.fire({
                   icon: "error",
                   title: "Oops...",
                   text: "Please choose your partner!",
                   footer: ''
               });
               return false;
          }
          return true;
     }
}



//jQuery time
$(document).ready(function () {
     var current = 1;

     widget = $(".step");
     btnnext = $(".next");
     btnback = $(".back");
     btnsubmit = $(".submit");

     widget.not(':eq(0)').hide();
     hideButtons(current);
     setProgress(current);

     btnnext.click(function () {
          
          //Check form validation
          var formType = $("#formType").val();
          var validate = validateForm(formType, current);

          var formTypeII = $("#formTypeII").val();
          var validateII = validateFormII(formTypeII, current);

          if(validate == false){
               return false;
          }

          if(validateII == false){
               return false;
          }

          if (current < widget.length) {
               widget.show();
               widget.not(':eq(' + (current++) + ')').hide();
               setProgress(current);
          }
          hideButtons(current);
     });

     btnback.click(function () {
          if (current > 1) {
               current = current - 2;
               btnnext.trigger('click');
          }
          hideButtons(current);
     });
});

setProgress = function (currstep) {
     var percent = parseFloat(100 / widget.length) * currstep;
     percent = percent.toFixed();

     $(".progress-bar")
          .css("width", percent + "%")
          .html(percent + "%");
}

hideButtons = function (current) {
     var limit = parseInt(widget.length);

     $(".action").hide();

     if (current < limit) btnnext.show();
     if (current > 1) btnback.show();
     if (current == limit) { btnnext.hide(); btnsubmit.show(); }
}

//    tabs js 
$('.tab-link').click(function () {

     var tabID = $(this).attr('data-tab');

     $(this).addClass('active').siblings().removeClass('active');

     $('#tab-' + tabID).addClass('active').siblings().removeClass('active');
});




$(document).ready(function () {
     function AddReadMore() {
     //This limit you can set after how much characters you want to show Read More.
     var carLmt = 300;
     // Text to show when text is collapsed
     var readMoreTxt = " ...read more";
     // Text to show when text is expanded
     var readLessTxt = " read less";

     //Traverse all selectors with this class and manupulate HTML part to show Read More
     $(".add-read-more").each(function () {
          if ($(this).find(".first-section").length) return;

          var allstr = $(this).text();
          if (allstr.length > carLmt) {
          var firstSet = allstr.substring(0, carLmt);
          var secdHalf = allstr.substring(carLmt, allstr.length);
          var strtoadd =
               firstSet +
               "<span class='second-section'>" +
               secdHalf +
               "</span><span class='read-more'  title='Click to Show More'>" +
               readMoreTxt +
               "</span><span class='read-less' title='Click to Show Less'>" +
               readLessTxt +
               "</span>";
          $(this).html(strtoadd);
          }
     });

     //Read More and Read Less Click Event binding
     $(document).on("click", ".read-more,.read-less", function () {
          $(this)
          .closest(".add-read-more")
          .toggleClass("show-less-content show-more-content");
     });
     }

     AddReadMore();
});