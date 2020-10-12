const menu = () => {
  const buttons = document.querySelectorAll(".menu-item-has-children > a");
  for (const button of buttons) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
    });
  }
};

window.addEventListener("load", menu);
