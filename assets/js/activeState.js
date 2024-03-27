// * Steps to set Active-state manually.
// * 1. Need to get the Path through (window.location.pathname)
const pathURL = window.location.pathname;
console.log(pathURL);

// console.log(window);

// * 2. Get all the NavLinks to JavaScript.
const navLinksEl = document.querySelectorAll("ul a");

// * 3. Assign the current pathURL href into
navLinksEl.forEach((el) => {
  //   console.log(el.classList.add("activa"));

  console.dir(el.href);

  el.classList.remove("activeState");

  if (el.href.includes(pathURL)) {
    el.classList.add("activeState");
  }
});
