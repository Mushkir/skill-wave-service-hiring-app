/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.{html,js,php}",
    "./*.php",
    "./lang/*.php",
    "./lang/*.html",
    "./js/custom.min.js",
    "./find-service-provider.php",
    "./assets/js/form.validation.js",
    "./admin/login.php",
  ],

  theme: {
    extend: {
      colors: {
        "primary-color-10": "#C7B7A3",
        "primary-color-9": "#b3a492",
        "primary-color-8": "#d7ccbe",
        "primary-color-7": "#e3dbd1",
        "cus-maron": "#6D2932",
        "cus-maron-1": "#99767B",
        "cus-maron-2": "#6D2932",
        "cus-maron-3": "#62242d",
        "cus-maron-100": "#41181e",
        maronLightVariant: "#e0d5d7",
        "maron-hover-effect": "#572028",
        "white-variant-1": "#fafafa",
        boneWhite: "#F9F6EE",
      },
    },
  },
  plugins: [],
};
