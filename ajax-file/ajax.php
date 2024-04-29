<?php
// ! SP: Service Providers
// ! SS: Service Seekers
session_start();

require_once('../classes/common/Database.php');
require_once('../classes/app/Admin.php');
require_once('../classes/app/District.php');
require_once('../classes/app/Town.php');
require_once('../classes/app/ServiceSeeker.php');
require_once('../classes/app/ServiceProvide.php');

$db = new Database();
$admin = new Admin();
$district = new District();
$town = new Town();
$serviceSeeker = new ServiceSeeker();
$serviceProvider = new ServiceProvider();

// Todo: Admin Sign-Up process
if (isset($_POST['action']) && $_POST['action'] == 'signUpAdmin') {

    $adminNameEl = $_POST['admin-name'];
    $adminUsernameEl = $_POST['admin-username'];
    $adminPasswordEl = $_POST['password'];
    $adminEmailEl = $_POST['admin-email'];
    $adminProfileImgEl = $_FILES['admin-profile-image'];

    $encryptedPassword = password_hash($adminPasswordEl, PASSWORD_DEFAULT);

    $db = new Database();

    $adminProfileImg = $db->imageUpload($adminProfileImgEl);

    $admin = new Admin();

    $isAdminNameExist = $admin->countRows("username", $adminUsernameEl); // This method is checking does the username already exist or not in DB

    $isAdminEmailExist = $admin->countRows("email", $adminEmailEl); // This method is checking does the email already exist or not in DB

    $serverResponse;

    if ($isAdminNameExist > 0 && $isAdminEmailExist > 0) {

        $serverResponse = "11";
    } elseif ($isAdminNameExist > 0) {

        $serverResponse = "-1";
    } elseif ($isAdminEmailExist > 0) {

        $serverResponse = "0";
    } else {

        $serverResponse = "200";
    }

    echo $serverResponse;

    if ($serverResponse == "200") {

        $admin->addAdmin($adminNameEl, $adminUsernameEl, $encryptedPassword, $adminProfileImg, $adminEmailEl);
    }
}

// Todo: Admin Login Process
if (isset($_POST['action']) && $_POST['action'] == 'adminLoginRequest') {

    // Storyline
    // 1. Get the values from input elements
    $adminUsernameEl = $_POST['admin-username'];
    $adminPasswordEl = $_POST['password'];
    $serverResponse;

    // 2. Check if the name exist or not in Database.
    $admin = new Admin();

    // 3. If it is exists, it will return server response code as 200. Else it will return 404.
    $isAdminInfoExist = $admin->countRows("username", $adminUsernameEl);

    if ($isAdminInfoExist > 0) {

        $serverResponse = "200";
    } else {
        $serverResponse = "404";
    }

    echo $serverResponse;

    // 4. If the server response code 200; the username exist on DB. So now it need to check the password is correct or not.
    /*
    If the password matches with DB value it will return status code as 1, otherwise it will return 0. 
    If the status code ($statusCode) return 1 the alert message will show as successfully loggedin in client side.
    If the status code ($statusCode) return 0 the alert message will show as invalid password in client side.
    */
    if ($serverResponse == "200") {
        $arrayOfAdminData = $admin->getAdminByKeyAndValue("username", $adminUsernameEl);
        $statusCode;

        $adminUsername = $arrayOfAdminData['username'];
        $adminPassword = $arrayOfAdminData['password'];

        if (password_verify($adminPasswordEl, $adminPassword)) {
            $_SESSION['adminUsername'] = $adminUsername;
            $statusCode = "1";
        } else {
            $statusCode = "0";
        }

        echo $statusCode;
    }
}

// Todo: Admin Need to add district detail
if (isset($_POST['action']) && $_POST['action'] == 'addNewDistrictInfo') {

    $districtNameEl = $_POST['district-name'];

    $district = new District();

    $district->addDistrict($districtNameEl);
}

