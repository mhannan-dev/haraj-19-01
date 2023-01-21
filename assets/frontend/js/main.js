(function ($) {
  "user strict";

$(".nice-select").niceSelect(),

//Create Background Image
(function background() {
  let img = $('.bg_img');
  img.css('background-image', function () {
    var bg = ('url(' + $(this).data('background') + ')');
    return bg;
  });
})();


// header-fixed
var fixed_top = $(".header-section");
$(window).on("scroll", function(){
    if( $(window).scrollTop() > 100){  
        fixed_top.addClass("animated fadeInDown header-fixed");
    }
    else{
        fixed_top.removeClass("animated fadeInDown header-fixed");
    }
});

// scroll-to-top
var ScrollTop = $(".scrollToTop");
$(window).on('scroll', function () {
  if ($(this).scrollTop() < 100) {
      ScrollTop.removeClass("active");
  } else {
      ScrollTop.addClass("active");
  }
});

// slider
var swiper = new Swiper('.product-thumb-slider', {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.slider-next',
    prevEl: '.slider-prev',
  },
  // autoplay: {
  //   speeds: 1000,
  //   delay: 2000,
  // },
  speed: 1000,
  breakpoints: {
    991: {
      slidesPerView: 1,
    },
    767: {
      slidesPerView: 1,
    },
    575: {
      slidesPerView: 1,
    },
  }
});

// lightcase
$(window).on('load', function () {
  $("a[data-rel^=lightcase]").lightcase();
})

//plan-tab-switcher
$('.setting-tab-switcher').on('click', function () {
  $(this).toggleClass('active');
});

// custom cursor 
var cursor = $(".cursor"),
    follower = $(".cursor-follower");

var posX = 0,
    posY = 0;

var mouseX = 0,
    mouseY = 0;

TweenMax.to({}, 0.016, {
  repeat: -1,
  onRepeat: function() {
    posX += (mouseX - posX) / 9;
    posY += (mouseY - posY) / 9;
    
    TweenMax.set(follower, {
        css: {    
        left: posX - 12,
        top: posY - 12
        }
    });
    
    TweenMax.set(cursor, {
        css: {    
        left: mouseX,
        top: mouseY
        }
    });
  }
});

$(document).on("mousemove", function(e) {
    mouseX = e.clientX;
    mouseY = e.clientY;
});

$("a").on("mouseenter", function() {
    cursor.addClass("active");
    follower.addClass("active");
});
$("a").on("mouseleave", function() {
    cursor.removeClass("active");
    follower.removeClass("active");
});

$('input').attr('autocomplete','off');

//sidebar Menu
var bodyOvrelay = $('body');
var menuToggler = $('body');

$(document).on('click', '.menu-overlay', function(e) {
  e.preventDefault();
  bodyOvrelay.removeClass('show');
  menuToggler.removeClass('show');
});
$(document).on('click', '.menu-toggler', function(e) {
  e.preventDefault();
  bodyOvrelay.addClass('show');
  menuToggler.addClass('show');
});

// $(document).on('click', '.sell-sidebar-overlay', function(e) {
//   e.preventDefault();
//   bodyOvrelay.removeClass('open');
//   menuToggler.removeClass('open');
// });
// $(document).on('click', '.sell-add-more-cross-btn', function(e) {
//   e.preventDefault();
//   bodyOvrelay.removeClass('open');
//   menuToggler.removeClass('open');
// });
// $(document).on('click', '.sell-btn', function(e) {
//   e.preventDefault();
//   bodyOvrelay.addClass('open');
//   menuToggler.addClass('open');
// });

// $(document).on('click', '.sell-add-more-sidebar-overlay', function(e) {
//   e.preventDefault();
//   bodyOvrelay.removeClass('on');
//   menuToggler.removeClass('on');
// });
// $(document).on('click', '.sell-add-more-cross-btn', function(e) {
//   e.preventDefault();
//   bodyOvrelay.removeClass('on');
//   menuToggler.removeClass('on');
// });
// $(document).on('click', '.add-more', function(e) {
//   e.preventDefault();
//   bodyOvrelay.addClass('on');
//   menuToggler.addClass('on');
// });

$(".sell-category-item > a").on("click", function () {
  var element = $(this).parent(".sell-category-item");
  if (element.hasClass("open")) {
    element.removeClass("open");
  }
  else {
    element.siblings(".sell-category-item").removeClass('open');
    element.addClass("open");
  }
  $(".sell-photo-upload-area").addClass("open")
});

$(".category-filter-wrapper").click(function(){
  $(this).toggleClass('active');
  $(".category-filter-list-wrapper").slideToggle();
});
$(".category-filter-wrapper2").click(function(){
  $(this).toggleClass('active');
  $(".category-filter-list-wrapper2").slideToggle();
});
$(".category-filter-wrapper3").click(function(){
  $(this).toggleClass('active');
  $(".category-filter-list-wrapper3").slideToggle();
});

$(".chat-user-action-area").on("click", function () {
  var element = $(this).parent(".chat-item");
  if (element.hasClass("open")) {
    element.removeClass("open");
  }
  else {
    element.siblings(".chat-item").removeClass("open");
    element.addClass("open");
  }
});

$(".inbox-opsition-btn").click(function(){
  $(".inbox-opsition-dropdown-list").slideToggle();
});

// $(".chat-right-user-opsition-btn").click(function(){
//   $(".chat-right-user-dropdown-list").slideToggle();
// });

$(".inbox-search-btn").click(function(){
  $('.chat-left-area').addClass('show');
});
$(".cross-btn").click(function(){
  $('.chat-left-area').removeClass('show');
});

$(".chat-user-area").on("click", function () {
  var element = $(this).parent(".chat-item");
  if (element.hasClass("active")) {
  }
  else {
    element.siblings(".chat-item").removeClass("active");
    element.addClass("active");
  }
  $(".chat-main-wrapper").addClass("active")
});

// $(".chat-right-cross-btn").click(function(){
//   $('.chat-main-wrapper').removeClass('active');
//   $('.chat-item').removeClass('active');
// });


//upload
function proPicURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      var preview = $(input).parents('.thumb').find('.profilePicPreview');
      $(preview).css('background-image', 'url(' + e.target.result + ')');
      $(preview).addClass('has-image');
      $(preview).hide();
      $(preview).fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$(".profilePicUpload").on('change', function () {
  proPicURL(this);
});

$(".remove-image").on('click', function () {
  $(this).parents(".profilePicPreview").css('background-image', 'none');
  $(this).parents(".profilePicPreview").removeClass('has-image');
  $(this).parents(".thumb").find('input[type=file]').val('');
});

$(document).ready(function() {
  $('.checkbox').click(function() {
      var disabled = $(".dashboard-form input,.dashboard-form select").prop('disabled');
      if (disabled) {
          $(".dashboard-form input,.dashboard-form select").prop('disabled', false);        // if disabled, enable
      }
      else {
          $(".dashboard-form input,.dashboard-form select").prop('disabled', true);        // if enabled, disable
      }
  })
});

$(".product-filter-btn-r").click(function(){
  $(".category-filter-main-wrapper").slideToggle();
});

// sidebar
$(".category-filter-list-wrapper > .list > li > a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("show")) {
    element.removeClass("show");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('show');
    element.addClass("show");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});

