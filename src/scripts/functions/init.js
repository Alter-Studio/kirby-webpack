import $ from "jquery";
import setNav from "./setnav";
import mobileMenu from "./mobilemenu";
import lazysizes from "lazysizes";

/***** Get it goin' *****/
document.addEventListener(
  "DOMContentLoaded",
  () => {
    setNav();
    mobileMenu();
  },
  false
);
