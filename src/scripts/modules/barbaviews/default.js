import Barba from "barba.js";

const Default = Barba.BaseView.extend({
  namespace: "default",
  onEnter() {},
  onEnterCompleted() {},
  onLeave() {
    this.destroy();
  },
  $el: null,
  _construct() {},
  destroy() {}
});

export default Default;
