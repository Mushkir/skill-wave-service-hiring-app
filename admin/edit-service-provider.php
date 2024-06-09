<?php
session_start();
require_once '../classes/app/ServiceProvide.php';

if (isset($_GET['serviceProviderId'])) {
    $serviceProvider = new ServiceProvider();

    $serviceProviderId = $_GET['serviceProviderId'];
    $arrayOfSpInfo = $serviceProvider->getServiceProviderInfoById($serviceProviderId);

    $serviceProviderName = $arrayOfSpInfo['name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="../assets/img/SkillWave-logo-white-bg.png" class="object-cover" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title><?php echo $serviceProviderName; ?>'s Profile | Skill-Wave</title>

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
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSd35gCLjgWxdpmIMsq6yS1eNeu7PyT0QqDlNE7itMjiQ&s" class="w-36 h-36 object-cover rounded-full" alt="Picture" id="serviceProviderProfileImg">
        </div>
    </div>
    <form action="" method="post" class=" mx-auto w-full mb-10 max-w-[1000px] px-3 py-5 sm:p-10 rounded-md" enctype="multipart/form-data" id="sp-update-form">
        <input type="hidden" name="sp-id" id="sp-id" value="<?php echo $serviceProviderId ?>">
        <!-- Name, Email, Contact No -->
        <div class="sm:flex gap-x-10">
            <!-- Full Name -->
            <div class="w-full">
                <label for="sp-fullname" class="font-semibold text-cus-maron">Name</label>
                <div class="mb-5">
                    <input type="text" name="sp-fullname" id="sp-fullname" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" />
                </div>
            </div>

            <!-- Email -->
            <div class="w-full">
                <label for="sp-email" class="font-semibold text-cus-maron">Email</label>
                <div class="mb-5">
                    <input type="email" name="sp-email" id="sp-email" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" />
                </div>
            </div>

            <!-- Contact No -->
            <div class="w-full">
                <label for="sp-contact-no" class="font-semibold text-cus-maron">Contact No.</label>
                <div class="mb-5">
                    <input type="tel" name="sp-contact-no" id="sp-contact-no" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" />
                </div>
            </div>
        </div>

        <!-- Username, Password, Confirm Password -->
        <div class="sm:flex gap-x-10">
            <!-- Username -->
            <div class="w-full">
                <label for="sp-username" class="font-semibold text-cus-maron">Username</label>
                <div class="mb-5">
                    <input type="text" name="sp-username" id="sp-username" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" />
                </div>
            </div>

            <div class="w-full">
                <label for="sp-district" class="font-semibold text-cus-maron">District</label>
                <div class="mb-5">
                    <select name="sp-district" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" id="sp-district">
                        <option value="1">1</option>

                    </select>
                </div>
            </div>

            <div class="w-full">
                <label for="sp-town" class="font-semibold text-cus-maron">Town</label>
                <div class="mb-5">
                    <select name="sp-town" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" id="sp-town">
                        <option value="2">2</option>

                    </select>
                </div>
            </div>
        </div>

        <!-- Gender, Address Line, City -->
        <div class="sm:flex gap-x-10">
            <div class="w-full">
                <label for="fileInput" class="font-semibold text-cus-maron">Profile Image</label>
                <div class="mb-5">
                    <input type="file" name="fileInput" id="fileInput" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" />
                </div>
            </div>
            <!-- Address Line -->
            <div class="w-full">
                <label for="sp-address-line" class="font-semibold text-cus-maron">Address Line</label>
                <div class="mb-5">
                    <input type="text" name="sp-address-line" id="sp-address-line" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" />
                </div>
            </div>

            <!-- Starting Price -->
            <div class="w-full">
                <label for="sp-starting-price" class="font-semibold text-cus-maron">Package Starting Price</label>
                <div class="mb-5">
                    <input class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" id="sp-starting-price" type="text" name="sp-starting-price" />
                </div>
            </div>
        </div>

        <!-- Image, Qualifications, -->
        <div class="sm:flex gap-x-10">
            <!-- Qualification -->
            <div class="w-full">
                <label for="sp-qualification" class="font-semibold text-cus-maron">Qualifications</label>
                <div class="mb-5">
                    <textarea name="sp-qualification" id="sp-qualification" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none"></textarea>
                </div>
            </div>

            <!-- Skills -->
            <div class="w-full">
                <label for="sp-skills" class="font-semibold text-cus-maron">Skills</label>
                <div class="mb-5">
                    <textarea name="sp-skills" id="sp-skills" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none"></textarea>
                </div>
            </div>
        </div>

        <!-- Description, Keywords, Starting Price -->
        <div class="sm:flex gap-x-10">
            <!-- Description -->
            <div class="w-full">
                <label for="sp-desc" class="font-semibold text-cus-maron">Service Description</label>
                <div class="mb-5">
                    <textarea name="sp-desc" id="sp-desc" rows="5" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none"></textarea>
                </div>
            </div>

            <!-- Keywords -->
            <div class="w-full">
                <label for="sp-keywords" class="font-semibold text-cus-maron">Keywords</label>
                <div class="mb-5">
                    <textarea name="sp-keywords" id="sp-keywords" rows="5" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none"></textarea>
                </div>
            </div>


        </div>

        <!-- Buttons -->
        <div class="mt-5 w-full flex items-center justify-between">
            <button type="submit" id="update-btn" class="accept-btn w-full sm:w-52 text-white bg-primary-700 rounded px-5 py-2 text-center bg-green-800 hover:bg-green-700 hover:transition 500">
                Update
            </button>

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
            showSpInfo();
            getTownList();
            gteDistrictList();

            function getTownList() {
                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    data: {
                        "request": "getTownList"
                    },
                    success: function(response) {
                        // console.log(response);
                        $("#sp-town").html(response)
                    },
                    error: function(xhr, status, error) {

                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                        console.error("Error: " + error);
                    }
                })
            }

            function gteDistrictList() {
                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    data: {
                        "request": "getDistrictList"
                    },
                    success: function(response) {
                        // console.log(response);
                        $("#sp-district").html(response)

                    },
                    error: function(xhr, status, error) {

                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                        console.error("Error: " + error);
                    }
                })
            }

            function showSpInfo() {
                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    data: {
                        "request": "showSpAllDetail",
                        "spId": "<?php echo $serviceProviderId; ?>"
                    },
                    success(response) {

                        // console.log(response);
                        const jsonData = JSON.parse(response)
                        let {
                            name,
                            address_line,
                            contact_no,
                            description,
                            email_address,
                            image,
                            keywords,
                            price,
                            qualification,
                            service_provider_id,
                            skills,
                            town_id,
                            district_id,
                            townName,
                            districtName,
                            username
                        } = jsonData[0]

                        // console.log(jsonData[0]);

                        $.ajax({
                            url: '../ajax-file/ajax.php',
                            type: 'POST',
                            data: {
                                "request": "getTownAndDistrictInfo",
                                "townId": town_id,
                                "districtId": district_id
                            },
                            success: function(resp) {

                                const jsonDataFile = JSON.parse(resp);
                                const {
                                    district_id,
                                    district_name,
                                    town_id
                                } = jsonDataFile

                                $("#sp-fullname")[0].value = name;
                                $("#sp-email")[0].value = email_address
                                $("#sp-contact-no")[0].value = contact_no
                                $("#sp-username")[0].value = username
                                $("#sp-starting-price")[0].value = price
                                $("#sp-address-line")[0].value = address_line
                                $("#sp-qualification")[0].value = qualification
                                $("#sp-skills")[0].value = skills
                                $("#sp-desc")[0].value = description
                                $("#sp-keywords")[0].value = keywords
                                $("#serviceProviderProfileImg")[0].src = `/skill-wave-service-hiring-app/ajax-file/uploads/${image}`

                                $("#sp-town")[0][0].value = town_id
                                $("#sp-district")[0][0].value = district_id
                                $("#sp-town")[0][0].textContent = townName
                                $("#sp-district")[0][0].textContent = districtName
                                // console.log($("#fileInput"));

                            },
                            error: function(xhr, status, error) {

                                console.log("Status: " + status);
                                console.log("XHR Response: " + xhr.responseText);
                                console.error("Error: " + error);
                            }
                        })

                        // console.log(jsonData);
                    },
                    error: function(xhr, status, error) {

                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                        console.error("Error: " + error);
                    }
                })
            }

            $(document).on("submit", "#sp-update-form", function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                const spUpdateFormEl = document.querySelector("#sp-update-form");
                const formData = new FormData(spUpdateFormEl);

                formData.append("request", "updateSpByAdmin");

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
                                    window.location.href = '/skill-wave-service-hiring-app/admin/dashboard.php?serviceProviders';
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
                                    window.location.href = '/skill-wave-service-hiring-app/admin/dashboard.php?serviceProviders';
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