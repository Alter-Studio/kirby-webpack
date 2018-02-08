import $ from "jquery";

var setNav = function() {
  var path = window.location.pathname;
  $("nav a").each(function() {
    var href = this.pathname;
    if (path == href) {
      $(this).addClass("active");
    } else {
      $(this).removeClass("active");
    }
  });
  // Uncomment to use for subpages
  //  if (window.location.href.indexOf("directors") > -1) {
  //    $('.directors').addClass('active');
  //   }
  //  else{
  //    $('.directors').removeClass('active');
  //  }
};

export default setNav;
