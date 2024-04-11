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
                    <select name="district-name" id="district-name" class="p-2 rounded-lg w-full outline-none text-[#6D2932]">
                        <!-- <option value="">Select the district</option> -->
                        <!-- <option value="">Ampara</option>
                        <option value="">Ampara</option>
                        <option value="">Ampara</option> -->
                    </select>
                </div>
            </div>

            <div class="mb-5">
                <label for="town-name" class="mb-2 block text-[#6D2932] font-semibold">Town Name</label>
                <div>
                    <input type="text" name="town-name" id="town-name" class="bg-gray-200 outline-none pl-3 p-2 rounded-lg w-full" placeholder="Enter the town name" required />
                </div>
            </div>

            <button class="bg-[#6D2932] px-5 py-2 rounded-lg text-[#F9F6EE] hover:bg-[#41181e]">
                Add New Town
            </button>
        </form>
    </div>

    <!-- Right -->
    <div class="w-full">
        <table class="[&>tbody>*:nth-child(even)]:bg-[#99767B] table border-2 border-[#6D2932] w-full text-center table-auto" id="townInfoTable">
            <thead>
                <tr class="bg-[#6D2932] text-[#F9F6EE]">
                    <th class="p-3 text-center">S.No</th>
                    <th class="p-3 text-center">District ID</th>
                    <th class="p-3 text-center">District Name</th>
                    <th class="p-3 text-center">Town ID</th>
                    <th class="p-3 text-center">Town Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">Ampara</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td>Nintavur</td>
                </tr>
                <tr>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">Ampara</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td>Nintavur</td>
                </tr>
                <tr>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">Ampara</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td>Nintavur</td>
                </tr>
                <tr>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">Ampara</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td>Nintavur</td>
                </tr>
            </tbody>
        </table>
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

        $("#townInfoTable").DataTable();

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




        });

    })
</script>