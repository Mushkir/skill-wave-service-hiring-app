<?php
@session_start();
require_once '../classes/app/ServiceProvide.php';

if (isset($_SESSION['serviceProviderName'])) {

    $spName = $_SESSION['serviceProviderName'];
    $serviceProvider = new ServiceProvider();

    $arrayOfSpInfo = $serviceProvider->getServiceProviderInfo("name", $spName);

    $serviceProviderName = $arrayOfSpInfo['service_provider_id'];
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
    <form action="" method="post" class=" mx-auto w-full mb-10 max-w-[1000px] px-3 py-5 sm:p-10 rounded-md" enctype="multipart/form-data" id="service-providerupdate-form">
        <input type="hidden" name="service-providerid" id="service-providerid" value="<?php echo $serviceProviderName ?>">
        <!-- Name, Email, Contact No -->
        <div class="sm:flex gap-x-10">
            <!-- Full Name -->
            <div class="w-full">
                <label for="service-providerfullname" class="font-semibold text-cus-maron">Name</label>
                <div class="mb-5">
                    <input type="text" name="service-providerfullname" id="service-providerfullname" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" />
                </div>
            </div>

            <!-- Email -->
            <div class="w-full">
                <label for="service-provideremail" class="font-semibold text-cus-maron">Email</label>
                <div class="mb-5">
                    <input type="email" name="service-provideremail" id="service-provideremail" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" />
                </div>
            </div>

            <!-- Contact No -->
            <div class="w-full">
                <label for="service-providercontact-no" class="font-semibold text-cus-maron">Contact No.</label>
                <div class="mb-5">
                    <input type="tel" name="service-providercontact-no" id="service-providercontact-no" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" />
                </div>
            </div>
        </div>

        <!-- Username, Password, Confirm Password -->
        <div class="sm:flex gap-x-10">
            <!-- Username -->
            <div class="w-full">
                <label for="service-providerusername" class="font-semibold text-cus-maron">Username</label>
                <div class="mb-5">
                    <input type="text" name="service-providerusername" id="service-providerusername" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" />
                </div>
            </div>

            <div class="w-full">
                <label for="service-providerdistrict" class="font-semibold text-cus-maron">District</label>
                <div class="mb-5">
                    <select name="service-providerdistrict" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" id="service-providerdistrict">
                        <option value="1">1</option>

                    </select>
                </div>
            </div>

            <div class="w-full">
                <label for="service-providertown" class="font-semibold text-cus-maron">Town</label>
                <div class="mb-5">
                    <select name="service-providertown" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" id="service-providertown">
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
                <label for="service-provideraddress-line" class="font-semibold text-cus-maron">Address Line</label>
                <div class="mb-5">
                    <input type="text" name="service-provideraddress-line" id="service-provideraddress-line" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" />
                </div>
            </div>

            <!-- Starting Price -->
            <div class="w-full">
                <label for="service-providerstarting-price" class="font-semibold text-cus-maron">Package Starting Price</label>
                <div class="mb-5">
                    <input class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" id="service-providerstarting-price" type="text" name="service-providerstarting-price" />
                </div>
            </div>
        </div>

        <!-- Image, Qualifications, -->
        <div class="sm:flex gap-x-10">
            <!-- Qualification -->
            <div class="w-full">
                <label for="service-providerqualification" class="font-semibold text-cus-maron">Qualifications</label>
                <div class="mb-5">
                    <textarea name="service-providerqualification" id="service-providerqualification" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none"></textarea>
                </div>
            </div>

            <!-- Skills -->
            <div class="w-full">
                <label for="service-providerskills" class="font-semibold text-cus-maron">Skills</label>
                <div class="mb-5">
                    <textarea name="service-providerskills" id="service-providerskills" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none"></textarea>
                </div>
            </div>
        </div>

        <!-- Description, Keywords, Starting Price -->
        <div class="sm:flex gap-x-10">
            <!-- Description -->
            <div class="w-full">
                <label for="service-providerdesc" class="font-semibold text-cus-maron">Service Description</label>
                <div class="mb-5">
                    <textarea name="service-providerdesc" id="service-providerdesc" rows="5" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none"></textarea>
                </div>
            </div>

            <!-- Keywords -->
            <div class="w-full">
                <label for="service-providerkeywords" class="font-semibold text-cus-maron">Keywords</label>
                <div class="mb-5">
                    <textarea name="service-providerkeywords" id="service-providerkeywords" rows="5" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none"></textarea>
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
                        $("#service-providertown").html(response)
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
                        $("#service-providerdistrict").html(response)

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
                        "spId": "<?php echo $serviceProviderName; ?>"
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

                                $("#service-providerfullname")[0].value = name;
                                $("#service-provideremail")[0].value = email_address
                                $("#service-providercontact-no")[0].value = contact_no
                                $("#service-providerusername")[0].value = username
                                $("#service-providerstarting-price")[0].value = price
                                $("#service-provideraddress-line")[0].value = address_line
                                $("#service-providerqualification")[0].value = qualification
                                $("#service-providerskills")[0].value = skills
                                $("#service-providerdesc")[0].value = description
                                $("#service-providerkeywords")[0].value = keywords
                                $("#serviceProviderProfileImg")[0].src = `/skill-wave-service-hiring-app/ajax-file/uploads/${image}`

                                $("#service-providertown")[0][0].value = town_id
                                $("#service-providerdistrict")[0][0].value = district_id
                                $("#service-providertown")[0][0].textContent = townName
                                $("#service-providerdistrict")[0][0].textContent = districtName
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

            $(document).on("submit", "#service-providerupdate-form", function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                const spUpdateFormEl = document.querySelector("#service-providerupdate-form");
                const formData = new FormData(spUpdateFormEl);

                formData.append("request", "updateSp");

                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
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
                                    window.location.href = '/skill-wave-service-hiring-app/service-providers/dashboard.php?spProfile';
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
                                    window.location.href = '/skill-wave-service-hiring-app/service-providers/dashboard.php?spProfile';
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