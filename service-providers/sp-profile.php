<?php @session_start(); ?>

<main class="mt-[6.25rem] min-h-screen">
    <section class="mt-10 sm:mt-20 px-3 sm:px-5 md:px-20">
        <div>
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

                        <div class="bg-green-500 mt-2 px-3 py-1 rounded-full text-sm" id="statusDiv">
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

            <a href="" class="bg-gray-400 text-center px-5 py-3 rounded-xl block mt-5 hover:bg-gray-500 hover:text-gray-200 hover:transition 500" id="btnEdit">Edit Info</a>
        </div>
    </section>
</main>

<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- JQuery script -->
<script>
    $(document).ready(function() {

        showLoggedInServiceProviderProfileInfo();

        // * Function to alert to SP as new service hiring request.
        checkServiceHiringRequest();

        function showLoggedInServiceProviderProfileInfo() {

            $.ajax({

                url: '../ajax-file/ajax.php',
                type: 'GET',
                data: {
                    "request": "showLoggedInServiceProviderProfileInfo"
                },
                success: function(response) {

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
                        const serviceProviderJsonData = JSON.parse(response);
                        // console.log(serviceProviderJsonData);

                        const {
                            spId,
                            address,
                            contactNo,
                            districtName,
                            email,
                            gender,
                            name,
                            price,
                            skills,
                            townName,
                            username,
                            profileImg,
                            status
                        } = serviceProviderJsonData;

                        $("#btnEdit")[0].href = spId;
                        $("#spProfileImg")[0].src = `/skill-wave-service-hiring-app/ajax-file/uploads/${profileImg}`;
                        $("#spProfileImg")[0].alt = `${name}'s image`;
                        $("#spName")[0].textContent = name;
                        $("#spUsername")[0].textContent = username;
                        $("#spContactNo")[0].textContent = contactNo;
                        $("#spEmail")[0].textContent = email;
                        $("#spGender")[0].textContent = gender;
                        $("#spAddress")[0].textContent = address;
                        $("#spDistrict")[0].textContent = districtName;
                        $("#spTown")[0].textContent = townName;
                        $("#spSkills")[0].textContent = skills;
                        $("#spServicePackage")[0].textContent = `Rs. ${price}`;

                        if (status == "busy") {
                            // console.dir($("#statusDiv")[0]);
                            $("#statusDiv")[0].classList.remove("bg-green-500");
                            $("#statusDiv")[0].classList.add("bg-red-500", "w-20", "text-center")
                            $("#statusDiv")[0].textContent = "Busy";

                        }

                        // console.log(serviceProviderJsonData);
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })
        }

        $(document).on("click", "#btnEdit", function(e) {

            e.preventDefault();

            const userId = $(this).attr("href")

            // console.log(userId);

            window.location.href = `/skill-wave-service-hiring-app/service-providers/edit-profile.php?userId=${userId}`;
        })

        function checkServiceHiringRequest() {
            $.ajax({
                url: '../ajax-file/ajax.php',
                type: "POST",
                data: {
                    "request": "checkNewServiceHiringRequest"
                },
                success: function(response) {
                    let newResponse = "";
                    response < 9 ? newResponse = `0${response}` : newResponse
                    if (response == 1) {
                        Swal.fire({
                            title: "New Service Request!",
                            text: `You have ${newResponse} new service hiring request!`,
                            icon: "info"
                        }).then((result) => {
                            if (result.isConfirmed == true) {
                                window.location.href = '/skill-wave-service-hiring-app/service-providers/dashboard.php?summary';
                            }
                        });
                    }

                    if (response > 1) {
                        Swal.fire({
                            title: "New Service Request!",
                            text: `You have ${newResponse} new service hiring requests!`,
                            icon: "info"
                        }).then((result) => {
                            if (result.isConfirmed == true) {
                                window.location.href = '/skill-wave-service-hiring-app/service-providers/dashboard.php?summary';
                            }
                        });
                    }
                    //  else {
                    //     window.location.href = '/skill-wave-service-hiring-app/service-providers/dashboard.php?spProfile';
                    // }
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                    console.log("Error: " + error);
                }
            })
        }
    })
</script>