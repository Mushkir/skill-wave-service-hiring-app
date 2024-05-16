<style>
    #cta:hover {
        transform: scale(1.05);
    }
</style>

<?php @session_start();
include('service-description-modal.php');
include('service-charge-modal.php');
?>

<div id="main-container">
    <div class="mb-5">
        <h3 class="text-center font-semibold text-xl text-gray-700">
            Dear <?php echo $_SESSION['serviceProviderName']; ?>, here you can explore your whole service summary info.
        </h3>
        <div class="bg-[#6D2932] w-10 h-[3px] rounded-full mx-auto mt-2"></div>
    </div>

    <div class="summaryTableContainer  max-w-[950px] overflow-x-scroll">

    </div>
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

        // * Function for check and change the service provider state based on their current state.
        checkAndChangeServiceProviderState();

        function checkAndChangeServiceProviderState() {
            $.ajax({
                url: '../ajax-file/ajax.php',
                type: 'POST',
                data: {
                    "request": "checkUserState"
                },
                success: function(response) {
                    // console.log(response);
                    if (response == 0) {

                        $("#btnChangeState").html(`<div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                <path fill="currentColor" d="M5 6a4 4 0 1 1 8 0a4 4 0 0 1-8 0m-3 7c0-1.113.903-2 2.009-2h6.248A5.48 5.48 0 0 0 9 14.5c0 1.303.453 2.5 1.21 3.443Q9.617 18 9 18c-1.855 0-3.583-.386-4.865-1.203C2.833 15.967 2 14.69 2 13m17 1.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-2.146-1.854a.5.5 0 0 0-.708 0L13.5 15.293l-.646-.647a.5.5 0 0 0-.708.708l1 1a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0 0-.708" />
                                            </svg>
                                        </div>

                                        <p id="stateText">Change to Available state</p>`)

                        $("#stateIndicator")[0].classList.remove("bg-green-500");
                        $("#stateIndicator")[0].classList.add("bg-red-500");

                    } else {

                        $("#btnChangeState").html(`<div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M12 19.75A7.75 7.75 0 0 1 4.25 12h-2.5c0 5.66 4.59 10.25 10.25 10.25zm0-15.5A7.75 7.75 0 0 1 19.75 12h2.5c0-5.661-4.59-10.25-10.25-10.25zM4.25 12c0-2.14.866-4.076 2.27-5.48L4.752 4.752A10.222 10.222 0 0 0 1.75 12zm2.27-5.48A7.722 7.722 0 0 1 12 4.25v-2.5c-2.83 0-5.394 1.149-7.248 3.002zm-1.768 0L17.48 19.248l1.768-1.768L6.52 4.752zM19.75 12c0 2.14-.866 4.076-2.27 5.48l1.768 1.768A10.221 10.221 0 0 0 22.25 12zm-2.27 5.48A7.722 7.722 0 0 1 12 19.75v2.5c2.83 0 5.394-1.149 7.248-3.002z" />
                                            </svg>
                                        </div>

                                        <p id="stateText">Change to Busy state</p>`)

                        $("#stateIndicator")[0].classList.remove("bg-red-500");
                        $("#stateIndicator")[0].classList.add("bg-green-500");
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                    console.log("Error: " + error);
                }
            })
        }

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
                beforeSend: function() {
                    // $("#main-container").html(`<div class="flex justify-center items-center mt-[270px]"><img src="../assets/img/loading-menu.gif" class="w-28 h-28 object-cover " /></div>`)
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
                                beforeSend: function() {
                                    // $("#main-container").html(`<div class="flex justify-center items-center mt-[270px]"><img src="../assets/img/loading-menu.gif" class="w-20 h-20 object-cover " /></div>`)
                                },
                                success: function(resp) {
                                    // console.log(resp);
                                    if (resp == 1) {
                                        showAllServiceSummaryOfServiceProvider();
                                        checkAndChangeServiceProviderState();
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

        // * Function for open the modal for Add service description.
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
                            console.log(response);
                            const serverResp = JSON.parse(response)

                            // console.log(serverResp);
                            const {
                                status,
                                amount
                            } =
                            serverResp[0];

                            if (status == 200) {
                                Swal.fire({
                                    title: "Service Charge Updated!",
                                    text: `Dear Service Provider! Your service charge Rs. ${amount} has been recorded successfully and your status changed as Available. You will receive an Email after successfull payment.`,
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed == true) {
                                        $("#addServiceChargeForm").addClass("hidden");
                                        $("#addServiceChargeForm")[0].reset();
                                        showAllServiceSummaryOfServiceProvider();
                                        checkAndChangeServiceProviderState();
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