// sidebar
$(".category-filter-list-wrapper2 > .list > li > a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("show")) {
    element.removeClass("show");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('show');
    element.addClass("show");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});


// multi image
$(function() {
  $("#coba").spartanMultiImagePicker({
      fieldName: 'images[]',
      maxCount: 10,
      rowHeight: 'auto',
      groupClassName: 'col-4',
      maxFileSize: '',
      placeholderImage: {
          image: 'https://www.uipi.com/wp-content/uploads/2018/07/placeholder-1024x683.png',
          width: '100%',
      },
      dropFileLabel: "Drop Here",
      onAddRow: function(index, file) {

      },
      onRenderedPreview: function(index) {

      },
      onRemoveRow: function(index) {

      },
      onExtensionErr: function(index, file) {
          toastr.error(
          'Please only input png or jpg type file', {
              CloseButton: true,
              ProgressBar: true
          });
      },
      onSizeErr: function(index, file) {
          toastr.error('File size too big', {
              CloseButton: true,
              ProgressBar: true
          });
      }
  });

  $("#thumbnail").spartanMultiImagePicker({
      fieldName: 'image',
      maxCount: 1,
      rowHeight: 'auto',
      groupClassName: 'col-12',
      maxFileSize: '',
      placeholderImage: {
          image: 'https://www.uipi.com/wp-content/uploads/2018/07/placeholder-1024x683.png',
          width: '100%',
      },
      dropFileLabel: "Drop Here",
      onAddRow: function(index, file) {

      },
      onRenderedPreview: function(index) {

      },
      onRemoveRow: function(index) {

      },
      onExtensionErr: function(index, file) {
          toastr.error(
          'Please only input png or jpg type file', {
              CloseButton: true,
              ProgressBar: true
          });
      },
      onSizeErr: function(index, file) {
          toastr.error('File size too big', {
              CloseButton: true,
              ProgressBar: true
          });
      }
  });

  $("#meta_img").spartanMultiImagePicker({
      fieldName: 'meta_image',
      maxCount: 1,
      rowHeight: '280px',
      groupClassName: 'col-12',
      maxFileSize: '',
      placeholderImage: {
          image: 'https://www.uipi.com/wp-content/uploads/2018/07/placeholder-1024x683.png',
          width: '90%',
      },
      dropFileLabel: "Drop Here",
      onAddRow: function(index, file) {

      },
      onRenderedPreview: function(index) {

      },
      onRemoveRow: function(index) {

      },
      onExtensionErr: function(index, file) {
          toastr.error(
          'Please only input png or jpg type file', {
              CloseButton: true,
              ProgressBar: true
          });
      },
      onSizeErr: function(index, file) {
          toastr.error('File size too big', {
              CloseButton: true,
              ProgressBar: true
          });
      }
  });
});

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
          $('#viewer').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}

