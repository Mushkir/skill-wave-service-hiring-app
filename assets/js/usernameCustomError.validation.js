function showCustomError() {
  const usernameEl = document.querySelector("#sp-username");

  const usernameSpaceErrorEl = document.querySelector(
    "#username-custom-error-el"
  );

  const username = usernameEl.value;

  if (username.includes(" ")) {
    usernameSpaceErrorEl.textContent = "Username cannot contain spaces";
    usernameSpaceErrorEl.classList.remove("hidden");
    usernameSpaceErrorEl.classList.add("block");
  } else if (!/^[a-zA-Z0-9_]*$/.test(username)) {
    usernameSpaceErrorEl.textContent = "_ Symbol only acceptable.";
    usernameSpaceErrorEl.classList.remove("hidden");
    usernameSpaceErrorEl.classList.add("block");
  } else {
    usernameSpaceErrorEl.classList.remove("block");
    usernameSpaceErrorEl.classList.add("hidden");
  }
}
