<h4></h4>
<form action="" class="bg-gray-300 mt-10 px-3 py-5 sm:p-10 rounded-md" enctype="multipart/form-data" id="serviceProvidersSignUpForm">
    <!-- Name, Email, Contact No -->
    <div class="sm:flex gap-x-10">
        <!-- Full Name -->
        <div class="w-full">
            <label for="sp-fullname" class="font-semibold text-cus-maron">Name<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <input type="text" name="sp-fullname" id="sp-fullname" class="font-normal w-full bg-white border-none rounded mt-2 outline-none capitalize" placeholder="Ex: Mohamed Mushkir" required />
            </div>
        </div>

        <!-- Email -->
        <div class="w-full">
            <label for="sp-email" class="font-semibold text-cus-maron">Email<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <input type="email" name="sp-email" id="sp-email" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: username@example.com" required />
            </div>
        </div>

        <!-- Contact No -->
        <div class="w-full">
            <label for="sp-contact-no" class="font-semibold text-cus-maron">Contact No.<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <input type="tel" name="sp-contact-no" id="sp-contact-no" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: +94 777195282 / +94777195282" required />
            </div>
        </div>
    </div>

    <!-- Username, Password, Confirm Password -->
    <div class="sm:flex gap-x-10">
        <!-- Username -->
        <div class="w-full">
            <label for="sp-username" class="font-semibold text-cus-maron">Username<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <input type="text" name="sp-username" id="sp-username" class="font-normal w-full bg-white border-none rounded mt-2 outline-none" placeholder="Ex: john_devil" required onkeyup="showCustomError()" />
                <span id="username-custom-error-el" class=" text-red-700 font-normal mt-2 hidden"></span>
            </div>
        </div>

        <!-- Password -->
        <div class="w-full">
            <label for="sp-password" class="font-semibold text-cus-maron">Password<span class="text-red-500">*</span></label>
            <div class="mb-5 mt-2 flex bg-white items-center justify-center rounded">
                <input type="password" name="sp-password" id="sp-password" class="font-normal w-full bg-white border-none rounded outline-none" placeholder="Enter your password" required />

                <!-- Eye Icon -->
                <button type="button" class="mr-3" id="eye-closed-icon">
                    <i class="fa-regular fa-eye-slash"></i>
                </button>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="w-full">
            <label for="sp-confirm-password" class="font-semibold text-cus-maron">Confirm Password<span class="text-red-500">*</span></label>
            <div class="mb-5 mt-2 flex bg-white items-center justify-center rounded">
                <input type="password" name="sp-confirm-password" id="sp-confirm-password" class="font-normal w-full bg-white border-none rounded outline-none" placeholder="Confirm password" required />

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
            <label for="sp-gender" class="font-semibold text-cus-maron">Gender<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <select name="sp-gender" id="sp-gender" class="w-full bg-white border-none rounded mt-2 outline-none px-5 py-2">
                    <option value="">Select your gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

        <!-- Address Line -->
        <div class="w-full">
            <label for="sp-addresp-line" class="font-semibold text-cus-maron">Address Line<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <input type="text" name="sp-addresp-line" id="sp-addresp-line" class="font-normal w-full bg-white border-none rounded mt-2 outline-none capitalize" placeholder="Ex: no. 246/a, meera nagar road" required />
            </div>
        </div>

        <!-- City -->
        <div class="w-full sm:flex items-center gap-8">
            <div class="w-full">
                <label for="sp-district" class="font-semibold text-cus-maron">District<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <select name="sp-district" id="sp-district" class="w-full bg-white border-none rounded mt-2 outline-none px-5 py-2">

                    </select>
                </div>
            </div>

            <div class="w-full">
                <label for="sp-town" class="font-semibold text-cus-maron">Town<span class="text-red-500">*</span></label>
                <div class="mb-5">
                    <select name="sp-town" id="sp-town" class="w-full bg-white border-none rounded mt-2 outline-none px-5 py-2">

                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Image, Qualifications, -->
    <div class="sm:flex gap-x-10">
        <!-- Qualification -->
        <div class="w-full">
            <label for="sp-qualification" class="font-semibold text-cus-maron">Qualifications<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <textarea name="sp-qualification" id="sp-qualification" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none" placeholder="Ex: MBBS, Engineer..."></textarea>
            </div>
        </div>

        <!-- Skills -->
        <div class="w-full">
            <label for="sp-skills" class="font-semibold text-cus-maron">Skills<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <textarea name="sp-skills" id="sp-skills" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none" placeholder="Ex: Mechanic, Plumber..."></textarea>
            </div>
        </div>

        <!-- Image -->
        <div class="w-full">
            <label for="file-input" class="font-semibold text-cus-maron">Upload File<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <input class="block w-full mt-2 rounded cursor-pointer focus:outline-none bg-white" id="file-input" type="file" name="file-input" />
            </div>
        </div>
    </div>

    <!-- Description, Keywords, Starting Price -->
    <div class="sm:flex gap-x-10">
        <!-- Description -->
        <div class="w-full">
            <label for="sp-desc" class="font-semibold text-cus-maron">Service Description<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <textarea name="sp-desc" id="sp-desc" rows="5" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none" placeholder="Ex: Puncturing, Oil Changing..."></textarea>
            </div>
        </div>

        <!-- Keywords -->
        <div class="w-full">
            <label for="sp-keywords" class="font-semibold text-cus-maron">Keywords<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <textarea name="sp-keywords" id="sp-keywords" rows="5" class="font-normal w-full bg-white border-none rounded mt-2 p-3 outline-none" placeholder="Ex: Puncture, Mechanic, Car Reparing, Oil Changing..."></textarea>
            </div>
        </div>

        <!-- Starting Price -->
        <div class="w-full">
            <label for="sp-starting-price" class="font-semibold text-cus-maron">Package Starting Price<span class="text-red-500">*</span></label>
            <div class="mb-5">
                <input class="font-normal w-full bg-white border-none rounded mt-2 outline-none" id="sp-starting-price" type="text" name="sp-starting-price" placeholder="Ex: 500.00" />
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="mt-5 w-full">
        <button class="w-full sm:w-52 text-white bg-primary-700 rounded px-5 py-2 text-center bg-cus-maron">
            Create Account
        </button>
    </div>
