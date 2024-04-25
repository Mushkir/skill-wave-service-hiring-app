const serviceSeekerDivEl = document.querySelector("#serviceSeekerDiv");
const serviceProviderDivEl = document.querySelector("#serviceProviderDiv");

const PATH_URL = "http://localhost/skill-wave-service-hiring-app/signup.php?";

// console.log(PATH_URL);

if (window.location.href == `${PATH_URL}spSignUp`) {
  serviceProviderDivEl.classList.add("formActive");
}

if (window.location.href == `${PATH_URL}ssSignUp`) {
  serviceProviderDivEl.classList.remove("formActive");

  serviceSeekerDivEl.classList.add("formActive");
}