// Todo: Show all the district data
if (isset($_POST['action']) && $_POST['action'] == 'showAllDistrict') {

    $showDistrictsInTable = "";
    $serialNo = 1;

    $district = new District();

    $allDistrictInfo = $district->viewDistrict();
    $rowsOfTotalDistricts = $district->countRows();

    if ($rowsOfTotalDistricts > 0) {

        $showDistrictsInTable .= '<table class="[&>tbody>*:nth-child(even)]:bg-[#99767B] table border-2 border-[#6D2932] w-full text-center table-auto" id="district-list">
    <thead>
        <tr class="bg-[#6D2932] text-[#F9F6EE] text-center">
            <th class="p-3 text-center">S.No</th>
            <th class="p-3 text-center">ID</th>
            <th class="p-3 text-center">District Name</th>
            <th class="p-3 text-center">Actions</th>
        </tr>
    </thead>
    <tbody>';

        foreach ($allDistrictInfo as $arrayOfAllDistrict) {

            $districtID = $arrayOfAllDistrict['district_id'];
            $districtName = $arrayOfAllDistrict['name'];

            $showDistrictsInTable .= '<tr>
        <td class=" border-r-[#6D2932] border-r-2">' . '#' . $serialNo++ . '</td>
        <td class=" border-r-[#6D2932] border-r-2">' . $districtID . '</td>
        <td class="border-r-2 border-r-[#6D2932]">' . $districtName . '</td>
        <td class=" text-center">
            <a href="' . $districtID . '" title="Edit" id="editFormModal">
                <i class="fa-solid fa-pen-to-square mr-4 text-[#6D2932] hover:-translate-y-1 hover:transition 500"></i>
            </a>
            <a href="' . $districtID . '" title="Delete" id="deleteBtn">
                <i class="fa-solid fa-trash mr-4 text-[#41181e] hover:-translate-y-1 hover:transition 500"></i>
            </a>
        </td>
    </tr>';
        }

        $showDistrictsInTable .= '</tbody></table>';
    } else {

        $showDistrictsInTable .= "<h3 class='text-red-500 text-2xl text-center font-bold'>Currently no district details are available!</h3>";
        $showDistrictsInTable .= "<br>";
        $showDistrictsInTable .= "<img src='https://cdnl.iconscout.com/lottie/premium/thumb/empty-box-5708298-4748209.gif' class='w-[250px] h-[250px] object-cover mx-auto' alt=''>";
    }

    echo $showDistrictsInTable;
}

// Todo: Get the data of district_id, which recieved via $_GET[]
if (isset($_GET['districtID'])) {

    $passedDistrictId = $_GET['districtID'];

    // Get the data using id and getDistrictInfoById()
    $district = new District();

    $isDataExist = $district->getDistrictInfoById($passedDistrictId);

    // Sending the response to client in JSON String format.
    echo json_encode($isDataExist);
}

// Todo: Update the District Name 
if (isset($_POST['action']) && $_POST['action'] == 'updateDistrictName') {

    $districtId = $_POST["district-id"];
    $districtNameEl = $_POST["districtName"];

    $district = new District();

    $district->updateDistrict($districtId, $districtNameEl);
}

// Todo: Delete the seleted District
if (isset($_GET['passedDistrictID'])) {

    $passedDistrictId = $_GET['passedDistrictID'];

    $district = new District();

    $arrayOfDistrictInfo = $district->getDistrictInfoById($passedDistrictId);

    echo json_encode($arrayOfDistrictInfo);

    if (isset($_GET['deleteConfimation']) && $_GET['deleteConfimation'] == 'true') {

        $district->deleteDistrict($passedDistrictId);
    }
}

// Todo: Need to show all the district name in Town section <select></select>
if (isset($_POST['action']) && $_POST['action'] == 'showAllDistrictsName') {

    $output = "";

    $arrayOfAllDistrictInfo = $district->viewDistrict();

    $output .= '<option value="">Select the district</option>';

    foreach ($arrayOfAllDistrictInfo as $row) {

        $districtId = $row['district_id'];
        $districtName = $row['name'];

        $output .= '<option value="' . $districtId . '">' . $districtName . '</option>';
    }

    echo $output;
}

// Todo: Insert the Town details.
if (isset($_POST['request']) && $_POST['request'] == 'insertTownInfo') {

    $districtIdEl = $_POST['district-name'];

    $arrayOfDistrictInfo = $district->getDistrictInfoById($districtIdEl);

    $districtName = $arrayOfDistrictInfo['name'];

    $townNameEl = $_POST['town-name'];

    $town->addTown($townNameEl, $districtIdEl, $districtName);
}

// Todo: Need to show all the info of Town
if (isset($_POST['request']) && $_POST['request'] == 'showAllTownInfo') {

    // $query = "SELECT table_town.town_id, table_town.name 
    // AS town_name, table_town.district_id, table_district.name 
    // AS district_name FROM table_town 
    // LEFT JOIN table_district ON table_town.district_id = table_district.district_id";

    $serialNo = 1;

    $results = $town->viewAllTownData();

    $outputOfUI = "";

    $outputOfUI .= '<table class="[&>tbody>*:nth-child(even)]:bg-[#99767B] table border-2 border-[#6D2932] w-full text-center table-auto" id="townInfoTable">
    <thead>
        <tr class="bg-[#6D2932] text-[#F9F6EE]">
            <th class="p-3 text-center">S.No</th>
            <th class="p-3 text-center">Town ID</th>
            <th class="p-3 text-center">Town Name</th>
            <th class="p-3 text-center">District ID</th>
            <th class="p-3 text-center">District Name</th>
            <th class="p-3 text-center">Actions</th>
        </tr>
    </thead>
    <tbody>';

    foreach ($results as $arrayOfTownInfo) {

        $townId = $arrayOfTownInfo['town_id'];
        $townName = $arrayOfTownInfo['name'];
        $districtId = $arrayOfTownInfo['district_id'];
        $districtName = $arrayOfTownInfo['district_name'];

        $outputOfUI .= '<tr>
        <td class=" border-r-[#6D2932] border-r-2">#' . $serialNo++ . '</td>
        <td class=" border-r-[#6D2932] border-r-2">' . $townId . '</td>
        <td class=" border-r-[#6D2932] border-r-2">' . $townName  . '</td>
        <td class=" border-r-[#6D2932] border-r-2">' . $districtId . '</td>
        <td class="border-r-[#6D2932] border-r-2">' . $districtName . '</td>
        <td class=" text-center">
            <a href="' . $townId . '" title="Edit" id="editTownModal">
                <i class="fa-solid fa-pen-to-square mr-4 text-[#6D2932] hover:-translate-y-1 hover:transition 500"></i>
            </a>
            <a href="' . $townId . '" title="Delete" id="deleteTownBtn">
                <i class="fa-solid fa-trash mr-4 text-[#41181e] hover:-translate-y-1 hover:transition 500"></i>
            </a>
        </td>
    </tr>';
    }

    $outputOfUI .= '</tbody></table>';

    echo $outputOfUI;
}

