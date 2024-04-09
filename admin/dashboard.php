<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="../assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin Dashboard | Skill-Wave</title>

    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet" />

    <!-- JustValidateDev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        .activeSideBar {
            background-color: #6D2932;
            color: #FFFFFF;
        }
    </style>
</head>

<body class="bg-primary-color-10">
    <!-- Main Wrapper -->
    <section class="flex items-center gap-7 p-5 pl-0">
        <!-- Sidebar -->
        <section class="w-1/5 min-h-screen">
            <h1 class="p-5 text-2xl font-bold text-[#6D2932]">Skill-Wave</h1>

            <!-- Menu List Item -->
            <ul>
                <!-- Dashboard -->
                <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
                    <a href="dashboard.php?dashboard" class="flex items-center gap-4  pl-5 p-3 rounded-r-xl" id="dashboardMenu">
                        <!-- Icon -->
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M13 9V3h8v6zM3 13V3h8v10zm10 8V11h8v10zM3 21v-6h8v6z" />
                            </svg>
                        </div>

                        <!-- Name -->
                        Dashboard
                    </a>
                </li>

                <!-- District -->
                <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
                    <a href="dashboard.php?district" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="districtMenu">
                        <!-- Icon -->
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                <path fill="currentColor" d="M124 175a8 8 0 0 0 7.94 0c2.45-1.41 60-35 60-94.95A64 64 0 0 0 64 80c0 60 57.58 93.54 60 95m4-119a24 24 0 1 1-24 24a24 24 0 0 1 24-24m112 128c0 31.18-57.71 48-112 48S16 215.18 16 184c0-14.59 13.22-27.51 37.23-36.37a8 8 0 0 1 5.54 15C42.26 168.74 32 176.92 32 184c0 13.36 36.52 32 96 32s96-18.64 96-32c0-7.08-10.26-15.26-26.77-21.36a8 8 0 0 1 5.54-15C226.78 156.49 240 169.41 240 184" />
                            </svg>
                        </div>

                        <!-- Name -->
                        District
                    </a>
                </li>

                <!-- Town -->
                <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
                    <a href="dashboard.php?town" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="townMenu">
                        <!-- Icon -->
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15 15">
                                <path fill="currentColor" d="M10.651 6.121a.25.25 0 0 0-.314 0L8.092 7.929A.247.247 0 0 0 8 8.122v4.625a.253.253 0 0 0 .253.253h1.494a.253.253 0 0 0 .253-.253V11h1v1.747a.253.253 0 0 0 .253.253h1.494a.253.253 0 0 0 .253-.253V8.12a.25.25 0 0 0-.094-.2zM10 10H9V9h1zm2 0h-1V9h1zM5.71.815a.252.252 0 0 0-.42 0L2.042 4.936a.252.252 0 0 0-.042.14v7.671a.252.252 0 0 0 .251.253h2.5A.252.252 0 0 0 5 12.748V11h1v1.748a.252.252 0 0 0 .252.252H7V7a.5.5 0 0 1 .188-.391L9 5C9 4.95 5.71.815 5.71.815M4 9H3V8h1zm0-3H3V5h1zm2 3H5V8h1zm0-3H5V5h1z" />
                            </svg>
                        </div>

                        <!-- Name -->
                        Town
                    </a>
                </li>

                <!-- Total Service Providers -->
                <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
                    <a href="dashboard.php?serviceProviders" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="serviceProvidersMenu">
                        <!-- Icon -->
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 640 512">
                                <path fill="currentColor" d="M144 160a80 80 0 1 0 0-160a80 80 0 1 0 0 160m368 0a80 80 0 1 0 0-160a80 80 0 1 0 0 160M0 298.7C0 310.4 9.6 320 21.3 320h214.1c-26.6-23.5-43.3-57.8-43.3-96c0-7.6.7-15 1.9-22.3c-13.6-6.3-28.7-9.7-44.6-9.7h-42.7C47.8 192 0 239.8 0 298.7M320 320c24 0 45.9-8.8 62.7-23.3c2.5-3.7 5.2-7.3 8-10.7c2.7-3.3 5.7-6.1 9-8.3C410 262.3 416 243.9 416 224c0-53-43-96-96-96s-96 43-96 96s43 96 96 96m65.4 60.2c-10.3-5.9-18.1-16.2-20.8-28.2H261.3C187.7 352 128 411.7 128 485.3c0 14.7 11.9 26.7 26.7 26.7h300.5c-2.1-5.2-3.2-10.9-3.2-16.4v-3c-1.3-.7-2.7-1.5-4-2.3l-2.6 1.5c-16.8 9.7-40.5 8-54.7-9.7c-4.5-5.6-8.6-11.5-12.4-17.6l-.1-.2l-.1-.2l-2.4-4.1l-.1-.2l-.1-.2c-3.4-6.2-6.4-12.6-9-19.3c-8.2-21.2 2.2-42.6 19-52.3l2.7-1.5v-4.6l-2.7-1.5zM533.3 192h-42.6c-15.9 0-31 3.5-44.6 9.7c1.3 7.2 1.9 14.7 1.9 22.3c0 17.4-3.5 33.9-9.7 49c2.5.9 4.9 2 7.1 3.3l2.6 1.5c1.3-.8 2.6-1.6 4-2.3v-3c0-19.4 13.3-39.1 35.8-42.6c7.9-1.2 16-1.9 24.2-1.9s16.3.6 24.2 1.9c22.5 3.5 35.8 23.2 35.8 42.6v3c1.3.7 2.7 1.5 4 2.3l2.6-1.5c16.8-9.7 40.5-8 54.7 9.7c2.3 2.8 4.5 5.8 6.6 8.7c-2.1-57.1-49-102.7-106.6-102.7m91.3 163.9c6.3-3.6 9.5-11.1 6.8-18c-2.1-5.5-4.6-10.8-7.4-15.9l-2.3-4c-3.1-5.1-6.5-9.9-10.2-14.5c-4.6-5.7-12.7-6.7-19-3l-2.9 1.7c-9.2 5.3-20.4 4-29.6-1.3s-16.1-14.5-16.1-25.1v-3.4c0-7.3-4.9-13.8-12.1-14.9c-6.5-1-13.1-1.5-19.9-1.5s-13.4.5-19.9 1.5c-7.2 1.1-12.1 7.6-12.1 14.9v3.4c0 10.6-6.9 19.8-16.1 25.1s-20.4 6.6-29.6 1.3l-2.9-1.7c-6.3-3.6-14.4-2.6-19 3c-3.7 4.6-7.1 9.5-10.2 14.6l-2.3 3.9c-2.8 5.1-5.3 10.4-7.4 15.9c-2.6 6.8.5 14.3 6.8 17.9l2.9 1.7c9.2 5.3 13.7 15.8 13.7 26.4s-4.5 21.1-13.7 26.4l-3 1.7c-6.3 3.6-9.5 11.1-6.8 17.9c2.1 5.5 4.6 10.7 7.4 15.8l2.4 4.1c3 5.1 6.4 9.9 10.1 14.5c4.6 5.7 12.7 6.7 19 3l2.9-1.7c9.2-5.3 20.4-4 29.6 1.3s16.1 14.5 16.1 25.1v3.4c0 7.3 4.9 13.8 12.1 14.9c6.5 1 13.1 1.5 19.9 1.5s13.4-.5 19.9-1.5c7.2-1.1 12.1-7.6 12.1-14.9V492c0-10.6 6.9-19.8 16.1-25.1s20.4-6.6 29.6-1.3l2.9 1.7c6.3 3.6 14.4 2.6 19-3c3.7-4.6 7.1-9.4 10.1-14.5l2.4-4.2c2.8-5.1 5.3-10.3 7.4-15.8c2.6-6.8-.5-14.3-6.8-17.9l-3-1.7c-9.2-5.3-13.7-15.8-13.7-26.4s4.5-21.1 13.7-26.4l3-1.7zM472 384a40 40 0 1 1 80 0a40 40 0 1 1-80 0" />
                            </svg>
                        </div>

                        <!-- Name -->
                        Service Providers
                    </a>
                </li>

                <!-- Total Service Seekers -->
                <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
                    <a href="dashboard.php?serviceSeekers" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="serviceSeekersMenu">
                        <!-- Icon -->
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7m-1.5 8a4 4 0 0 0-4 4a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2a4 4 0 0 0-4-4zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293a3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2a4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18M4 7.5a3.5 3.5 0 0 1 5.477-2.889a5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5M7.1 12H6a4 4 0 0 0-4 4a2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12" clip-rule="evenodd" />
                            </svg>
                        </div>

                        <!-- Name -->
                        Service Seekers
                    </a>
                </li>

                <!-- Settings -->
                <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
                    <a href="dashboard.php?settings" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="settingsMenu">
                        <!-- Icon -->
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M10.96 21q-.348 0-.605-.229t-.318-.571l-.264-2.092q-.479-.145-1.035-.454q-.557-.31-.948-.664l-1.915.823q-.317.14-.644.031q-.327-.11-.504-.415L3.648 15.57q-.177-.306-.104-.638q.073-.333.348-.546l1.671-1.25q-.044-.272-.073-.56q-.028-.287-.028-.558q0-.252.028-.53t.073-.626l-1.67-1.25q-.276-.213-.34-.555q-.063-.343.114-.648l1.06-1.8q.177-.287.504-.406q.327-.12.644.021l1.896.804q.448-.373.97-.673q.52-.3 1.013-.464l.283-2.092q.061-.342.318-.571T10.96 3h2.08q.348 0 .605.229t.318.571l.264 2.112q.575.201 1.016.463q.442.262.909.654l1.992-.804q.318-.14.644-.021q.327.12.504.406l1.06 1.819q.177.306.104.638q-.073.333-.348.546l-1.748 1.308q.082.31.092.568q.01.26.01.511q0 .233-.02.491q-.019.259-.088.626l1.69 1.27q.275.213.358.546q.083.332-.094.638l-1.066 1.839q-.177.305-.513.415q-.337.11-.654-.03l-1.923-.824q-.467.392-.94.673q-.474.281-.985.444l-.264 2.112q-.061.342-.318.571T13.04 21zm1.013-6.5q1.046 0 1.773-.727q.727-.727.727-1.773q0-1.046-.727-1.773q-.727-.727-1.773-.727q-1.052 0-1.776.727T9.473 12q0 1.046.724 1.773q.724.727 1.776.727" />
                            </svg>
                        </div>

                        <!-- Name -->
                        Settings
                    </a>
                </li>
            </ul>
        </section>

        <!-- Content -->
        <section class="bg-[#F9F6EE] w-full min-h-screen p-5 rounded-xl">
            <!-- Header Part -->
            <section class="flex items-start justify-between relative z-40">
                <div class="bg-primary-color-10 flex items-center w-[250px] p-2 gap-4 rounded-lg">
                    <!-- Search Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 16 16">
                        <path fill="#6D2932" d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0a5.5 5.5 0 0 1 11 0" />
                    </svg>

                    <input type="text" name="" id="" class="bg-primary-color-10 w-full outline-none placeholder-[#6D2932]" placeholder="Search" />
                </div>

                <!-- Profile -->
                <div class="hover:cursor-pointer z-40 absolute top-0 right-0" id="admin-profile">
                    <div>
                        <div class="flex justify-end items-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEBqYEUHs9SPync2bo8AmdYjzW5WYicOWF8lreCXnMcQ&s" alt="Admin Image" class="w-10 h-10 object-cover rounded-full" />
                        </div>

                        <!-- Dropdown menu -->
                        <div class="mt-2 bg-primary-color-10 py-[10px] rounded-lg hidden" id="admin-profile-dropdown">
                            <ul>
                                <li class="text-[#62242d] px-[16px]">Mohamed Mushkir</li>
                                <li class="text-[#8a535a] px-[16px] mb-4">
                                    <p class="text-[14px]">mushkirmohamed@gmail.com</p>
                                </li>

                                <hr />

                                <li class="mt-3 text-[#62242d] px-[16px] py-1 hover:bg-[#6D2932] hover:text-white">
                                    <a href="#" class="flex items-center gap-2">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M5.85 17.1q1.275-.975 2.85-1.537T12 15q1.725 0 3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4Q8.675 4 6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5q0-1.475 1.013-2.488T12 6q1.475 0 2.488 1.013T15.5 9.5q0 1.475-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22" />
                                            </svg>
                                        </div>

                                        Profile
                                    </a>
                                </li>

                                <li class="mt-2 text-[#62242d] px-[16px] py-1 hover:bg-[#6D2932] hover:text-white">
                                    <a href="logout.php" class="flex items-center gap-2">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                                    <path stroke-linejoin="round" d="M13.477 21.245H8.34a4.918 4.918 0 0 1-5.136-4.623V7.378A4.918 4.918 0 0 1 8.34 2.755h5.136" />
                                                    <path stroke-miterlimit="10" d="M20.795 12H7.442" />
                                                    <path stroke-linejoin="round" d="m16.083 17.136l4.404-4.404a1.04 1.04 0 0 0 0-1.464l-4.404-4.404" />
                                                </g>
                                            </svg>
                                        </div>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-8 -z-10">
                <?php
                if (isset($_GET['dashboard'])) {
                    include('summary.php');
                }

                if (isset($_GET['district'])) {
                    include('district.php');
                }

                if (isset($_GET['town'])) {
                    include('town.php');
                }

                if (isset($_GET['serviceProviders'])) {
                    include('service-providers.php');
                }

                if (isset($_GET['serviceSeekers'])) {
                    include('service-seekers.php');
                }

                if (isset($_GET['settings'])) {
                    include('profile.php');
                }
                ?>
            </section>
        </section>
    </section>


    <!-- Dropdown script -->
    <script>
        const adminProfileEl = document.querySelector("#admin-profile");
        const adminProfileDropdownEl = document.querySelector(
            "#admin-profile-dropdown"
        );

        adminProfileEl.addEventListener("click", () => {
            adminProfileDropdownEl.classList.toggle("hidden");
        });

        document.addEventListener("click", (event) => {
            const isClickInsideDropdown = adminProfileDropdownEl.contains(
                event.target
            );
            const isClickInsideProfile = adminProfileEl.contains(event.target);
            if (!isClickInsideDropdown && !isClickInsideProfile) {
                adminProfileDropdownEl.classList.add("hidden");
            }
        });
    </script>

    <script>
        const dashboardMenuEl = document.querySelector("#dashboardMenu");
        const districtMenuEl = document.querySelector("#districtMenu");
        const townMenuEl = document.querySelector("#townMenu");
        const serviceProvidersMenuEl = document.querySelector("#serviceProvidersMenu");
        const serviceSeekersMenuEl = document.querySelector("#serviceSeekersMenu");
        const settingsMenuEl = document.querySelector("#settingsMenu");

        const PATH_HREF = "http://localhost/skillWaveWebApp/admin/dashboard.php?"
        const documentPathHref = document.location.href;
        // console.log(document.location.href);

        if (documentPathHref == `${PATH_HREF}dashboard`) {
            dashboardMenuEl.classList.add("activeSideBar")
        }

        if (documentPathHref == `${PATH_HREF}district`) {
            districtMenuEl.classList.add("activeSideBar");
        }

        if (documentPathHref == `${PATH_HREF}town`) {
            townMenuEl.classList.add("activeSideBar");
        }

        if (documentPathHref == `${PATH_HREF}serviceProviders`) {
            serviceProvidersMenuEl.classList.add("activeSideBar")
        }


        if (documentPathHref == `${PATH_HREF}serviceSeekers`) {
            serviceSeekersMenuEl.classList.add("activeSideBar")
        }

        if (documentPathHref == `${PATH_HREF}settings`) {
            settingsMenuEl.classList.add("activeSideBar")
        }
    </script>
</body>

</html>