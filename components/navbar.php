<header class="relative z-40">
    <nav class="bg-primary-color-10 sm:px-10 fixed top-0 left-0 right-0">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php">
                <img src="./assets/img/logo.png" class="w-20 sm:w-28" alt="Skill-Wave Logo" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-cus-maron rounded-lg md:hidden hover:bg-cus-maron hover:text-primary-color-10 focus:outline-none focus:ring-2 focus:ring-cus-maron" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <!-- Menu Items -->
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col items-center p-4 md:p-0 mt-4 md:flex-row md:space-x-6 space-y-5 md:space-y-0" id="navLinks">
                    <li>
                        <a href="index.php" class="py-2 px-3 font-normal text-cus-maron-100 lg:text-lg hover:font-semibold hover:bg-cus-maron hover:!text-primary-color-7 hover:transition 500 hover:rounded" aria-current="page">Home</a>
                    </li>

                    <li>
                        <a href="find-service-provider.php" class="py-2 px-3 font-normal text-cus-maron-100 lg:text-lg hover:font-semibold hover:bg-cus-maron hover:!text-primary-color-7 hover:transition 500 hover:rounded" aria-current="page">Find Service Provider</a>
                    </li>

                    <li>
                        <a href="/about" class="py-2 px-3 font-normal text-cus-maron-100 lg:text-lg hover:font-semibold hover:bg-cus-maron hover:!text-primary-color-7 hover:transition 500 hover:rounded" aria-current="page">About</a>
                    </li>

                    <li>
                        <a href="/contact" class="py-2 px-3 font-normal text-cus-maron-100 lg:text-lg hover:font-semibold hover:bg-cus-maron hover:!text-primary-color-7 hover:transition 500 hover:rounded" aria-current="page">Contact Us</a>
                    </li>

                    <button class="py-1.5 px-5 bg-cus-maron lg:text-xl text-primary-color-10 rounded hover:transition 500 hover:bg-cus-maron-3" aria-current="page" id="btnLogin">
                        Login
                    </button>

                    <button class="py-1.5 px-5 border-2 border-cus-maron text-cus-maron lg:text-xl rounded hover:transition 500 hover:bg-cus-maron-3 hover:text-primary-color-10" aria-current="page" id="btnSignup">
                        Signup
                    </button>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- SignUp Page Navigate Script -->
<script>
    const signUpButtonEl = document.querySelector("#btnSignup");

    signUpButtonEl.addEventListener("click", () => {
        window.location.href = "./signup.php?ssSignUp";
    });
</script>

<!-- Login Page Navigate Script -->
<script>
    const loginButtonEl = document.querySelector("#btnLogin");

    loginButtonEl.addEventListener("click", () => {
        window.location.href = "./login.php";
    });
</script>