// Todo: Need to show the town detail in update modal
if (isset($_GET['passedTownId'])) {

    $passedTownId = $_GET['passedTownId']; // Town Id

    $arrayOfTownDetail = $town->getTownInfoById($passedTownId);

    echo json_encode($arrayOfTownDetail);
}

// Todo: Need to show all the district name in 
if (isset($_POST['request']) && $_POST['request'] == 'showAllDistrictInTownEditForm') {

    $output = "";

    $arrayOfDistrictData = $district->viewDistrict();

    foreach ($arrayOfDistrictData as $row) {

        $districtId = $row['district_id'];
        $districtName = $row['name'];

        $output .= '<option value="' . $districtId . '">' . $districtName . '</option>';
    }

    echo $output;
}

// Todo: Need to do update town process
if (isset($_POST['request']) && $_POST['request'] == 'updateTownInfo') {

    // * Needed record to update values in Town
    // * 1. town_id
    // * 2. town_name
    // * 3. district_id
    // * 4. district_name

    $passedTownIdEl = $_POST['town-id']; // * town_id
    $passedTownNameEl = $_POST['update-town-name']; // * town_name

    /*

     * Here distirct_id will comes from select element value attribute. So, through the district_id need to get
     * district name

    */

    $districtIdEl = $_POST["update-district-name"];

    $arrayOfDistrictDetail = $district->getDistrictInfoById($districtIdEl);

    $updateDistrictName = $arrayOfDistrictDetail['name'];

    $town->updateTownInfo($passedTownIdEl, $passedTownNameEl, $districtIdEl, $updateDistrictName);
}

// Todo: Delete town info
if (isset($_GET['townId'])) {

    $passedTownId = $_GET['townId'];

    $arrayOfTownData = $town->getTownInfoById($passedTownId);

    $townName = $arrayOfTownData['name'];

    echo $townName;

    if (isset($_GET['confirmDelete']) == true) {

        $town->deleteTownInfo($passedTownId);
    }
}

// Todo: Retrieve Admin Username from Session and Logout.
if (isset($_GET['request']) && $_GET['request'] == 'getAdminUsername') {
    if (isset($_SESSION['adminUsername'])) {

        session_unset();
        session_destroy();

        echo "404";
    } else {
        echo 'Admin username not found in session';
    }
}

