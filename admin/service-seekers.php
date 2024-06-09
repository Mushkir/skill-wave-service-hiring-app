<div class="w-[950px] overflow-x-scroll" id="ss-table-container">
    <!-- <table class="[&>tbody>*:nth-child(even)]:bg-[#99767B] table border-2 border-[#6D2932] w-full text-center table-auto" id="ss-table">
        <thead>
            <tr class="bg-[#6D2932] text-[#F9F6EE] text-center">
                <th class="p-3 text-center">S.No</th>
                <th class="p-3 text-center">Service Seeker ID</th>
                <th class="p-3 text-center">Image</th>
                <th class="p-3 text-center">Name</th>
                <th class="p-3 text-center">Email Address</th>
                <th class="p-3 text-center">Contact No.</th>
                <th class="p-3 text-center">Username</th>
                <th class="p-3 text-center">Gender</th>
                <th class="p-3 text-center">Address</th>
                <th class="p-3 text-center">City</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-3 text-center">S.No</td>
                <td class="p-3 text-center">Service Provider ID</td>
                <td class="p-3 text-center">Image</td>
                <td class="p-3 text-center">Name</td>
                <td class="p-3 text-center">Email Address</td>
                <td class="p-3 text-center">Contact No.</td>
                <td class="p-3 text-center">Username</td>
                <td class="p-3 text-center">Gender</td>
                <td class="p-3 text-center">Address</td>
                <td class="p-3 text-center">Town</td>
                <td class="p-3 text-center">
                    <div class="flex justify-center gap-x-4 items-center">
                        <a href="#" class=" hover:-translate-y-1 hover:transition 500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M21.194 2.806a2.753 2.753 0 0 1 0 3.893l-.496.496a4.61 4.61 0 0 1-.533-.151a5.19 5.19 0 0 1-1.968-1.241a5.19 5.19 0 0 1-1.241-1.968a4.613 4.613 0 0 1-.15-.533l.495-.496a2.753 2.753 0 0 1 3.893 0M14.58 13.313c-.404.404-.606.606-.829.78a4.59 4.59 0 0 1-.848.524c-.255.121-.526.211-1.068.392l-2.858.953a.742.742 0 0 1-.939-.94l.953-2.857c.18-.542.27-.813.392-1.068c.144-.301.32-.586.524-.848c.174-.223.376-.425.78-.83l4.916-4.915a6.7 6.7 0 0 0 1.533 2.36a6.702 6.702 0 0 0 2.36 1.533z" />
                                <path fill="currentColor" d="M20.536 20.536C22 19.07 22 16.714 22 12c0-1.548 0-2.842-.052-3.934l-6.362 6.362c-.351.352-.615.616-.912.847a6.08 6.08 0 0 1-1.125.696c-.34.162-.694.28-1.166.437l-2.932.977a2.242 2.242 0 0 1-2.836-2.836l.977-2.932c.157-.472.275-.826.437-1.166c.19-.399.424-.776.696-1.125c.231-.297.495-.56.847-.912l6.362-6.362C14.842 2 13.548 2 12 2C7.286 2 4.929 2 3.464 3.464C2 4.93 2 7.286 2 12c0 4.714 0 7.071 1.464 8.535C4.93 22 7.286 22 12 22c4.714 0 7.071 0 8.535-1.465" />
                            </svg>
                        </a>
                        <a href="#" class=" hover:-translate-y-1 hover:transition 500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 6.524c0-.395.327-.714.73-.714h4.788c.006-.842.098-1.995.932-2.793A3.68 3.68 0 0 1 12 2a3.68 3.68 0 0 1 2.55 1.017c.834.798.926 1.951.932 2.793h4.788c.403 0 .73.32.73.714a.722.722 0 0 1-.73.714H3.73A.722.722 0 0 1 3 6.524M11.607 22h.787c2.707 0 4.06 0 4.94-.863c.881-.863.971-2.28 1.151-5.111l.26-4.08c.098-1.537.146-2.306-.295-2.792c-.442-.487-1.187-.487-2.679-.487H8.23c-1.491 0-2.237 0-2.679.487c-.441.486-.392 1.255-.295 2.791l.26 4.08c.18 2.833.27 4.249 1.15 5.112C7.545 22 8.9 22 11.607 22" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>

        </tbody>

    </table> -->
    <img src="" alt="">
</div>

<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- JQuery Script -->
<script>
    $(document).ready(function() {

        $("#ss-table").DataTable({
            order: [
                [2, "asc"]
            ]
        });

        showAllSsInAdminPanel();

        function showAllSsInAdminPanel() {
            $.ajax({
                url: '../ajax-file/ajax.php',
                type: 'POST',
                data: {
                    "request": 'showAllSsInAdminPanel'
                },
                success: function(response) {

                    // console.log(response);
                    $("#ss-table-container").html(response)
                    $("#ss-table").DataTable({
                        order: [
                            [2, "asc"]
                        ]
                    });

                },
                error: function(xhr, status, error) {

                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                    console.error("Error: " + error);
                }
            })
        }

        // * Navigate to Update Page
        $("body").on('click', '#update-ss-btn', function(e) {

            e.preventDefault();
            const ssId = $(this).attr("href")

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "px-5 py-2 rounded-md bg-green-600 text-white",
                    cancelButton: "px-5 py-2 rounded-md bg-red-500 me-4 text-white"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: `Dear Admin! Are you sure to update ID No. ${ssId}?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    window.location.href = `/skill-wave-service-hiring-app/admin/edit-service-seeker.php?serviceSeekerId=${ssId}`;

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        icon: "error"
                    });
                }
            });


        })


        $("body").on("click", "#delete-ss-btn", function(e) {
            e.preventDefault();

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "px-5 py-2 rounded-md bg-green-600 text-white",
                    cancelButton: "px-5 py-2 rounded-md bg-red-500 me-4 text-white"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const ssId = $(this).attr("href")
                    $.ajax({
                        url: '../ajax-file/ajax.php',
                        type: 'POST',
                        data: {
                            "request": "deleteSsByAdmin",
                            "ssId": ssId
                        },
                        success: function(response) {

                            console.log(response);
                            swalWithBootstrapButtons.fire({
                                title: "Deleted!",
                                text: `ID No. ${ssId} detail has been deleted successfully.`,
                                icon: "success"
                            });

                            showAllSsInAdminPanel();
                        },
                        error: function(xhr, status, error) {

                            console.log("Status: " + status);
                            console.log("XHR Response: " + xhr.responseText);
                            console.error("Error: " + error);
                        }
                    })

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error"
                    });
                }
            });

        })
    })
</script>