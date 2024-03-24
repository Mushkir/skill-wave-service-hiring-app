// * Steps to set Active-state manually.
// * 1. Need to get the Path through (window.location.pathname)
const pathURL = window.location.pathname;

// * 2. Get all the NavLinks to JavaScript.
const navLinksEl = document.querySelectorAll("ul a");

// * 3. Assign the current pathURL href into
navLinksEl.forEach((el) => {
  //   console.log(el.classList.add("activa"));

  el.classList.remove("activeState");

  if (el.getAttribute("href") === pathURL) {
    el.classList.add("activeState");
  }
});
// console.log(pathURL);