// * <------------------------------------ Service Seekers ------------------------------------>
// Todo: Sign-up process of Service Seekers.
if (isset($_POST['request']) && $_POST['request'] == 'serviceSeekerSignUp') {

    $serviceSeekerFullNameEl = $_POST['ss-fullname'];
    $serviceSeekerEmailEl = $_POST['ss-email'];
    $serviceSeekerContactNoEl = $_POST['ss-contact-no'];
    $serviceSeekerUsernameEl = $_POST['ss-username'];
    $serviceSeekerPasswordEl = $_POST['ss-password'];
    $serviceSeekerGenderEl = $_POST['ss-gender'];
    $serviceSeekerAddressLineEl = $_POST['ss-address-line'];
    $serviceSeekerCityEl = $_POST['ss-city'];
    $serviceSeekerIdentityCardEl = $_POST['ss-id-card-no'];
    $serviceSeekerImageEl = $_FILES['ss-image'];

    $responseStatus;

    $encryptedPassword = password_hash($serviceSeekerPasswordEl, PASSWORD_DEFAULT);

    // * Latitude Value
    $latitudeValue = $serviceSeeker->getLatitudeValue($serviceSeekerCityEl);

    // * Longitude Value
    $longitudeValue = $serviceSeeker->getLongitudeValue($serviceSeekerCityEl);


    $ssProfileImg = $db->imageUpload($serviceSeekerImageEl);

    // ! Need to check does the username already exist?
    $isUsernameExist = $serviceSeeker->countTotalServiceSeekers("username", $serviceSeekerUsernameEl);

    // ! Need to check does the email address already exist?
    $isEmailExist = $serviceSeeker->countTotalServiceSeekers("email_address", $serviceSeekerEmailEl);

    // ! Need to check does the phone number already exist?
    $isContactNoExist = $serviceSeeker->countTotalServiceSeekers("contact_no", $serviceSeekerContactNoEl);

    // ! Need to check does the id card number already exist?
    $isIdCardNoExist = $serviceSeeker->countTotalServiceSeekers("identity_card_no", $serviceSeekerIdentityCardEl);


    if ($isUsernameExist > 0 && $isEmailExist > 0 && $isContactNoExist > 0 && $isIdCardNoExist > 0) {

        $responseStatus = "1111";
    } else if ($isUsernameExist > 0) {

        $responseStatus = "1000";
    } else if ($isEmailExist > 0) {

        $responseStatus = "0100";
    } else if ($isContactNoExist > 0) {

        $responseStatus = "0010";
    } else if ($isIdCardNoExist > 0) {

        $responseStatus = "0001";
    } else {

        $responseStatus = "2000";
    }

    echo $responseStatus;

    if ($responseStatus == "2000") {

        $serviceSeeker->addServiceSeeker($serviceSeekerFullNameEl, $serviceSeekerEmailEl, $serviceSeekerContactNoEl, $serviceSeekerUsernameEl, $encryptedPassword, $serviceSeekerGenderEl, $serviceSeekerAddressLineEl, $serviceSeekerCityEl, $latitudeValue, $longitudeValue, $serviceSeekerIdentityCardEl, $ssProfileImg);
    }
}

// Todo: Need to show All district info in SP signup form
if (isset($_POST['request']) && $_POST['request'] == 'listAllDistricts') {

    $listOfDistrict = "";

    $districtDataSet = $district->viewDistrict();

    $listOfDistrict .= '<option value="">District</option>';

    foreach ($districtDataSet as $data) {

        $districtId =  $data['district_id'];
        $districtName = $data['name'];

        $listOfDistrict .= '<option value="' . $districtId . '">' . $districtName . '</option>';
    }

    echo $listOfDistrict;
}

// * <------------------------------------ Service Providers ------------------------------------>

// Todo: Need to show All town info in SP signup form
if (isset($_POST['request']) && $_POST['request'] == 'listAllTownInfo') {

    $listOfTown = "";

    $townDataSet = $town->viewAllTownData();

    $listOfTown .= '<option value="">Town</option>';

    foreach ($townDataSet as $data) {

        $townId = $data['town_id'];
        $townName = $data['name'];

        $listOfTown .= '<option value="' . $townId . '">' . $townName . '</option>';
    }

    echo $listOfTown;
}

// Todo: SP signup process
if (isset($_POST['request']) && $_POST['request'] == 'serviceProviderSignUp') {

    $spFullNameEl = $_POST['sp-fullname'];
    $spEmailEl = $_POST['sp-email'];
    $spContactNoEl = $_POST['sp-contact-no'];
    $spUsernameEl = $_POST['sp-username'];
    $spPasswordEl = $_POST['sp-password'];
    $spGenderEl = $_POST['sp-gender'];
    $spAddressLineEl = $_POST['sp-addresp-line'];
    $spDistrictEl = $_POST['sp-district'];
    $spTownEl = $_POST['sp-town'];
    $spQualificationEl = $_POST['sp-qualification'];
    $spSkillsEl = $_POST['sp-skills'];
    $spProfileImgEl = $_FILES['file-input'];
    $spDescEl = $_POST['sp-desc'];
    $spKeywordsEl = $_POST['sp-keywords'];
    $spPriceInfoEl = $_POST['sp-starting-price'];


    // If service provider has qualifications such as Doctor, Engineer, etc, this value will take those values.
    /* While Ordinary workers signup process, if they don't have any qualifications, they will consider as "OW." It meanse
    "Ordinary Worker."
    */
    $qualificationValue = "";

    if ($spQualificationEl == "") {

        $qualificationValue = "OW";
    } else {

        $qualificationValue = $spQualificationEl;
    }

    $encryptedPassword = password_hash($spPasswordEl, PASSWORD_DEFAULT);

    $status = "available";

    $arrayOfTownInfo = $town->getTownInfoById($spTownEl);

    $townName = $arrayOfTownInfo['name'];

    // * Lat val
    $latitudeValue = $serviceProvider->getServiceProviderLatitudeValue($townName);

    // * Lng val
    $longitudeValue = $serviceProvider->getServiceProviderLongitudeValue($townName);

    $resp;

    // ! Verify by Email
    $isUserEmailExist = $serviceProvider->countTotalServiceProviders("email_address", $spEmailEl);

    // ! Verify by Contact No
    $isUserContactNumExist = $serviceProvider->countTotalServiceProviders("contact_no", $spContactNoEl);

    // ! Verify by Username
    $isUsernameExist = $serviceProvider->countTotalServiceProviders("username", $spUsernameEl);

    if ($isUserEmailExist > 0 && $isUserContactNumExist > 0 && $isUsernameExist > 0) {

        $resp = "111";
    } else if ($isUserEmailExist > 0) {

        $resp = "100";
    } else if ($isUserContactNumExist > 0) {

        $resp = "010";
    } else if ($isUsernameExist > 0) {

        $resp = "001";
    } else {

        $resp = "200";
    }

    echo $resp;

    if ($resp == "200") {

        $spProfilePic = $db->imageUpload($spProfileImgEl);

        $serviceProvider->addServiceProvider($spFullNameEl, $spEmailEl, $spContactNoEl, $spUsernameEl, $encryptedPassword, $spGenderEl, $spAddressLineEl, $spDistrictEl, $spTownEl, $latitudeValue, $longitudeValue, $qualificationValue, $spSkillsEl, $spProfilePic, $spDescEl, $spKeywordsEl, $spPriceInfoEl, $status);
    }
}

