<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="../assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Skill-Wave</title>

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

    <!-- Login Div -->
    <section class=" bg-primary-color-10 w-full rounded-md max-w-xl p-8" style="margin-top: 80px;">

        <form action="" method="post" id="adminLoginForm">
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

            <!-- Login Button -->
            <button class="bg-cus-maron px-5 py-2 rounded text-primary-color-10 hover:bg-maron-hover-effect hover:font-semibold w-full">
                Login
            </button>

            <!-- Back to Home -->
            <section class="" style="color: #7b3e46;">
                <a href="../index.php" class="block text-sm hover:underline mt-5 font-medium hover:text-cus-maron text-center">Back to Home</a>
            </section>
        </form>
    </section>

    <!-- Show Password Script -->
    <script>
        const showPasswordEl = document.querySelector("#show-password")
        const adminPasswordEl = document.querySelector("#password")

        showPasswordEl.addEventListener("change", (event) => {

            event.target.checked ? adminPasswordEl.type = "text" : adminPasswordEl.type = "password";
        })
    </script>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- JQuery script -->
    <script>
        $(document).ready(function() {

            // console.log();

            const FormEl = document.querySelector("#adminLoginForm");

            // * JustValidateDev Form validation 
            const validator = new window.JustValidate(FormEl)

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

            validator.addField("#password",
                [{
                    rule: "required",
                }, ], {
                    errorLabelCssClass: ["errorMsg"],
                })

            validator.onSuccess((e) => {

                e.preventDefault

                $(document).on("submit", FormEl, function(e) {

                    const formData = new FormData(FormEl);

                    formData.append("action", "adminLoginRequest")

                    e.preventDefault();

                    // Send the Request to Server
                    $.ajax({
                        url: '../ajax-file/ajax.php',
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        beforeSend: function() {
                            // console.log("Server Loading");
                        },
                        success: function(response) {

                            // console.log(response);
                            if (response == "404") {
                                Swal.fire({

                                    title: "Invalid username!",
                                    text: "We regret to inform you that the username is not valid. Kindly give the correct username. Thank you!",
                                    icon: "error"
                                })
                            } else if (response == "2000") {
                                Swal.fire({

                                    title: "Invalid Password!",
                                    text: "We regret to inform you that the password is not valid. Kindly give the correct password. Thank you!",
                                    icon: "error"
                                })
                            } else if (response == "2001") {
                                Swal.fire({

                                    title: "Login Success!",
                                    text: "Dear Admin! Your login process has been done successfully!",
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {

                                        // Reset the form
                                        $("#adminLoginForm")[0].reset();

                                        // Navigate to Admin Dashboard
                                        $(document)[0].location.href = "./dashboard.php?dashboard"
                                    }
                                })
                            } else {
                                Swal.fire({

                                    title: "Technical Error!",
                                    text: "Unfortunately a technical error occured! Please contact IT Support...",
                                    icon: "warning"
                                })
                            }
                        },
                        error: function(xhr, status, error) {

                            console.log("Status: " + status);
                            console.log("Error Response: " + xhr.responseText);
                        }
                    })
                })
            })
        })
    </script>
</body>

</html>