import $ from "jquery";
import setNav from "../modules/setnav";
import mobileMenu from "../modules/mobilemenu";
import lazysizes from "lazysizes";

/***** Get it goin' *****/
document.addEventListener(
  "DOMContentLoaded",
  () => {
    setNav();
    mobileMenu();
    console.log('working');
  },
  false
);
