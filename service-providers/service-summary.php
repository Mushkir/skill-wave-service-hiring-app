<style>
    #cta:hover {
        transform: scale(1.05);
    }
</style>

<?php @session_start(); ?>

<div class="relative mb-5">
    <h3 class="text-center font-semibold text-xl text-gray-700">
        Dear Mushkir, here you can explore your whole service summary info.
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
                        title: "Are you sure!",
                        text: `Are you sure to proceed ${response}\'s request?`,
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, Confirm!"
                    }).then((result) => {
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
                                    // if (resp == 1) {
                                    //     $("#btnConfirm")[0].textContent = 'Accepted';
                                    // }
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
    })
</script>