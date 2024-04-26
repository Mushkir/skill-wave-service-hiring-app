<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="./assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Skill-Wave</title>

    <!-- Just Validate Dev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                        <input type="text" name="username" id="username" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: mushkir_mohamed" required onkeyup="showCustomError()" />
                        <span id="username-custom-error-el" class=" text-red-700 font-normal mt-2 hidden"></span>
                    </div>
                </div>

                <!-- Password -->
                <div class="w-full">
                    <label for="password" class="font-semibold text-cus-maron">Password</label>
                    <div class="mb-3">
                        <input type="password" name="password" id="password" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Enter your password" required />
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

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- JQuery script -->
    <script>
        $(document).ready(function() {

            const mainLoginFormEl = document.querySelector("#mainLoginForm")
            const validator = new window.JustValidate(mainLoginFormEl);
            let sellectedCategory = "";
            selectedCategory = $("#user-category").val();

            // Name
            validator.addField(
                "#username",
                [{
                        rule: "required",
                    },
                    {
                        rule: "minLength",
                        value: 3,
                    },
                ], {
                    errorLabelCssClass: ["errorMsg"],
                }
            );

            //   Password
            validator.addField(
                "#password",
                [{
                    rule: "required",
                }, ], {
                    errorLabelCssClass: ["errorMsg"],
                }
            );

            // User Category
            validator.addField(
                "#user-category",
                [{
                    rule: "required",
                }, ], {
                    errorLabelCssClass: ["errorMsg"],
                }
            );

            validator.onSuccess((e) => {
                e.preventDefault();

                selectedCategory = $("#user-category").val();

                const formData = new FormData(mainLoginFormEl);

                formData.append("request", "loginProcess");

                formData.set("user-category", selectedCategory);

                $.ajax({
                    url: './ajax-file/ajax.php',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function(response) {
                        if (response === "User not found" || response === "Password Mismatched") {
                            Swal.fire({
                                title: "Login Failed",
                                text: "Incorrect username or password. Please try again.",
                                icon: "error"
                            });
                        } else {
                            if (selectedCategory === "Service Provider") {
                                Swal.fire({
                                    title: "Login Success",
                                    text: "Dear Service Provider! Your login process has been done successfully!",
                                    icon: "success"
                                }).then((result) => {

                                    if (result.isConfirmed) {
                                        window.location.href = "/skill-wave-service-hiring-app/service-providers/dashboard.php";
                                    }
                                });

                            } else {
                                window.location.href = "/skill-wave-service-hiring-app/service-seekers/dashboard.php";
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                    }
                })

                $("#user-category").on("change", function() {
                    selectedCategory = $(this).val();
                })
            })
        })
    </script>


    <!-- Username Custom Error -->
    <script src="./assets/js/usernameCustomError.validation.js"></script>

</body>

</html>