// Todo: Login Users based on their role.
if (isset($_POST['request']) && $_POST['request'] == 'loginProcess') {
    $usernameEl = $_POST['username'];
    $passwordEl = $_POST['password'];
    $userRoleEl = $_POST['user-category'];
    $userExist;
    $userStatus;
    $passwordStatus;

    if ($userRoleEl == 'Service Provider') {

        $isUsernameExist = $serviceProvider->countTotalServiceProviders("username", $usernameEl);

        if ($isUsernameExist <= 0) {

            $userExist = "User not found";
        } else {

            $arrayOfServiceProviderInfo = $serviceProvider->getServiceProviderInfo("username", $usernameEl);

            $serviceProviderName = $arrayOfServiceProviderInfo['name'];

            $encryptedPassword = $arrayOfServiceProviderInfo['password'];

            $_SESSION['serviceProviderName'] = $serviceProviderName;

            if (password_verify($passwordEl, $encryptedPassword)) {

                $userExist = json_encode($arrayOfServiceProviderInfo);
            } else {

                $userExist = "Password Mismatched"; // Indicate that password is incorrect for a service provider
            }
        }
        echo $userExist;
    } else {
        $isServiceSeekerExist = $serviceSeeker->countTotalServiceSeekers("username", $usernameEl);

        if ($isServiceSeekerExist <= 0) {

            $userExist = "User not found";
        } else {

            $arrayOfServiceSeeker = $serviceSeeker->getServiceSeekerInfo("username", $usernameEl);

            $serviceSeekerName = $arrayOfServiceSeeker['name'];

            $hashPassword = $arrayOfServiceSeeker['password'];

            $_SESSION['serviceSeekerName'] = $serviceSeekerName;

            if (password_verify($passwordEl, $hashPassword)) {

                $userExist = json_encode($arrayOfServiceSeeker);
            } else {

                $userExist = "Password Mismatched"; // Indicate that password is incorrect for a service seeker
            }
        }
        echo $userExist;
    }
}

// Todo: Show Service Providers randomly
if (isset($_POST['request']) && $_POST['request'] == "listRandomServiceProviders") {

    $output = "";

    // * Storyline
    // * 1. Need to check records exist or not in Service Providers Table
    $isServiceProviderExist = $serviceProvider->countTotalServiceProviders();

    if ($isServiceProviderExist > 0) {

        $tooltipNumber = 1;

        // * 2. If it is yes, Fetch all the data from DB.
        $arrayOfServiceProviders = $serviceProvider->readAllServiceProviderInfo(9);

        foreach ($arrayOfServiceProviders as $dataSetOfServiceProviders) {

            $serviceProviderId = $dataSetOfServiceProviders['service_provider_id'];
            $serviceProviderName = $dataSetOfServiceProviders['name'];
            $serviceProviderContactNo = $dataSetOfServiceProviders['contact_no'];
            $serviceProviderSkills = $dataSetOfServiceProviders['skills'];
            $serviceProviderLatitudeValue = $dataSetOfServiceProviders['latitude_value'];
            $serviceProviderLongitudeValue = $dataSetOfServiceProviders['longitutde_value'];
            $serviceProviderImage = $dataSetOfServiceProviders['image'];

            $locationValue = $serviceProviderLatitudeValue . ", " . $serviceProviderLongitudeValue;

            $output .= '<div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
            <!-- Banner Profile -->
            <div class="relative">
                <!-- Cover Photo -->
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                <!-- Profile Pic -->

                <img src="ajax-file/uploads/' . $serviceProviderImage . '" alt="' . $serviceProviderName . ' Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
            </div>
            <!-- User Info with Verified Button -->
            <div class="block">
                <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                    ' . $serviceProviderName . '
                </h2>
            </div>
            <!-- Bio -->
            <p class="mt-2 text-center text-primary-color-10 px-1.5">
            ' . $serviceProviderSkills . '
            </p>
            <!-- Social Links -->
            <div class="flex items-center mt-4 space-x-4 justify-center">
                <div>
                    <!-- Tap to call -->
                    <div>
                        <a href="' . $serviceProviderId . '" id="booking-btn" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-0' . $tooltipNumber++ . '" title="Tap to contact ' . $serviceProviderName . '">
                        <i class="fa-solid fa-handshake-angle"></i>
                            Tap to Hire
                        </a>
                    </div>

                    <!-- Tooltip Code -->
                    <div id="tooltip-default-' . $tooltipNumber++ . '" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                        ' . $serviceProviderContactNo . '
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>

                <div>
                    <!-- Tap to call -->
                    <div>
                        <a href="https://www.google.com/maps/search/?api=1&query=' . $serviceProviderLatitudeValue . ',' . $serviceProviderLongitudeValue . '" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn-' . $tooltipNumber++ . '" target="_blank">
                            <i class="fa-solid fa-map-pin"></i>
                            Show Location
                        </a>
                    </div>

                    <!-- Tooltip Code -->
                    <div id="tooltip-default-newn-' . $tooltipNumber++ . '" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                        Tap to Open Google Maps
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
            <!-- Separator Line -->
            <hr class="my-4 border-t border-gray-300" />
            <!-- Stats -->
            <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                <div class="text-center flex flex-col">
                    <span class="font-bold text-lg">90%</span>
                    <span class="text-xs">Success Percentage</span>
                </div>
                <div class="text-center flex flex-col">
                    <span class="font-bold text-lg">95%</span>
                    <span class="text-xs">Positive Ratings</span>
                </div>
                <div class="text-center flex flex-col">
                    <span class="font-bold text-lg">350</span>
                    <a href="#" class="text-xs underline">Total Feedbacks</a>
                </div>
            </div>
        </div>';
        }
    } else {
    }

    // * 3. Loop it and send to frontend
    echo $output;
}

