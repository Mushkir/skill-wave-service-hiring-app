<?php
echo $_GET['userId'];
?>

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
</head>

<body class="flex flex-col min-h-screen bg-[#6D2932]">
    <!-- Header Part -->
    <?php include('./components/navbar.php') ?>
    <!-- End -->

    <!-- Main -->
    <main class="mt-[6.25rem] min-h-screen">
        <section class="mt-10 sm:mt-20 px-3 sm:px-5 md:px-20">
            <div>
                <h3 class=" text-center text-xl mb-8 text-[#C7B7A3] font-semibold">Dear Service Seeker! Here confirm your service hiring process to take the call to our Expert</h3>
                <div class="flex justify-center items-center mx-auto gap-3">
                    <!-- Profile Picture Card -->
                    <div class="bg-white p-5 w-[350px] h-[515px] rounded-xl">
                        <!-- Profile Img -->
                        <div class="rounded-lg">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmpbzPe1HdyFoLu4qK_e12GtP3sJxMeVWexNvzFsPB_A&s" class="rounded-lg w-full h-[180px] object-cover" id="spProfileImg" alt="" />
                        </div>

                        <h2 class="mt-5 text-center text-2xl">
                            <strong>Personal Info</strong>
                        </h2>

                        <div class="flex items-center justify-between mt-2">
                            <!-- Name -->
                            <h3 class="text-lg text-center mt-2 text-[#6D2932]">
                                <strong class="capitalize" id="spName">Mohamed Mushkir</strong>
                            </h3>

                            <div class="bg-green-500 mt-2 px-3 py-1 rounded-full text-sm">
                                Available
                            </div>
                        </div>

                        <!-- Username -->
                        <div class="text-[12px] mt-4 mb-4 flex justify-between bg-gray-100 py-2 rounded-lg">
                            <span class="px-1.5 font-semibold">Username: </span>
                            <span class="px-1.5" id="spUsername">mushkir_96</span>
                        </div>

                        <!-- Contatc No -->
                        <div class="text-[12px] mt-4 mb-3 flex justify-between bg-gray-100 py-2 rounded-lg">
                            <span class="px-1.5 font-semibold">Contact No: </span>
                            <span class="px-1.5" id="spContactNo">+94777195282</span>
                        </div>

                        <!-- Email -->
                        <div class="text-[12px] mb-4 flex justify-between bg-gray-100 py-2 rounded-lg">
                            <span class="px-1.5 font-semibold">Email: </span>
                            <span class="px-1.5" id="spEmail">mushkirmohamed@gmail.com</span>
                        </div>

                        <!-- Gender -->
                        <div class="text-[12px] mb-4 flex justify-between bg-gray-100 py-2 rounded-lg">
                            <span class="px-1.5 font-semibold">Gender: </span>
                            <span class="px-1.5" id="spGender">Male</span>
                        </div>
                    </div>

                    <div class="w-[350px] h-[515px]">
                        <div class="w-full rounded-xl flex flex-col space-y-[10px]">
                            <div class="bg-white w-full h-[252.5px] rounded-xl p-5">
                                <h2 class="text-center text-2xl">
                                    <strong>Address Info</strong>
                                </h2>

                                <!-- Address -->
                                <div class="text-[12px] mb-4 flex justify-between bg-gray-100 py-2 rounded-lg mt-5">
                                    <span class="px-1.5 font-semibold">Address: </span>
                                    <span class="px-1.5" id="spAddress">No. 246/A, Meera Naagr Road</span>
                                </div>

                                <!-- District -->
                                <div class="text-[12px] mb-4 flex justify-between bg-gray-100 py-2 rounded-lg">
                                    <span class="px-1.5 font-semibold">District: </span>
                                    <span class="px-1.5" id="spDistrict">Ampara</span>
                                </div>

                                <!-- Town -->
                                <div class="text-[12px] mb-4 flex justify-between bg-gray-100 py-2 rounded-lg">
                                    <span class="px-1.5 font-semibold">Town: </span>
                                    <span class="px-1.5" id="spTown">Nintavur</span>
                                </div>
                            </div>
                            <div class="bg-white w-full h-[252.5px] rounded-xl p-5">
                                <h2 class="text-center text-2xl">
                                    <strong>Service Info</strong>
                                </h2>

                                <!-- Address -->
                                <div class="text-[12px] mb-4 flex justify-between bg-gray-100 py-2 rounded-lg mt-5">
                                    <span class="px-1.5 font-semibold">Skills: </span>
                                    <span class="px-1.5" id="spSkills">No. 246/A, Meera Nagar Road</span>
                                </div>

                                <!-- District -->
                                <div class="text-[12px] mb-4 flex justify-between bg-gray-100 py-2 rounded-lg">
                                    <span class="px-1.5 font-semibold">Price: </span>
                                    <span class="px-1.5" id="spServicePackage">Rs. 800</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <a href="#" id="">Confirm to get service</a>
                    <a href="">Back to Service Providers Page</a>
                </div>
            </div>
        </section>
    </main>
    <!-- End of Main -->

    <!-- Footer -->
    <footer class="mt-auto bg-[#C7B7A3]">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <span class="block text-sm sm:text-center text-[#6D2932]">©2024
                <a href="./index.html" class="hover:underline">Skill-Wave™</a>. All
                Rights Reserved.</span>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Flowbite CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- JQuery Script -->
    <script>
        $(document).ready(function() {})
    </script>
</body>

</html>

<!-- 

Flow: 
1. Change the profile card ui in a single card.
2. Need to hide Service provider contact number.
3. Make the info section scrollable.
4. If the user loggedin, then only it need to do confirmation, otherwise, it need to ask to login / signup.
5. If order confirmed, then the contact number need to show profile card to take call.

 -->