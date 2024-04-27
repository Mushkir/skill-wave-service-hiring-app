<?php
session_start();
$serviceSeekerName = $_SESSION['serviceSeekerName'];
// echo $_SESSION['serviceSeekerName'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="../assets/img/logo.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title><?php echo $serviceSeekerName; ?>'s Dashboard | Skill-Wave</title>

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
            background-color: #6D2932;
            color: #FFFFFF;
        }
    </style>
</head>

<body class="bg-primary-color-10 mx-auto">
    <!-- Main Wrapper -->
    <section class="flex items-center gap-7 p-5 pl-0 m-auto relative max-w-[1800px] ">
        <!-- Sidebar -->
        <section class="w-1/5 min-h-screen">
            <div class=" absolute top-6">
                <h1 class="p-5 text-2xl font-bold text-[#6D2932]"><?php echo $serviceSeekerName; ?></h1>

                <!-- Menu List Item -->
                <ul>

                    <!-- Profile -->
                    <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
                        <a href="dashboard.php?profile" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="profileMenu">
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
                    <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
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

                    <!-- Find Service Provider -->
                    <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
                        <a href="../view-all-service-providers.php" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl">
                            <!-- Icon -->
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                    <path fill="currentColor" d="M12.5 8A1.5 1.5 0 0 1 14 9.5v.5c0 1.742-1.452 3.53-3.958 3.921l-1.48-1.48A4.5 4.5 0 0 0 9 10.5A4.5 4.5 0 0 0 8.242 8zM9 1.5A2.75 2.75 0 1 1 9 7a2.75 2.75 0 0 1 0-5.5M4.5 14c.786 0 1.512-.26 2.096-.697l2.55 2.55a.5.5 0 1 0 .708-.707l-2.55-2.55A3.5 3.5 0 1 0 4.5 14m0-1a2.5 2.5 0 1 1 0-5a2.5 2.5 0 0 1 0 5" />
                                </svg>
                            </div>

                            <!-- Name -->
                            Find Service
                        </a>
                    </li>

                    <!-- Delete Service Provider -->
                    <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
                        <a href="dashboard.php?delete" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl">
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
                    <li class="hover:bg-[#6D2932] hover:rounded-r-xl hover:text-white hover:transition 500 mb-2">
                        <a href="#" class="flex items-center gap-4 pl-5 p-3 rounded-r-xl" id="ss-logout">
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
                <div class="hover:cursor-pointer z-40 absolute top-0 right-0" id="ss-profile">
                    <div>
                        <div class="flex justify-end items-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTEBqYEUHs9SPync2bo8AmdYjzW5WYicOWF8lreCXnMcQ&s" alt="Admin Image" class="w-10 h-10 object-cover rounded-full" />
                        </div>

                        <!-- Dropdown menu -->
                        <div class="mt-2 bg-primary-color-10 py-[10px] rounded-lg hidden" id="ss-profile-dropdown">
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
                                    <a href="#" id="ss-logout" class="flex items-center gap-2">
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
                // if (isset($_GET['overview'])) {
                //     include('overview.php');
                // }

                if (isset($_GET['profile'])) {
                    include('profile.php');
                }

                if (isset($_GET['editProfile'])) {
                    include('edit-profile.php');
                }

                if (isset($_GET['delete'])) {
                    include('delete-profile.php');
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
        const ssProfileEl = document.querySelector("#ss-profile");
        const ssProfileDropdownEl = document.querySelector(
            "#ss-profile-dropdown"
        );

        ssProfileEl.addEventListener("click", () => {
            ssProfileDropdownEl.classList.toggle("hidden");
        });

        document.addEventListener("click", (event) => {
            const isClickInsideDropdown = ssProfileDropdownEl.contains(
                event.target
            );
            const isClickInsideProfile = ssProfileEl.contains(event.target);
            if (!isClickInsideDropdown && !isClickInsideProfile) {
                ssProfileDropdownEl.classList.add("hidden");
            }
        });
    </script>

    <!-- Dashboard side menu active script -->
    <script>
        const dashboardMenuEl = document.querySelector("#dashboardMenu");
        const profileMenuEl = document.querySelector("#profileMenu");
        const editProfileMenuEl = document.querySelector("#editProfileMenu");

        // console.log(document.location.href);
        const PATH_HREF = "http://localhost/skill-wave-service-hiring-app/service-seekers/dashboard.php?"
        const documentPathHref = document.location.href;

        // if (documentPathHref == `${PATH_HREF}overview`) {
        //     dashboardMenuEl.classList.add("activeSideBar")
        // }

        if (documentPathHref == `${PATH_HREF}profile`) {
            profileMenuEl.classList.add("activeSideBar");
        }

        if (documentPathHref == `${PATH_HREF}editProfile`) {
            editProfileMenuEl.classList.add("activeSideBar");
        }
    </script>

    <!-- Logout Jquery -->
    <script>
        $(document).ready(function() {

            $(document).on("click", "#ss-logout", function(e) {

                e.preventDefault();

                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'GET',
                    data: {
                        "request": 'getSsUsername'
                    },
                    success: function(response) {

                        if (response == 404) {
                            window.location.href = '../index.php';
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                    }
                })
            })
        })
    </script>


</body>

</html>