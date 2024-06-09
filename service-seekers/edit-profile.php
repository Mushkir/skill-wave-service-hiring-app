<?php
@session_start();
require_once '../classes/app/ServiceSeeker.php';

if ($_SESSION['serviceSeekerName']) {
    $serviceSeeker = new ServiceSeeker();

    $ssName = $_SESSION['serviceSeekerName'];
    $getSsData = $serviceSeeker->getServiceSeekerInfo("name", $ssName);

    $ssId = $getSsData['service_seeker_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="../assets/img/SkillWave-logo-white-bg.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title><?php echo $serviceSeekerName; ?>'s Profile | Skill-Wave</title>

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
</head>

<body class="bg-[#C7B7A3]" id="infoContainer">

    <!-- Image Div -->
    <div class="">
        <div class="mt-10 bg-[#6D2932] w-36 h-36 mx-auto rounded-full p-1">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSd35gCLjgWxdpmIMsq6yS1eNeu7PyT0QqDlNE7itMjiQ&s" class="w-36 h-36 object-cover rounded-full" alt="Picture" id="service-seeker-image">
        </div>
    </div>
    <form action="" method="post" class=" mx-auto mt-10 w-full mb-10 max-w-[800px] px-3 bg-[#C7B7A3] py-5 sm:p-10 rounded-md" enctype="multipart/form-data" id="service-seeker-update-form">
        <input type="hidden" name="service-seeker-id" id="service-seeker-id" value="<?php echo $ssId ?>">
        <!-- Name, Email, Contact No -->
        <div class="sm:flex gap-x-10">
            <!-- Full Name -->
            <div class="w-full">
                <label for="service-seeker-fullname" class="font-semibold text-cus-maron">Name</label>
                <div class="mb-5">
                    <input type="text" name="service-seeker-fullname" id="service-seeker-fullname" class="font-normal p-1.5 w-full  bg-white border-none rounded mt-2 outline-none capitalize" />
                </div>
            </div>

            <!-- Email -->
            <div class="w-full">
                <label for="service-seeker-email" class="font-semibold text-cus-maron">Email</label>
                <div class="mb-5">
                    <input type="email" name="service-seeker-email" id="service-seeker-email" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" />
                </div>
            </div>

            <!-- Contact No -->
            <div class="w-full">
                <label for="service-seeker-contact-no" class="font-semibold text-cus-maron">Contact No.</label>
                <div class="mb-5">
                    <input type="tel" name="service-seeker-contact-no" id="service-seeker-contact-no" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" />
                </div>
            </div>
        </div>

        <!-- Username, Password, Confirm Password -->
        <div class="sm:flex gap-x-10">
            <!-- Username -->
            <div class="w-full">
                <label for="service-seeker-username" class="font-semibold text-cus-maron">Username</label>
                <div class="mb-5">
                    <input type="text" name="service-seeker-username" id="service-seeker-username" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" />
                </div>
            </div>

            <!-- Profile -->
            <div class="w-full">
                <label for="fileInput" class="font-semibold text-cus-maron">Profile Image</label>
                <div class="mb-5">
                    <input type="file" name="fileInput" id="fileInput" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" />
                </div>
            </div>

        </div>

        <!-- Gender, Address Line, City -->
        <div class="sm:flex gap-x-10">

            <!-- Address Line -->
            <div class="w-full">
                <label for="service-seeker-addreservice-seeker-line" class="font-semibold text-cus-maron">Address Line</label>
                <div class="mb-5">
                    <input type="text" name="service-seeker-addreservice-seeker-line" id="service-seeker-addreservice-seeker-line" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" />
                </div>
            </div>

            <!-- City -->
            <div class="w-full">
                <label for="service-seeker-city" class="font-semibold text-cus-maron">City</label>
                <div class="mb-5">
                    <input type="text" name="service-seeker-city" id="service-seeker-city" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" />
                </div>
            </div>


        </div>


        <!-- Buttons -->
        <div class="mt-5 w-full flex items-center justify-between">
            <button class=" bg-green-800 px-5 py-2 rounded text-white hover:bg-green-700 hover:transition">Update</button>

            <button type="button" class="w-full sm:w-52 text-white bg-primary-700 rounded px-5 py-2 text-center bg-cus-maron">
                Back to dashboard
            </button>
        </div>
    </form>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- JQuery script -->
    <script>
        $(document).ready(function() {
            showSsInfo();

            function showSsInfo() {
                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    data: {
                        "request": "showSsAllDetail",
                        "ssId": "<?php echo $ssId; ?>"
                    },
                    success(response) {

                        // console.log(response);
                        const jsonSsData = JSON.parse(response)
                        const {
                            address_line,
                            city,
                            contact_no,
                            email_address,
                            image,
                            name,
                            service_seeker_id,
                            username
                        } = jsonSsData

                        // console.log($("#service-seeker-fullname")[0].value = "HI");
                        $("#service-seeker-fullname")[0].value = name;
                        $("#service-seeker-email")[0].value = email_address
                        $("#service-seeker-contact-no")[0].value = contact_no
                        $("#service-seeker-city")[0].value = city
                        $("#service-seeker-addreservice-seeker-line")[0].value = address_line
                        $("#service-seeker-username")[0].value = username
                        $("#service-seeker-image")[0].src = `/skill-wave-service-hiring-app/ajax-file/uploads/${image}`

                        // console.log(jsonSsData);
                    },
                    error: function(xhr, status, error) {

                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                        console.error("Error: " + error);
                    }
                })
            }

            $(document).on("submit", "#service-seeker-update-form", function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                const ssUpdateFormEl = document.querySelector("#service-seeker-update-form");
                const formData = new FormData(ssUpdateFormEl);

                formData.append("request", "updateServiceSeeker");

                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);
                        const updatedJsonData = JSON.parse(response);
                        const {
                            status,
                            message
                        } = updatedJsonData[0]

                        if (status == "200") {
                            Swal.fire({
                                title: "Success!",
                                text: message,
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/skill-wave-service-hiring-app/service-seekers/dashboard.php?profile';
                                }
                            });
                        }

                        if (status == "201") {
                            Swal.fire({
                                title: "Success!",
                                text: message,
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/skill-wave-service-hiring-app/service-seekers/dashboard.php?profile';
                                }
                            });
                        }
                    }
                })
            })
        })
    </script>

</body>

</html>