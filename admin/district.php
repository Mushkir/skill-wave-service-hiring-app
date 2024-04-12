<?php include('district-edit-modal.php'); ?>

<h3 class="mt-20 mb-5 text-center text-xl font-semibold text-[#6D2932]">
    Here you can explore currently available district details as well as can add
    new district info also
</h3>

<section class="flex items-start justify-between gap-10">
    <!-- Left -->
    <div class="w-full">
        <form action="" method="post" onsubmit="return false" id="districtAddingForm" class="bg-primary-color-10 rounded-lg p-5">
            <div class="mb-5">
                <label for="district-name" class="mb-2 block text-[#6D2932] font-semibold">District Name</label>
                <div>
                    <input type="text" name="district-name" id="district-name" class="bg-gray-200 outline-none pl-3 p-2 rounded-lg w-full" placeholder="Enter the district name" required />
                </div>
            </div>


            <button class="bg-[#6D2932] px-5 py-2 rounded-lg text-[#F9F6EE] hover:bg-[#41181e]" id="insertDistrict">
                Add New District
            </button>
        </form>
    </div>

    <!-- Right -->
    <div class="w-full" id="displayDistrictsDiv">

    </div>


</section>

<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- DataTables CDN -->
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

<!-- JQuery script -->
<script>
    $(document).ready(function() {

        showAllDistricts();

        function showAllDistricts() {
            $.ajax({
                url: '../ajax-file/ajax.php',
                type: 'POST',
                data: {
                    action: "showAllDistrict"
                },
                success: function(respone) {
                    // console.log(respone);

                    $("#displayDistrictsDiv").html(respone);
                    $("#district-list").DataTable({
                        order: [
                            [1, 'asc']
                        ]
                    });
                },
                error: function(xhr, status, error) {

                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })

        }

        // * Form validation script
        const districtAddingFormEl = document.querySelector("#districtAddingForm");
        const validator = new window.JustValidate(districtAddingFormEl);

        validator.addField(
            "#district-name",
            [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 3,
                },
                {
                    rule: "maxLength",
                    value: 30,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        validator.onSuccess((event) => {
            event.preventDefault();

            // JQuery code to send the request to server
            $(document).on("submit", "#districtAddingForm", function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                const formData = new FormData(this);

                formData.append("action", "addNewDistrictInfo")

                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function(request) {
                        // console.log(request);
                    },
                    success: function(response) {
                        const districtJsonData = JSON.parse(response);
                        const {
                            name
                        } = districtJsonData

                        console.log(name);
                        Swal.fire({

                            title: "New District.",
                            text: `Dear Admin! New district name (${name}) has been added successfully!`,
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                showAllDistricts();
                                $(districtAddingFormEl)[0].reset();
                            }
                        })

                    },
                    error: function(xhr, status, error) {

                        console.log(`Status: ${status}`);
                        console.log(`Response: ${xhr.responseText}`);
                    }
                })
            })
        });

        // * Script for display the Edit District modal, when admin click the Edit (Pen icon) button in District Page.
        $(document).on("click", "#editFormModal", function(e) {

            e.preventDefault();

            const editDistrictFormEl = $("#editDistrictForm");

            editDistrictFormEl.removeClass("hidden").addClass("transition duration-300 opacity-0");

            // Wait for a moment to allow the transition to take effect
            setTimeout(function() {
                // Add class to smoothly transition the opacity
                editDistrictFormEl.addClass("opacity-100");
            }, 100);

            // <------------------------ JQuery request to display district detail in UI ------------------------>
            // * Storyline
            // 1. GET the district id
            const passedDistrictID = $(this).attr('href');

            // 2. Send the request to server to get the data of recieved id.
            $.ajax({

                url: '../ajax-file/ajax.php',
                type: 'GET',
                data: {
                    districtID: passedDistrictID
                },
                success: function(response) {
                    // 3. Get the response (data) from server.

                    const districtJsonInfo = JSON.parse(response);

                    const {
                        district_id,
                        name
                    } = districtJsonInfo;

                    // 4. Injetct the result to UI.
                    $("#district-id")[0].value = district_id;
                    $("#districtName")[0].value = name;
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })
        })

        // Update district JQuery script
        $("#updateDistrict").click(function(e) {

            e.preventDefault();

            const editDistrictFormEl = $("#editDistrictForm").serialize();

            // Sending ajax request
            $.ajax({
                url: '../ajax-file/ajax.php',
                type: 'POST',
                data: editDistrictFormEl + "&action=updateDistrictName",
                success: function(response) {
                    Swal.fire({
                        title: "Are you sure to update?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, update it!"
                    }).then((result) => {
                        if (result.isConfirmed) {

                            const updatedDistrictInfo = JSON.parse(response);
                            // console.log(response);
                            const {
                                district_id,
                                name
                            } =
                            updatedDistrictInfo;

                            Swal.fire({
                                title: "Updated!",
                                text: `The District ID No. ${district_id} name has been successfully updated as '${name}'`,
                                icon: "success",
                            });

                            showAllDistricts();
                            $("#editDistrictForm").addClass("hidden")
                            $("#editDistrictForm")[0].reset();
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })

        })

        // Delete district JQuery script
        $(document).on("click", "#deleteBtn", function(e) {

            e.preventDefault();
            const passedDistrictID = $(this).attr("href");

            $.ajax({
                url: '../ajax-file/ajax.php',
                type: 'GET',
                data: {
                    passedDistrictID: passedDistrictID
                },
                success: function(response) {
                    // console.log(response);

                    const districtJsonInfo = JSON.parse(response);

                    const {
                        district_id,
                        name
                    } = districtJsonInfo;

                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "bg-blue-500 px-5 py-2 rounded text-white mr-5 hover:bg-blue-600 hover:transition 500",
                            cancelButton: "bg-red-500 px-5 py-2 rounded text-white mr-5 hover:bg-red-600 hover:transition 500"
                        },
                        buttonsStyling: false
                    });
                    swalWithBootstrapButtons.fire({
                        title: `Are you sure you want to delete ${name} district with the ID number ${district_id}`,
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {

                            $.ajax({
                                url: '../ajax-file/ajax.php',
                                type: "GET",
                                data: {
                                    passedDistrictID: passedDistrictID,
                                    deleteConfimation: true // If user clicks Yes, the only delete process will proceed.
                                },
                                success: function(resp) {
                                    // console.log("Resp: " + resp);

                                    swalWithBootstrapButtons.fire({
                                        title: "Deleted!",
                                        text: `${name} district has been deleted from the database.`,
                                        icon: "success"
                                    });
                                    showAllDistricts();
                                },
                                error: function(xhr, status, error) {
                                    console.log("Status: " + status);
                                    console.log("XHR Response: " + xhr.responseText);
                                }
                            })

                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire({
                                title: "Cancelled",
                                text: "Your file is safe :)",
                                icon: "error"
                            });
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })
        })
    })
</script>