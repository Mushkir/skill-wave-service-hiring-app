<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="./assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Skill-Wave</title>

    <!-- Just Validate Dev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- * Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet" />

    <!-- * Flowbite CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- * Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- * TailwindCSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />

    <!-- Footer Alignment CSS -->
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
</head>

<body class="footerPlace">
    <!-- Header Part -->
    <?php include('./components/navbar.php') ?>
    <!-- End -->

    <!-- Main -->
    <main class="mt-[6.25rem] pb-10 px-3 sm:px-20">
        <!-- Main Container -->
        <section class="sm:pt-24 w-full sm:w-[700px] max-w-8xl mx-auto">
            <form action="" class="bg-gray-300 mt-10 px-3 py-5 sm:p-10 rounded-md" id="mainLoginForm">
                <!-- Username -->
                <div class="w-full">
                    <label for="username" class="font-semibold text-cus-maron">Username</label>
                    <div class="mb-5">
                        <input type="text" name="username" id="username" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: @mushkir" required onkeyup="showCustomError()" />
                        <span id="username-custom-error-el" class=" text-red-700 font-normal mt-2 hidden"></span>
                    </div>
                </div>

                <!-- Password -->
                <div class="w-full">
                    <label for="password" class="font-semibold text-cus-maron">Password</label>
                    <div class="mb-3">
                        <input type="password" name="password" id="password" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: Password" required />
                    </div>
                </div>

                <!-- Show Password Checkbox -->
                <div class="hover:text-cus-maron-100 hover:font-semibold flex items-center gap-2 mb-5">
                    <input class="w-4 h-4 rounded bg-maronLightVariant text-cus-maron-100 focus:ring-cus-maron-100" type="checkbox" name="show-password" id="show-password" value="true" />
                    <label class="text-cus-maron" for="show-password">
                        Show Password
                    </label>
                </div>

                <!-- Choose category -->
                <div class="w-full">
                    <select name="user-category" id="user-category" class="bg-white border-0 px-5 py-2 rounded w-full text-cus-maron">
                        <option value="">Choose your category</option>
                        <option value="Service Provider">Service Provider</option>
                        <option value="Service Seeker">Service Seeker</option>
                    </select>
                </div>

                <!-- Login button -->
                <div class="mt-8">
                    <button class="bg-cus-maron w-full px-5 py-2 rounded text-primary-color-10 hover:text-white hover:bg-cus-maron-100">
                        Login
                    </button>
                </div>

                <a href="#" class="text-sm text-center sm:text-left font-normal block mt-5 text-cus-maron-1 hover:text-cus-maron hover:underline">Forgot Password?</a>
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
    <script src="./assets/js/show-and-hide-password.script.js"></script>

    <!-- Form Validation script -->
    <script src="./assets/js/form.validation.js"></script>

    <!-- Username Custom Error -->
    <script src="./assets/js/usernameCustomError.validation.js"></script>

</body>

</html>