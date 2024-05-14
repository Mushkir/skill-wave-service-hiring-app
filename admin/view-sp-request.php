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

<body class="bg-gray-300" id="infoContainer">
    <div class="">
        <div class="mt-10 bg-[#6D2932] w-36 h-36 mx-auto rounded-full p-1">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSd35gCLjgWxdpmIMsq6yS1eNeu7PyT0QqDlNE7itMjiQ&s" class="w-36 h-36 object-cover rounded-full" alt="Picture">
        </div>
    </div>
    <form action="" class="mx-auto w-full mb-10 max-w-[1000px] px-3 py-5 sm:p-10 rounded-md" enctype="multipart/form-data" id="serviceProvidersSignUpForm">
        <!-- Name, Email, Contact No -->
        <div class="sm:flex gap-x-10">
            <!-- Full Name -->
            <div class="w-full">
                <label for="sp-fullname" class="font-semibold text-cus-maron">Name</label>
                <div class="mb-5">
                    <input type="text" name="sp-fullname" id="sp-fullname" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" readonly />
                </div>
            </div>

            <!-- Email -->
            <div class="w-full">
                <label for="sp-email" class="font-semibold text-cus-maron">Email</label>
                <div class="mb-5">
                    <input type="email" name="sp-email" id="sp-email" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" readonly />
                </div>
            </div>

            <!-- Contact No -->
            <div class="w-full">
                <label for="sp-contact-no" class="font-semibold text-cus-maron">Contact No.</label>
                <div class="mb-5">
                    <input type="tel" name="sp-contact-no" id="sp-contact-no" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" readonly />
                </div>
            </div>
        </div>

        <!-- Username, Password, Confirm Password -->
        <div class="sm:flex gap-x-10">
            <!-- Username -->
            <div class="w-full">
                <label for="sp-username" class="font-semibold text-cus-maron">Username</label>
                <div class="mb-5">
                    <input type="text" name="sp-username" id="sp-username" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" readonly />
                </div>
            </div>

            <div class="w-full">
                <label for="sp-district" class="font-semibold text-cus-maron">District</label>
                <div class="mb-5">
                    <input type="text" name="sp-address-line" id="sp-address-line" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" readonly />
                </div>
            </div>

            <div class="w-full">
                <label for="sp-town" class="font-semibold text-cus-maron">Town</label>
                <div class="mb-5">
                    <input type="text" name="sp-address-line" id="sp-address-line" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" readonly />
                </div>
            </div>
        </div>

        <!-- Gender, Address Line, City -->
        <div class="sm:flex gap-x-10">
            <!-- Gender -->
            <div class="w-full">
                <label for="sp-gender" class="font-semibold text-cus-maron">Gender</label>
                <div class="mb-5">
                    <input type="text" name="sp-email" id="sp-email" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" readonly />
                </div>
            </div>

            <!-- Address Line -->
            <div class="w-full">
                <label for="sp-address-line" class="font-semibold text-cus-maron">Address Line</label>
                <div class="mb-5">
                    <input type="text" name="sp-address-line" id="sp-address-line" class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none capitalize" readonly />
                </div>
            </div>

            <!-- Starting Price -->
            <div class="w-full">
                <label for="sp-starting-price" class="font-semibold text-cus-maron">Package Starting Price</label>
                <div class="mb-5">
                    <input class="font-normal p-1.5 w-full bg-white border-none rounded mt-2 outline-none" id="sp-starting-price" type="text" name="sp-starting-price" readonly />
                </div>
            </div>
        </div>

        <!-- Image, Qualifications, -->
        <div class="sm:flex gap-x-10">
            <!-- Qualification -->
            <div class="w-full">
                <label for="sp-qualification" class="font-semibold text-cus-maron">Qualifications</label>
                <div class="mb-5">
                    <textarea name="sp-qualification" id="sp-qualification" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none" readonly></textarea>
                </div>
            </div>

            <!-- Skills -->
            <div class="w-full">
                <label for="sp-skills" class="font-semibold text-cus-maron">Skills</label>
                <div class="mb-5">
                    <textarea name="sp-skills" id="sp-skills" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none" readonly></textarea>
                </div>
            </div>
        </div>

        <!-- Description, Keywords, Starting Price -->
        <div class="sm:flex gap-x-10">
            <!-- Description -->
            <div class="w-full">
                <label for="sp-desc" class="font-semibold text-cus-maron">Service Description</label>
                <div class="mb-5">
                    <textarea name="sp-desc" id="sp-desc" rows="5" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none" readonly></textarea>
                </div>
            </div>

            <!-- Keywords -->
            <div class="w-full">
                <label for="sp-keywords" class="font-semibold text-cus-maron">Keywords</label>
                <div class="mb-5">
                    <textarea name="sp-keywords" id="sp-keywords" rows="5" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none" readonly></textarea>
                </div>
            </div>


        </div>

        <!-- Buttons -->
        <div class="mt-5 w-full flex items-center justify-between">
            <button type="button" class="w-full sm:w-52 text-white bg-primary-700 rounded px-5 py-2 text-center bg-green-800 hover:bg-green-700 hover:transition 500">
                Accept
            </button>

            <button type="button" class="w-full sm:w-52 text-white bg-primary-700 rounded px-5 py-2 text-center bg-red-800 hover:bg-red-700 hover:transition 500">
                Reject
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
            getRequestedSpInfo();

            // * Getting details of requested Service Provider from DB to Accept / Reject the request.
            function getRequestedSpInfo() {
                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'GET',
                    data: {
                        "getNewServiceProviderId": <?php echo $serviceProviderId ?>
                    },
                    beforeSend: function() {
                        $("#infoContainer").html(`<div class="text-[#6D2932]"><svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mt-[150px]" width="50" height="50" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2A10 10 0 1 0 22 12A10 10 0 0 0 12 2Zm0 18a8 8 0 1 1 8-8A8 8 0 0 1 12 20Z" opacity=".5"/><path fill="currentColor" d="M20 12h2A10 10 0 0 0 12 2V4A8 8 0 0 1 20 12Z"><animateTransform attributeName="transform" dur="1s" from="0 12 12" repeatCount="indefinite" to="360 12 12" type="rotate"/></path></svg></div>`)
                    },
                    success: function(response) {
                        console.log(response);
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

</body>

</html>