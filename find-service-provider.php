<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="./assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Find Service Providers | Skill-Wave</title>

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
        a:is(:link, :active, :visited).activeState {
            background: #6D2932;
            color: #C7B7A3;
            border-radius: 4px;
        }
    </style>

    <script defer src="./assets/js/activeState.js"></script>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Header Part -->
    <?php include('./components/navbar.php') ?>
    <!-- End -->

    <!-- Main -->
    <main class="mt-[6.25rem] bg-[#e8e2da] min-h-screen">
        <section class="mt-10 sm:mt-20 px-3 sm:px-5 md:px-20">
            <!-- Search bar -->
            <div class="max-w-7xl mx-auto">
                <form class="w-full" action="" id="searchServiceProvidersForm">
                    <div class="relative w-full text-primary-color-10">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none w-full">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <div>
                            <input type="search" id="search-sp" name="search-sp" class="block w-full p-4 ps-10 text-sm rounded-md bg-cus-maron text-primary-color-10 placeholder-primary-color-10 focus:ring-white" placeholder="Ex: Mechanic, Plumber ..." required />
                        </div>
                        <button type="submit" class="absolute end-2.5 bottom-2.5 bg-primary-color-10 font-medium rounded text-sm px-5 py-2 text-cus-maron hover:bg-primary-color-9">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <div class="mb-10 flex items-center justify-between flex-wrap sm:gap-10">
                <!-- Profile card component -->
                <div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
                    <!-- Banner Profile -->
                    <div class="relative">
                        <!-- Cover Photo -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                        <!-- Profile Pic -->
                        <img src="https://media.licdn.com/dms/image/D4E03AQGc3mX11klLEw/profile-displayphoto-shrink_800_800/0/1698336785076?e=2147483647&v=beta&t=fKqMpj5PzseUJEDL9Ltf-vK_sHo7nCHgXjbu7nBINFU" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
                    </div>
                    <!-- User Info with Verified Button -->
                    <div class="block">
                        <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                            Mohamed Mushkir
                        </h2>
                    </div>
                    <!-- Bio -->
                    <p class="mt-2 text-center text-primary-color-10 px-1.5">
                        Web Developer | Cat Lover | Coffee Enthusiast
                    </p>
                    <!-- Social Links -->
                    <div class="flex items-center mt-4 space-x-4 justify-center">
                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                                    <i class="fa-solid fa-phone"></i>
                                    Tap to Call
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                +94777195282
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                                    <i class="fa-solid fa-map-pin"></i>
                                    Show Location
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                Tap to Open Google Maps
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <!-- Separator Line -->
                    <hr class="my-4 border-t border-gray-300" />
                    <!-- Stats -->
                    <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">90%</span>
                            <span class="text-xs">Success Percentage</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">95%</span>
                            <span class="text-xs">Positive Ratings</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">350</span>
                            <a href="#" class="text-xs underline">Total Feedbacks</a>
                        </div>
                    </div>
                </div>


                <div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
                    <!-- Banner Profile -->
                    <div class="relative">
                        <!-- Cover Photo -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                        <!-- Profile Pic -->
                        <img src="https://media.licdn.com/dms/image/D4E03AQGc3mX11klLEw/profile-displayphoto-shrink_800_800/0/1698336785076?e=2147483647&v=beta&t=fKqMpj5PzseUJEDL9Ltf-vK_sHo7nCHgXjbu7nBINFU" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
                    </div>
                    <!-- User Info with Verified Button -->
                    <div class="block">
                        <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                            Mohamed Mushkir
                        </h2>
                    </div>
                    <!-- Bio -->
                    <p class="mt-2 text-center text-primary-color-10 px-1.5">
                        Web Developer | Cat Lover | Coffee Enthusiast
                    </p>
                    <!-- Social Links -->
                    <div class="flex items-center mt-4 space-x-4 justify-center">
                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                                    <i class="fa-solid fa-phone"></i>
                                    Tap to Call
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                +94777195282
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                                    <i class="fa-solid fa-map-pin"></i>
                                    Show Location
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                Tap to Open Google Maps
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <!-- Separator Line -->
                    <hr class="my-4 border-t border-gray-300" />
                    <!-- Stats -->
                    <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">90%</span>
                            <span class="text-xs">Success Percentage</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">95%</span>
                            <span class="text-xs">Positive Ratings</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">350</span>
                            <a href="#" class="text-xs underline">Total Feedbacks</a>
                        </div>
                    </div>
                </div>


                <div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
                    <!-- Banner Profile -->
                    <div class="relative">
                        <!-- Cover Photo -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                        <!-- Profile Pic -->
                        <img src="https://media.licdn.com/dms/image/D4E03AQGc3mX11klLEw/profile-displayphoto-shrink_800_800/0/1698336785076?e=2147483647&v=beta&t=fKqMpj5PzseUJEDL9Ltf-vK_sHo7nCHgXjbu7nBINFU" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
                    </div>
                    <!-- User Info with Verified Button -->
                    <div class="block">
                        <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                            Mohamed Mushkir
                        </h2>
                    </div>
                    <!-- Bio -->
                    <p class="mt-2 text-center text-primary-color-10 px-1.5">
                        Web Developer | Cat Lover | Coffee Enthusiast
                    </p>
                    <!-- Social Links -->
                    <div class="flex items-center mt-4 space-x-4 justify-center">
                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                                    <i class="fa-solid fa-phone"></i>
                                    Tap to Call
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                +94777195282
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                                    <i class="fa-solid fa-map-pin"></i>
                                    Show Location
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                Tap to Open Google Maps
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <!-- Separator Line -->
                    <hr class="my-4 border-t border-gray-300" />
                    <!-- Stats -->
                    <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">90%</span>
                            <span class="text-xs">Success Percentage</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">95%</span>
                            <span class="text-xs">Positive Ratings</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">350</span>
                            <a href="#" class="text-xs underline">Total Feedbacks</a>
                        </div>
                    </div>
                </div>


                <div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
                    <!-- Banner Profile -->
                    <div class="relative">
                        <!-- Cover Photo -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                        <!-- Profile Pic -->
                        <img src="https://media.licdn.com/dms/image/D4E03AQGc3mX11klLEw/profile-displayphoto-shrink_800_800/0/1698336785076?e=2147483647&v=beta&t=fKqMpj5PzseUJEDL9Ltf-vK_sHo7nCHgXjbu7nBINFU" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
                    </div>
                    <!-- User Info with Verified Button -->
                    <div class="block">
                        <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                            Mohamed Mushkir
                        </h2>
                    </div>
                    <!-- Bio -->
                    <p class="mt-2 text-center text-primary-color-10 px-1.5">
                        Web Developer | Cat Lover | Coffee Enthusiast
                    </p>
                    <!-- Social Links -->
                    <div class="flex items-center mt-4 space-x-4 justify-center">
                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                                    <i class="fa-solid fa-phone"></i>
                                    Tap to Call
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                +94777195282
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                                    <i class="fa-solid fa-map-pin"></i>
                                    Show Location
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                Tap to Open Google Maps
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <!-- Separator Line -->
                    <hr class="my-4 border-t border-gray-300" />
                    <!-- Stats -->
                    <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">90%</span>
                            <span class="text-xs">Success Percentage</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">95%</span>
                            <span class="text-xs">Positive Ratings</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">350</span>
                            <a href="#" class="text-xs underline">Total Feedbacks</a>
                        </div>
                    </div>
                </div>


                <div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
                    <!-- Banner Profile -->
                    <div class="relative">
                        <!-- Cover Photo -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                        <!-- Profile Pic -->
                        <img src="https://media.licdn.com/dms/image/D4E03AQGc3mX11klLEw/profile-displayphoto-shrink_800_800/0/1698336785076?e=2147483647&v=beta&t=fKqMpj5PzseUJEDL9Ltf-vK_sHo7nCHgXjbu7nBINFU" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
                    </div>
                    <!-- User Info with Verified Button -->
                    <div class="block">
                        <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                            Mohamed Mushkir
                        </h2>
                    </div>
                    <!-- Bio -->
                    <p class="mt-2 text-center text-primary-color-10 px-1.5">
                        Web Developer | Cat Lover | Coffee Enthusiast
                    </p>
                    <!-- Social Links -->
                    <div class="flex items-center mt-4 space-x-4 justify-center">
                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                                    <i class="fa-solid fa-phone"></i>
                                    Tap to Call
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                +94777195282
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                                    <i class="fa-solid fa-map-pin"></i>
                                    Show Location
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                Tap to Open Google Maps
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <!-- Separator Line -->
                    <hr class="my-4 border-t border-gray-300" />
                    <!-- Stats -->
                    <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">90%</span>
                            <span class="text-xs">Success Percentage</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">95%</span>
                            <span class="text-xs">Positive Ratings</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">350</span>
                            <a href="#" class="text-xs underline">Total Feedbacks</a>
                        </div>
                    </div>
                </div>


                <div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
                    <!-- Banner Profile -->
                    <div class="relative">
                        <!-- Cover Photo -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                        <!-- Profile Pic -->
                        <img src="https://media.licdn.com/dms/image/D4E03AQGc3mX11klLEw/profile-displayphoto-shrink_800_800/0/1698336785076?e=2147483647&v=beta&t=fKqMpj5PzseUJEDL9Ltf-vK_sHo7nCHgXjbu7nBINFU" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
                    </div>
                    <!-- User Info with Verified Button -->
                    <div class="block">
                        <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                            Mohamed Mushkir
                        </h2>
                    </div>
                    <!-- Bio -->
                    <p class="mt-2 text-center text-primary-color-10 px-1.5">
                        Web Developer | Cat Lover | Coffee Enthusiast
                    </p>
                    <!-- Social Links -->
                    <div class="flex items-center mt-4 space-x-4 justify-center">
                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                                    <i class="fa-solid fa-phone"></i>
                                    Tap to Call
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                +94777195282
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                                    <i class="fa-solid fa-map-pin"></i>
                                    Show Location
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                Tap to Open Google Maps
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <!-- Separator Line -->
                    <hr class="my-4 border-t border-gray-300" />
                    <!-- Stats -->
                    <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">90%</span>
                            <span class="text-xs">Success Percentage</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">95%</span>
                            <span class="text-xs">Positive Ratings</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">350</span>
                            <a href="#" class="text-xs underline">Total Feedbacks</a>
                        </div>
                    </div>
                </div>


                <div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
                    <!-- Banner Profile -->
                    <div class="relative">
                        <!-- Cover Photo -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                        <!-- Profile Pic -->
                        <img src="https://media.licdn.com/dms/image/D4E03AQGc3mX11klLEw/profile-displayphoto-shrink_800_800/0/1698336785076?e=2147483647&v=beta&t=fKqMpj5PzseUJEDL9Ltf-vK_sHo7nCHgXjbu7nBINFU" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
                    </div>
                    <!-- User Info with Verified Button -->
                    <div class="block">
                        <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                            Mohamed Mushkir
                        </h2>
                    </div>
                    <!-- Bio -->
                    <p class="mt-2 text-center text-primary-color-10 px-1.5">
                        Web Developer | Cat Lover | Coffee Enthusiast
                    </p>
                    <!-- Social Links -->
                    <div class="flex items-center mt-4 space-x-4 justify-center">
                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                                    <i class="fa-solid fa-phone"></i>
                                    Tap to Call
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                +94777195282
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                                    <i class="fa-solid fa-map-pin"></i>
                                    Show Location
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                Tap to Open Google Maps
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <!-- Separator Line -->
                    <hr class="my-4 border-t border-gray-300" />
                    <!-- Stats -->
                    <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">90%</span>
                            <span class="text-xs">Success Percentage</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">95%</span>
                            <span class="text-xs">Positive Ratings</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">350</span>
                            <a href="#" class="text-xs underline">Total Feedbacks</a>
                        </div>
                    </div>
                </div>


                <div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
                    <!-- Banner Profile -->
                    <div class="relative">
                        <!-- Cover Photo -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                        <!-- Profile Pic -->
                        <img src="https://media.licdn.com/dms/image/D4E03AQGc3mX11klLEw/profile-displayphoto-shrink_800_800/0/1698336785076?e=2147483647&v=beta&t=fKqMpj5PzseUJEDL9Ltf-vK_sHo7nCHgXjbu7nBINFU" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
                    </div>
                    <!-- User Info with Verified Button -->
                    <div class="block">
                        <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                            Mohamed Mushkir
                        </h2>
                    </div>
                    <!-- Bio -->
                    <p class="mt-2 text-center text-primary-color-10 px-1.5">
                        Web Developer | Cat Lover | Coffee Enthusiast
                    </p>
                    <!-- Social Links -->
                    <div class="flex items-center mt-4 space-x-4 justify-center">
                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                                    <i class="fa-solid fa-phone"></i>
                                    Tap to Call
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                +94777195282
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                                    <i class="fa-solid fa-map-pin"></i>
                                    Show Location
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                Tap to Open Google Maps
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <!-- Separator Line -->
                    <hr class="my-4 border-t border-gray-300" />
                    <!-- Stats -->
                    <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">90%</span>
                            <span class="text-xs">Success Percentage</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">95%</span>
                            <span class="text-xs">Positive Ratings</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">350</span>
                            <a href="#" class="text-xs underline">Total Feedbacks</a>
                        </div>
                    </div>
                </div>


                <div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
                    <!-- Banner Profile -->
                    <div class="relative">
                        <!-- Cover Photo -->
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                        <!-- Profile Pic -->
                        <img src="https://media.licdn.com/dms/image/D4E03AQGc3mX11klLEw/profile-displayphoto-shrink_800_800/0/1698336785076?e=2147483647&v=beta&t=fKqMpj5PzseUJEDL9Ltf-vK_sHo7nCHgXjbu7nBINFU" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
                    </div>
                    <!-- User Info with Verified Button -->
                    <div class="block">
                        <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                            Mohamed Mushkir
                        </h2>
                    </div>
                    <!-- Bio -->
                    <p class="mt-2 text-center text-primary-color-10 px-1.5">
                        Web Developer | Cat Lover | Coffee Enthusiast
                    </p>
                    <!-- Social Links -->
                    <div class="flex items-center mt-4 space-x-4 justify-center">
                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                                    <i class="fa-solid fa-phone"></i>
                                    Tap to Call
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                +94777195282
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>

                        <div>
                            <!-- Tap to call -->
                            <div>
                                <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                                    <i class="fa-solid fa-map-pin"></i>
                                    Show Location
                                </a>
                            </div>

                            <!-- Tooltip Code -->
                            <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                                Tap to Open Google Maps
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                    </div>
                    <!-- Separator Line -->
                    <hr class="my-4 border-t border-gray-300" />
                    <!-- Stats -->
                    <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">90%</span>
                            <span class="text-xs">Success Percentage</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">95%</span>
                            <span class="text-xs">Positive Ratings</span>
                        </div>
                        <div class="text-center flex flex-col">
                            <span class="font-bold text-lg">350</span>
                            <a href="#" class="text-xs underline">Total Feedbacks</a>
                        </div>
                    </div>
                </div>




            </div>

            <button class="bg-cus-maron mb-10 text-primary-color-10 px-5 py-2 block mx-auto hover:bg-cus-maron-100 hover:text-boneWhite w-full sm:w-36 rounded-full sm:rounded">
                <i class="fa-solid fa-eye"></i> View more
            </button>
        </section>
    </main>
    <!-- End of Main -->

    <!-- Footer -->
    <footer class="bg-cus-maron mt-auto">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <span class="block text-sm sm:text-center text-primary-color-10">© 2024
                <a href="./index.html" class="hover:underline">Skill-Wave™</a>. All
                Rights Reserved.</span>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Flowbite CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Form Validation script -->
    


</body>

</html>