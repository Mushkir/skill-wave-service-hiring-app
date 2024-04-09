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

            <button class="bg-[#6D2932] px-5 py-2 rounded-lg text-[#F9F6EE] hover:bg-[#41181e]">
                Add New District
            </button>
        </form>
    </div>

    <!-- Right -->
    <div class="w-full">
        <table class="[&>tbody>*:nth-child(even)]:bg-[#99767B] table border-2 border-[#6D2932] w-full text-center table-auto">
            <thead>
                <tr class="bg-[#6D2932] text-[#F9F6EE]">
                    <th class="p-3">S.No</th>
                    <th class="p-3">ID</th>
                    <th class="p-3">District Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td>Ampara</td>
                </tr>
                <tr>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td>Ampara</td>
                </tr>
                <tr>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td>Ampara</td>
                </tr>
                <tr>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td>Ampara</td>
                </tr>
                <tr>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td class=" border-r-[#6D2932] border-r-2">1</td>
                    <td>Ampara</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>


<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- JQuery script -->
<script>
    $(document).ready(function() {

        // console.dir(document);

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
            $(document).on("submit", districtAddingFormEl, function(e) {

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

                        console.log(response);

                        console.log(JSON.parse(response));


                    },
                    error: function(xhr, status, error) {

                        console.log(`Status: ${status}`);
                        console.log(`Response: ${xhr.responseText}`);
                    }
                })
            })
        });

    })
</script>