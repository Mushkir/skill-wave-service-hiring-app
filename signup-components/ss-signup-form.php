<body>
    <!-- Service Seeker -->
    <h4></h4>
    <form action="" class="bg-gray-300 mt-10 px-3 py-5 sm:p-10 rounded-md" enctype="multipart/form-data">
        <!-- Name, Email, Contact No -->
        <div class="sm:flex gap-x-10">
            <!-- Full Name -->
            <div class="w-full">
                <label for="ss-fullname" class="font-semibold text-cus-maron">Name<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <input type="text" name="ss-fullname" id="ss-fullname" class="font-normal w-full bg-white border-none rounded mt-2 outline-none capitalize" placeholder="Ex: Mohamed Mushkir" required />
                </div>
            </div>

            <!-- Email -->
            <div class="w-full">
                <label for="ss-email" class="font-semibold text-cus-maron">Email<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <input type="email" name="ss-email" id="ss-email" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: username@example.com" required />
                </div>
            </div>

            <!-- Contact No -->
            <div class="w-full">
                <label for="ss-contact-no" class="font-semibold text-cus-maron">Contact No.<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <input type="tel" name="ss-contact-no" id="ss-contact-no" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: +94 777195282" required />
                </div>
            </div>
        </div>

        <!-- Username, Password, Confirm Password -->
        <div class="sm:flex gap-x-10">
            <!-- Username -->
            <div class="w-full">
                <label for="ss-username" class="font-semibold text-cus-maron">Username<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <input type="text" name="ss-username" id="ss-username" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: @mushkir" required />
                </div>
            </div>

            <!-- Password -->
            <div class="w-full">
                <label for="ss-password" class="font-semibold text-cus-maron">Password<span class="text-red-500">*</span></label>
                <div class="mb-5 mt-2 flex bg-white items-center justify-center rounded">
                    <input type="password" name="ss-password" id="ss-password" class="font-normal w-full bg-white border-none rounded outline-none" placeholder="Enter your password" required />

                    <!-- Eye Icon -->
                    <button type="button" class="mr-3" id="eye-closed-icon">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="w-full">
                <label for="ss-confirm-password" class="font-semibold text-cus-maron">Confirm Password<span class="text-red-500">*</span></label>
                <div class="mb-5 mt-2 flex bg-white items-center justify-center rounded">
                    <input type="password" name="ss-confirm-password" id="ss-confirm-password" class="font-normal w-full bg-white border-none rounded outline-none" placeholder="Confirm password" required />

                    <!-- Eye Icon -->
                    <button type="button" class="mr-3" id="eye-closed-icon-conf">
                        <i class="fa-regular fa-eye-slash"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Gender, Address Line, City -->
        <div class="sm:flex gap-x-10">
            <!-- Gender -->
            <div class="w-full">
                <label for="ss-gender" class="font-semibold text-cus-maron">Gender<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <select name="ss-gender" id="ss-gender" class="w-full bg-white border-none rounded mt-2 outline-none px-5 py-2">
                        <option value="">Select your gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <!-- Address Line -->
            <div class="w-full">
                <label for="ss-address-line" class="font-semibold text-cus-maron">Address Line<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <input type="text" name="ss-address-line" id="ss-address-line" class="font-normal w-full bg-white border-none rounded mt-2 outline-none capitalize" placeholder="Ex: no. 246/a, meera nagar road" required />
                </div>
            </div>

            <!-- City -->
            <div class="w-full">
                <label for="ss-city" class="font-semibold text-cus-maron">City<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <input type="text" name="ss-city" id="ss-city" class="font-normal w-full bg-white border-none rounded mt-2 outline-none capitalize" placeholder="Ex: nintavur" required />
                </div>
            </div>
        </div>

        <!-- Image, ID Number -->
        <div class="sm:flex gap-x-10">
            <!-- Full Name -->
            <div class="w-full">
                <label for="file-input" class="font-semibold text-cus-maron">Upload File<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <input class="block w-full mt-2 rounded cursor-pointer focus:outline-none bg-white" id="file-input" type="file" name="file-input" />
                </div>
            </div>

            <!-- ID No -->
            <div class="w-full">
                <label for="ss-id-card-no" class="font-semibold text-cus-maron">NIC No.<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <input type="text" name="ss-id-card-no" id="ss-id-card-no" class="font-normal w-full bg-white border-none rounded mt-2" placeholder="Ex: 199631401505" required />
                </div>
            </div>
        </div>

        <!-- Modal toggle -->
        <div class="mt-5 w-full">
            <button id="successButton" data-modal-target="successModal" data-modal-toggle="successModal" class="w-full sm:w-52 text-white bg-primary-700 rounded px-5 py-2 text-center bg-cus-maron" type="submit">
                Create Account
            </button>
        </div>

        <!-- Main Model code need to write here -->
    </form>

    <!-- JS Code of Show & Hide Password -->
    <!-- <script src="../assets/js/ss-show-and-hide-password.script.js"></script> -->
</body>