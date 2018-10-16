import $ from "jquery";
import Barba from "barba.js";
import setNav from "../../functions/setnav.js";

const loaderElement = document.querySelector(".o-loading");

var FadeTransition = Barba.BaseTransition.extend({
  loader: loaderElement,
  start: function() {
    /**
     * This function is automatically called as soon the Transition starts
     * this.newContainerLoading is a Promise for the loading of the new container
     * (Barba.js also comes with an handy Promise polyfill!)
     */

    // As soon the loading is finished and the old page is faded out, let's fade the new page
    Promise.all([this.newContainerLoading, this.LoadingIn()]).then(
      this.LoadingOut.bind(this)
    );
  },

  /* Fired First */
  LoadingIn: function() {
    Barba.scrollTop(1000);
    /**
     * this.oldContainer is the HTMLElement of the old Container
     */

    //Setup Mobile Function

    var screenWidth = window.innerWidth; //$window.innerWidth;

    if (screenWidth < 768) {
      //For mobile specific transitions create isMobile function
      //isMobile();
    } else {
    }

    const _this = this;

    return new Promise(function(resolve, reject) {
      $(_this.oldContainer).animate({ opacity: 0 }, 400, () => {
        resolve();
      });
    });
  },

  /* Fired Last */
  LoadingOut: function() {
    /**
     * this.newContainer is the HTMLElement of the new Container
     * At this stage newContainer is on the DOM (inside our #barba-container and with visibility: hidden)
     * Please note, newContainer is available just after newContainerLoading is resolved!
     */

    /**
     * Do not forget to call .done() as soon your transition is finished!
     * .done() will automatically remove from the DOM the old Container
     */

    var _this = this;

    const $el = $(this.newContainer);

    $(this.oldContainer).hide();

    const currentPage = Barba.HistoryManager.currentStatus();
    const prevPage = Barba.HistoryManager.prevStatus();
    $('body').removeClass(`template-${prevPage.namespace}`);
    $('body').addClass(`template-${currentPage.namespace}`);

    $el.css({
      visibility: "visible",
      opacity: 0
    });

    $el.delay(400).animate({ opacity: 1 }, 400, () => {
      _this.done();
      setNav();
    });
  }
});
export default FadeTransition;
