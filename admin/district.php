<?php include('district-edit-modal.php'); ?>

<h3 class="mt-20 mb-5 text-center text-xl font-semibold text-[#6D2932]">
    Here you can explore currently available district details as well as can add
    new district info also
</h3>

<section class="flex items-start justify-between gap-10">
    <!-- Left -->
    <div class="w-full">
        <form action="" method="post" id="districtAddingForm" class="bg-primary-color-10 rounded-lg p-5">
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

        function closeModal() {
            console.log("Closemodal");
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

        validator.onSuccess((e) => {

            e.preventDefault();

            // JQuery code to send the request to server
            $("#insertDistrict").click(function(e) {

                e.preventDefault();

                const formData = new FormData(districtAddingFormEl);

                formData.append("action", "addNewDistrictInfo")

                $.ajax({
                    url: '../ajax-file/ajax.php',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
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

        $(document).on("click", "#editFormModal", function(e) {

            e.preventDefault();
            const editDistrictForm = $("#editDistrictForm");

            editDistrictForm.removeClass("hidden").addClass("transition duration-300 opacity-0");

            // Wait for a moment to allow the transition to take effect
            setTimeout(function() {
                // Add class to smoothly transition the opacity
                editDistrictForm.addClass("opacity-100");
            }, 100);
        })

        // $("#closeBtn").click(function(e) {

        //     e.preventDefault();

        //     closeModal();
        // })
    })
</script>