// Todo: Show all service providers
if (isset($_POST['request']) && $_POST['request'] == 'showAllServiceProviders') {

    $output = "";

    $query = "SELECT * FROM table_service_provider WHERE status = 'available'";

    $arrayOfAvailableServiceProviders = $db->getMultipleData($query);

    foreach ($arrayOfAvailableServiceProviders as $dataSet) {

        $availableSpId = $dataSet['service_provider_id'];
        $availableSpName = $dataSet['name'];
        $availableSpContactNo = $dataSet['contact_no'];
        $availableSpSkills = $dataSet['skills'];
        $availableSpLatitudeValue = $dataSet['latitude_value'];
        $availableSpLongitudeValue = $dataSet['longitutde_value'];
        $availableSpImage = $dataSet['image'];

        $output .= '<div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
        <!-- Banner Profile -->
        <div class="relative">
            <!-- Cover Photo -->
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

            <!-- Profile Pic -->
            <div class="relative">
                <img src="ajax-file/uploads/' . $availableSpImage . '" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />

                <div class="bg-green-500 w-[15px] h-[15px] rounded-full absolute left-[179px] top-5">
                </div>
            </div>

        </div>
        <!-- User Info with Verified Button -->
        <div class="block">
            <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                ' . $availableSpName . '
            </h2>
        </div>
        <!-- Bio -->
        <p class="mt-2 text-center text-primary-color-10 px-1.5">
            ' . $availableSpSkills . '
        </p>
        <!-- Social Links -->
        <div class="flex items-center mt-4 space-x-4 justify-center">
            <div>
                <!-- Tap to call -->
                <div>
                    <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                        <i class="fa-solid fa-phone"></i>
                        Get Service
                    </a>
                </div>

                <!-- Tooltip Code -->
                <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                    +94777195282
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <div>
                <!-- Tap to call -->
                <div>
                    <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                        <i class="fa-solid fa-map-pin"></i>
                        Show Location
                    </a>
                </div>

                <!-- Tooltip Code -->
                <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                    Tap to Open Google Maps
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
        </div>
        <!-- Separator Line -->
        <hr class="my-4 border-t border-gray-300" />
        <!-- Stats -->
        <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
            <div class="text-center flex flex-col">
                <span class="font-bold text-lg">90%</span>
                <span class="text-xs">Success Percentage</span>
            </div>
            <div class="text-center flex flex-col">
                <span class="font-bold text-lg">95%</span>
                <span class="text-xs">Positive Ratings</span>
            </div>
            <div class="text-center flex flex-col">
                <span class="font-bold text-lg">350</span>
                <a href="#" class="text-xs underline">Total Feedbacks</a>
            </div>
        </div>
    </div>';
    }

    echo $output;
}

