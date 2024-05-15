<style>
    #cta:hover {
        transform: scale(1.05);
    }
</style>

<?php @session_start();
include('service-description-modal.php');
include('service-charge-modal.php');
?>

<div class="relative mb-5">
    <h3 class="text-center font-semibold text-xl text-gray-700">
        Dear <?php echo $_SESSION['serviceProviderName']; ?>, here you can explore your whole service summary info.
    </h3>
    <div class="bg-[#6D2932] w-10 h-[3px] rounded-full mx-auto mt-2"></div>
</div>

<div class="summaryTableContainer flex justify-center items-center overflow-x-scroll">

</div>


<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- DataTables CDN -->
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

<!-- JQuery script -->
<script>
    $(document).ready(function() {

        // * Function for show all the service orders in logged-in service provider's profile dashboard.
        showAllServiceSummaryOfServiceProvider();

        sendingServiceDescriptionToServer();

        sendingServiceChargeToServer();

        function showAllServiceSummaryOfServiceProvider() {
            $.ajax({
                url: '../ajax-file/ajax.php',
                type: 'POST',
                data: {
                    "request": "showAllServiceProviderSummary"
                },
                beforeSend: function() {

                    $(".summaryTableContainer").html('<div class="mt-20"><svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="#6D2932"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg></div>');
                },
                success: function(response) {

                    // console.log(response);
                    $(".summaryTableContainer").html(response)
                    $("#spServiceSummaryTable").DataTable();
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                    console.error("Error: " + error);
                }
            })
        }

        $("body").on("click", "#btnConfirm", function(e) {
            e.preventDefault();

            const serviceId = $(this).attr("href");
            const id = serviceId.split("=")[1];

            $.ajax({
                url: '../ajax-file/ajax.php',
                type: "GET",
                data: {
                    id: id
                },
                success: function(response) {
                    // console.log(response);
                    Swal.fire({
                        title: "Are you sure?",
                        text: `Are you sure to proceed ${response}\'s request?`,
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Yes!",
                        denyButtonText: `Delete the request`
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '../ajax-file/ajax.php',
                                type: 'GET',
                                data: {
                                    "serviceId": id,
                                    "request": "acceptRequest"
                                },
                                success: function(resp) {
                                    console.log(resp);
                                    showAllServiceSummaryOfServiceProvider();
                                    if (resp == 1) {

                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log("Status: " + status);
                                    console.log("XHR Response: " + xhr.responseText);
                                    console.error("Error: " + error);
                                }
                            })
                        } else if (result.isDenied) {
                            $.ajax({
                                url: '../ajax-file/ajax.php',
                                type: 'GET',
                                data: {
                                    "serviceIdForDelReq": id,
                                    "request": "deleteRequest"
                                },
                                success: function(res) {

                                    if (res == 1) {
                                        Swal.fire("The request has been rejected", "", "info");
                                        showAllServiceSummaryOfServiceProvider();
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log("Status: " + status);
                                    console.log("XHR Response: " + xhr.responseText);
                                    console.error("Error: " + error);
                                }
                            })
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                    console.error("Error: " + error);
                }
            })

        })

        // Function for open the modal for Add service description.
        $("body").on("click", "#serviceDes", function(e) {
            e.preventDefault();

            const serviceIdHrefVal = $(this).attr("href");
            const splittedServiceId = serviceIdHrefVal.split("=");
            const serviceId = splittedServiceId[1];

            const addServiceDescFormEl = $("#addServiceDescForm")

            addServiceDescFormEl.removeClass("hidden").addClass("transition duration-300 opacity-0");

            setInterval(() => {
                addServiceDescFormEl.addClass("opacity-100")
            }, 100);

            $("#service-id")[0].value = serviceId;
        });

        // * Validation and Sending service description info to server script 
        function sendingServiceDescriptionToServer() {

            const addServiceDescFormEl = document.querySelector("#addServiceDescForm");

            const validator = new window.JustValidate(addServiceDescFormEl);

            validator.addField("#add-service-desc",
                [{
                    rule: 'required'
                }], {
                    errorLabelCssClass: ["errorMsg"],
                });

            validator.onSuccess((e) => {
                e.preventDefault();

                // * Send the service description entered by Service Provider to server using JQuery request.
                $(document).on("submit", "#addServiceDescForm", function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    // const addServiceDescForm = document.querySelector("#addServiceDescForm");

                    const formData = new FormData(addServiceDescFormEl);
                    formData.append("req", "updateDesc");

                    $.ajax({
                        url: '../ajax-file/ajax.php',
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(resp) {
                            console.log(resp);
                            const serverResponse = JSON.parse(resp);
                            const {
                                status
                            } = serverResponse[0];

                            if (status == 200) {
                                Swal.fire({
                                    title: "Description Updated!",
                                    text: "Dear Service Provider! Your service description has been recorded successfully.",
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed == true) {
                                        $("#addServiceDescForm").addClass("hidden");
                                        $("#addServiceDescForm")[0].reset();
                                        showAllServiceSummaryOfServiceProvider();
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

                })

            })
        }

        // * <------------------------- End of script ------------------------->

        // * Sending request to open service charge modal to enter service charge by the Service Provider.
        $("body").on("click", "#serviceCharge", function(e) {
            e.preventDefault();

            const serviceIdHrefValue = $(this).attr("href");
            const splittedArray = serviceIdHrefValue.split("=");
            const serviceId = splittedArray[1];

            const addServiceChargeFormEl = $("#addServiceChargeForm");

            addServiceChargeFormEl.removeClass("hidden").addClass("transition duration-300 opacity-0");

            setInterval(() => {
                addServiceChargeFormEl.addClass("opacity-100")
            }, 100);

            $("#service-id-for-charge")[0].value = serviceId;
            // console.log($("#service-id-for-charge")[0].value);
        })

        // * Validation and Sending service charge info to server script.
        function sendingServiceChargeToServer() {

            const addServiceChargeFormEl = document.querySelector("#addServiceChargeForm");

            const validator = new window.JustValidate(addServiceChargeFormEl);

            validator.addField("#add-service-charge", [{
                    rule: 'required',
                },
                {
                    rule: 'number',
                },
                {
                    rule: 'minLength',
                    value: 2,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            })

            validator.onSuccess((e) => {
                e.preventDefault();

                $(document).on("submit", addServiceChargeFormEl, function(e) {
                    e.preventDefault();
                    e.stopImmediatePropagation();

                    const formData = new FormData(addServiceChargeFormEl);

                    formData.append("request", "updateServiceCharge");

                    $.ajax({
                        url: "../ajax-file/ajax.php",
                        type: "POST",
                        contentType: false,
                        processData: false,
                        data: formData,
                        success: function(response) {
                            // console.log(response);
                            const serverResp = JSON.parse(response)

                            console.log(serverResp);
                            const {
                                status,
                                amount
                            } =
                            serverResp[0];

                            if (status == 200) {
                                Swal.fire({
                                    title: "Service Charge Updated!",
                                    text: `Dear Service Provider! Your service charge Rs. ${amount} has been recorded successfully. You will receive an Email after successfull payment.`,
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed == true) {
                                        $("#addServiceChargeForm").addClass("hidden");
                                        $("#addServiceChargeForm")[0].reset();
                                        showAllServiceSummaryOfServiceProvider();
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
                })
            })
        }
    });
</script>