<?php @session_start(); ?>

<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

<form method="post" class="h-screen w-screen z-50 backdrop-blur-sm absolute left-[50%] top-[40%] -translate-x-[50%] -translate-y-[50%] hidden" id="addServiceChargeForm">
    <div class=" w-full max-w-[500px] shadow-md rounded-lg px-8 pt-4 pb-8 mb-4 bg-gray-400 absolute left-[50%] top-[40%] -translate-x-[50%] -translate-y-[50%]">
        <div class="flex items-center justify-between">
            <h4 class=" text-gray-800 font-bold text-lg mb-3">Add service charge</h4>

            <i class="fa-solid fa-x text-gray-800 hover:text-white cursor-pointer" onclick="closeModal()"></i>
        </div>

        <hr>
        <!-- Town Name -->
        <div class="mt-5 mb-5">
            <input type="hidden" name="service-id-for-charge" id="service-id-for-charge">
            <label for="add-service-charge" class="block text-gray-800 mb-2">Service Charge Amount<span class="text-red-500">*</span></label>
            <div>
                <input type="text" id="add-service-charge" name="add-service-charge" class="p-2 rounded-md outline-none w-full bg-gray-200" placeholder="Ex: 500, 800...">
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
        const addServiceChargeFormEl = document.querySelector("#addServiceChargeForm")

        addServiceChargeFormEl.classList.add("hidden");
    }
</script>