<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="./assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service Seeker's Sign-Up | Skill-Wave</title>

    <!-- * Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet" />

    <!-- * Flowbite CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- * Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        .footerPlace {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .footerMargin {
            margin-top: auto;
        }
    </style>

    <!-- * TailwindCSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style2.css">

</head>

<body class="footerPlace">
    <!-- Header Part -->
    <header class="relative z-40">
        <nav class="bg-primary-color-10 sm:px-10 fixed top-0 left-0 right-0">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="./index.php">
                    <img src="./assets/img/logo.png" class="w-20 sm:w-28" alt="Skill-Wave Logo" />
                </a>

                <!-- Login Button -->
                <button class="py-1.5 px-5 bg-cus-maron lg:text-xl text-primary-color-10 rounded hover:transition 500 hover:bg-cus-maron-3" aria-current="page" id="btnSignUp">
                    SignUp
                </button>
            </div>
        </nav>
    </header>
    <!-- End -->

    <!-- Main -->
    <main class="mt-[6.25rem] px-3 sm:px-20">
        <!-- Main Container -->
        <section class="pt-10 sm:pt-24 w-full sm:w-[700px] sm:max-w-8xl mx-auto mb-10">
            <form action="" class="bg-gray-300 mt-10 px-3 py-5 sm:p-10 rounded-md">
                <!-- Username -->
                <div class="w-full">
                    <label for="username" class="font-semibold text-sm sm:text-base text-cus-maron">Username</label>
                    <div class="mb-5">
                        <input type="text" name="username" id="username" class="font-normal text-sm sm:text-base w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: @mushkir" required />
                    </div>
                </div>

                <!-- Password -->
                <div class="w-full">
                    <label for="password" class="font-semibold text-sm sm:text-base text-cus-maron">Password</label>
                    <div class="mb-3 mt-2 flex bg-white items-center justify-center rounded">
                        <input type="password" name="password" id="password" class="font-normal text-sm sm:text-base w-full bg-white border-none rounded outline-none" placeholder="Enter your password" required />
                    </div>
                </div>

                <!-- Show Password Checkbox -->
                <div class="hover:text-cus-maron-100 hover:font-semibold flex items-center gap-2 mb-5">
                    <input class="w-4 h-4 rounded bg-maronLightVariant text-cus-maron-100 focus:ring-cus-maron-100" type="checkbox" name="show-password" id="show-password" value="true" />
                    <label class="text-cus-maron text-sm sm:text-base" for="show-password">
                        Show Password
                    </label>
                </div>

                <!-- Choose category -->
                <div class="w-full">
                    <select name="user-category" id="user-category" class="bg-white border-0 px-5 py-2 rounded w-full text-cus-maron text-sm sm:text-base">
                        <option value="">Choose your category</option>
                        <option value="Service Provider">Service Provider</option>
                        <option value="Service Seeker">Service Seeker</option>
                    </select>
                </div>

                <!-- Login button -->
                <div class="mt-8">
                    <button class="bg-cus-maron text-sm sm:text-base w-full px-5 py-2 rounded text-primary-color-10 hover:text-white hover:bg-cus-maron-100">
                        Login
                    </button>
                </div>

                <a href="#" class="text-sm sm:text-base font-normal block mt-5 text-cus-maron-1 hover:text-cus-maron hover:underline">Forgot Password?</a>
            </form>
        </section>
    </main>
    <!-- End of Main -->

    <!-- Footer -->
    <footer class="bg-cus-maron footerMargin">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <span class="block text-sm sm:text-center text-primary-color-10">© 2024
                <a href="./index.html" class="hover:underline">Skill-Wave™</a>. All
                Rights Reserved.</span>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Flowbite CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Show and Hide Password -->
    <!-- <script src="./assets/js/show-and-hide-password.script.js"></script> -->


    <!-- <script type="module" src="./assets/js/ss-signUp.validation.js"></script> -->
    <script>
        // * JavaScript code for Login page navigation.
        const signUpButtonEl = document.querySelector("#btnSignUp");

        signUpButtonEl.addEventListener("click", () => {
            window.location.href = "./signup.php?ssSignUp";
        });
    </script>
</body>

</html>