// Todo: Live search of SP
if (isset($_POST['request']) && $_POST['request'] == 'searchSp') {

    $searchValue = $_POST['searchSp'];

    $query = "SELECT * FROM table_service_provider WHERE keywords LIKE '%{$searchValue}%' OR name LIKE '%{$searchValue}%' AND status = 'available'";

    $isDataExist = $db->countMultipleData($query);

    if ($isDataExist > 0) {

        $output = "";

        $fetchedServiceProviderInfo = $db->getMultipleData($query);

        foreach ($fetchedServiceProviderInfo as $dataset) {

            $spId = $dataset['service_provider_id'];
            $spName = $dataset['name'];
            $spContactNo = $dataset['contact_no'];
            $spSkills = $dataset['skills'];
            $spLatitudeValue = $dataset['latitude_value'];
            $spLongitudeValue = $dataset['longitutde_value'];
            $spImage = $dataset['image'];

            $output .= '<div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
            <!-- Banner Profile -->
            <div class="relative">
                <!-- Cover Photo -->
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />
    
                <!-- Profile Pic -->
                <div class="relative">
                    <img src="ajax-file/uploads/' . $spImage . '" alt="Profile Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
    
                    <div class="bg-green-500 w-[15px] h-[15px] rounded-full absolute left-[179px] top-5">
                    </div>
                </div>
    
            </div>
            <!-- User Info with Verified Button -->
            <div class="block">
                <h2 class="text-xl font-bold text-[#F9F6EE] mt-16 text-center">
                    ' . $spName . '
                </h2>
            </div>
            <!-- Bio -->
            <p class="mt-2 text-center text-primary-color-10 px-1.5">
                ' . $spSkills . '
            </p>
            <!-- Social Links -->
            <div class="flex items-center mt-4 space-x-4 justify-center">
                <div>
                    <!-- Tap to call -->
                    <div>
                        <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                            <i class="fa-solid fa-phone"></i>
                            Tap to Call
                        </a>
                    </div>
    
                    <!-- Tooltip Code -->
                    <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                        +94777195282
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
    
                <div>
                    <!-- Tap to call -->
                    <div>
                        <a href="tel:+94777195282" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default-newn">
                            <i class="fa-solid fa-map-pin"></i>
                            Show Location
                        </a>
                    </div>
    
                    <!-- Tooltip Code -->
                    <div id="tooltip-default-newn" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                        Tap to Open Google Maps
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
            <!-- Separator Line -->
            <hr class="my-4 border-t border-gray-300" />
            <!-- Stats -->
            <div class="flex justify-between text-primary-color-10 px-1.5 sm:px-5 pb-3">
                <div class="text-center flex flex-col">
                    <span class="font-bold text-lg">90%</span>
                    <span class="text-xs">Success Percentage</span>
                </div>
                <div class="text-center flex flex-col">
                    <span class="font-bold text-lg">95%</span>
                    <span class="text-xs">Positive Ratings</span>
                </div>
                <div class="text-center flex flex-col">
                    <span class="font-bold text-lg">350</span>
                    <a href="#" class="text-xs underline">Total Feedbacks</a>
                </div>
            </div>
        </div>';
        }

        echo $output;
    } else {

        echo "<h3 class='mx-auto mt-20 font-semibold text-3xl text-red-600'>No service provider info found!</h3>";
    }
}

// Todo: SS Logout
if (isset($_GET['request']) && $_GET['request'] == 'getSsUsername') {
    if (isset($_SESSION['serviceSeekerName'])) {

        session_unset();
        session_destroy();

        echo "404";
    } else {

        echo "Service seeker not found";
    }
}

// Todo: Show SS Profile Info
if (isset($_GET['request']) and $_GET['request'] == 'getServiceSeekerInfo') {

    $result;

    if (isset($_SESSION['serviceSeekerName'])) {

        $sessionSsName = $_SESSION['serviceSeekerName'];

        $isUserExist = $serviceSeeker->countTotalServiceSeekers("name", $sessionSsName);

        if ($isUserExist > 0 && $isUserExist == 1) {

            $arrayOfServiceSeekerInfo = $serviceSeeker->getServiceSeekerInfo("name", $sessionSsName);
            $result = json_encode($arrayOfServiceSeekerInfo);
        }
    } else {

        $result = "404";
    }

    echo $result;
}

// Todo: Show SS Profile Info in dashboard top right corner
if (isset($_GET['request']) and $_GET['request'] == 'showLoggedInUserInfo') {

    $result;

    if (isset($_SESSION['serviceSeekerName'])) {

        $sessionSsName = $_SESSION['serviceSeekerName'];

        $isUserExist = $serviceSeeker->countTotalServiceSeekers("name", $sessionSsName);

        if ($isUserExist > 0 && $isUserExist == 1) {

            $arrayOfServiceSeekerInfo = $serviceSeeker->getServiceSeekerInfo("name", $sessionSsName);
            $result = json_encode($arrayOfServiceSeekerInfo);
        }
    } else {

        $result = "404";
    }

    echo $result;
}

