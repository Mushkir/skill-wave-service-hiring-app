<div class="flex items-center justify-between gap-10">
    <!-- Service Providers Card -->
    <div class="bg-gradient-to-r from-[#6D2932] to-[#41181e] w-full h-[200px] rounded-lg p-5">
        <span class="text-gray-300 block mt-3">Total Earnings</span>
        <h3 class="text-3xl mt-3 text-white">
            <span class="tracking-wide">LKR. 20000.00</span>
        </h3>
    </div>

    <!-- Total District and Town -->
    <div class="rounded-lg border-4 border-[#C7B7A3] p-5 w-full">
        <strong class="text-[#41181e] text-lg">Currently available districts and town info:</strong>

        <div class="flex items-center justify-between gap-4">
            <!-- District -->
            <div class="bg-[#C7B7A3] p-5 mt-4 rounded-lg w-full">
                <span class="text-[#6D2932] block mt-3">Districts</span>
                <h3 class="text-3xl mt-3 text-[#41181e]">10</h3>
            </div>

            <!-- Town -->
            <div class="bg-[#C7B7A3] p-5 mt-4 rounded-lg w-full">
                <span class="text-[#6D2932] block mt-3">Town</span>
                <h3 class="text-3xl mt-3 text-[#41181e]">10</h3>
            </div>
        </div>
    </div>
</div>

<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- JQuery Script -->
<script>
    $(document).ready(function() {
        showNewRequestNotification();

        // * Function for show new SP signup notification to admin while login
        function showNewRequestNotification() {
            $.ajax({
                url: '../ajax-file/ajax.php',
                type: 'POST',
                data: {
                    "request": "notifyNewRequest"
                },
                success: function(response) {
                    if (response > 0) {
                        response < 9 ? newNumberFormat = `0${response}` : newNumberFormat = response;

                        Swal.fire({
                            title: "New Service Provider Request",
                            text: `Dear Admin! You have ${newNumberFormat} pending request.`,
                            icon: "info"
                        }).then((result) => {
                            console.log(result);
                            if (result.isConfirmed == true) {
                                window.location.href = "/skill-wave-service-hiring-app/admin/dashboard.php?requests";
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })
        }
    })
</script>