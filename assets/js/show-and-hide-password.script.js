const eyeClosedIconEl = document.querySelector("#eye-closed-icon");
const eyeClosedIconForConfirmPasswordEl = document.querySelector(
  "#eye-closed-icon-conf"
);

const PAGE_URL = document.location.href;

console.log(PAGE_URL);

// Login Page Show Password
if (PAGE_URL === "http://localhost/skill-wave-service-hiring-app/login.php") {
  const showPasswordEl = document.querySelector("#show-password");
  const userPasswordEl = document.querySelector("#password");

  showPasswordEl.addEventListener("change", (e) => {
    if (e.target.checked) {
      userPasswordEl.type = "text";
    } else {
      userPasswordEl.type = "password";
    }
  });
}

// Service Seeker SignUp Page
if (PAGE_URL === "http://localhost/skill-wave-service-hiring-app/signup.php?ssSignUp") {
  // * Function for Show and Hide the Password
  eyeClosedIconEl.addEventListener("click", () => {
    // * Password Element
    const serviceSeekersPasswordEl = document.querySelector("#ss-password");

    showPassword(serviceSeekersPasswordEl, eyeClosedIconEl);
  });

  // * Function for show and hide the Confirm Password Element
  eyeClosedIconForConfirmPasswordEl.addEventListener("click", () => {
    // * Confirm password Element
    const confirmPasswordEl = document.querySelector("#ss-confirm-password");

    showPassword(confirmPasswordEl, eyeClosedIconForConfirmPasswordEl);
  });
}

// Service Providers SignUp Page
if (PAGE_URL === "http://localhost/skill-wave-service-hiring-app/signup.php?spSignUp") {
  // * Function for Show and Hide the Password
  eyeClosedIconEl.addEventListener("click", () => {
    // * Password Element
    const serviceProvidersPasswordEl = document.querySelector("#sp-password");

    showPassword(serviceProvidersPasswordEl, eyeClosedIconEl);
  });

  // * Function for show and hide the Confirm Password Element
  eyeClosedIconForConfirmPasswordEl.addEventListener("click", () => {
    // * Confirm password Element
    const confirmPasswordEl = document.querySelector("#sp-confirm-password");

    showPassword(confirmPasswordEl, eyeClosedIconForConfirmPasswordEl);
  });
}

// Common Function for show and hide the password
function showPassword(inputId, iconName) {
  if (inputId.type === "password") {
    inputId.type = "text";
    iconName.innerHTML = `<i class="fa-regular fa-eye"></i>`;
  } else {
    inputId.type = "password";
    iconName.innerHTML = `<i class="fa-regular fa-eye-slash"></i>`;
  }
}
