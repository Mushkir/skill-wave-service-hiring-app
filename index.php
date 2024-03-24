<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="./assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Skill-Wave - We are fullfilling your instance needs.</title>

    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet" />

    <!-- Flowbite CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Active-state script -->
    <script defer src="./assets/js/activeStateScript.js"></script>
</head>

<body>
    <!-- Header Part -->
    <?php include('./components/navbar.php') ?>;
    <!-- End -->

    <!-- Main -->
    <main class="mt-[6.25rem]">
        <!-- Hero Section -->
        <section class="px-3 sm:px-20" id="heroSection">
            <h3 class="pt-20 sm:pt-[8rem] md:pt-[10rem] lg:pt-[15rem] text-3xl sm:text-5xl font-bold text-primary-color-10 text-center">
                Are you facing Service-related issue?
            </h3>
            <span class="text-center block sm:text-xl mt-3 sm:mt-5 text-primary-color-9">We are here to provide solution! Say goodbye to endless searches and
                hello to convenience – choose <strong>Skill-Wave</strong> today and
                thrive! 🚀💪✨
            </span>

            <div class="flex justify-center items-center mt-10">
                <button class="bg-primary-color-10 px-5 py-2 rounded-full sm:rounded-md text-cus-maron font-semibold hover:bg-primary-color-9">
                    View Our Experts
                </button>
            </div>
        </section>
        <!-- End of Hero Section -->

        <!-- Package Section -->
        <section class="bg-primary-color-9 p-3 text-center sm:text-left pt-10 sm:pt-20 sm:px-10 sm:pb-20">
            <!-- Greeting -->
            <section class="sm:flex items-start">
                <!-- Greeting Text -->
                <div class="w-full sm:w-2/4 mb-5">
                    <small class="text-cus-maron-1 font-semibold mb-3">WE CAN HELP YOU!</small>
                    <h3 class="uppercase text-4xl font-extrabold text-cus-maron">
                        welcome to skill-wave
                    </h3>
                </div>

                <!-- Message Paragraph -->
                <div class="w-full sm:w-2/4">
                    <p class="text-cus-maron-2 font-semibold text-base sm:text-xl">
                        Welcome to Skill Wave, where talent meets opportunity! Elevate
                        your hiring experience with our cutting-edge platform. Discover
                        top-notch professionals ready to make waves in your projects. Dive
                        into seamless service hiring - because success starts with the
                        right skills. Let the talent wave begin!
                    </p>
                </div>
            </section>

            <!-- Package Cards -->
            <section class="mt-10 sm:mt-10 flex justify-between items-center flex-wrap">
                <!-- Card 1 -->
                <div class="flex w-full md:max-w-[20rem] lg:max-w-[24rem] h-[20rem] flex-col overflow-hidden rounded-md bg-white bg-clip-border text-gray-700 shadow-md mb-5">
                    <div class="m-0 w-full overflow-hidden h-[16rem] text-gray-700 bg-transparent rounded-none shadow-none bg-clip-border">
                        <img src="./assets/img/medical-image.jpg" class="object-cover h-full w-full" alt="Medical Picture" />
                    </div>

                    <div class="bg-cus-maron p-5 w-full">
                        <button class="w-full flex justify-between items-center text-primary-color-10 hover:text-white">
                            From Rs. 1000
                            <div>
                                <i class="fa-solid fa-right-long"></i>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="flex w-full md:max-w-[20rem] lg:max-w-[24rem] h-[20rem] flex-col overflow-hidden rounded-md bg-white bg-clip-border text-gray-700 shadow-md mb-5">
                    <div class="m-0 w-full overflow-hidden h-[16rem] text-gray-700 bg-transparent rounded-none shadow-none bg-clip-border">
                        <img src="./assets/img/mechanic-sample.jpg" class="object-cover h-full w-full" alt="Mechanic Picture" />
                    </div>

                    <div class="bg-cus-maron p-5 w-full">
                        <button class="w-full flex justify-between items-center text-primary-color-10 hover:text-white">
                            From Rs. 500
                            <div>
                                <i class="fa-solid fa-right-long"></i>
                            </div>
                        </button>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="flex w-full md:max-w-[20rem] lg:max-w-[24rem] h-[20rem] flex-col overflow-hidden rounded-md bg-white bg-clip-border text-gray-700 shadow-md mb-5">
                    <div class="m-0 w-full overflow-hidden h-[16rem] text-gray-700 bg-transparent rounded-none shadow-none bg-clip-border">
                        <img src="./assets/img/electrician-sampel.jpg" class="object-cover h-full w-full" alt="Electrician Picture" />
                    </div>

                    <div class="bg-cus-maron p-5 w-full">
                        <button class="w-full flex justify-between items-center text-primary-color-10 hover:text-white">
                            From Rs. 800
                            <div>
                                <i class="fa-solid fa-right-long"></i>
                            </div>
                        </button>
                    </div>
                </div>
            </section>
        </section>
        <!-- End of Package Section -->

        <!-- Why Choose Skill-Wave Section -->
        <section class="bg-white-variant-1 p-3 text-center sm:text-left pt-10 sm:pt-20 sm:px-10 sm:pb-20">
            <!-- Greeting -->
            <section class="sm:flex items-start">
                <!-- Why choose Div -->
                <div class="w-full sm:w-2/4 mb-5">
                    <small class="text-cus-maron-1 font-semibold mb-3">WE CAN HELP YOU!</small>
                    <h3 class="uppercase text-4xl font-extrabold text-cus-maron">
                        why choose skill-wave
                    </h3>
                </div>

                <!-- Message Paragraph -->
                <div class="w-full sm:w-2/4">
                    <p class="text-cus-maron-2 font-semibold text-base sm:text-xl">
                        Experience hassle-free access to skilled professionals with
                        Skill-Wave! Our innovative platform offers seamless connections to
                        service providers, from plumbers to lawyers, anytime, anywhere.
                        With intuitive features and a focus on empowerment, Skill-Wave
                        simplifies life's challenges. Say goodbye to endless searches and
                        hello to convenience – choose Skill-Wave today and thrive! 🚀💪✨
                    </p>
                </div>
            </section>

            <!-- Benefits of Skill-Wave Section -->
            <section class="mt-16 flex justify-between items-center flex-wrap">
                <!-- Low Cost -->
                <div class="flex flex-col justify-center items-center space-y-2 w-[50%] h-24 sm:w-[20%]">
                    <!-- Icon -->
                    <div>
                        <i class="fa-solid fa-hand-holding-dollar text-3xl sm:text-4xl text-cus-maron"></i>
                    </div>
                    <span class="text-lg sm:text-xl text-cus-maron block text-center">Low Cost</span>
                </div>

                <!-- Expert Team -->
                <div class="flex flex-col justify-center items-center space-y-2 w-[50%] h-24 sm:w-[20%]">
                    <!-- Icon -->
                    <div>
                        <i class="fa-solid fa-gears text-3xl sm:text-4xl text-cus-maron"></i>
                    </div>
                    <span class="text-lg sm:text-xl text-cus-maron block text-center">Expert Team</span>
                </div>

                <!-- Quick Service -->
                <div class="flex flex-col justify-center items-center space-y-2 w-[50%] h-24 sm:w-[20%]">
                    <!-- Icon -->
                    <div>
                        <i class="fa-solid fa-user-clock text-3xl sm:text-4xl text-cus-maron"></i>
                    </div>
                    <span class="text-lg sm:text-xl text-cus-maron block text-center">Quick Service</span>
                </div>

                <!-- Easy Payments -->
                <div class="flex flex-col justify-center items-center space-y-2 w-[50%] h-24 sm:w-[20%]">
                    <!-- Icon -->
                    <div>
                        <i class="fa-solid fa-cart-shopping text-3xl sm:text-4xl text-cus-maron"></i>
                    </div>
                    <span class="text-lg sm:text-xl text-cus-maron block text-center">Easy Payments</span>
                </div>

                <!-- 24/7 -->
                <div class="flex flex-col justify-center items-center space-y-2 w-[50%] h-24 sm:w-[20%]">
                    <!-- Icon -->
                    <div>
                        <i class="fa-solid fa-clock text-3xl sm:text-4xl text-cus-maron"></i>
                    </div>
                    <span class="text-lg sm:text-xl text-cus-maron block text-center">24/7 Service</span>
                </div>
            </section>
        </section>
        <!-- End of Why Choose Section -->

        <!-- Testimonials -->
        <section class="bg-primary-color-9 p-3 text-center sm:text-left pt-10 sm:pt-20 sm:px-20 sm:pb-20">
            <!-- Testimonials Heading -->
            <h3 class="text-4xl text-center font-bold text-cus-maron mb-5">
                Happy Clients
            </h3>

            <em class="text-cus-maron-2">"Explore the praise from our clients! Discover why they love us and
                find inspiration in their stories of success. Join us and become part
                of our satisfied community!"</em>

            <!-- Slider -->
            <div id="default-carousel" class="relative w-full mt-5" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-[28rem] overflow-x-hidden rounded-lg md:h-[31.25rem]">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="z-0 absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-primary-color-8 h-full p-5 sm:pt-20 sm:px-20 sm:py-10">
                            <blockquote class="text-cus-maron-100 sm:text-xl italic font-semibold">
                                <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                                </svg>
                                <p>
                                    "Skill-Wave has truly revolutionized the way I find service
                                    providers. The platform's intuitive interface and
                                    personalized recommendations make it incredibly easy to
                                    connect with the right professionals for my needs."
                                </p>
                            </blockquote>
                            <div class="flex justify-center items-center mx-auto p-1 bg-cus-maron w-[100px] h-[100px] rounded-full mt-3">
                                <img src="https://github.com/Mushkir.png" class="w-full h-full object-cover rounded-full" alt="User Profile" />
                            </div>

                            <!-- Username -->
                            <strong class="text-center block mt-3 text-cus-maron-100">Mohamed Mushkir</strong>
                        </div>
                    </div>

                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="z-0 absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-primary-color-8 h-full p-5 sm:pt-20 sm:px-20 sm:py-10">
                            <blockquote class="text-cus-maron-100 sm:text-xl italic font-semibold">
                                <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                                </svg>
                                <p>
                                    "Skill-Wave has truly revolutionized the way I find service
                                    providers. The platform's intuitive interface and
                                    personalized recommendations make it incredibly easy to
                                    connect with the right professionals for my needs."
                                </p>
                            </blockquote>
                            <div class="flex justify-center items-center mx-auto p-1 bg-cus-maron w-[100px] h-[100px] rounded-full mt-3">
                                <img src="https://github.com/anburocky3.png" class="w-full h-full object-cover rounded-full" alt="User Profile" />
                            </div>

                            <!-- Username -->
                            <strong class="text-center block mt-3 text-cus-maron-100">Anbuselvan</strong>
                        </div>
                    </div>

                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="z-0 absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-primary-color-8 h-full p-5 sm:pt-20 sm:px-20 sm:py-10">
                            <blockquote class="text-cus-maron-100 sm:text-xl italic font-semibold">
                                <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                                    <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                                </svg>
                                <p>
                                    "Skill-Wave has truly revolutionized the way I find service
                                    providers. The platform's intuitive interface and
                                    personalized recommendations make it incredibly easy to
                                    connect with the right professionals for my needs."
                                </p>
                            </blockquote>
                            <div class="flex justify-center items-center mx-auto p-1 bg-cus-maron w-[100px] h-[100px] rounded-full mt-3">
                                <img src="https://github.com/mshajid.png" class="w-full h-full object-cover rounded-full" alt="User Profile" />
                            </div>

                            <!-- Username -->
                            <strong class="text-center block mt-3 text-cus-maron-100">Shajid Shafee</strong>
                        </div>
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-grey-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </section>
        <!-- End of Testimonials -->
    </main>
    <!-- End of Main -->

    <!-- Footer -->
    <?php include('./components/footer.php'); ?>
    <!-- End of Footer -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


</body>

</html>