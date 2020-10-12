function toggleMenu() {
  function toggleStyle() {
    document
      .querySelector(".menu-mobile")
      .classList.toggle("menu-mobile__open");
    document.querySelector("body").classList.toggle("overlay");
  }

  document
    .querySelector("#menutrigger")
    .addEventListener("click", () => toggleStyle());
  document
    .querySelector("#closeMenu")
    .addEventListener("click", () => toggleStyle());

  document
    .querySelector(".menu-mobile__wrapper")
    .addEventListener("click", () => toggleStyle());

  document
    .querySelector(".menu-mobile__item")
    .addEventListener("click", (e) => {
      e.stopPropagation();
    });
}

window.addEventListener("load", toggleMenu);
