const usernameSpaceErrorEl = document.querySelector(
  "#username-custom-error-el"
);

function showCustomError() {
  const usernameInputIdName = document.activeElement.id;

  if (usernameInputIdName == "sp-username") {
    const usernameEl = document.querySelector("#sp-username");

    validation(usernameEl);
  } else if (usernameInputIdName == "ss-username") {
    const usernameEl = document.querySelector("#ss-username");

    validation(usernameEl);
  } else if (usernameInputIdName == "username") {
    const usernameEl = document.querySelector("#username");

    validation(usernameEl);
  }
}

// * Function for display error, if username element has Space / Other characters
function validation(inputIdName) {
  const username = inputIdName.value;
  if (username.includes(" ")) {
    usernameSpaceErrorEl.textContent = "Username cannot contain spaces";
    usernameSpaceErrorEl.classList.remove("hidden");
    usernameSpaceErrorEl.classList.add("block");
  } else if (!/^[a-zA-Z0-9_]*$/.test(username)) {
    usernameSpaceErrorEl.textContent =
      "Username will accept only underscore '_' symbol";
    usernameSpaceErrorEl.classList.remove("hidden");
    usernameSpaceErrorEl.classList.add("block");
  } else {
    usernameSpaceErrorEl.classList.remove("block");
    usernameSpaceErrorEl.classList.add("hidden");
  }
}