</form>

<!-- JQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- JQuery script -->
<script>
    $(document).ready(function() {

        listAllDistrict();
        listAllTownInfo();

        // * Show all district name in service provider signup form "District" select element.
        function listAllDistrict() {
            $.ajax({

                url: './ajax-file/ajax.php',
                data: {
                    "request": "listAllDistricts"
                },
                type: "POST",
                success: function(response) {
                    // console.log(response);
                    $("#sp-district").html(response);
                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })
        }

        // * Show all town name in service provider signup form "District" select element.
        function listAllTownInfo() {

            $.ajax({

                url: './ajax-file/ajax.php',
                type: 'POST',
                data: {
                    "request": "listAllTownInfo"
                },
                success: function(response) {
                    // console.log(response);
                    $("#sp-town").html(response);

                },
                error: function(xhr, status, error) {
                    console.log("Status: " + status);
                    console.log("XHR Response: " + xhr.responseText);
                }
            })
        }



        const serviceProvidersSignUpFormEl = document.querySelector("#serviceProvidersSignUpForm");
        const validator = new window.JustValidate("#serviceProvidersSignUpForm");

        // Name
        validator.addField(
            "#sp-fullname",
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
            "#sp-email",
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
            "#sp-contact-no",
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
            "#sp-username",
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
            "#sp-password",
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
            "#sp-confirm-password",
            [{
                    rule: "required",
                },
                {
                    validator: (value, fields) => {
                        if (fields["#sp-password"] && fields["#sp-password"].elem) {
                            const repeatPasswordValue = fields["#sp-password"].elem.value;

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
            "#sp-gender",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Address line
        validator.addField(
            "#sp-addresp-line",
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

        // District
        validator.addField(
            "#sp-district",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Town
        validator.addField(
            "#sp-town",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Qualification
        // validator.addField(
        //     "#sp-qualification",
        //     [{
        //             rule: "required",
        //         },
        //         {
        //             rule: "minLength",
        //             value: 3,
        //         },
        //         {
        //             rule: "maxLength",
        //             value: 20,
        //         },
        //     ], {
        //         errorLabelCssClass: ["errorMsg"],
        //     }
        // );

        // Skills
        validator.addField(
            "#sp-skills",
            [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 3,
                },
                {
                    rule: "maxLength",
                    value: 50,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // File
        validator.addField(
            "#file-input",
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

        // Description
        validator.addField(
            "#sp-desc",
            [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 3,
                },
                {
                    rule: "maxLength",
                    value: 500,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Keywords
        validator.addField(
            "#sp-keywords",
            [{
                    rule: "required",
                },
                {
                    rule: "minLength",
                    value: 3,
                },
                {
                    rule: "maxLength",
                    value: 500,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        // Starting Price
        validator.addField(
            "#sp-starting-price",
            [{
                    rule: "required",
                },
                {
                    rule: "number",
                },
                {
                    rule: "minLength",
                    value: 1,
                },
            ], {
                errorLabelCssClass: ["errorMsg"],
            }
        );

        validator.onSuccess((e) => {

                e.preventDefault()

                $(document).on("submit", serviceProvidersSignUpFormEl, function(e) {
                        e.preventDefault();
                        e.stopImmediatePropagation();

                        const formData = new FormData(serviceProvidersSignUpFormEl);
                        formData.append("request", "serviceProviderSignUp");

                        $.ajax({
                                url: './ajax-file/ajax.php',
                                type: 'POST',
                                processData: false,
                                contentType: false,
                                data: formData,
                                success: function(response) {
                                    // const serviceProviderJsonData = JSON.parse(response);
                                    console.log(response);
                                    if (response == "111") {
                                        Swal.fire({
                                            title: "Username, Email, and Contact number exist!",
                                            text: "We regret to inform you that the username, email, and contact number are already taken. Kindly choose a different one. Thank you!",
                                            icon: "error"
                                        });
                                    }

                                    if (response == "100") {
                                        Swal.fire({
                                            title: "Email Exist!",
                                            text: "We regret to inform you that the email address is already taken. Kindly choose a different one. Thank you!",
                                            icon: "error"
                                        })
                                    }

                                    if (response == "010") {
                                        Swal.fire({
                                            title: "Conact Number Exist!",
                                            text: "We regret to inform you that the contact number is already taken. Kindly choose a different one. Thank you!",
                                            icon: "error"
                                        })
                                    }

                                    if (response == "001") {
                                        Swal.fire({
                                            title: "Username Exist!",
                                            text: "We regret to inform you that the username is already taken. Kindly choose a different one. Thank you!",
                                            icon: "error"
                                        })
                                    }
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log("Status: " + status);
                                console.log("XHR Response: " + xhr.responseText);
                            }
                        }
                    )
                })
        });
    })
</script>