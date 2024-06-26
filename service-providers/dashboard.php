<?php
require_once '../classes/app/ServiceProvide.php';
session_start();
$serviceProviderName = $_SESSION['serviceProviderName'];
$serviceProvider = new ServiceProvider();

$getSsData = $serviceProvider->getServiceProviderInfo("name", $serviceProviderName);
$serviceProviderId = $getSsData['service_provider_id']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="../assets/img/SkillWave-logo-white-bg.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title><?php echo $serviceProviderName; ?>'s Dashboard | Skill-Wave</title>

    <!-- Google Font CDN -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet" />

    <!-- JustValidateDev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- DataTable CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css" />

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- TailwindCSS -->
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        .activeSideBar {
            background-color: #e5e7eb;
            color: #000;
        }
    </style>
</head>

<body class=" bg-gray-400 mx-auto" id="main-container">
    <!-- Main Wrapper -->
    <section class="flex items-center gap-7 p-5 pl-0 m-auto relative max-w-[1800px] ">
        <!-- Sidebar -->
        <section class="w-1/5  min-h-screen">
            <div class="absolute top-6">
                <input type="hidden" name="sp-id" id="sp-id" value="<?php echo $serviceProviderId; ?>">
                <h1 class="p-5 text-xl font-bold text-[#e94e1c] bg-[#0C0C0C] rounded-r-xl"><?php echo $serviceProviderName; ?></h1>
                <!-- Menu List Item -->
                <ul class="mt-5">
                    <!-- Profile -->
                    <li class="hover:bg-gray-200 hover:rounded-r-xl hover:text-black hover:transition 500 mb-2">
                        <a href="dashboard.php?spProfile" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="profileMenu">
                            <!-- Icon -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2m0 4c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6m0 14c-2.03 0-4.43-.82-6.14-2.88a9.947 9.947 0 0 1 12.28 0C16.43 19.18 14.03 20 12 20" />
                                </svg>
                            </div>

                            <!-- Name -->
                            Profile
                        </a>
                    </li>

                    <!-- Edit Profile -->
                    <li class="hover:bg-gray-200 hover:rounded-r-xl hover:text-black hover:transition 500 mb-2">
                        <a href="dashboard.php?editProfile" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="editProfileMenu">
                            <!-- Icon -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <path fill="currentColor" d="M10 2a4 4 0 1 0 0 8a4 4 0 0 0 0-8m-4.991 9A2 2 0 0 0 3 13c0 1.691.833 2.966 2.135 3.797c1.05.669 2.398 1.049 3.87 1.165q.014-.153.052-.309l.375-1.498a3.2 3.2 0 0 1 .84-1.485l3.67-3.67zm5.97 4.377l4.83-4.83a1.87 1.87 0 1 1 2.645 2.646l-4.83 4.829a2.2 2.2 0 0 1-1.02.578l-1.498.374a.89.89 0 0 1-1.079-1.078l.375-1.498a2.2 2.2 0 0 1 .578-1.02" />
                                </svg>
                            </div>

                            <!-- Name -->
                            Edit Profile
                        </a>
                    </li>

                    <!-- Service Summary -->
                    <li class="hover:bg-gray-200 hover:rounded-r-xl hover:text-black hover:transition 500 mb-2">
                        <a href="dashboard.php?summary" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="serviceSummary">
                            <!-- Icon -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h4.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H19q.825 0 1.413.588T21 5v6.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm7-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5" />
                                </svg>
                            </div>

                            <!-- Name -->
                            <div class="relative">
                                Service Summary<sup class="bg-black text-white px-1 rounded-full" id="countSummary"></sup>
                            </div>
                        </a>
                    </li>

                    <!-- Delete Service Provider -->
                    <li class="hover:bg-gray-200 hover:rounded-r-xl hover:text-black hover:transition 500 mb-2">
                        <a href="" id="<?php echo $serviceProviderId ?>" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl delete-btn-sp">
                            <!-- Icon -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd" d="M8.106 2.553A1 1 0 0 1 9 2h6a1 1 0 0 1 .894.553L17.618 6H20a1 1 0 1 1 0 2h-1v11a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V8H4a1 1 0 0 1 0-2h2.382zM14.382 4l1 2H8.618l1-2zM11 11a1 1 0 1 0-2 0v6a1 1 0 1 0 2 0zm4 0a1 1 0 1 0-2 0v6a1 1 0 1 0 2 0z" clip-rule="evenodd" />
                                </svg>
                            </div>

                            <!-- Name -->
                            Delete Account
                        </a>
                    </li>

                    <!-- Logout -->
                    <li class="hover:bg-gray-200 hover:rounded-r-xl hover:text-black hover:transition 500 mb-2">
                        <a href="#" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="sp-logout">
                            <!-- Icon -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" fill-rule="evenodd" d="M3.5 9.568v4.864c0 2.294 0 3.44.722 4.153c.655.647 1.674.706 3.596.712c-.101-.675-.122-1.48-.128-2.428a.734.734 0 0 1 .735-.734a.735.735 0 0 1 .744.726c.006 1.064.033 1.818.14 2.39c.103.552.267.87.507 1.108c.273.27.656.445 1.38.54c.744.1 1.73.101 3.145.101h.985c1.415 0 2.401-.002 3.146-.1c.723-.096 1.106-.272 1.378-.541c.273-.27.451-.648.548-1.362c.1-.734.102-1.709.102-3.105V8.108c0-1.397-.002-2.37-.102-3.105c-.097-.714-.275-1.093-.547-1.362c-.273-.27-.656-.445-1.38-.54C17.728 3 16.742 3 15.327 3h-.985c-1.415 0-2.401.002-3.146.1c-.723.096-1.106.272-1.379.541c-.24.237-.404.556-.507 1.108c-.107.572-.134 1.326-.14 2.39a.735.735 0 0 1-.744.726a.734.734 0 0 1-.735-.734c.006-.948.027-1.753.128-2.428c-1.922.006-2.94.065-3.596.712c-.722.713-.722 1.86-.722 4.153m2.434 2.948a.723.723 0 0 1 0-1.032l1.97-1.946a.746.746 0 0 1 1.046 0a.723.723 0 0 1 0 1.032l-.71.7h7.086c.408 0 .74.327.74.73c0 .403-.332.73-.74.73H8.24l.71.7a.723.723 0 0 1 0 1.032a.746.746 0 0 1-1.046 0z" clip-rule="evenodd" />
                                </svg>
                            </div>

                            <!-- Name -->
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </section>

        <!-- Content -->
        <section class="bg-gray-200 w-full min-h-screen p-5 rounded-xl" id="contentMenu">
            <!-- Header Part -->
            <section class="flex items-start justify-between relative z-40">
                <!-- Profile -->
                <div class="hover:cursor-pointer z-40 absolute top-0 right-0" id="sp-profile">
                    <div>
                        <div class="relative">
                            <div class="flex justify-end items-center">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEBqYEUHs9SPync2bo8AmdYjzW5WYicOWF8lreCXnMcQ&s" alt="Admin Image" class="w-10 h-10 object-cover rounded-full" id="sp-profile-img" />
                            </div>
                            <div class="w-2 h-2 bg-green-500 rounded-full absolute top-0 right-0" id="stateIndicator"></div>
                        </div>

                        <!-- Dropdown menu -->
                        <div class="mt-2 bg-gray-400 py-[10px] rounded-lg hidden" id="sp-profile-dropdown">
                            <input type="hidden" id="sp-id">
                            <ul>
                                <li class="text-black font-semibold px-[16px]" id="sp-fullname">Mohamed Mushkir</li>
                                <li class="text-gray-50 px-[16px] mb-4">
                                    <p class="text-[14px]" id="sp-email">mushkirmohamed@gmail.com</p>
                                </li>

                                <hr />

                                <li class="mt-3 text-black px-[16px] py-1 hover:bg-gray-200 hover:text-black">
                                    <a href="dashboard.php?spProfile" class="flex items-center gap-2">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M5.85 17.1q1.275-.975 2.85-1.537T12 15q1.725 0 3.3.563t2.85 1.537q.875-1.025 1.363-2.325T20 12q0-3.325-2.337-5.663T12 4Q8.675 4 6.337 6.338T4 12q0 1.475.488 2.775T5.85 17.1M12 13q-1.475 0-2.488-1.012T8.5 9.5q0-1.475 1.013-2.488T12 6q1.475 0 2.488 1.013T15.5 9.5q0 1.475-1.012 2.488T12 13m0 9q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22" />
                                            </svg>
                                        </div>

                                        Profile
                                    </a>
                                </li>

                                <li class="mt-3 text-black px-[16px] py-1 hover:bg-gray-200 hover:text-black">
                                    <a href="#" class="flex items-center gap-2" id="btnChangeState">

                                    </a>
                                </li>

                                <li class="mt-2 text-black px-[16px] py-1 hover:bg-gray-200 hover:text-black">
                                    <a href="#" id="sp-logout" class="flex items-center gap-2">
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

                if (isset($_GET['spProfile'])) {
                    include('sp-profile.php');
                }

                if (isset($_GET['editProfile'])) {
                    include('edit-profile.php');
                }

                if (isset($_GET['delete'])) {
                    include('delete-profile.php');
                }

                if (isset($_GET['summary'])) {
                    include('service-summary.php');
                }

                ?>
            </section>
        </section>
    </section>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- DataTables CDN -->
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

    <!-- Dropdown script -->
    <script>
        const spProfileEl = document.querySelector("#sp-profile");
        const spProfileDropdownEl = document.querySelector(
            "#sp-profile-dropdown"
        );

        spProfileEl.addEventListener("click", () => {
            spProfileDropdownEl.classList.toggle("hidden");
        });

        document.addEventListener("click", (event) => {
            const isClickInsideDropdown = spProfileDropdownEl.contains(
                event.target
            );
            const isClickInsideProfile = spProfileEl.contains(event.target);
            if (!isClickInsideDropdown && !isClickInsideProfile) {
                spProfileDropdownEl.classList.add("hidden");
            }
        });
    </script>

    <!-- Dashboard side menu active script -->
    <script>
        const dashboardMenuEl = document.querySelector("#dashboardMenu");
        const profileMenuEl = document.querySelector("#profileMenu");
        const editProfileMenuEl = document.querySelector("#editProfileMenu");
        const serviceSumEl = document.querySelector("#serviceSummary");

        // console.log(document.location.href);
        const PATH_HREF = "http://localhost/skill-wave-service-hiring-app/service-providers/dashboard.php?"
        const documentPathHref = document.location.href;

        if (documentPathHref == `${PATH_HREF}spProfile`) {
            profileMenuEl.classList.add("activeSideBar");
        }

        if (documentPathHref == `${PATH_HREF}editProfile`) {
            editProfileMenuEl.classList.add("activeSideBar");
        }

        if (documentPathHref == `${PATH_HREF}summary`) {
            serviceSumEl.classList.add("activeSideBar");
        }
    </script>

    <!-- JQuery Script -->
    <script>
        $(document).ready(function() {

            showServiceProviderInfoInCorner()

            // * Function for count and show on process services in Menu
            countPendingServices();

            // * Function for check and change the service provider state based on their current state.
            checkAndChangeServiceProviderState();

            function showServiceProviderInfoInCorner() {

                $.ajax({

                    url: '../ajax-file/ajax.php',
                    type: 'GET',
                    data: {
                        "loggedInUsername": "loggedInUsername"
                    },
                    success: function(response) {
                        // console.dir(document.baseURI);
                        // console.log(response);
                        if (response == "404") {
                            Swal.fire({
                                icon: "error",
                                title: "Unauthorized Access",
                                text: "You can't able to proceed without authorized access!",
                            }).then((result) => {
                                console.log(result);
                                if (result.isConfirmed == true) {
                                    window.location.href = "../login.php";
                                }
                            });

                        } else {
                            const spDataInJson = JSON.parse(response);

                            const {
                                sericeProviderID,
                                name,
                                email,
                                image
                            } = spDataInJson;

                            // console.log(spDataInJson);

                            $("#sp-id").val(sericeProviderID);
                            $("#sp-profile-img")[0].src = `/skill-wave-service-hiring-app/ajax-file/uploads/${image}`;
                            $("#sp-profile-img")[0].alt = `${name}'s image`;
                            $("#sp-fullname")[0].textContent = name;
                            $("#sp-email")[0].textContent = email;
                            $("#btnChangeState").attr("href", sericeProviderID);
                        }

                    }
                })
            }

            function countPendingServices() {
                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    data: {
                        "request": "countPendingServices"
                    },
                    success: function(response) {
                        // console.log(response);
                        // const stateTextEl = document.querySelector("#stateText")
                        // console.dir(stateTextEl.innerText = "Chnage");

                        if (response == 0) {
                            $("#countSummary")[0].classList.add("hidden")
                        } else if (response == 401) {
                            Swal.fire({
                                title: "Access Denied!",
                                text: "Can not proceed unauthorized access! Please Sign-Up or Login!",
                                icon: "error"
                            }).then((result) => {

                                if (result.isConfirmed == true) {
                                    window.location.href = '/skill-wave-service-hiring-app/signup.php?spSignUp';
                                }
                            })

                        } else {

                            $("#countSummary")[0].textContent = response;
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                        console.error("Error: " + error);
                    }
                })
            }

            function checkAndChangeServiceProviderState() {
                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    data: {
                        "request": "checkUserState"
                    },
                    success: function(response) {
                        // console.log(response);
                        if (response == 0) {

                            $("#btnChangeState").html(`<div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path fill="currentColor" d="M5 6a4 4 0 1 1 8 0a4 4 0 0 1-8 0m-3 7c0-1.113.903-2 2.009-2h6.248A5.48 5.48 0 0 0 9 14.5c0 1.303.453 2.5 1.21 3.443Q9.617 18 9 18c-1.855 0-3.583-.386-4.865-1.203C2.833 15.967 2 14.69 2 13m17 1.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-2.146-1.854a.5.5 0 0 0-.708 0L13.5 15.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0 0-.708" />
                                            </svg>
                                        </div>

                                        <p id="stateText">Change to Available state</p>`)

                            $("#stateIndicator")[0].classList.remove("bg-green-500");
                            $("#stateIndicator")[0].classList.add("bg-red-500");

                        } else {

                            $("#btnChangeState").html(`<div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M12 19.75A7.75 7.75 0 0 1 4.25 12h-2.5c0 5.66 4.59 10.25 10.25 10.25zm0-15.5A7.75 7.75 0 0 1 19.75 12h2.5c0-5.661-4.59-10.25-10.25-10.25zM4.25 12c0-2.14.866-4.076 2.27-5.48L4.752 4.752A10.222 10.222 0 0 0 1.75 12zm2.27-5.48A7.722 7.722 0 0 1 12 4.25v-2.5c-2.83 0-5.394 1.149-7.248 3.002zm-1.768 0L17.48 19.248l1.768-1.768L6.52 4.752zM19.75 12c0 2.14-.866 4.076-2.27 5.48l1.768 1.768A10.221 10.221 0 0 0 22.25 12zm-2.27 5.48A7.722 7.722 0 0 1 12 19.75v2.5c2.83 0 5.394-1.149 7.248-3.002z" />
                                            </svg>
                                        </div>

                                        <p id="stateText">Change to Busy state</p>`)

                            $("#stateIndicator")[0].classList.remove("bg-red-500");
                            $("#stateIndicator")[0].classList.add("bg-green-500");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                        console.log("Error: " + error);
                    }
                })
            }

            $("body").on("click", "#btnChangeState", function(e) {
                e.preventDefault();

                const serviceProviderId = $(this).attr("href");

                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: "GET",
                    data: {
                        "passedServiceProviderId": serviceProviderId
                    },
                    beforeSend: function() {
                        $("#contentMenu").html('<div class="mt-[200px] flex justify-center items-center"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="#6D2932"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg></div>');
                    },
                    success: function(response) {
                        console.log(response);
                        if (response == 1) {
                            Swal.fire({
                                title: "State Changed!",
                                text: "Your state changed as Available!",
                                icon: "success"
                            }).then((result) => {

                                const currentUrl = document.baseURI // Get the current url
                                window.location.href = currentUrl // Redirect to same page after changing the state
                            });
                        } else {
                            Swal.fire({
                                title: "State Changed!",
                                text: "Your state changed as Busy!",
                                icon: "success"
                            }).then((result) => {

                                const currentUrl = document.baseURI // Get the current url
                                window.location.href = currentUrl // Redirect to same page after changing the state
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                        console.log("Error: " + error);
                    }


                })
            })

            // * Service Provider logout request script
            $("body").on("click", "#sp-logout", function(e) {
                e.preventDefault();

                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    data: {
                        "request": "spLogout"
                    },
                    beforeSend: function() {
                        $("#main-container").html(`<div class="flex justify-center items-center mt-32"><img src="../assets/img/loading-menu.gif" class="w-28 h-28 object-cover " /></div>`)
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Are you sure to Logout?",
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes! Sure"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // console.log(response);
                                window.location.href = "/skill-wave-service-hiring-app/index.php";
                            }
                        });

                    },
                    error: function(xhr, status, error) {
                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                        console.log("Error: " + error);
                    }

                })
            })

            $("body").on("click", ".delete-btn-sp", function(e) {
                e.preventDefault();

                const spId = $(this).attr("id")

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "px-5 py-2 rounded-md mt-5 bg-green-600 text-white",
                        cancelButton: "px-5 py-2 rounded-md bg-[#FF0000] me-4 text-white"
                    },
                    buttonsStyling: true
                });
                swalWithBootstrapButtons.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../ajax-file/ajax.php',
                            type: 'POST',
                            data: {
                                "request": "deleteSp",
                                "spId": spId
                            },
                            success: function(response) {

                                console.log(response);
                                if (response == "404") {
                                    swalWithBootstrapButtons.fire({
                                        title: "Deleted!",
                                        text: `Your account has been deleted. Here after you can't get this account`,
                                        icon: "success"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "/skill-wave-service-hiring-app/index.php"
                                        }
                                    });
                                }
                            },
                            error: function(xhr, status, error) {

                                console.log("Status: " + status);
                                console.log("XHR Response: " + xhr.responseText);
                                console.error("Error: " + error);
                            }
                        })

                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelled",
                            text: "Your imaginary file is safe :)",
                            icon: "error"
                        });
                    }
                });

            })
        })
    </script>

</body>

</html>