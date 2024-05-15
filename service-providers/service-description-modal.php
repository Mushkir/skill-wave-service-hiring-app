<?php @session_start(); ?>

<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

<form method="post" class="h-screen w-screen z-50 backdrop-blur-sm absolute left-[50%] top-[40%] -translate-x-[50%] -translate-y-[50%] hidden" id="addServiceDescForm">
    <div class=" w-full max-w-[500px] shadow-md rounded-lg px-8 pt-4 pb-8 mb-4 bg-gray-400 absolute left-[50%] top-[40%] -translate-x-[50%] -translate-y-[50%]">
        <div class="flex items-center justify-between">
            <h4 class=" text-gray-800 font-bold text-lg mb-3">Add service description</h4>

            <i class="fa-solid fa-x text-gray-800 hover:text-white cursor-pointer" onclick="closeModal()"></i>
        </div>

        <hr>
        <!-- Town Name -->
        <div class="mt-5 mb-5">
            <input type="hidden" name="service-id" id="service-id">
            <label for="add-service-desc" class="block text-gray-800 mb-2">Service Description<span class="text-red-500">*</span></label>
            <div>
                <textarea class=" bg-gray-200 w-full rounded-md p-3 outline-none" rows="10" name="add-service-desc" id="add-service-desc" placeholder="Enter the service description..."></textarea>
            </div>

        </div>

        <div class="flex items-center justify-end gap-5 pt-4">
            <button class=" bg-gray-800 text-gray-300 py-2 px-5 rounded-lg hover:bg-gray-700 hover:transition 500" id="updateDistrict">
                Save
            </button>

            <button type="button" id="closeBtn" class="border-2 text-gray-800 border-gray-800 px-5 py-1.5 rounded-lg hover:bg-gray-800 hover:text-gray-200 hover:transition 500" onclick="closeModal()">Close</button>
        </div>
    </div>
</form>

<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Function for close the edit district form -->
<script>
    function closeModal() {
        const editTownFormEl = document.querySelector("#addServiceDescForm")

        editTownFormEl.classList.add("hidden");
    }
</script>