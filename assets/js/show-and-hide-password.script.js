const eyeClosedIconEl = document.querySelector("#eye-closed-icon");
const eyeClosedIconForConfirmPasswordEl = document.querySelector(
  "#eye-closed-icon-conf"
);

// * Function for Show and Hide the Password
eyeClosedIconEl.addEventListener("click", () => {
  // * Password Element
  const serviceProvidersPasswordEl = document.querySelector("#ss-password");

  if (serviceProvidersPasswordEl.type === "password") {
    serviceProvidersPasswordEl.type = "text";
    eyeClosedIconEl.innerHTML = `<i class="fa-regular fa-eye"></i>`;
  } else {
    serviceProvidersPasswordEl.type = "password";
    eyeClosedIconEl.innerHTML = `<i class="fa-regular fa-eye-slash"></i>`;
  }
});

// * Function for show and hide the Confirm Password Element
eyeClosedIconForConfirmPasswordEl.addEventListener("click", () => {
  // * Confirm password Element
  const confirmPasswordEl = document.querySelector("#ss-confirm-password");

  if (confirmPasswordEl.type === "password") {
    confirmPasswordEl.type = "text";
    eyeClosedIconForConfirmPasswordEl.innerHTML = `<i class="fa-regular fa-eye"></i>`;
  } else {
    confirmPasswordEl.type = "password";
    eyeClosedIconForConfirmPasswordEl.innerHTML = `<i class="fa-regular fa-eye-slash"></i>`;
  }
});

// * Function for Show and Hide the Password
eyeClosedIconEl.addEventListener("click", () => {
  // * Password Element
  const serviceProvidersPasswordEl = document.querySelector("#sp-password");

  if (serviceProvidersPasswordEl.type === "password") {
    serviceProvidersPasswordEl.type = "text";
    eyeClosedIconEl.innerHTML = `<i class="fa-regular fa-eye"></i>`;
  } else {
    serviceProvidersPasswordEl.type = "password";
    eyeClosedIconEl.innerHTML = `<i class="fa-regular fa-eye-slash"></i>`;
  }
});

// * Function for show and hide the Confirm Password Element
eyeClosedIconForConfirmPasswordEl.addEventListener("click", () => {
  // * Confirm password Element
  const confirmPasswordEl = document.querySelector("#sp-confirm-password");

  if (confirmPasswordEl.type === "password") {
    confirmPasswordEl.type = "text";
    eyeClosedIconForConfirmPasswordEl.innerHTML = `<i class="fa-regular fa-eye"></i>`;
  } else {
    confirmPasswordEl.type = "password";
    eyeClosedIconForConfirmPasswordEl.innerHTML = `<i class="fa-regular fa-eye-slash"></i>`;
  }
});
