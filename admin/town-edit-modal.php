<form method="post" class="h-screen w-screen z-50 backdrop-blur-sm absolute left-[50%] top-[40%] -translate-x-[50%] -translate-y-[50%] hidden" id="editTownForm">
    <div class=" w-full max-w-[500px] shadow-md rounded-lg px-8 pt-4 pb-8 mb-4 bg-[#6D2932] absolute left-[50%] top-[40%] -translate-x-[50%] -translate-y-[50%]">
        <div class="flex items-center justify-between">
            <h4 class="text-white font-bold text-lg mb-3">Edit town info</h4>

            <i class="fa-solid fa-x text-[#C7B7A3] hover:text-white cursor-pointer" onclick="closeModal()"></i>
        </div>

        <hr>

        <!-- District Details -->
        <div class="mb-4 mt-5">
            <input type="hidden" name="update-district-id" id="update-district-id">
            <label class="block text-[#e3dbd1] mb-2" for="update-district-name">
                District
            </label>
            <select class="border rounded-lg outline-none w-full py-2 px-3 text-gray-700 leading-tight bg-gray-200" id="update-district-name" name="update-district-name">
                <option value=""></option>
            </select>
        </div>

        <!-- Town Name -->
        <div class="mb-5">
            <input type="hidden" name="town-id" id="town-id">
            <label for="update-town-name" class="block text-[#e3dbd1] mb-2">Town Name</label>
            <div>
                <input type="text" name="update-town-name" id="update-town-name" class="shadow appearance-none border rounded-lg outline-none w-full py-2 px-3 text-gray-700 leading-tight bg-gray-200">
            </div>

        </div>

        <div class="flex items-center justify-end gap-5 pt-4">
            <button class="bg-[#C7B7A3] text-[#6D2932] py-2 px-5 rounded-lg hover:bg-[#b3a492] hover:transition 500" id="updateDistrict">
                Save
            </button>

            <button type="button" id="closeBtn" class="border-2 text-[#C7B7A3] border-[#C7B7A3] px-5 py-1.5 rounded-lg hover:bg-[#C7B7A3] hover:text-[#6D2932] hover:transition 500" onclick="closeModal()">Close</button>
        </div>
    </div>
</form>


<!-- Function for close the edit district form -->
<script>
    function closeModal() {
        const editTownFormEl = document.querySelector("#editTownForm")

        editTownFormEl.classList.add("hidden");
    }
</script>