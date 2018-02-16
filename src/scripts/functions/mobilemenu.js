import $ from "jquery";

var mobileMenu = function() {
  $(".hamburger button").on("click", function(e) {
    if ($("body").hasClass("js-mobile-menu-open")) {
      $("body").removeClass("js-mobile-menu-open");
    } else {
      $("body").addClass("js-mobile-menu-open");
    }
  });

  $(".menu-mobile a").on("click", function(e) {
    setTimeout(function() {
      $("body").removeClass("js-mobile-menu-open");
    }, 500);
  });

  $(window).resize(function() {
    if ($(window).width() > 767) {
      $("body").removeClass("js-mobile-menu-open");
    }
  });
};

export default mobileMenu;
