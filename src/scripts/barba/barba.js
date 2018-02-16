import $ from "jquery";
import Barba from "barba.js";

//Transitions
import FadeTransition from "./transitions/fade.js";

//Views
import Default from "./views/default.js";
import Home from "./views/home.js";

//Init Views
Default.init();
Home.init();

//Edit Wrapper and container class objects
Barba.Pjax.Dom.wrapperId = "main";
Barba.Pjax.Dom.containerClass = "wrapper";

/**
 * Function to scroll to top of page
 * @param {scrollDuration} number
 */

Barba.scrollTop = function(scrollDuration) {
  const scrollHeight = window.scrollY,
    scrollStep = Math.PI / (scrollDuration / 15),
    cosParameter = scrollHeight / 2;
  var scrollCount = 0,
    scrollMargin,
    scrollInterval = setInterval(function() {
      if (window.scrollY != 0) {
        scrollCount = scrollCount + 1;
        scrollMargin =
          cosParameter - cosParameter * Math.cos(scrollCount * scrollStep);
        window.scrollTo(0, scrollHeight - scrollMargin);
      } else clearInterval(scrollInterval);
    }, 15);
};

/**
 * Dispatcher event to register last clicked element
 */

let lastClickEl;
Barba.Dispatcher.on("linkClicked", el => {
  lastClickEl = el;
});

// Currently commented out however this will need to be uncommented for google analytics to work.

// Barba.Dispatcher.on('initStateChange', function() {
//   if (typeof ga !== 'function' || Barba.HistoryManager.history.length <= 1) {
//     return;
//   }
//   ga('send', 'pageview', window.location.pathname);
// });

//document.addEventListener("DOMContentLoaded", () => {
  Barba.Pjax.init();
  Barba.Prefetch.init();
//});

/**
 * Next step, you have to tell Barba to use the new Transition
 */

Barba.Pjax.getTransition = function() {
  //Default Transition
  return FadeTransition;
};
