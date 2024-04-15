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

    <!-- Just Validate Dev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- * Flowbite CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- * Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


    <!-- Active-state script -->
    <script defer src="./assets/js/formActiveState.js"></script>

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- CSS Class for Form Menu Active State -->
    <style>
        .formActive {
            background: maroon;
            border-radius: 10px;
            color: wheat;
        }

        @media only screen and (max-width: 640px) {
            .formActive {
                border-radius: 9999px;
            }
        }
    </style>


</head>

<body>
    <!-- Header Part -->
    <?php include('./components/navbar.php') ?>
    <!-- End -->

    <!-- Main -->
    <main class="mt-[6.25rem] px-3 sm:px-20">
        <!-- Main Container -->
        <section class="pt-24 max-w-8xl mx-auto">
            <!-- Header Div -->
            <div class="flex items-center justify-between bg-maronLightVariant rounded-full sm:rounded-md">
                <!-- Service Seeker Section -->
                <div class="w-full" id="serviceSeekerDiv">
                    <a href="signup.php?ssSignUp" class="block text-center py-3 sm:text-2xl font-semibold rounded-full sm:rounded-md">
                        Service Seeker
                    </a>
                </div>

                <!-- Service Providers Section -->
                <div class="w-full" id="serviceProviderDiv">
                    <a href="signup.php?spSignUp" class=" rounded-full sm:rounded-md block text-center py-3 sm:text-2xl font-semibold">
                        Service Provider
                    </a>
                </div>
            </div>
            <!-- End -->

            <!-- Service Seeker -->
            <div>
                <?php
                if (isset($_GET['ssSignUp'])) {
                    include('./signup-components/ss-signup-form.php');
                }

                if (isset($_GET['spSignUp'])) {
                    include('./signup-components/sp-signup-form.php');
                }
                ?>
            </div>
            <!-- <a href=""></a> -->
        </section>
    </main>
    <!-- End of Main -->

    <!-- Footer -->
    <footer class="bg-cus-maron mt-10">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <span class="block text-sm sm:text-center text-primary-color-10">© 2024
                <a href="./index.html" class="hover:underline">Skill-Wave™</a>. All
                Rights Reserved.</span>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Flowbite CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- JS Code of Show & Hide Password -->
    <script src="./assets/js/show-and-hide-password.script.js"></script>

    <!-- Custom validation for Username -->
    <script src="./assets/js/usernameCustomError.validation.js"></script>
</body>

</html>