// Todo: Show LoggedIn SP Info in dashboard top right corner.
if (isset($_GET['loggedInUsername'])) {

    $result;

    if (isset($_SESSION['serviceProviderName'])) {

        $spSessionName = $_SESSION['serviceProviderName'];

        $arrayOfSpName = $serviceProvider->getServiceProviderInfo("name", $spSessionName);

        $spId = $arrayOfSpName['service_provider_id'];
        $spName = $arrayOfSpName['name'];
        $spEmailAddress = $arrayOfSpName['email_address'];
        $spProfileImg = $arrayOfSpName['image'];

        // * Storing values in an array.
        $spObject = serialize(array("sericeProviderID" => $spId, "name" => $spName, "email" => $spEmailAddress, "image" => $spProfileImg));

        $arrayOfSpInfoInString = unserialize($spObject);

        $result = json_encode($arrayOfSpInfoInString);
    } else {

        $result = "404";
    }

    echo $result;
}

// Todo: Show Loggedin SP profile info in profile dashboard
if (isset($_GET['request']) && $_GET['request'] == 'showLoggedInServiceProviderProfileInfo') {

    $result;

    if (isset($_SESSION['serviceProviderName'])) {

        $sessionSpName = $_SESSION['serviceProviderName'];

        $isSpInfoExist = $serviceProvider->countTotalServiceProviders("name", $sessionSpName);

        if ($isSpInfoExist > 0 && $isSpInfoExist == 1) {

            $arrayOfSpInfo = $serviceProvider->getServiceProviderInfo("name", $sessionSpName);

            $spID = $arrayOfSpInfo['service_provider_id'];
            $spName = $arrayOfSpInfo['name'];
            $spEmailAddress = $arrayOfSpInfo['email_address'];
            $spContactNo = $arrayOfSpInfo['contact_no'];
            $spUsername = $arrayOfSpInfo['username'];
            $spGender = $arrayOfSpInfo['gender'];
            $spAddress = $arrayOfSpInfo['address_line'];
            $spDistrictId = $arrayOfSpInfo['district_id'];
            $spTownId = $arrayOfSpInfo['town_id'];
            $spSkills = $arrayOfSpInfo['skills'];
            $spPrice = $arrayOfSpInfo['price'];
            $spImage = $arrayOfSpInfo['image'];

            // * Get the Town and District name using Id
            $districtData = $district->getDistrictInfoById($spDistrictId);
            $townData = $town->getTownInfoById($spTownId);

            $districtName = $districtData['name'];
            $townName = $townData['name'];

            // * Store all the required values inside an array object
            $arrayOfResult = serialize(array("spId" => $spID, "name" => $spName, "email" => $spEmailAddress, "contactNo" => $spContactNo, "username" => $spUsername, "gender" => $spGender, "address" => $spAddress, "skills" => $spSkills, "price" => $spPrice, "districtName" => $districtName, "townName" => $townName, "profileImg" => $spImage));
            $arrayOfResultInString = unserialize($arrayOfResult);

            // * Return those array using json_encode()
            $result = json_encode($arrayOfResultInString);
        }
    } else {

        $result = "404";
    }

    echo $result;
}

// Todo: Show selected SP in hiring confirmation page.
if (isset($_GET['selectedSpId'])) {

    $passedSpId = $_GET['selectedSpId'];

    $result;

    $isSpInfoExist = $serviceProvider->countTotalServiceProviders("service_provider_id", $passedSpId);

    if ($isSpInfoExist > 0 && $isSpInfoExist == 1) {

        $arrayOfSpInfo = $serviceProvider->getServiceProviderInfoById($passedSpId);
        $spProfileImg = $arrayOfSpInfo['image'];
        $spName = $arrayOfSpInfo['name'];
        $spUsername = $arrayOfSpInfo['username'];
        $spEmail = $arrayOfSpInfo['email_address'];
        $spGender = $arrayOfSpInfo['gender'];
        $spAddress = $arrayOfSpInfo['address_line'];
        $spDistrictId = $arrayOfSpInfo['district_id'];
        $spTownId = $arrayOfSpInfo['town_id'];
        $spSkills = $arrayOfSpInfo['skills'];
        $spServiceDesc = $arrayOfSpInfo['description'];
        $spServicePrice = $arrayOfSpInfo['price'];

        $districtInfo = $district->getDistrictInfoById($spDistrictId);
        $townInfo = $town->getTownInfoById($spTownId);

        $districtName = $districtInfo['name'];
        $townName = $townInfo['name'];

        $spInfoArray = serialize(array(
            "image" => $spProfileImg, "name" => $spName, "username" => $spUsername, "email" => $spEmail, "gender" => $spGender, "address" => $spAddress, "district" => $districtName, "town" => $townName,
            "skills" => $spSkills, "description" => $spServiceDesc, "price" => $spServicePrice
        ));

        $stringSpInfoArray = unserialize($spInfoArray);

        $result = json_encode($stringSpInfoArray);

        // $result = json_encode($arrayOfSpInfo);
        // echo var_dump($arrayOfSpInfo);
    } else {

        $result = "404";
    }

    echo $result;
}
