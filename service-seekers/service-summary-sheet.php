<?php @session_start();
if (isset($_GET["serviceId"])) {

    $serviceId = $_GET["serviceId"];
}
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
</head>

<body class="">
    <h3 class="text-center text-xl font-bold text-[#6D2932] block pt-5">
        Dear <?php echo $serviceSeekerName; ?>, please make sure your service hiring process summary before
        the payment process...
    </h3>
    <div class="bg-[#e3dbd1] w-full max-w-[600px] mx-auto rounded-lg p-6 mt-4">
        <!-- Service Id -->
        <div class="mb-5">
            <label for="service-id" class="block mb-1 text-[#6D2932]">Service ID</label>
            <div>
                <input type="text" id="service-id" class="outline-none p-2 rounded-md border-0 w-full bg-[#f9f7f5]" readonly />
            </div>
        </div>

        <!-- Service Provider Name -->
        <div class="mb-5">
            <label for="service-provider-name" class="block mb-1 text-[#6D2932]">Service Provider Name</label>
            <div>
                <input type="text" id="service-provider-name" class="outline-none rounded-md p-2 border-0 w-full bg-[#f9f7f5]" readonly />
            </div>
        </div>

        <!-- Service Provider Id -->
        <div class="mb-5">
            <label for="service-provider-id" class="block mb-1 text-[#6D2932]">Service Provider ID</label>
            <div>
                <input type="text" id="service-provider-id" class="outline-none p-2 rounded-md border-0 w-full bg-[#f9f7f5]" readonly />
            </div>
        </div>

        <!-- Service Description -->
        <div class="mb-5">
            <label for="service-desc" class="block mb-1 text-[#6D2932]">Service Description</label>
            <div>
                <textarea name="" class="outline-none p-2 rounded-md border-0 w-full bg-[#f9f7f5]" id="service-desc" rows="5" readonly></textarea>
            </div>
        </div>

        <!-- Service Charge -->
        <div class="mb-5">
            <label for="service-charge" class="block mb-1 text-[#6D2932]">Service Charge</label>
            <div>
                <input type="text" id="service-charge" class="outline-none rounded-md p-2 border-0 w-full bg-[#f9f7f5]" readonly />
            </div>
        </div>

        <!-- Date and Time -->
        <div class="mb-5">
            <label for="date-time" class="block mb-1 text-[#6D2932]">Date and Time</label>
            <div>
                <input type="text" id="date-time" class="outline-none rounded-md p-2 border-0 w-full bg-[#f9f7f5]" readonly />
            </div>
        </div>

        <div>
            <button type="button" class="bg-[#6D2932] confirm-btn px-5 py-2 rounded-md text-[#e4dbd2] w-full hover:bg-[#572028] hover:transition 500 hover:text-white" id="">
                Confirm to Pay
            </button>
        </div>
    </div>

    <!-- DayJS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>

    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- JQuery script -->
    <script>
        $(document).ready(function() {

            getServiceDetails();

            // * Function get the details of selected service
            function getServiceDetails() {
                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: "GET",
                    data: {
                        "getParsedServiceIdInfo": <?php echo $serviceId ?>
                    },
                    success: function(response) {
                        // console.log(response);
                        const jsonServiceData = JSON.parse(response);
                        const {
                            services_id,
                            providerName,
                            provider_id,
                            description,
                            service_charge,
                            date_time
                        } = jsonServiceData[0];

                        const humanReadableDateAndTime = dayjs(date_time).format('dddd, DD/MMMM/YYYY, hh:mm a')

                        $("#service-id")[0].value = services_id;
                        $("#service-provider-name")[0].value = providerName;
                        $("#service-provider-id")[0].value = provider_id;
                        $("#service-desc")[0].textContent = description;
                        $("#service-charge")[0].value = `Rs. ${service_charge}`;
                        $("#date-time")[0].value = humanReadableDateAndTime;
                        $(".confirm-btn")[0].id = service_charge; // ! This DOM integration for pass the service charge to payment portal while clicking confirm button. Because the payment need to pass from here, otherwise need to get those details from database.



                    },
                    error: function(xhr, status, error) {
                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                        console.error("Error: " + error);
                    }
                })
            }

            // * Navigate to payment page with service-id and service charge amount.
            $("body").on("click", ".confirm-btn", function(e) {
                e.preventDefault();

                const serviceChargeAmount = $(this).attr("id");

                window.location.href = `/skill-wave-service-hiring-app/service-seekers/payment/payment.php?serivceId=${<?php echo $serviceId; ?>}&serviceCharge=${serviceChargeAmount}`

            })
        })
    </script>
</body>

</html>