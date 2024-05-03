<?php @session_start(); ?>

<div class="relative mt-10 mb-5">
    <h3 class="text-center font-semibold text-xl text-[#6D2932]">
        Dear Mushkir, here yu can explore your whole service hiring info.
    </h3>
    <div class="bg-[#6D2932] w-10 h-[3px] rounded-full mx-auto mt-2"></div>
</div>
<div id="tableContainer" class=" flex items-center justify-center mt-20">
    <table class="table-auto mx-auto [&>tbody>*:nth-child(even)]:bg-[#99767B] table border-2 border-[#6D2932] w-full text-center">
        <thead>
            <tr class="bg-[#6D2932] text-white text-center">
                <th class="p-2 text-center">S.No</th>
                <th class="p-2 text-center">Service Provider ID</th>
                <th class="p-2 text-center">Service Provider Name</th>
                <th class="p-2 text-center">Service Description</th>
                <th class="p-2 text-center">Service Charge</th>
                <th class="p-2 text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-1 py-1.5 border-r-[#6D2932] border-r-2">1</td>
                <td class="px-1 py-1.5 border-r-[#6D2932] border-r-2">1</td>
                <td class="px-1 py-1.5 border-r-[#6D2932] border-r-2">Mushkir</td>
                <td class="px-1 py-1.5 border-r-[#6D2932] border-r-2">
                    Oil Changing , puncture
                </td>

                <td class="px-1 py-1.5 border-r-[#6D2932] border-r-2">Rs. 500</td>
                <td class="px-1 py-1.5 border-r-[#6D2932] border-r-2">
                    On Process
                </td>
            </tr>
        </tbody>
    </table>
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
                    $("#tableContainer").html('<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="#6D2932"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="currentColor" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>')
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