$("#customFileUpload").change(function() {
  readURL(this);
});

$(".sell-cetagory-left-list li a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("active")) {
    element.removeClass("active");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('active');
    element.addClass("active");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
  $(".sell-category-wrapper-list").addClass("active")
});

$('.account-control-btn').on('click', function () {
  $('.account-area').toggleClass('change-form');
})

$('.account-control-btn-email').on('click', function () {
  $('.account-area').toggleClass('change-form-remove-email');
  $('.account-area-email').toggleClass('change-form-email');
})

$('.account-control-btn-two').on('click', function () {
  $('.account-area').toggleClass('change-form-remove');
  $('.account-area-two').toggleClass('change-form-two');
})

$('.account-control-btn-two-email').on('click', function () {
  $('.account-area-email').toggleClass('change-form-remove-email');
  $('.account-area-two-email').toggleClass('change-form-two-email');
})

$('.account-control-btn-three').on('click', function () {
  $('.account-area').toggleClass('change-form-hide');
  $('.account-area-two').toggleClass('change-form-none');
  $('.account-area-three').toggleClass('change-form-three');
})

$('.account-control-btn-three-email').on('click', function () {
  $('.account-area').toggleClass('change-form-hide-email');
  $('.account-area-two-email').toggleClass('change-form-none-email');
  $('.account-area-three-email').toggleClass('change-form-three-email');
})

$(document).on("click",".opsition-btn",function(){
  $(this).parents('.my-ads-card-action-btn').find('.opsition-list').slideToggle();
});

$(document).on("click",".chat-right-cross-btn",function(){
  $('.chat-main-wrapper').removeClass('active');
  $('.chat-item').removeClass('active');
});


$(document).on("click",".chat-right-user-opsition-btn",function(){
  $(".chat-right-user-dropdown-list").slideToggle();
});

})(jQuery);