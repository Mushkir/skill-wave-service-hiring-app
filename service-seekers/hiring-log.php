<?php @session_start(); ?>

<div class="relative mt-10 mb-5">
    <h3 class="text-center font-semibold text-xl text-[#6D2932]">
        Dear <?php echo $_SESSION['serviceSeekerName']; ?>, here you can explore your whole service hiring info.
    </h3>
    <div class="bg-[#6D2932] w-10 h-[3px] rounded-full mx-auto mt-2"></div>

</div>
<div id="tableContainer" class=" overflow-x-scroll max-w-[950px]">

</div>

<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- DataTables CDN -->
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

<!-- JQuery script -->
<script>
    $(document).ready(function() {

        // * Function for show all the service hiring summary of logged-in service seeker
        showServiceSeekerAllHistoryLog();

        function showServiceSeekerAllHistoryLog() {
            $.ajax({
                url: '../ajax-file/ajax.php',
                type: 'POST',
                data: {
                    "request": "showSsAllHistoryLog"
                },
                beforeSend: function() {
                    $("#tableContainer").html('<div class="mt-20"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="#6D2932"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg></div>')
                },
                success: function(response) {

                    $("#tableContainer").html(response);
                    $("#all-hiring-process-table").DataTable();
                },
                error: function(xhr, status, error) {

                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                    console.error("Error: " + error);
                }
            })

        }

        $("body").on("click", "#navigateSummaryPageBtn", function(e) {
            e.preventDefault();

            const serviceIdHrefVal = $(this).attr("href");
            const arrayOfServiceId = serviceIdHrefVal.split("=");
            const serviceId = arrayOfServiceId[1];

            $.ajax({
                url: "../ajax-file/ajax.php",
                type: "GET",
                data: {
                    "checkPaymentStatus": serviceId
                },
                success: function(response) {

                    console.log(response);

                    const paymentStatusResponse = JSON.parse(response);
                    console.log(paymentStatusResponse);
                    const {
                        payment_status
                    } = paymentStatusResponse[0]

                    if (payment_status == "404") {
                        Swal.fire({
                            title: "Unable to process!",
                            text: "Dear Service Seeker! Once the service provider confirms your request, we'll swiftly move forward. Thank you for your patience and cooperation!",
                            icon: "error"
                        });
                    } else if (payment_status == "Paid") {

                        window.location.href = `/skill-wave-service-hiring-app/service-seekers/dashboard.php?viewPaymentInfo&serviceId=${serviceId}`
                    } else {

                        window.location.href = `/skill-wave-service-hiring-app/service-seekers/dashboard.php?serviceSummary&serviceId=${serviceId}`
                    }
                },
                error: function(xhr, status, error) {

                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                    console.error("Error: " + error);
                }
            })


        })
    })
</script>