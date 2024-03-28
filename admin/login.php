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
    <section class=" bg-primary-color-10 w-full rounded-md max-w-xl p-8" style="margin-top: 208px;">

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

    <!-- JustValidate code for form validation -->
    <script>
        const validator = new window.JustValidate("#adminLoginForm")

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
    </script>
</body>

</html>