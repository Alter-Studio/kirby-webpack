import Barba from "barba.js";

const Home = Barba.BaseView.extend({
  namespace: "home",
  onEnter() {},
  onEnterCompleted() {},
  onLeave() {
    this.destroy();
  },
  $el: null,
  _construct() {},
  destroy() {}
});

export default Home;
