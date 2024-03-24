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

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Active-state script -->
    <script defer src="./assets/js/activeStateScript.js"></script>
</head>

<body>
    <!-- Header Part -->
    <header class="relative z-40">
        <nav class="bg-primary-color-10 sm:px-10 fixed top-0 left-0 right-0">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/index.php">
                    <img src="./assets/img/logo.png" class="w-20 sm:w-28" alt="Skill-Wave Logo" />
                </a>

                <!-- Login Button -->
                <button class="py-1.5 px-5 bg-cus-maron lg:text-xl text-primary-color-10 rounded hover:transition 500 hover:bg-cus-maron-3" aria-current="page" id="btnLogin">
                    Login
                </button>
            </div>
        </nav>
    </header>
    <!-- End -->

    <!-- Main -->
    <main class="mt-[6.25rem] px-3 sm:px-20">
        <!-- Main Container -->
        <section class="pt-24 max-w-8xl mx-auto">
            <!-- Header Div -->
            <div class="flex items-center justify-between">
                <!-- Service Seeker Section -->
                <div class="bg-red-500 w-full">
                    <a href="#" class="block text-center py-3 sm:text-2xl font-semibold">
                        Service Seeker
                    </a>
                </div>

                <!-- Service Providers Section -->
                <div class="bg-green-500 w-full">
                    <a href="#" class="block text-center py-3 sm:text-2xl font-semibold">
                        Service Provider
                    </a>
                </div>
            </div>
            <!-- End -->

            <!-- Service Seeker -->
            <div>
                <h4></h4>
                <form action="" class="bg-gray-300 mt-10 px-3 py-5 sm:p-10 rounded-md" enctype="multipart/form-data">
                    <!-- Name, Email, Contact No -->
                    <div class="sm:flex gap-x-10">
                        <!-- Full Name -->
                        <div class="w-full">
                            <label for="ss-fullname" class="font-semibold text-cus-maron">Name<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <input type="text" name="ss-fullname" id="ss-fullname" class="font-normal w-full bg-white border-none rounded mt-2 outline-none capitalize" placeholder="Ex: Mohamed Mushkir" required />
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="w-full">
                            <label for="ss-email" class="font-semibold text-cus-maron">Email<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <input type="email" name="ss-email" id="ss-email" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: username@example.com" required />
                            </div>
                        </div>

                        <!-- Contact No -->
                        <div class="w-full">
                            <label for="ss-contact-no" class="font-semibold text-cus-maron">Contact No.<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <input type="tel" name="ss-contact-no" id="ss-contact-no" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: +94 777195282" required />
                            </div>
                        </div>
                    </div>

                    <!-- Username, Password, Confirm Password -->
                    <div class="sm:flex gap-x-10">
                        <!-- Username -->
                        <div class="w-full">
                            <label for="ss-username" class="font-semibold text-cus-maron">Username<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <input type="text" name="ss-username" id="ss-username" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: @mushkir" required />
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="w-full">
                            <label for="ss-password" class="font-semibold text-cus-maron">Password<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <input type="password" name="ss-password" id="ss-password" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Enter your password" required />
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="w-full">
                            <label for="ss-confirm-password" class="font-semibold text-cus-maron">Confirm Password<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <input type="password" name="ss-confirm-password" id="ss-confirm-password" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Confirm password" required />
                            </div>
                        </div>
                    </div>

                    <!-- Gender, Address Line, City -->
                    <div class="sm:flex gap-x-10">
                        <!-- Gender -->
                        <div class="w-full">
                            <label for="ss-gender" class="font-semibold text-cus-maron">Gender<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <select name="ss-gender" id="ss-gender" class="w-full bg-white border-none rounded mt-2 outline-none px-5 py-2">
                                    <option value="">Select your gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- Address Line -->
                        <div class="w-full">
                            <label for="ss-address-line" class="font-semibold text-cus-maron">Address Line<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <input type="text" name="ss-address-line" id="ss-address-line" class="font-normal w-full bg-white border-none rounded mt-2 outline-none capitalize" placeholder="Ex: no. 246/a, meera nagar road" required />
                            </div>
                        </div>

                        <!-- City -->
                        <div class="w-full">
                            <label for="ss-city" class="font-semibold text-cus-maron">City<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <input type="text" name="ss-city" id="ss-city" class="font-normal w-full bg-white border-none rounded mt-2 outline-none capitalize" placeholder="Ex: nintavur" required />
                            </div>
                        </div>
                    </div>

                    <!-- Image, ID Number -->
                    <div class="sm:flex gap-x-10">
                        <!-- Full Name -->
                        <div class="w-full">
                            <label for="file-input" class="font-semibold text-cus-maron">Upload File<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <input class="block w-full mt-2 rounded cursor-pointer focus:outline-none bg-white" id="file-input" type="file" name="file-input" />
                            </div>
                        </div>

                        <!-- ID No -->
                        <div class="w-full">
                            <label for="ss-id-card-no" class="font-semibold text-cus-maron">NIC No.<span class="text-red-500">*</span></label>
                            <div class="mb-5">
                                <input type="text" name="ss-id-card-no" id="ss-id-card-no" class="font-normal w-full bg-white border-none rounded mt-2" placeholder="Ex: 199631401505" required />
                            </div>
                        </div>
                    </div>

                    <!-- Modal toggle -->
                    <div class="mt-5 w-full">
                        <button id="successButton" data-modal-target="successModal" data-modal-toggle="successModal" class="w-full sm:w-52 text-white bg-primary-700 rounded px-5 py-2 text-center bg-cus-maron" type="submit">
                            Show success message
                        </button>
                    </div>

                    <!-- Main Model code need to write here -->
                </form>
            </div>
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

    <!-- Login Page Navigate Script -->
    <!-- <script>
        const loginButtonEl = document.querySelector("#btnLogin");

        loginButtonEl.addEventListener("click", () => {
            window.location.href = "./login.php";
        });
    </script> -->
</body>

</html>