<?php include('town-edit-modal.php'); ?>

<h3 class="mt-20 mb-5 text-center text-xl font-semibold text-[#6D2932]">
    Here you can explore currently available details of districts and town as well
    as can add new town info also
</h3>
<section class="flex items-start justify-between gap-10">
    <!-- Left -->
    <div class="w-full">
        <form action="" method="post" id="townAddingForm" class="bg-[#C7B7A3] rounded-lg p-5">
            <!-- District Select List -->
            <div class="mb-5">
                <label for="district-name" class="mb-2 block text-[#6D2932] font-semibold">District Name</label>
                <div>
                    <select name="district-name" id="district-name" class="p-2 rounded-lg w-full outline-none text-[#6D2932] bg-gray-200">

                    </select>
                </div>
            </div>

            <div class="mb-5">
                <label for="town-name" class="mb-2 block text-[#6D2932] font-semibold">Town Name</label>
                <div>
                    <input type="text" name="town-name" id="town-name" class="bg-gray-200 outline-none pl-3 p-2 rounded-lg w-full" placeholder="Enter the town name" required />
                </div>
            </div>

            <button class="bg-[#6D2932] px-5 py-2 rounded-lg text-[#F9F6EE] hover:bg-[#41181e]" id="addNewTownBtn">
                Add New Town
            </button>
        </form>
    </div>

    <!-- Right -->
    <div class="w-full" id="townInfoTableDiv">

    </div>
</section>

<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- DataTables CDN -->
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>

<!-- Validation code -->
<script>
    $(document).ready(function() {

        showDistricts();
        showAllTownInfo();
        showAllDistrictInTownEdit();

        // * Function for display all district name in Town section UI (<select></select>).
        function showDistricts() {
            $.ajax({

                url: '../ajax-file/ajax.php',
                type: 'POST',
                data: {
                    action: "showAllDistrictsName"
                },
                success: function(response) {
                    // console.log(response);
                    // * Need to inject the response in UI
                    $("#district-name").html(response)

                },
                error: function(xhr, status, error) {

                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })

        }

        // * Function for display all the details of Town in Table.
        function showAllTownInfo() {
            $.ajax({
                url: '../ajax-file/ajax.php',
                type: 'POST',
                data: {
                    request: "showAllTownInfo"
                },
                success: function(response) {

                    // console.log(response);
                    $("#townInfoTableDiv").html(response)
                    $("#townInfoTable").DataTable();
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })
        }

        function showAllDistrictInTownEdit() {
            $.ajax({
                url: '../ajax-file/ajax.php',
                data: {
                    "request": "showAllDistrictInTownEditForm"
                },
                type: 'POST',
                success: function(response) {

                    $("#update-district-name").html(response)

                },
                error: function(xhr, status, error) {

                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })
        }

        const townAddingFormEl = document.querySelector("#townAddingForm");
        const validator = new window.JustValidate(townAddingFormEl);

        validator.addField(
            "#district-name",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        validator.addField("#town-name",
            [{
                    rule: 'required'
                }, {
                    rule: "minLength",
                    value: 3,
                },
                {
                    rule: "maxLength",
                    value: 30,
                },

            ], {
                errorLabelCssClass: ["errorMsg"],
            })

        validator.onSuccess((e) => {
            e.preventDefault();

            // * Sending request to server to insert town detail.
            $(document).on("submit", townAddingFormEl, function(e) {
                e.preventDefault();
                e.stopImmediatePropagation(); // It will stop twice form submission.

                const formData = new FormData(townAddingFormEl);

                formData.append("request", "insertTownInfo");

                // * Ajax Code
                $.ajax({

                    url: '../ajax-file/ajax.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);
                        const townJsonData = JSON.parse(response);
                        const {
                            name
                        } =
                        townJsonData;

                        Swal.fire({

                            title: "New District.",
                            text: `Dear Admin! New town name (${name}) has been added successfully!`,
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $(townAddingFormEl)[0].reset();
                                showAllTownInfo();
                            }
                        })
                    },
                    error: function(xhr, status, error) {

                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                    }
                })
            })

        });

        // * Script for open the edit modal of Town
        $(document).on("click", "#editTownModal", function(e) {

            e.preventDefault();

            const editTownFormEl = $("#editTownForm")

            editTownFormEl.removeClass("hidden").addClass("transition duration-300 opacity-0")

            setInterval(() => {
                editTownFormEl.addClass("opacity-100")
            }, 100);

            // Sending request to update
            // Storyline
            // 1. Get the Id of the town
            const passedTownId = $(this).attr('href');

            // 2. Send the request to server to fetch data
            $.ajax({

                url: '../ajax-file/ajax.php',
                type: "GET",
                data: {
                    passedTownId: passedTownId
                },
                success: function(response) {

                    // console.log(response);
                    // 3. Get the data from server.
                    const townDataInJson = JSON.parse(response)
                    // console.log(townDataInJson);

                    const {
                        town_id,
                        name,
                        district_id,
                        district_name
                    } = townDataInJson

                    // 4. Get the district id and display in ui.
                    $("#editTownForm")[0][0].value = district_id
                    $("#editTownForm")[0][1][0].textContent = district_name;
                    $("#editTownForm")[0][1][0].value = district_id;
                    $("#update-town-name")[0].value = name;
                    $("#town-id")[0].value = town_id;
                },
                error: function(xhr, status, error) {

                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })
        })
    })
</script>

<!-- 
error: function(xhr, status, error) {

console.log("Status: " + status);
console.log("XHR Response: " + xhr.responseText);}
-->