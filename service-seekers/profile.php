<?php
@session_start();

// echo $_SESSION['serviceSeekerName'];
?>
<main class="">
    <section class=" sm:mt-20 px-3 sm:px-5 md:px-20">
        <div class=" bg-gray-400 w-full rounded-xl mx-auto p-10" id="ss-profile-card">
            <div class="mx-auto flex w-[200px] justify-center items-center bg-[#6D2932] rounded-full p-1">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmpbzPe1HdyFoLu4qK_e12GtP3sJxMeVWexNvzFsPB_A&s" id="ssImg" class="w-[200px] h-[200px] object-cover rounded-full" alt="'s Picture." />
            </div>
            <div class="md:flex gap-1 items-start">
                <div class="mt-5">
                    <h5 class="text-center text-xl text-[#6D2932] md:text-left font-semibold" id="ssFullname">

                    </h5>
                    <p class="card-text text-center md:text-left mt-3 text-gray-50" id="ssAddress">
                        <!-- No. 751 East Milton Drive, Kandy, Sri Lanka -->
                        📍 No. 751 East Milton Drive, Kandy, Sri Lanka
                    </p>
                </div>
            </div>

            <!-- Email -->
            <div class="text-[12px] mt-4 mb-4 flex justify-between bg-gray-100 py-2 rounded-lg">
                <span class="px-2 font-semibold">Email: </span>
                <span class="px-2" id="ssEmail">mushkirmohamed@gmail.com</span>
            </div>

            <!-- Username -->
            <div class="text-[12px] mb-4 flex justify-between bg-gray-100 py-2 rounded-lg">
                <span class="px-2 font-semibold">Username: </span>
                <span class="px-2" id="ssUsername">mushkir_96</span>
            </div>

            <!-- Username -->
            <div class="text-[12px] mb-4 flex justify-between bg-gray-100 py-2 rounded-lg">
                <span class="px-2 font-semibold">Gender: </span>
                <span class="px-2" id="ssGender">Male</span>
            </div>

            <!-- Contact No -->
            <div class="text-[12px] mt-4 mb-3 flex justify-between bg-gray-100 py-2 rounded-lg">
                <span class="px-2 font-semibold">Contact No: </span>
                <span class="px-2" id="ssContactNo">+94777195282</span>
            </div>

            <!-- NIC -->
            <div class="text-[12px] mb-4 flex justify-between bg-gray-100 py-2 rounded-lg">
                <span class="px-2 font-semibold">Identity Card No: </span>
                <span class="px-2" id="ssIdCardNo">199631401505</span>
            </div>
        </div>
    </section>
</main>


<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- JQuery script -->
<script>
    $(document).ready(function() {

        showServiceSeekerProfileInfo()

        function showServiceSeekerProfileInfo() {
            $.ajax({
                url: '../ajax-file/ajax.php',
                type: 'POST',
                data: {
                    "request": "getServiceSeekerInfo"
                },
                success: function(response) {
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
                        const ssDataInJson = JSON.parse(response);
                        const {
                            name,
                            address_line,
                            city,
                            email_address,
                            username,
                            gender,
                            contact_no,
                            identity_card_no,
                            image
                        } = ssDataInJson

                        // console.log(ssDataInJson);

                        $("#ssFullname")[0].textContent = name;
                        $("#ssAddress")[0].textContent = `📍 ${address_line}, ${city}`;
                        $("#ssEmail")[0].textContent = email_address;
                        $("#ssUsername")[0].textContent = username;
                        $("#ssGender")[0].textContent = gender;
                        $("#ssContactNo")[0].textContent = contact_no;
                        $("#ssIdCardNo")[0].textContent = identity_card_no;
                        $("#ssImg")[0].src = `/skill-wave-service-hiring-app/ajax-file/uploads/${image}`;
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                    console.error("Error: " + error);
                }
            })
        }
    })
</script>