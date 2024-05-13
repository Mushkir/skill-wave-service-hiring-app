<!-- Service Seeker -->
<h4></h4>
<form action="" class="bg-gray-300 mt-10 px-3 py-5 sm:p-10 rounded-md" enctype="multipart/form-data" id="serviceSeekersSignUpForm">
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
                <input type="tel" name="ss-contact-no" id="ss-contact-no" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: +94777195282" required />
            </div>
        </div>
    </div>

    <!-- Username, Password, Confirm Password -->
    <div class="sm:flex gap-x-10">
        <!-- Username -->
        <div class="w-full">
            <label for="ss-username" class="font-semibold text-cus-maron">Username<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <input type="text" name="ss-username" id="ss-username" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: mushkir_mohamed" required onkeyup="showCustomError()" />
                <span id="username-custom-error-el" class=" text-red-700 font-normal mt-2 hidden"></span>
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
            <label for="ss-image" class="font-semibold text-cus-maron">Upload File<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <input class="block w-full mt-2 rounded cursor-pointer focus:outline-none bg-white" id="ss-image" type="file" name="ss-image" />
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
    <div class="mt-10 sm:mt-5 w-full">
        <button class="w-full sm:w-52 text-white bg-primary-700 rounded px-5 py-2 text-center bg-cus-maron">
            Create Account
        </button>
    </div>

</form>

<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        const serviceSeekersSignUpFormEl = document.querySelector("#serviceSeekersSignUpForm");

        const validator = new window.JustValidate(serviceSeekersSignUpFormEl);

        // Name
        validator.addField(
            "#ss-fullname",
            [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 3,
                },
                {
                    rule: "maxLength",
                    value: 20,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Email
        validator.addField(
            "#ss-email",
            [{
                    rule: "required",
                },
                {
                    rule: "email",
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Contact No.
        validator.addField(
            "#ss-contact-no",
            [{
                    rule: "required",
                },
                {
                    rule: "number",
                },
                {
                    rule: "minLength",
                    value: 12,
                },
                {
                    rule: "maxLength",
                    value: 13,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Username
        validator.addField(
            "#ss-username",
            [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 3,
                },
                {
                    rule: "maxLength",
                    value: 15,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Password
        validator.addField(
            "#ss-password",
            [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 8,
                },
                {
                    rule: "maxLength",
                    value: 15,
                },
                {
                    rule: "strongPassword",
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Confirm Password
        validator.addField(
            "#ss-confirm-password",
            [{
                    rule: "required",
                },
                {
                    validator: (value, fields) => {
                        if (fields["#ss-password"] && fields["#ss-password"].elem) {
                            const repeatPasswordValue = fields["#ss-password"].elem.value;

                            return value === repeatPasswordValue;
                        }

                        return true;
                    },
                    errorMessage: "Passwords should be the same",
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Gender
        validator.addField(
            "#ss-gender",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Address line
        validator.addField(
            "#ss-address-line",
            [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 3,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // City
        validator.addField(
            "#ss-city",
            [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 3,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // File
        validator.addField(
            "#ss-image",
            [{
                    rule: "minFilesCount",
                    value: 1,
                },
                {
                    rule: "files",
                    value: {
                        files: {
                            extensions: ["jpeg", "jpg", "png"],
                            types: ["image/jpeg", "image/jpg", "image/png"],
                        },
                    },
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // NIC
        validator.addField(
            "#ss-id-card-no",
            [{
                    rule: "required",
                },
                {
                    rule: "number",
                },
                {
                    rule: "minLength",
                    value: 12,
                },
                {
                    rule: "maxLength",
                    value: 12,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        validator.onSuccess((e) => {
            e.preventDefault();

            // JQuery script to send request to signup
            $(document).on("submit", serviceSeekersSignUpFormEl, function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                const formData = new FormData(serviceSeekersSignUpFormEl);
                formData.append("request", "serviceSeekerSignUp");

                $.ajax({

                    url: './ajax-file/ajax.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response == '1111') {

                            Swal.fire({
                                title: "Username, Email, Contact No, and Identity card number exist!",
                                text: "We regret to inform you that the username, email, contact number, and identity card number are already taken. Kindly choose a different one. Thank you!",
                                icon: "error"
                            });

                        } else if (response == '1000') {

                            Swal.fire({
                                title: "Username and Email Exist!",
                                text: "We regret to inform you that the username and email are already taken. Kindly choose a different one. Thank you!",
                                icon: "error"
                            })

                        } else if (response == '0100') {

                            Swal.fire({
                                title: "Email Address Exist!",
                                text: "We regret to inform you that the email address is already taken. Kindly choose a different one. Thank you!",
                                icon: "error"
                            });

                        } else if (response == '0010') {

                            Swal.fire({
                                title: "Contact number Exist!",
                                text: "We regret to inform you that the Contact number is already taken. Kindly choose a different one. Thank you!",
                                icon: "error"
                            });

                        } else if (response == '0001') {

                            Swal.fire({
                                title: "Identity card number Exist!",
                                text: "We regret to inform you that the Identity card number is already taken. Kindly choose a different one. Thank you!",
                                icon: "error"
                            });
                        } else {

                            // const resp = response
                            // const JsonData = JSON.parse(resp);
                            // const {
                            //     name
                            // } = JsonData
                            Swal.fire({

                                title: "Account Created!",
                                text: `Dear Service Seeker! Your account has been created successfully!`,
                                icon: "success"
                            }).then((result) => {
                                if (result.isConfirmed) {

                                    $("#serviceSeekersSignUpForm")[0].reset();
                                    window.location.href = '../login.php';
                                }
                            })
                        }

                    },
                    error: function(xhr, status, error) {
                        console.log("Status: " + status);
                        console.log("XHR Response: " + xhr.responseText);
                    }
                })
            })
        })
    })
</script>