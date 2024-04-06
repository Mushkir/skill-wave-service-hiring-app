<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="../assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign-Up | Skill-Wave</title>

    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet" />

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JustValidate CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- Flowbite CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class=" bg-cus-maron flex justify-center items-center px-3">

    <!-- Sign-Up Div -->
    <section class=" bg-primary-color-10 w-full rounded-md max-w-xl p-8" style="margin-top: 208px;">

        <form action="" method="post" id="adminSignUpForm" enctype="multipart/form-data">

            <!-- Name -->
            <section class="mb-5">
                <label for="admin-name" class="font-semibold text-cus-maron">Name</label>
                <div>
                    <input type="text" name="admin-name" id="admin-name" placeholder="Enter your name" class="w-full border-0 rounded mt-1 outline-none" required />
                </div>
            </section>

            <!-- Email -->
            <section class="mb-5">
                <label for="admin-email" class="font-semibold text-cus-maron">Email</label>
                <div>
                    <input type="text" name="admin-email" id="admin-email" placeholder="Enter your email" class="w-full border-0 rounded mt-1 outline-none" required />
                </div>
            </section>

            <!-- Username -->
            <section class="mb-5">
                <label for="admin-username" class="font-semibold text-cus-maron">Username</label>
                <div>
                    <input type="text" name="admin-username" id="admin-username" placeholder="Enter your username" class="w-full border-0 rounded mt-1 outline-none" required />
                </div>
            </section>

            <!-- Password -->
            <section>
                <label for="password" class="font-semibold text-cus-maron">Password</label>
                <div>
                    <input type="password" name="password" id="password" placeholder="Enter your password" class="w-full border-0 rounded mt-1 outline-none" required />
                </div>
            </section>

            <!-- Show Password -->
            <section class="hover:text-cus-maron-100 hover:font-semibold flex items-center gap-2 mb-5 mt-3">
                <input class="w-4 h-4 rounded bg-maronLightVariant text-cus-maron-100 focus:ring-cus-maron-100" type="checkbox" name="show-password" id="show-password" value="true" />
                <label class="text-cus-maron" for="show-password">
                    Show Password
                </label>
            </section>

            <!-- Image -->
            <section class="w-full">
                <label for="admin-profile-image" class="font-semibold text-cus-maron">Upload File<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <input type="file" class="block w-full mt-2 rounded cursor-pointer focus:outline-none bg-white" id="admin-profile-image" name="admin-profile-image" />
                </div>
            </section>

            <!-- Login Button -->
            <button class="bg-cus-maron px-5 py-2 rounded text-primary-color-10 hover:bg-maron-hover-effect hover:font-semibold w-full">
                Create Account
            </button>

            <!-- Back to Home -->
            <section class="" style="color: #7b3e46;">
                <a href="../index.php" class="block text-sm hover:underline mt-5 font-medium hover:text-cus-maron text-center">Back to Home</a>
            </section>
        </form>
    </section>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Show Password Script -->
    <script>
        const showPasswordEl = document.querySelector("#show-password")
        const adminPasswordEl = document.querySelector("#password")

        showPasswordEl.addEventListener("change", (event) => {

            event.target.checked ? adminPasswordEl.type = "text" : adminPasswordEl.type = "password";
        })
    </script>

    <!-- JQuery Script -->
    <script>
        $(document).ready(function() {

            // Form Validation Script
            const validator = new window.JustValidate("#adminSignUpForm")

            validator.addField("#admin-username",
                [{
                        rule: "required",
                    },
                    {
                        rule: "minLength",
                        value: 3,
                    },
                ], {
                    errorLabelCssClass: ["errorMsg"],
                })

            validator.addField("#admin-name",
                [{
                        rule: "required",
                    },
                    {
                        rule: "minLength",
                        value: 3,
                    },
                ], {
                    errorLabelCssClass: ["errorMsg"],
                })

            validator.addField("#password",
                [{
                    rule: "required",
                }, ], {
                    errorLabelCssClass: ["errorMsg"],
                })

            validator.addField("#admin-email",
                [{
                        rule: 'required'
                    },
                    {
                        rule: 'email',
                    }
                ], {
                    errorLabelCssClass: ["errorMsg"],
                })

            validator.addField("#admin-profile-image",
                [{
                        rule: 'minFilesCount',
                        value: 1,
                    },
                    {
                        rule: 'maxFilesCount',
                        value: 1,
                    },
                    {
                        rule: 'files',
                        value: {
                            files: {
                                extensions: ['jpeg', 'jpg', 'png'],
                                types: ['image/jpeg', 'image/jpg', 'image/png'],
                            }
                        }
                    }
                ], {
                    errorLabelCssClass: ["errorMsg"],
                })

            validator.onSuccess((e) => {
                e.preventDefault();

                // Storyline
                // 1. Get the form element
                $(document).on("submit", "#adminSignUpForm", function(e) {

                    e.preventDefault();

                    const formData = new FormData(this);

                    // Append the action parameter
                    formData.append("action", "signUpAdmin");

                    $.ajax({
                        url: '../ajax-file/ajax.php',
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            console.log("Response: " + response);
                            if (response == "11") {
                                Swal.fire({

                                    title: "Username and Email Exist!",
                                    text: "We regret to inform you that the username and email are already taken. Kindly choose a different one. Thank you!",
                                    icon: "error"
                                })
                            }

                            if (response == "0") {
                                Swal.fire({

                                    title: "Email Address Exist!",
                                    text: "We regret to inform you that the email address is already taken. Kindly choose a different one. Thank you!",
                                    icon: "error"

                                })
                            }

                            if (response == "-1") {
                                Swal.fire({

                                    title: "Username Exist!",
                                    text: "We regret to inform you that the username is already taken. Kindly choose a different one. Thank you!",
                                    icon: "error"

                                })
                            }

                            if (response == "200") {
                                Swal.fire({

                                    title: "Account Created!",
                                    text: "Dear Admin! Your account has been created successfully!",
                                    icon: "success"

                                }).then((result) => {
                                    if (result.isConfirmed) {

                                        $("#adminSignUpForm")[0].reset();
                                        $(document)[0].location.href = "login.php";
                                    }
                                })
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Status : " + status);
                            console.log(xhr.responseText);
                        }
                    })
                })
            })
        })
    </script>
</body>

</html>