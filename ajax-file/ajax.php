<?php
// ! SP / Sp: Service Providers
// ! SS / Ss: Service Seekers
session_start();

require_once('../classes/common/Database.php');
require_once('../classes/app/Admin.php');
require_once('../classes/app/District.php');
require_once('../classes/app/Town.php');
require_once('../classes/app/ServiceSeeker.php');
require_once('../classes/app/ServiceProvide.php');
require_once('../classes/app/Services.php');
require_once('../classes/app/Payment.php');
require_once('../classes/app/Feedback.php');

$db = new Database();
$admin = new Admin();
$district = new District();
$town = new Town();
$serviceSeeker = new ServiceSeeker();
$serviceProvider = new ServiceProvider();
$services = new Services();
$payment = new Payment();
$feedback = new Feedback();

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

// Todo: Need to check admin logged-in / not
if (isset($_POST['request']) && $_POST['request'] == "checkAdminActive") {

    if (!isset($_SESSION['adminUsername'])) {

        echo "404";
    }
}

// Todo: Sum all service charges
if (isset($_POST['request']) && $_POST['request'] == "sumAllServiceEarnings") {

    //     SELECT SUM(Quantity)
    // FROM OrderDetails
    // WHERE ProductId = 11;


    $query = "SELECT SUM(service_charge) AS totalEarnings FROM `table_services` WHERE payment_status = 1";
    $totalEarnings = $db->getMultipleData($query);

    echo json_encode($totalEarnings[0]);
}

// Todo: Count all town and districts
if (isset($_POST['request']) && $_POST['request'] == "countTotalTownAndDistrict") {

    $totalTown = $town->countTotalRows();

    $totalDistrict = $district->countRows();

    $response[] = array("totalTown" => $totalTown, "total_district" => $totalDistrict);

    echo json_encode($response);
}


// Todo: Get loggedin admin details
if (isset($_POST['request']) && $_POST['request'] == "getLoggedInDetails") {
    $adminUsername = $_SESSION['adminUsername'];

    $getAdminDetails = $admin->getAdminByKeyAndValue("username", $adminUsername);

    // echo json_encode($getAdminDetails);

    $adminName = $getAdminDetails['name'];
    $adminEmail = $getAdminDetails['email'];
    $adminProfileImg = $getAdminDetails['image'];


    $adminInfo[] = array("name" => $adminName, "email" => $adminEmail, "profileImg" => $adminProfileImg);

    echo json_encode($adminInfo);
}

// Todo: Count Dashboard Elements
if (isset($_POST['request']) && $_POST['request'] == "countAdminDashboardEls") {

    $totalSp = $serviceProvider->countTotalServiceProviders();
    $totalSs = $serviceSeeker->countTotalServiceSeekers();

    $query = "SELECT * FROM `table_service_provider` WHERE  profile_status = 'pending'";
    $totalPendingReq = $db->countMultipleData($query);

    $response[] = array("total_sp" => $totalSp, "total_ss" => $totalSs, "total_requests" => $totalPendingReq);

    echo json_encode($response);
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
    $spProfileStatus = "pending";


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

        $serviceProvider->addServiceProvider($spFullNameEl, $spEmailEl, $spContactNoEl, $spUsernameEl, $encryptedPassword, $spGenderEl, $spAddressLineEl, $spDistrictEl, $spTownEl, $latitudeValue, $longitudeValue, $qualificationValue, $spSkillsEl, $spProfilePic, $spDescEl, $spKeywordsEl, $spPriceInfoEl, $status, $spProfileStatus);
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
    $isServiceProviderExist = $serviceProvider->countTotalServiceProviders("profile_status", "accepted");

    if ($isServiceProviderExist > 0) {

        // * 2. If it is yes, Fetch all the data from DB.
        $query = "SELECT tsp.*, tt.name AS town_name FROM table_service_provider tsp 
        JOIN table_town tt ON tsp.town_id = tt.town_id WHERE tsp.profile_status = 'accepted' ORDER BY RAND() LIMIT 9";

        $arrayOfServiceProviders = $db->getMultipleData($query);

        foreach ($arrayOfServiceProviders as $dataSetOfServiceProviders) {

            $serviceProviderId = $dataSetOfServiceProviders['service_provider_id'];
            $serviceProviderName = $dataSetOfServiceProviders['name'];
            $serviceProviderContactNo = $dataSetOfServiceProviders['contact_no'];
            $serviceProviderSkills = $dataSetOfServiceProviders['skills'];
            $serviceProviderLatitudeValue = $dataSetOfServiceProviders['latitude_value'];
            $serviceProviderLongitudeValue = $dataSetOfServiceProviders['longitutde_value'];
            $serviceProviderTownName = $dataSetOfServiceProviders['town_name'];
            $serviceProviderImage = $dataSetOfServiceProviders['image'];

            // echo var_dump($dataSetOfServiceProviders);

            $locationValue = $serviceProviderLatitudeValue . ", " . $serviceProviderLongitudeValue;

            $output .= '<div class="lg:max-w-md w-full md:w-[300px] mt-10 bg-cus-maron rounded-md overflow-hidden">
            <!-- Banner Profile -->
            <div class="relative">
                <!-- Cover Photo -->
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUQnWPLujwoqkHL3VDRXLndGKIN9-O1El3Ew&usqp=CAU" alt="Banner Profile" class="w-full rounded-t-md h-20 object-cover" />

                <!-- Profile Pic -->
                <div class="relative">
                <img src="ajax-file/uploads/' . $serviceProviderImage . '" alt="' . $serviceProviderName . ' Picture" class="absolute bottom-0 left-2/4 transform -translate-x-1/2 translate-y-1/2 w-24 h-24 rounded-full border-4 border-white" />
                <div class="bg-green-500 w-[15px] h-[15px] rounded-full absolute left-[179px] top-5">
                </div>
                </div>
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
                    <!-- Tap to Hire -->
                    <div>
                        <a href="' . $serviceProviderId . '" id="booking-btn" class="text-[#e0d5d7] hover:underline" data-tooltip-target="" title="Tap to contact ' . $serviceProviderName . '">
                        <i class="fa-solid fa-handshake-angle"></i>
                            Tap to Hire
                        </a>
                    </div>

                    <!-- Tooltip Code -->
                    <div id="" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                        ' . $serviceProviderContactNo . '
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>

                <div>
                    <!-- Show Location -->
                    <div>
                        <a href="https://www.google.com/maps/search/?api=1&query=' . $serviceProviderLatitudeValue . ',' . $serviceProviderLongitudeValue . '" title="Tap to show ' . $serviceProviderName . '\'s location" class="text-[#e0d5d7] hover:underline" data-tooltip-target="" target="_blank">
                            <i class="fa-solid fa-map-pin"></i>
                            ' . $serviceProviderTownName . '
                        </a>
                    </div>

                    <!-- Tooltip Code -->
                    <div id="" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                        Tap to Open Google Maps
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
            <!-- Separator Line -->
            <hr class="my-4 border-t border-gray-300" />
            
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

    $query = "SELECT tsp.*, tt.name AS town_name FROM table_service_provider tsp 
    JOIN table_town tt ON tsp.town_id = tt.town_id WHERE tsp.status = 'available' AND tsp.profile_status = 'accepted'";

    $arrayOfAvailableServiceProviders = $db->getMultipleData($query);

    foreach ($arrayOfAvailableServiceProviders as $dataSet) {

        $availableSpId = $dataSet['service_provider_id'];
        $availableSpName = $dataSet['name'];
        $availableSpContactNo = $dataSet['contact_no'];
        $availableSpSkills = $dataSet['skills'];
        $availableSpLatitudeValue = $dataSet['latitude_value'];
        $availableSpLongitudeValue = $dataSet['longitutde_value'];
        $availableSpTownName = $dataSet['town_name'];
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
                <!-- Tap to Hire -->
                <div>
                    <a href="' . $availableSpId . '" id="booking-btn" class="text-[#e0d5d7] hover:underline" data-tooltip-target="tooltip-default">
                    <i class="fa-solid fa-handshake-angle"></i>
                    Tap to Hire
                    </a>
                </div>

                <!-- Tooltip Code -->
                <div id="tooltip-default" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-cus-maron transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-primary-color-10">
                    +94777195282
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <div>
                <!-- Tap to show location -->
                <div>
                    <a href="https://www.google.com/maps/search/?api=1&query=' . $availableSpLatitudeValue . ',' . $availableSpLongitudeValue . '" class="text-[#e0d5d7] hover:underline" target="_blank" data-tooltip-target="tooltip-default-newn">
                        <i class="fa-solid fa-map-pin"></i>
                        ' . $availableSpTownName . '
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
        
    </div>';
    }

    echo $output;
}

// Todo: Live search of SP
if (isset($_POST['request']) && $_POST['request'] == 'searchSp') {

    $searchValue = $_POST['searchSp'];

    $query = "SELECT tsp.*, tt.name AS serviceProviderTownName 
          FROM table_service_provider tsp 
          JOIN table_town tt 
          ON tsp.town_id = tt.town_id 
          WHERE tsp.keywords LIKE '%{$searchValue}%' 
          OR tsp.name LIKE '%{$searchValue}%' 
          AND tsp.status = 'available'";


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
            $spTownName = $dataset['serviceProviderTownName'];

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
                    <!-- Tap to Hire -->
                    <div>
                        <a href="' . $spId . '" class="text-[#e0d5d7] hover:underline" id="hire-btn" data-tooltip-target="tooltip-default">
                            <i class="fa-solid fa-phone"></i>
                            Tap to Hire
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
                        <a href="https://www.google.com/maps/search/?api=1&query=' . $spLatitudeValue . ',' . $spLongitudeValue . '" class="text-[#e0d5d7] hover:underline" target="_blank" data-tooltip-target="tooltip-default-newn">
                            <i class="fa-solid fa-map-pin"></i>
                            ' . $spTownName . '
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
if (isset($_POST['req']) and $_POST['req'] == 'showLoggedInUserInfo') {

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
            $spStatus = $arrayOfSpInfo['status'];

            // * Get the Town and District name using Id
            $districtData = $district->getDistrictInfoById($spDistrictId);
            $townData = $town->getTownInfoById($spTownId);

            $districtName = $districtData['name'];
            $townName = $townData['name'];

            // * Store all the required values inside an array object
            $arrayOfResult = serialize(array("spId" => $spID, "name" => $spName, "email" => $spEmailAddress, "contactNo" => $spContactNo, "username" => $spUsername, "gender" => $spGender, "address" => $spAddress, "skills" => $spSkills, "price" => $spPrice, "districtName" => $districtName, "townName" => $townName, "profileImg" => $spImage, "status" => $spStatus));
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

        $spId = $arrayOfSpInfo['service_provider_id'];
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
            "serviceProviderId" => $spId,
            "image" => $spProfileImg, "name" => $spName, "username" => $spUsername, "email" => $spEmail, "gender" => $spGender, "address" => $spAddress, "district" => $districtName, "town" => $townName,
            "skills" => $spSkills, "description" => $spServiceDesc, "price" => $spServicePrice
        ));

        $stringSpInfoArray = unserialize($spInfoArray);

        $result = json_encode($stringSpInfoArray);
    } else {

        $result = "404";
    }

    echo $result;
}

// Todo: Need to verify if the service seeker loggedin or not. If not, need to redirect to Login page
if (isset($_POST['request']) && $_POST['request'] == 'verifyUserLoggedIn') {

    // * Story
    // * 1. Need to check if the service seeker loggedin or not. if not need to ask to login.
    // * If logged in, need to ask confirm the order.
    // * If it is yes, it need to take loggedIn userId and selected service provider id and, store those hiring process in Services table with on process status.
    // * After that need to allow service provider to take call to SP. 

    $sessionStatus;

    if (!isset($_SESSION['serviceSeekerName'])) {

        $sessionStatus = "401";
    } else {

        $loggedInServiceSeekerName = $_SESSION['serviceSeekerName'];

        $isSsDataExist = $serviceSeeker->countTotalServiceSeekers("name", $loggedInServiceSeekerName);

        if ($isSsDataExist > 0 && $isSsDataExist == 1) {

            $arrayOfServiceSeeker = $serviceSeeker->getServiceSeekerInfo("name", $loggedInServiceSeekerName);

            $sessionStatus = $arrayOfServiceSeeker['name'];
        }
    }

    echo $sessionStatus;
}

// Todo: Get Logged-in SS-Id to confirm hiring process.
if (isset($_GET['getLoggedInSsId']) && isset($_GET['selectedServiceProviderId'])) {

    $loggedInSsName = $_GET['getLoggedInSsId']; // Ex: Mushkir%20Mohamed

    $selectedSpId = $_GET['selectedServiceProviderId']; // Service Provider id

    $nameInArray = explode("%20", $loggedInSsName); // Changing the name

    $serviceSeekerName = implode(" ", $nameInArray);

    // 1. Get the ss id using recieved ss name.
    $arrayOfSsInfo = $serviceSeeker->getServiceSeekerInfo("name", $serviceSeekerName);

    // 2. Confirm the service hiring (Insert data in table_services)
    $serviceSeekerId = $arrayOfSsInfo['service_seeker_id'];
    $serviceSeekerName = $arrayOfSsInfo['name'];

    // 3. desc - Currently Pending and it need to update by Service Provider while payment process.
    $description = "Pending";

    // 4. service_charge - (Need to get from DB. While payment process it need to update)
    $arrayOfSpData = $serviceProvider->getServiceProviderInfoById($selectedSpId);

    $spName = $arrayOfSpData['name'];

    $spContactNo = $arrayOfSpData['contact_no'];

    // $serviceCharge = $arrayOfSpData['price'];
    $serviceCharge = -1; // ! Service charge will be given after the final completion of service. Until then, it is in pending state. -1 means, "Pending."

    // 5. service_agreed
    $serviceAgreed = 0; // It means false. It will update as 1 (true) while SP accepting request

    // 6. service_status
    $status = "waiting"; // It will update after payment process.

    // 7. payment_status
    $paymentStatus = -1;

    // 8. feedback status
    $feedbackStatus = 0;

    // * Save the hiring process in table_services table.
    $confirmedHiringProcess = $services->addNewServiceInfo($selectedSpId, $serviceSeekerId, $description, $serviceCharge, $serviceAgreed, $status, $paymentStatus, $feedbackStatus);

    if ($confirmedHiringProcess == true) {

        $arrayOfResult = serialize(array("servicProviderName" => $spName, "serviceSeekerName" => $serviceSeekerName, "serviceProviderContactNumber" => $spContactNo));

        $stringArray = unserialize($arrayOfResult);

        echo json_encode($stringArray);
    }
}

// Todo: Need to show all service hiring summary in profile dashboard (Hiring Log) to SS.
if (isset($_POST['request']) && $_POST['request'] == 'showSsAllHistoryLog') {
    $result = "";

    if (isset($_SESSION['serviceSeekerName'])) {
        // * Steps:
        // * 1. Need to get logged-in username using SESSION.
        $loggedInSsName = $_SESSION['serviceSeekerName'];

        // * 2. Need to get the ID of logged-in SS using their name in 'table_service_seeker' table.
        $arrayOfSsInfo = $serviceSeeker->getServiceSeekerInfo("name", $loggedInSsName);
        $serviceSeekerId = $arrayOfSsInfo['service_seeker_id'];

        // * 3. Get the details from 'table_services' table using fetched Id in Step 2.
        $query = "SELECT ts.services_id, ts.provider_id, ts.description, ts.service_charge, 
        ts.service_status, ts.date_time, ts.payment_status, tsp.name, ts.feedback_status AS feedbackStatus
        FROM table_services ts JOIN table_service_provider tsp ON ts.provider_id = tsp.service_provider_id
        WHERE ts.seeker_id = $serviceSeekerId";

        $arrayOfHiringProcessInfo = $db->getMultipleData($query);

        // echo var_dump($arrayOfHiringProcessInfo);

        // * 4. Get the all the detail such as provider name, provider id, description, service charge and service status using the id & Display the results in UI.
        $serialNo = 1;
        $result .= '<table class="table-auto mx-auto [&>tbody>*:nth-child(even)]:bg-[#99767B] table border-2 border-[#6D2932] w-full" id="all-hiring-process-table">
        <thead class="bg-[#6D2932] text-white text-center">
            <th class="p-2 text-center">S.No</th>
            <th class="p-2 text-center">Service ID</th>
            <th class="p-2 text-center">Service Provider ID</th>
            <th class="p-2 text-center">Service Provider Name</th>
            <th class="p-2 text-center">Service Description</th>
            <th class="p-2 text-center">Service Charge</th>
            <th class="p-2 text-center">Status</th>
            <th class="p-2 text-center">Date</th>
            <th class="p-2 text-center">Time</th>
            <th class="p-2 text-center">Payment</th>
            <th class="p-2 text-center">Feedback</th>
        </thead>
        <tbody>';

        foreach ($arrayOfHiringProcessInfo as $data) {

            $serviceId  = $data['services_id'];
            $serviceProviderId  = $data['provider_id'];
            $serviceDesc  = $data['description'];
            $serviceCharge  = $data['service_charge'];
            $serviceStatus  = $data['service_status'];
            $serviceProviderName  = $data['name'];
            $dateTime  = $data['date_time'];
            $paymentStatus = $data['payment_status'];
            $feedbackStatus = $data['feedbackStatus'];

            $arrayOfDateTime = explode(" ", $dateTime);

            $date = $arrayOfDateTime[0];
            $time = $arrayOfDateTime[1];


            $desc = "";
            $serviceChargeAmount = "";

            $serviceDesc == "Pending" ? $desc = "Will be updated by $serviceProviderName" : $desc = $serviceDesc;
            $serviceCharge == -1 ? $serviceChargeAmount = "Negotiable and it will be updated by $serviceProviderName after finishing required service process." : $serviceChargeAmount = "Rs. $serviceCharge";

            $result .= '<tr>
            <td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2">#' . $serialNo++ . '</td>
            <td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2">' . $serviceId . '</td>
            <td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2">' . $serviceProviderId . '</td>
            <td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2">' . $serviceProviderName . '</td>
            <td class="px-3 py-1.5 border-r-[#6D2932] border-r-2 text-left">
            ' . $desc . '
            </td>

            <td class="text-left px-1 py-1.5 border-r-[#6D2932] border-r-2">' . $serviceChargeAmount . '</td>
            <td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2 capitalize">
            ' . $serviceStatus . '
            </td>
            <td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2">' . $date . '</td>
            <td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2">' . $time . '</td>';

            if ($paymentStatus == -1) {

                $result .= '<td class="text-left px-1 py-1.5 border-r-[#6D2932] border-r-2">
                <a href="serviceId=' . $serviceId . '" class=" hover:underline" id="navigateSummaryPageBtn" title="Click to show payment detail">Waiting for Service Provider Confirmation</a>
                </td>';
            } else if ($paymentStatus == 0) {

                $result .= '<td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2">
                <a href="serviceId=' . $serviceId . '" class=" hover:underline" id="navigateSummaryPageBtn">Click to Pay</a>
                </td>';
            } else {

                $result .= ' <td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2">
                <a href="serviceId=' . $serviceId . '" class=" hover:underline" id="navigateSummaryPageBtn" title="Click to show payment detail">Paid</a>
                </td>';
            }

            // Based on the feedback status, it need to sahow the response.
            if ($feedbackStatus == 0) {

                $result .= '<td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2 capitalize">
                <a href="' . $serviceId . '" class=" hover:underline" id="feedback-btn">Click to Say</a>
                </td>';
            } else {

                $result .= '<td class="text-center px-1 py-1.5 border-r-[#6D2932] border-r-2 capitalize">
            <a href="' . $serviceId . '" class=" hover:underline" id="feedback-btn"><box-icon type="solid" name="badge-check"></box-icon> </a>
            </td>';
            }

            $result .= '</tr>';
        }

        $result .= '</tbody></table>';
    } else {

        $result = 0;
    }

    echo $result;
}

// Todo: Need to count and show total pending hiring process in SS profile dashboard
if (isset($_POST['request']) && $_POST['request'] == 'countTotalPendingHiringProcess') {

    $count;
    // * Steps:
    // * 1. Get the name of SP using SESSION.
    if (isset($_SESSION['serviceSeekerName'])) {

        // * 2. Get the id of SS which is received in step 1.
        $sessionSsName = $_SESSION['serviceSeekerName'];

        $getServiceSeekerData = $serviceSeeker->getServiceSeekerInfo("name", $sessionSsName);

        $ssId = $getServiceSeekerData['service_seeker_id'];

        // * 3. Get the results in Services table based on ss-id and "Pending" condition.
        $query = "SELECT * FROM table_services WHERE seeker_id = $ssId AND service_status = 'waiting'";

        $results = $db->countMultipleData($query);

        $count = $results;
    } else {

        $count = 0;
    }
    // * 4. Return to Frontend.
    echo $count;
}

// Todo: Need to show all service provider service summary in dashboard.
if (isset($_POST["request"]) && $_POST["request"] == 'showAllServiceProviderSummary') {

    $result = "";

    if (isset($_SESSION['serviceProviderName'])) {

        // * Steps:
        // * 1. Need to get logged-in username using SESSION.
        $sessionSpName = $_SESSION['serviceProviderName'];

        // * 2. Need to get the ID of logged-in SP using their name in 'table_service_provider' table.
        $arrayOfSpInfo = $serviceProvider->getServiceProviderInfo('name', $sessionSpName);

        $spId = $arrayOfSpInfo['service_provider_id'];

        // * 3. Get the details from 'table_services' table using fetched Id in Step 2.
        $query = "SELECT ts.services_id, ts.seeker_id, ts.description, ts.service_charge, ts.service_agreed, ts.service_status, ts.date_time, tss.name, tss.contact_no, ts.payment_status AS paymentStatus 
        FROM table_services ts JOIN table_service_provider tsp ON ts.provider_id = tsp.service_provider_id 
        JOIN table_service_seeker tss ON ts.seeker_id = tss.service_seeker_id WHERE tsp.service_provider_id = $spId";

        $arrayOfServiceSeekerInfo = $db->getMultipleData($query);

        // * 4. Get the all the detail such as seeker name, seeker id, description, service charge and service status using the id & Display the results in UI.
        $serialNo = 1;
        $result .= '<table class="table-auto mx-auto [&>tbody>*:nth-child(even)]:bg-gray-300 table border-2 border-gray-400 w-full text-center" id="spServiceSummaryTable">
        <thead>
            <tr class=" bg-gray-400 text-gray-700 text-center">
                <th class="p-2 text-center">S.No</th>
                <th class="p-2 text-center">Service Seeker ID</th>
                <th class="p-2 text-center">Service Seeker Name</th>
                <th class="p-2 text-center">Service Seeker Contact No</th>
                <th class="p-2 text-center">Accept / Reject</th>
                <th class="p-2 text-center">Service Description</th>
                <th class="p-2 text-center">Service Charge</th>
                <th class="p-2 text-center">Status</th>
                <th class="p-2 text-center">Date</th>
                <th class="p-2 text-center">Time</th>
                <th class="p-2 text-center">Payment Status</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($arrayOfServiceSeekerInfo as $data) {
            $serviceId = $data['services_id'];
            $serviceSeekerId = $data['seeker_id'];
            $serviceDesc = $data['description'];
            $serviceCharge = $data['service_charge'];
            $serviceAgreed = $data['service_agreed'];
            $serviceStatus = $data['service_status'];
            $serviceSeekerName = $data['name'];
            $serviceSeekerContactNo = $data['contact_no'];
            $dateTime = $data['date_time'];
            $paymentStatus = $data['paymentStatus'];

            $arrayOfDateTime = explode(" ", $dateTime);
            $date = $arrayOfDateTime[0];
            $time = $arrayOfDateTime[1];


            $result .= '<tr>
            <td class="px-1 py-1.5 text-center border-gray-400 border-r-2">#' . $serialNo++ . '</td>
            <td class="px-1 py-1.5 text-center border-gray-400 border-r-2">' . $serviceSeekerId . '</td>
            <td class="px-1 py-1.5 text-center border-gray-400 border-r-2">' . $serviceSeekerName . '</td>
            <td class="px-1 py-1.5 text-center border-gray-400 border-r-2"><a href="tel:' . $serviceSeekerContactNo . '" class="block text-center hover:transition 500" id="cta" title="Tap to call to ' . $serviceSeekerName . '">' . $serviceSeekerContactNo . '</a></td>';

            if ($serviceAgreed == 0) {
                $output = "Confirm";
                $result .= '<td class="px-1 py-1.5 text-center border-gray-400 border-r-2"><a href="serviceId=' . $serviceId . '" class="hover:underline hover:transition 500 hover:text-gray-700 block text-center" id="btnConfirm" title="Click to confirm or reject this request">' . $output . '</a></td>';
            } else {
                $output = "Accepted";
                $result .= '<td class="px-1 py-1.5 text-center border-gray-400 border-r-2">' . $output . '</td>';
            }

            /*
            While accepting the service request, the description status will be defined as "Pending". So, after the 
            completion of service, the Service provider need to enter the service description ($serviceDesc) by himself.
            So, in the initial time this field need to be editable. after enter the description by SP, it need to be
            unchangeable. This condition is doing that process.
            */
            if ($serviceDesc == "Pending") {

                $desc = "Click to add description details";
                $result .=  '    <td class="px-1 py-1.5 border-gray-400 border-r-2"> <a href="serviceId=' . $serviceId . '" class="hover:underline text-left block hover:transition 500 hover:text-gray-700" id="serviceDes">' . $desc . '</a> </td>';
            } else {

                $desc = $serviceDesc;
                $result .= '    <td class="px-1 py-1.5 border-gray-400 border-r-2">' . $desc . '</td>';
            }

            if ($serviceCharge == -1) {

                $serviceChargeAmount = "Add Service Charge";
                $result .= '<td class="px-1 py-1.5 border-gray-400 border-r-2"> <a href="serviceId=' . $serviceId . '" class="hover:text-gray-700 hover:transition 500 hover:underline text-left block" id="serviceCharge">' . $serviceChargeAmount . '</a></td>';
            } else {

                $serviceChargeAmount = $serviceCharge;
                $result .= '<td class="px-1 py-1.5 border-gray-400 border-r-2">Rs. ' . $serviceChargeAmount . '</td>';
            }


            $result .= '<td class="px-1 py-1.5 border-gray-400 border-r-2 capitalize">' . $serviceStatus . '</td>

            <td class="px-1 py-1.5 border-gray-400 border-r-2 capitalize">' . $date . '</td>
            <td class="px-1 py-1.5 border-gray-400 border-r-2 capitalize">' . $time . '</td>';

            if ($paymentStatus == 0) {
                $result .= '<td class="px-1 py-1.5 text-center border-gray-400 border-r-2">
            Pending
        </td>';
            } else {
                $result .= '<td class="px-1 py-1.5 text-center border-gray-400 border-r-2">
                Paid
            </td>';
                //         <td class="px-1 py-1.5 border-gray-400 border-r-2">
                //     <a href="#" class="hover:underline hover:transition 500 hover:text-gray-700">Pending</a>
                // </td>
            }

            $result .= '</tr>';
        }

        $result .= '</tbody></table>';
    } else {

        $result = 0;
    }

    echo $result;
}

// Todo: Need to count and show all pending service summary of logged-in SP in dashboard.
if (isset($_POST['request']) && $_POST['request'] == 'countPendingServices') {

    $count;

    if (isset($_SESSION['serviceProviderName'])) {

        $sessionSpName = $_SESSION['serviceProviderName'];

        $arrayOfServiceProviderInfo = $serviceProvider->getServiceProviderInfo("name", $sessionSpName);
        $serviceProviderId = $arrayOfServiceProviderInfo['service_provider_id'];

        $query = "SELECT * FROM table_services WHERE provider_id = $serviceProviderId AND service_status = 'waiting'";

        $result = $db->countMultipleData($query);

        if ($result == 0) {

            $count = 0;
        } else {
            $count = $result;
        }
    } else {

        $count = 401;
    }

    echo $count;
}

// Todo: Need to check is there any new request / not while logging-in.
if (isset($_POST["request"]) && $_POST["request"] == 'checkNewServiceHiringRequest') {

    if (isset($_SESSION['serviceProviderName'])) {

        // * 1. Get the service provider name using SESSION.
        $sessionSpName = $_SESSION['serviceProviderName'];

        // * 2. Get the ID of the SP
        $arrayOfSpInfo = $serviceProvider->getServiceProviderInfo('name', $sessionSpName);
        $spId = $arrayOfSpInfo['service_provider_id'];

        // * 3. Check in 'table_services' table any new request required / not.
        $query = "SELECT * FROM table_services WHERE provider_id = $spId AND service_status = 'waiting'";
        $resultOfCount = $db->countMultipleData($query);

        // * 4. If it is request > 0, need to alert to user.
        if ($resultOfCount == 1) {

            $req = 1;
        } else if ($resultOfCount > 1) {

            $req = $resultOfCount;
        } else {

            $req = 0;
        }

        echo $req;
    }
}

// Todo: Get the Service seeker name
if (isset($_GET['id'])) {

    // * 1. Need to get the service id.
    $serviceId = $_GET['id'];

    // * 2. Get the service seeker name using seeker_id in 'table_services' table.
    $query = "SELECT ts.seeker_id, tss.name FROM table_services ts JOIN table_service_seeker tss ON ts.seeker_id = tss.service_seeker_id WHERE ts.services_id = $serviceId";
    $result = $db->getMultipleData($query);

    // * 3. Return to Frontend
    echo $result[0]['name'];
}

// Todo: Need to do Confirm Process by SP.
if (isset($_GET['serviceId'])) {

    if (isset($_GET["request"]) && $_GET["request"] == "acceptRequest") {

        $serviceId = $_GET['serviceId'];
        $result = "";

        $query = "UPDATE table_services SET service_status = 'on process', service_agreed = 1, payment_status = 0 WHERE services_id = $serviceId";

        $arrayOfServiceInfo = $services->getServiceInfoById($serviceId);
        $serviceProviderId = $arrayOfServiceInfo['provider_id'];
        $serviceSeekerId = $arrayOfServiceInfo['seeker_id'];
        $serviceCharge = $arrayOfServiceInfo['service_charge'];
        $paymentStatus = "Pending";

        $insertPaymentInfo = $payment->insertNewPayment($paymentStatus, $serviceSeekerId, $serviceProviderId, $serviceId, $serviceCharge);

        $updateStatus = $db->updateDataByQuery($query);

        if ($updateStatus == true && $insertPaymentInfo == true) {

            $arrayOfServiceInfo = $services->getServiceInfoById($serviceId);

            $spId = $arrayOfServiceInfo["provider_id"];

            $query = "UPDATE table_service_provider SET status = 'busy' WHERE service_provider_id = $spId";

            $updateSpStatusAsBusy = $db->updateDataByQuery($query);

            if ($updateSpStatusAsBusy == true) {

                $result = 1;
            }
        }

        echo $result;
    }
}

if (isset($_GET["serviceIdForDelReq"])) {

    if (isset($_GET["request"]) && $_GET["request"] == 'deleteRequest') {

        $serviceId = $_GET["serviceIdForDelReq"];

        $deleteServiceInfo = $services->deleteServicesInfo($serviceId);

        if ($deleteServiceInfo == true) {
            $result = 1;
        }

        echo $result;
    }
}

// Todo: Check the service provider state
if (isset($_POST["request"]) && $_POST['request'] == "checkUserState") {

    if (isset($_SESSION['serviceProviderName'])) {

        $spName = $_SESSION['serviceProviderName'];

        // * 1. Get the id of SP using Name
        $arrayOfSpInfo = $serviceProvider->getServiceProviderInfo("name", $spName);
        $serviceProviderID = $arrayOfSpInfo['service_provider_id'];

        // * 2. Get the status
        $arrayOfSpData = $serviceProvider->getServiceProviderInfoById($serviceProviderID);
        $spStatus = $arrayOfSpData['status'];

        // * 3. Based on the status return value to frontend
        if ($spStatus == 'busy') {

            $res = 0;
        } else {

            $res = 1;
        }

        echo $res;
    }
}

// Todo: Need to change state as busy and available by SP.
if (isset($_GET["passedServiceProviderId"])) {

    if (isset($_SESSION['serviceProviderName'])) {


        // * Steps:
        // * 1. Need to get the SP-ID.
        $sessionSpId = $_GET["passedServiceProviderId"];

        // * 2. Check the status.
        $arrayOfSpInfo = $serviceProvider->getServiceProviderInfoById($sessionSpId);
        $spStatus = $arrayOfSpInfo['status'];

        // * 3. If it is "busy", update as "available".
        if ($spStatus == "busy") {

            $query = "UPDATE table_service_provider SET status = 'available' WHERE service_provider_id = $sessionSpId";
            $updateState = $db->updateDataByQuery($query);

            if ($updateState == true) {

                $result = 1;
            }
        } else {

            $query = "UPDATE table_service_provider SET status = 'busy' WHERE service_provider_id = $sessionSpId";
            $updateState = $db->updateDataByQuery($query);

            if ($updateState == true) {

                $result = 0;
            }
        }

        echo $result;
    }
}

// Todo: Need to count total new requests
if (isset($_POST['request']) && $_POST['request'] == 'countTotalRequest') {

    $isRequestExist = $serviceProvider->countTotalServiceProviders("profile_status", "pending");

    echo $isRequestExist;
}

// Todo: Need to check new request of SP.
if (isset($_POST['request']) && $_POST['request'] == "checkNewRequests") {

    $query = "SELECT * FROM table_service_provider WHERE profile_status = 'pending'";

    $isRequestExist = $db->countMultipleData($query);

    $output = "";

    if ($isRequestExist > 0) {

        $arrayOfSpRequest = $db->getMultipleData($query);

        foreach ($arrayOfSpRequest as $data) {

            $spId = $data['service_provider_id'];
            $spName = $data['name'];
            $spQualification = $data['qualification'];
            $spImage = $data['image'];

            $output .= '<div class="w-full max-w-[310px] rounded-lg shadow bg-[#d7ccbe]">
            <div class="flex flex-col items-center pb-10 pt-10">
                <img class="w-24 h-24 mb-3 rounded-full object-cover shadow-lg" src="/skill-wave-service-hiring-app/ajax-file/uploads/' . $spImage . '" alt="Bonnie image" />
                <h5 class="mb-1 text-xl font-bold text-[#6D2932]">' . $spName . '</h5>
                <span class="text-sm text-gray-600">' . $spQualification . '</span>
                <div class="flex gap-4 items-center  mt-4 md:mt-6">
                    <a href="' . $spId . '" id="viewBtn" title="View Profile" class="bg-[#6D2932] text-white p-2 rounded-md hover:bg-[#7b3e46] hover:transition 500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5M12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5s5 2.24 5 5s-2.24 5-5 5m0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3s3-1.34 3-3s-1.34-3-3-3" />
                        </svg>
                    </a>
                    <a href="' . $spId . '" class=" bg-green-800 p-2 rounded-md text-white hover:bg-green-700 hover:transition 500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 15 15">
                            <path fill="currentColor" fill-rule="evenodd" d="M0 7.5a7.5 7.5 0 1 1 15 0a7.5 7.5 0 0 1-15 0m7.072 3.21l4.318-5.398l-.78-.624l-3.682 4.601L4.32 7.116l-.64.768z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="' . $spId . '" class=" bg-red-700 text-white p-2 rounded-md hover:bg-red-600 hover:transition 500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M19.1 4.9C15.2 1 8.8 1 4.9 4.9S1 15.2 4.9 19.1s10.2 3.9 14.1 0s4-10.3.1-14.2m-4.3 11.3L12 13.4l-2.8 2.8l-1.4-1.4l2.8-2.8l-2.8-2.8l1.4-1.4l2.8 2.8l2.8-2.8l1.4 1.4l-2.8 2.8l2.8 2.8z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>';
        }
    } else {

        $output = "0";
    }

    echo $output;
}

// Todo: Need to notify new SP request to admin
if (isset($_POST["request"]) && $_POST["request"] == "notifyNewRequest") {

    $query = "SELECT * FROM table_service_provider WHERE profile_status = 'pending'";

    $isPendingRequestExist = $db->countMultipleData($query);

    echo $isPendingRequestExist;
}

// Todo: Need to Fetch all the details of requested Sp detail using Id through GET method
if (isset($_GET['getNewServiceProviderId'])) {
    // * Get the Sp-id using GET method
    $newSpId = $_GET['getNewServiceProviderId'];

    // * Get all the details of id, town name, & disatrict name.
    $arrayOfNewSpInfo = $serviceProvider->getServiceProviderInfoById($newSpId);

    $query = "SELECT tsp.*, tt.name AS town_name, td.name AS district_name FROM table_service_provider tsp 
    JOIN table_town tt ON tsp.town_id = tt.town_id
    JOIN table_district td ON tsp.district_id = td.district_id
    WHERE tsp.service_provider_id = $newSpId";


    $arrayOfSpData = $db->getMultipleData($query);

    echo json_encode($arrayOfSpData);
}

// Todo: Accept the New request of Sp.
if (isset($_GET['acceptSpRequest'])) {

    // * 1. Get the SP-id using GET.
    $serviceProviderID = $_GET['acceptSpRequest'];

    // * 2. Get the name, email, subject, and message using SP-id got from step 1.
    $arrayOfSP = $serviceProvider->getServiceProviderInfoById($serviceProviderID);
    $spName = $arrayOfSP['name'];
    $spEmail = $arrayOfSP['email_address'];

    // * 3. Update the profile status from "pending" to "accepted."
    $query = "UPDATE table_service_provider SET profile_status = 'accepted' WHERE service_provider_id = $serviceProviderID";

    $accpetSpRequest = $db->updateDataByQuery($query);

    if ($accpetSpRequest) {

        // * 4. Need to send accept mail to SP
        // Subject
        $subject = "Acknowledgment of Accepted Service Provider Request";

        // Message
        $body = "<body>
        <p>Dear " . $spName . ",</p>
        <p>We hope this message finds you in high spirits!</p>
        <p>We are thrilled to extend our heartfelt congratulations to you on the acceptance of your service provider request. Your profile underwent a comprehensive review, and we are delighted to inform you that there were no discrepancies or negative findings during this process.</p>
        <p>Your dedication to joining our platform as a service provider is commendable, and we are confident that your skills and expertise will enrich our community of users.</p>
        <p>If you have any queries or require further assistance, please do not hesitate to reach out to us. We eagerly anticipate witnessing your success as a valued service provider on our platform.</p>
        <p>Warm regards,</p>
        <p>Skill-Wave Service Hiring Platform,<br>
        The Admin,<br>
        Tel: +94 777195282.</p>
    </body>";

        $db->sendEmail($spName, $spEmail, $subject, $body);

        $response[] = array("status" => 200, "message" => "$spName's request accepted");
    } else {
        $response[] = array("status" => 500, "message" => "Currenly cannot proceed this process. Please try again!");
    }

    echo json_encode($response);
}

// ! Need to implement Rejection of New Request with mail feature.

// Todo: Need to verify the service-id and add the service description detail.
if (isset($_POST['req']) && $_POST['req'] == 'updateDesc') {

    // * 1. Get all the data from form element.
    $serviceId = $_POST['service-id'];
    $serviceDescriptionEl  = $_POST['add-service-desc'];

    // * 2. Update the description using recieved input to relevent id.
    $query = "UPDATE table_services SET description = '$serviceDescriptionEl' WHERE services_id = $serviceId";

    $updateDesc = $db->updateDataByQuery($query);

    if ($updateDesc) {
        $response[] = array("status" => 200);
    }

    echo json_encode($response);
}

// Todo: Need to update the service charge using service-id.
if (isset($_POST["request"]) && $_POST["request"] == "updateServiceCharge") {

    // * Steps: 
    // * 1. Need to Get the service-id & service charge from frontend.
    $serviceId = $_POST['service-id-for-charge'];
    $serviceChargeAmount = $_POST['add-service-charge'];

    // * 2. update service charge, service status = "completed" in "table_services" table and amount in "table_payment" which is entered by SP.
    $queryForUpdateInTblServices = "UPDATE table_services SET service_charge = $serviceChargeAmount, service_status = 'completed'  WHERE services_id = $serviceId";
    $queryForUpdateInTblPayment = "UPDATE table_payment SET amount = $serviceChargeAmount WHERE services_id = $serviceId";

    $updateServiceCharge = $db->updateDataByQuery($queryForUpdateInTblServices);
    $updateServiceChargeInPaymentTbl = $db->updateDataByQuery($queryForUpdateInTblPayment);

    if ($updateServiceCharge && $updateServiceChargeInPaymentTbl) {
        // * 3. If both conditions become true, the SP's state need to change from "busy" to "available".
        $arrayOfServiceInfo = $services->getServiceInfoById($serviceId);

        $serviceProviderID = $arrayOfServiceInfo['provider_id'];

        $query = "UPDATE table_service_provider SET status = 'available' WHERE service_provider_id = $serviceProviderID";
        $db->updateDataByQuery($query);

        $response[] = array("status" => 200, "amount" => $serviceChargeAmount);
    }

    echo json_encode($response);
}

// Todo: Need to logout SP
if (isset($_POST['request']) && $_POST['request'] == 'spLogout') {

    if (isset($_SESSION['serviceProviderName'])) {
        session_start();
        session_unset();
        session_destroy();
    }
}

// Todo: Get the all details of selected service using service-id to do payment by SS.
if (isset($_GET['getParsedServiceIdInfo'])) {

    $serviceId = $_GET['getParsedServiceIdInfo'];

    $query = "SELECT ts.*, tsp.name AS providerName FROM table_services ts JOIN table_service_provider tsp ON ts.provider_id = tsp.service_provider_id WHERE services_id = $serviceId";
    $arrayOfServiceInfo = $db->getMultipleData($query);

    echo json_encode($arrayOfServiceInfo);
}

// Todo: Get the service-id from Payment portal, update the payment status as "Paid" and navigate to SS dashboard after update.
if (isset($_GET["paidServiceId"])) {

    $serviceId = $_GET["paidServiceId"];

    // * 1. Need to update date and time and status of `table_payment` table.
    $query = "UPDATE table_payment SET status = 'Paid', date_time = NOW() WHERE services_id = $serviceId";
    $updateAsPaymentRecieved = $db->updateDataByQuery($query);

    // * 1.1 Update payment status in "table_services" table.
    $updateQuery = "UPDATE table_services SET payment_status = 1 WHERE services_id = $serviceId";
    $updatePaymentStatus = $db->updateDataByQuery($updateQuery);

    if ($updateAsPaymentRecieved && $updatePaymentStatus) {

        // * 2. After the successfull payment, need to send email to relevent service provider as payment received.
        $query = "SELECT ts.*, tsp.name AS provider_name, tsp.email_address AS provider_email, tss.name AS seeker_name  FROM 
        table_services ts JOIN table_service_provider tsp ON ts.provider_id = tsp.service_provider_id
        JOIN table_service_seeker tss ON ts.seeker_id = tss.service_seeker_id WHERE ts.services_id = $serviceId";

        $serviceInfo = $db->getMultipleData($query);

        $spName = $serviceInfo[0]['provider_name'];
        $spEmail = $serviceInfo[0]['provider_email'];
        $ssName = $serviceInfo[0]['seeker_name'];
        $spServiceCharge = $serviceInfo[0]['service_charge'];

        $serviceIdNewFormat = "";

        $serviceId < 10 ? $serviceIdNewFormat = "0" . $serviceId : $serviceIdNewFormat = $serviceId;

        $subject = "Notification: Payment Credited for Service ID No. $serviceIdNewFormat";

        $body = "<body>
        <p>Dear $spName,</p>
        <p>We trust this message finds you well. We are pleased to inform you that the payment for Service ID No. $serviceIdNewFormat, amounting to Rs. $spServiceCharge, has been successfully credited by $ssName. Your contribution is greatly appreciated, and we extend our gratitude for your continued support as a valued member of our platform.</p>
        <p>Should any concerns arise or should you require further assistance, please do not hesitate to contact us. Our dedicated team is readily available to address any queries you may have.</p>
        <p>Once again, we express our gratitude for choosing to be a part of our platform. We eagerly anticipate the opportunity to continue serving you and ensuring your satisfaction.</p>
        <p>Best regards,</p><br>
        <p>The Admin,<br>
        Skill-Wave Service Hiring Platform,<br>
        Tel: +94 777195282</p>
        </body>";

        $db->sendEmail($spName, $spEmail, $subject, $body);
    }
    echo "<script>window.location.href = '/skill-wave-service-hiring-app/service-seekers/dashboard.php?feedback'</script>";
}

// Todo: Need to check Payment status. Based on status need to give response to frontend in SS Hiring Log
if (isset($_GET["checkPaymentStatus"])) {

    $serviceId = $_GET["checkPaymentStatus"];

    $arrayOfPaymentInfo = $payment->getPaymentInfo("services_id", $serviceId);

    // echo var_dump($arrayOfPaymentInfo);
    if (empty($arrayOfPaymentInfo[0])) {

        $result[] = array("payment_status" => "404");
    } else {

        $paymentStatus = $arrayOfPaymentInfo[0]['status'];

        $paymentStatus == "Paid" ? $result[] = array("payment_status" => "Paid") : $result[] = array("payment_status" => "Pending");
    }

    echo json_encode($result);
}

// Todo: Get the paid service related info and show in hiring log UI, when user clicks "Paid" button
if (isset($_POST['paidServiceId'])) {

    $paidServiceId = $_POST['paidServiceId'];
    // echo $paidServiceId;


    $query = "SELECT ts.*, tsp.name AS serviceProviderName 
    FROM table_services ts JOIN table_service_provider tsp ON ts.provider_id = tsp.service_provider_id WHERE ts.services_id = $paidServiceId";

    $paidServiceData = $db->getMultipleData($query);

    echo json_encode($paidServiceData);
}

// Todo: Need to verify the feedback and return the status to frontend
if (isset($_POST['request']) && $_POST['request'] == "verifyFeedbackExist") {

    // * Get the service-id
    $serviceId = $_POST['serviceId'];

    // * Check in db is any feedback exist or not in this service-id.
    $feedbackInfo = $feedback->getFeedbackInfoById("service_id", $serviceId);

    // echo var_dump($feedbackInfo);
    // * Return the response object to frontend.
    echo json_encode($feedbackInfo);
}

// Todo: Need to insert new feedback based on service-id
if (isset($_POST['request']) && $_POST['request'] == "addServiceFeedback") {

    // print_r($_REQUEST);
    // * Get the service provider id using service-id.
    $serviceIdEl = $_POST['service-id'];
    $ssId = $_POST['ss-id']; // * Service Seeker id

    $getServiceInfo = $services->getServiceInfoById($serviceIdEl);

    $spId = $getServiceInfo['provider_id'];

    $feedbackSubjectEl = $_POST['subject'];
    $feedbackEl = $_POST["feedback"];
    $ratingEl = $_POST["rating"];

    $insertFeedback = $feedback->insertSsFeedback($spId, $feedbackSubjectEl, $feedbackEl, $ratingEl, $serviceIdEl, $ssId);

    if ($insertFeedback == true) {

        $query = "UPDATE `table_services` SET feedback_status = 1 WHERE services_id = $serviceIdEl";
        $db->updateDataByQuery($query);

        $serviceIdEl < 10 ? $newNumFormat = "0" . $serviceIdEl : $newNumFormat = $serviceIdEl;

        $message = "Your feedback for service ID number $newNumFormat has been successfully registered.";
        $response[] = array("status" => "200", "message" => $message);
    } else {

        $message = "Currently a technical error occured! Please try again later. Thank you!";
        $response[] = array("status" => "500", "message" => $message);
    }

    echo json_encode($response);
}

// Todo: Need to show feedback detail while ss clicks box-icon in hiring-log
if (isset($_POST['request']) && $_POST['request'] == "reqForGetFeedbackData") {

    $serviceId = $_POST['serviceId'];

    $getFeedbackDetails = $feedback->getFeedbackInfoById("service_id", $serviceId);

    echo json_encode($getFeedbackDetails[0]['data'][0]);
}

// Todo: Show all the sp in admin dashboard.
if (isset($_POST['request']) && $_POST['request'] == "showAllSpInAdminPanel") {

    $query = "SELECT tsp.*, td.name AS districtName, tt.name AS townName
    FROM table_service_provider tsp JOIN table_district td ON tsp.district_id = td.district_id
    JOIN table_town tt ON tsp.town_id = tt.town_id
    ";

    $arrayOfAllSpData = $db->getMultipleData($query);

    // echo var_dump($arrayOfAllSpData);

    $result = "";
    $sNo = 1;

    $result .= '<table class="[&>tbody>*:nth-child(even)]:bg-[#99767B] table border-2 border-[#6D2932] w-full text-center table-auto" id="sp-table">
        <thead>
            <tr class="bg-[#6D2932] text-[#F9F6EE] text-center">
                <th class="p-3 text-center">S.No</th>
                <th class="p-3 text-center">Service Provider ID</th>
                <th class="p-3 text-center">Image</th>
                <th class="p-3 text-center">Name</th>
                <th class="p-3 text-center">Email Address</th>
                <th class="p-3 text-center">Contact No.</th>
                <th class="p-3 text-center">Username</th>
                <th class="p-3 text-center">Gender</th>
                <th class="p-3 text-center">Address</th>
                <th class="p-3 text-center">District</th>
                <th class="p-3 text-center">Town</th>
                <th class="p-3 text-center">Qualification</th>
                <th class="p-3 text-center">Skills</th>
                <th class="p-3 text-center">Description</th>
                <th class="p-3 text-center">Keywords</th>
                <th class="p-3 text-center">Service Charge</th>
                <th class="p-3 text-center">Available state</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($arrayOfAllSpData as $data) {

        $spId = $data['service_provider_id'];
        $spName = $data['name'];
        $spEmail = $data['email_address'];
        $spContactNo = $data['contact_no'];
        $spUsername = $data['username'];
        $spGender = $data['gender'];
        $spAddress = $data['address_line'];
        $spQualification = $data['qualification'];
        $spSkills = $data['skills'];
        $spImage = $data['image'];
        $spDesc = $data['description'];
        $spKeywords = $data['keywords'];
        $spPrice = $data['price'];
        $spStatus = $data['status'];
        $spDistrictName = $data['districtName'];
        $spTownName = $data['townName'];


        $result .= '<tr>
                <td class="p-3 text-center border border-[#6D2932]">#' . $sNo++ . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spId . '</td>
                <td class="p-3 text-center border border-[#6D2932]">
                    <img class="rounded-full" src="/skill-wave-service-hiring-app/ajax-file/uploads/' . $spImage . '" alt="' . $spName . '\'s Image">
                </td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spName . '</td>
                <td class="p-3 text-center">
                    <a href="mailto:' . $spEmail . '">' . $spEmail . '</a>
                </td>
                <td class="p-3 text-center border border-[#6D2932]">
                    <a href="tel:' . $spContactNo . '">' . $spContactNo . '</a>
                </td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spUsername . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spGender . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spAddress . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spDistrictName . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spTownName . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spQualification . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spSkills . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spDesc . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spKeywords . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $spPrice . '</td>
                <td class="p-3 text-center border border-[#6D2932] capitalize">' . $spStatus . '</td>
                <td class="p-3 text-center border border-[#6D2932]">
                    <div class="flex justify-center gap-x-4 items-center">
                        <a href="' . $spId . '" class=" bg-green-500 text-white p-2 rounded-md hover:-translate-y-1 hover:transition 500" id="update-sp-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M21.194 2.806a2.753 2.753 0 0 1 0 3.893l-.496.496a4.61 4.61 0 0 1-.533-.151a5.19 5.19 0 0 1-1.968-1.241a5.19 5.19 0 0 1-1.241-1.968a4.613 4.613 0 0 1-.15-.533l.495-.496a2.753 2.753 0 0 1 3.893 0M14.58 13.313c-.404.404-.606.606-.829.78a4.59 4.59 0 0 1-.848.524c-.255.121-.526.211-1.068.392l-2.858.953a.742.742 0 0 1-.939-.94l.953-2.857c.18-.542.27-.813.392-1.068c.144-.301.32-.586.524-.848c.174-.223.376-.425.78-.83l4.916-4.915a6.7 6.7 0 0 0 1.533 2.36a6.702 6.702 0 0 0 2.36 1.533z" />
                                <path fill="currentColor" d="M20.536 20.536C22 19.07 22 16.714 22 12c0-1.548 0-2.842-.052-3.934l-6.362 6.362c-.351.352-.615.616-.912.847a6.08 6.08 0 0 1-1.125.696c-.34.162-.694.28-1.166.437l-2.932.977a2.242 2.242 0 0 1-2.836-2.836l.977-2.932c.157-.472.275-.826.437-1.166c.19-.399.424-.776.696-1.125c.231-.297.495-.56.847-.912l6.362-6.362C14.842 2 13.548 2 12 2C7.286 2 4.929 2 3.464 3.464C2 4.93 2 7.286 2 12c0 4.714 0 7.071 1.464 8.535C4.93 22 7.286 22 12 22c4.714 0 7.071 0 8.535-1.465" />
                            </svg>
                        </a>
                        <a href="' . $spId . '" class="text-white bg-red-500 p-2 rounded-md hover:-translate-y-1 hover:transition 500" id="delete-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 6.524c0-.395.327-.714.73-.714h4.788c.006-.842.098-1.995.932-2.793A3.68 3.68 0 0 1 12 2a3.68 3.68 0 0 1 2.55 1.017c.834.798.926 1.951.932 2.793h4.788c.403 0 .73.32.73.714a.722.722 0 0 1-.73.714H3.73A.722.722 0 0 1 3 6.524M11.607 22h.787c2.707 0 4.06 0 4.94-.863c.881-.863.971-2.28 1.151-5.111l.26-4.08c.098-1.537.146-2.306-.295-2.792c-.442-.487-1.187-.487-2.679-.487H8.23c-1.491 0-2.237 0-2.679.487c-.441.486-.392 1.255-.295 2.791l.26 4.08c.18 2.833.27 4.249 1.15 5.112C7.545 22 8.9 22 11.607 22" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>';
    }


    $result .=  '</tbody></table>';
    echo $result;
}

// Todo: List the town detail in SP update page
if (isset($_POST['request']) && $_POST['request'] == 'getTownList') {

    $result = "";

    $townDetails = $town->viewAllTownData();

    foreach ($townDetails as $data) {

        $townId = $data['town_id'];
        $townName = $data['name'];
        $result .= ' <option value="' . $townId . '">' . $townName . '</option>';
    }

    echo $result;
}

// Todo: List the district detail in SP update page
if (isset($_POST['request']) && $_POST['request'] == 'getDistrictList') {

    $result = "";


    $districtDetails = $district->viewDistrict();

    // echo var_dump($districtDetails);

    foreach ($districtDetails as $data) {

        $districtId = $data['district_id'];
        $districtName = $data['name'];
        $result .= ' <option value="' . $districtId . '">' . $districtName . '</option>';
    }

    echo $result;
}

// Todo: find the SP Town and District
if (isset($_POST['request']) && $_POST['request'] == 'getTownAndDistrictInfo') {

    $townId = $_POST['townId'];

    $townInfo = $town->getTownInfoById($townId);

    echo json_encode($townInfo);
}

// Todo: Delete SP by Admin
if (isset($_POST["request"]) && $_POST['request'] == "deleteSpByAdmin") {

    $spId = $_POST['spId'];

    $deleteSp = $serviceProvider->deleteServiceProvider($spId);

    if ($deleteSp == true) {
        echo "Deleted Successfully";
    }
}

// Todo: Need to show selcted sp info to admin
if (isset($_POST["request"]) && $_POST['request'] == "showSpAllDetail") {

    $spId = $_POST['spId'];

    $query = "SELECT tsp.*, td.name AS districtName, tt.name AS townName
    FROM table_service_provider tsp JOIN table_district td ON tsp.district_id = td.district_id
    JOIN table_town tt ON tsp.town_id = tt.town_id WHERE tsp.service_provider_id = $spId
    ";

    $spDataset = $db->getMultipleData($query);

    echo json_encode($spDataset);
}

// Todo: Update SP info by Admin
if (isset($_POST["request"]) && $_POST['request'] == "updateSpByAdmin") {

    $spId = $_POST['sp-id'];
    $spName = $_POST['sp-fullname'];
    $spEmail = $_POST['sp-email'];
    $spContactNo = $_POST['sp-contact-no'];
    $spUsername = $_POST['sp-username'];
    $spDistrict = $_POST['sp-district'];
    $spTown = $_POST['sp-town'];
    $spAddressline = $_POST['sp-address-line'];
    $spStartingPrice = $_POST['sp-starting-price'];
    $spQualification = $_POST['sp-qualification'];
    $spSkills = $_POST['sp-skills'];
    $spDesc = $_POST['sp-desc'];
    $spKeywords = $_POST['sp-keywords'];
    $img = $_FILES['fileInput'];

    $townInfo = $town->getTownInfoById($spTown);
    $townName = $townInfo['name'];

    $latitudeValue = $serviceProvider->getServiceProviderLatitudeValue($townName);
    $longitudeValue = $serviceProvider->getServiceProviderLongitudeValue($townName);

    if ($img['error'] == UPLOAD_ERR_NO_FILE) {
        $query = "UPDATE `table_service_provider` SET name = '$spName', email_address = '$spEmail',
        contact_no = '$spContactNo', username = '$spUsername', address_line = '$spAddressline',
        district_id = $spDistrict,  town_id = $spTown, latitude_value = '$latitudeValue', longitutde_value = '$longitudeValue',
        qualification = '$spQualification', skills = '$spSkills', description = '$spDesc', keywords = '$spKeywords',
        price = '$spStartingPrice' WHERE service_provider_id = $spId
        ";

        $updateSp = $db->updateDataByQuery($query);

        if ($updateSp == true) {
            $response[] = array("status" => "200", "message" => $spName . "'s data has been updated successfully.");
        }
    } else {

        $spProfilePic = $db->imageUpload($img);

        $query = "UPDATE `table_service_provider` SET name = '$spName', email_address = '$spEmail',
            contact_no = '$spContactNo', username = '$spUsername', address_line = '$spAddressline',
        district_id = $spDistrict,  town_id = $spTown, latitude_value = '$latitudeValue', longitutde_value = '$longitudeValue',
        qualification = '$spQualification', skills = '$spSkills', image = '$spProfilePic' , description = '$spDesc', keywords = '$spKeywords',
        price = '$spStartingPrice' WHERE service_provider_id = $spId
        ";

        $updateWithImg = $db->updateDataByQuery($query);

        if ($updateWithImg == true) {
            $response[] = array("status" => "201", "message" => $spName . "'s data has been updated successfully.");
        }
    }

    echo json_encode($response);
}


// Todo: Update SP info by SP
if (isset($_POST["request"]) && $_POST['request'] == "updateSp") {


    $spId = $_POST['service-providerid'];
    $spName = $_POST['service-providerfullname'];
    $spEmail = $_POST['service-provideremail'];
    $spContactNo = $_POST['service-providercontact-no'];
    $spUsername = $_POST['service-providerusername'];
    $spDistrict = $_POST['service-providerdistrict'];
    $spTown = $_POST['service-providertown'];
    $spAddressline = $_POST['service-provideraddress-line'];
    $spStartingPrice = $_POST['service-providerstarting-price'];
    $spQualification = $_POST['service-providerqualification'];
    $spSkills = $_POST['service-providerskills'];
    $spDesc = $_POST['service-providerdesc'];
    $spKeywords = $_POST['service-providerkeywords'];
    $img = $_FILES['fileInput'];

    $townInfo = $town->getTownInfoById($spTown);
    $townName = $townInfo['name'];

    $latitudeValue = $serviceProvider->getServiceProviderLatitudeValue($townName);
    $longitudeValue = $serviceProvider->getServiceProviderLongitudeValue($townName);

    if ($img['error'] == UPLOAD_ERR_NO_FILE) {
        $query = "UPDATE `table_service_provider` SET name = '$spName', email_address = '$spEmail',
        contact_no = '$spContactNo', username = '$spUsername', address_line = '$spAddressline',
        district_id = $spDistrict,  town_id = $spTown, latitude_value = '$latitudeValue', longitutde_value = '$longitudeValue',
        qualification = '$spQualification', skills = '$spSkills', description = '$spDesc', keywords = '$spKeywords',
        price = '$spStartingPrice' WHERE service_provider_id = $spId
        ";

        $updateSp = $db->updateDataByQuery($query);

        if ($updateSp == true) {
            $response[] = array("status" => "200", "message" => $spName . "'s data has been updated successfully.");
        }
    } else {

        $spProfilePic = $db->imageUpload($img);

        $query = "UPDATE `table_service_provider` SET name = '$spName', email_address = '$spEmail',
            contact_no = '$spContactNo', username = '$spUsername', address_line = '$spAddressline',
        district_id = $spDistrict,  town_id = $spTown, latitude_value = '$latitudeValue', longitutde_value = '$longitudeValue',
        qualification = '$spQualification', skills = '$spSkills', image = '$spProfilePic' , description = '$spDesc', keywords = '$spKeywords',
        price = '$spStartingPrice' WHERE service_provider_id = $spId
        ";

        $updateWithImg = $db->updateDataByQuery($query);

        if ($updateWithImg == true) {
            $response[] = array("status" => "201", "message" => $spName . "'s data has been updated successfully.");
        }
    }

    echo json_encode($response);
}

// Todo: Show all the ss in admin dashboard.
if (isset($_POST['request']) && $_POST['request'] == "showAllSsInAdminPanel") {

    $arrayOfAllSsData = $serviceSeeker->readAllServiceSeekers();

    // echo var_dump($arrayOfAllSpData);

    $result = "";
    $sNo = 1;

    $result .= '<table class="[&>tbody>*:nth-child(even)]:bg-[#99767B] table border-2 border-[#6D2932] w-full text-center table-auto" id="ss-table">
        <thead>
            <tr class="bg-[#6D2932] text-[#F9F6EE] text-center">
                <th class="p-3 text-center">S.No</th>
                <th class="p-3 text-center">Service Seeker ID</th>
                <th class="p-3 text-center">Image</th>
                <th class="p-3 text-center">Name</th>
                <th class="p-3 text-center">Email Address</th>
                <th class="p-3 text-center">Contact No.</th>
                <th class="p-3 text-center">Username</th>
                <th class="p-3 text-center">Gender</th>
                <th class="p-3 text-center">Address</th>
                <th class="p-3 text-center">City</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($arrayOfAllSsData as $data) {
        $serviceSeekerId = $data['service_seeker_id'];
        $ssName = $data['name'];
        $ssEmail = $data['email_address'];
        $ssContactNo = $data['contact_no'];
        $ssUsername = $data['username'];
        $ssGender = $data['gender'];
        $ssAddress = $data['address_line'];
        $ssCityName = $data['city'];
        $ssImg = $data['image'];


        $result .= '<tr>
                <td class="p-3 text-center border border-[#6D2932]">' . $sNo++ . '</td>
                <td class="p-3 text-center border border-[#6D2932]">' . $serviceSeekerId . '</td>
                <td class="p-3 text-center border border-[#6D2932]">
                    <img class="rounded-full" src="/skill-wave-service-hiring-app/ajax-file/uploads/' . $ssImg . '" alt="' . $ssName . '\'s Image">
                </td>
                <td class="p-3 text-center border border-[#6D2932]">' . $ssName . '</td>
                <td class="p-3 text-center">
                    <a href="mailto:' . $ssEmail . '">' . $ssEmail . '</a>
                </td>
                <td class="p-3 text-center border border-[#6D2932]">
                    <a href="tel:' . $ssContactNo . '">' . $ssContactNo . '</a>
                </td>
                <td class="p-3 text-center border border-[#6D2932] ">' . $ssUsername . '</td>
                <td class="p-3 text-center border border-[#6D2932] ">' . $ssGender . '</td>
                <td class="p-3 text-center border border-[#6D2932] ">' . $ssAddress . '</td>
                <td class="p-3 text-center border border-[#6D2932] ">' . $data['city'] . '</td>
                <td class="p-3 text-center border border-[#6D2932] ">
                    <div class="flex justify-center gap-x-4 items-center">
                        <a href="' . $serviceSeekerId . '" class=" bg-green-500 text-white p-2 rounded-md hover:-translate-y-1 hover:transition 500" id="update-ss-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M21.194 2.806a2.753 2.753 0 0 1 0 3.893l-.496.496a4.61 4.61 0 0 1-.533-.151a5.19 5.19 0 0 1-1.968-1.241a5.19 5.19 0 0 1-1.241-1.968a4.613 4.613 0 0 1-.15-.533l.495-.496a2.753 2.753 0 0 1 3.893 0M14.58 13.313c-.404.404-.606.606-.829.78a4.59 4.59 0 0 1-.848.524c-.255.121-.526.211-1.068.392l-2.858.953a.742.742 0 0 1-.939-.94l.953-2.857c.18-.542.27-.813.392-1.068c.144-.301.32-.586.524-.848c.174-.223.376-.425.78-.83l4.916-4.915a6.7 6.7 0 0 0 1.533 2.36a6.702 6.702 0 0 0 2.36 1.533z" />
                                <path fill="currentColor" d="M20.536 20.536C22 19.07 22 16.714 22 12c0-1.548 0-2.842-.052-3.934l-6.362 6.362c-.351.352-.615.616-.912.847a6.08 6.08 0 0 1-1.125.696c-.34.162-.694.28-1.166.437l-2.932.977a2.242 2.242 0 0 1-2.836-2.836l.977-2.932c.157-.472.275-.826.437-1.166c.19-.399.424-.776.696-1.125c.231-.297.495-.56.847-.912l6.362-6.362C14.842 2 13.548 2 12 2C7.286 2 4.929 2 3.464 3.464C2 4.93 2 7.286 2 12c0 4.714 0 7.071 1.464 8.535C4.93 22 7.286 22 12 22c4.714 0 7.071 0 8.535-1.465" />
                            </svg>
                        </a>
                        <a href="' . $serviceSeekerId . '" class="text-white bg-red-500 p-2 rounded-md hover:-translate-y-1 hover:transition 500" id="delete-ss-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 6.524c0-.395.327-.714.73-.714h4.788c.006-.842.098-1.995.932-2.793A3.68 3.68 0 0 1 12 2a3.68 3.68 0 0 1 2.55 1.017c.834.798.926 1.951.932 2.793h4.788c.403 0 .73.32.73.714a.722.722 0 0 1-.73.714H3.73A.722.722 0 0 1 3 6.524M11.607 22h.787c2.707 0 4.06 0 4.94-.863c.881-.863.971-2.28 1.151-5.111l.26-4.08c.098-1.537.146-2.306-.295-2.792c-.442-.487-1.187-.487-2.679-.487H8.23c-1.491 0-2.237 0-2.679.487c-.441.486-.392 1.255-.295 2.791l.26 4.08c.18 2.833.27 4.249 1.15 5.112C7.545 22 8.9 22 11.607 22" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>';
    }


    $result .=  '</tbody></table>';
    echo $result;
}

// Todo: Delete Ss by Admin
if (isset($_POST["request"]) && $_POST['request'] == "deleteSsByAdmin") {

    $ssId = $_POST['ssId'];

    $deleteSs = $serviceSeeker->deleteServiceSeeker($ssId);

    if ($deleteSp == true) {
        echo "Deleted Successfully";
    }
}

// Todo: Need to show selcted ss info to admin
if (isset($_POST["request"]) && $_POST['request'] == "showSsAllDetail") {

    $ssId = $_POST['ssId'];

    $ssDataset =  $serviceSeeker->getServiceSeekerInfoById($ssId);

    echo json_encode($ssDataset);
}

// Todo: Update SS info by Admin
if (isset($_POST["request"]) && $_POST['request'] == "updateSsByAdmin") {

    $ssId = $_POST['ss-id'];
    $ssFullname = $_POST['ss-fullname'];
    $ssEmail = $_POST['ss-email'];
    $ssContactNo = $_POST['ss-contact-no'];
    $ssUsername = $_POST['ss-username'];
    $ssAddressLine = $_POST['ss-address-line'];
    $ssCity = $_POST['ss-city'];
    $img = $_FILES['fileInput'];

    $latitude = $serviceSeeker->getLatitudeValue($ssCity);
    $longitude = $serviceSeeker->getLongitudeValue($ssCity);

    if ($img['error'] == UPLOAD_ERR_NO_FILE) {

        $query = "UPDATE `table_service_seeker` SET name = '$ssFullname', email_address = '$ssEmail', contact_no = '$ssContactNo', username = '$ssUsername',
        address_line = '$ssAddressLine', city = '$ssCity', latitude_Value = '$latitude', longitude_value = '$longitude' WHERE service_seeker_id = $ssId
        ";

        $updateSs = $db->updateDataByQuery($query);

        if ($updateSs == true) {
            $response[] = array("status" => "200", "message" => $ssFullname . "'s data has been updated successfully.");
        }
    } else {

        $ssProfilePic = $db->imageUpload($img);

        $query = "UPDATE `table_service_seeker` SET name = '$ssFullname', email_address = '$ssEmail', contact_no = '$ssContactNo', username = '$ssUsername',
        address_line = '$ssAddressLine', city = '$ssCity', latitude_Value = '$latitude', longitude_value = '$longitude', image = '$ssProfilePic' WHERE service_seeker_id = $ssId
        ";

        $updateWithImg = $db->updateDataByQuery($query);

        if ($updateWithImg == true) {
            $response[] = array("status" => "201", "message" => $ssFullname . "'s data has been updated successfully.");
        }
    }

    echo json_encode($response);
}

// Todo: Update SS info by SS
if (isset($_POST["request"]) && $_POST['request'] == "updateServiceSeeker") {

    // print_r($_REQUEST);
    $ssId = $_POST['service-seeker-id'];
    $ssFullname = $_POST['service-seeker-fullname'];
    $ssEmail = $_POST['service-seeker-email'];
    $ssContactNo = $_POST['service-seeker-contact-no'];
    $ssUsername = $_POST['service-seeker-username'];
    $ssAddressLine = $_POST['service-seeker-addreservice-seeker-line'];
    $ssCity = $_POST['service-seeker-city'];
    $img = $_FILES['fileInput'];

    $latitude = $serviceSeeker->getLatitudeValue($ssCity);
    $longitude = $serviceSeeker->getLongitudeValue($ssCity);

    if ($img['error'] == UPLOAD_ERR_NO_FILE) {

        $query = "UPDATE `table_service_seeker` SET name = '$ssFullname', email_address = '$ssEmail', contact_no = '$ssContactNo', username = '$ssUsername',
        address_line = '$ssAddressLine', city = '$ssCity', latitude_Value = '$latitude', longitude_value = '$longitude' WHERE service_seeker_id = $ssId
        ";

        $updateSs = $db->updateDataByQuery($query);

        if ($updateSs == true) {
            $response[] = array("status" => "200", "message" => $ssFullname . "'s data has been updated successfully.");
        }
    } else {

        $ssProfilePic = $db->imageUpload($img);

        $query = "UPDATE `table_service_seeker` SET name = '$ssFullname', email_address = '$ssEmail', contact_no = '$ssContactNo', username = '$ssUsername',
        address_line = '$ssAddressLine', city = '$ssCity', latitude_Value = '$latitude', longitude_value = '$longitude', image = '$ssProfilePic' WHERE service_seeker_id = $ssId
        ";

        $updateWithImg = $db->updateDataByQuery($query);

        if ($updateWithImg == true) {
            $response[] = array("status" => "201", "message" => $ssFullname . "'s data has been updated successfully.");
        }
    }

    echo json_encode($response);
}

// Todo: Delete Ss by Admin
if (isset($_POST["request"]) && $_POST['request'] == "deleteSs") {

    $ssId = $_POST['ssId'];

    $deleteSs = $serviceSeeker->deleteServiceSeeker($ssId);

    if ($deleteSs == true) {
        @session_start();
        session_unset();
        session_destroy();
        echo "404";
    }
}


// Todo: Delete Sp by Admin
if (isset($_POST["request"]) && $_POST['request'] == "deleteSp") {

    $spId = $_POST['spId'];

    $deleteSp = $serviceProvider->deleteServiceProvider($spId);

    if ($deleteSp == true) {
        @session_start();
        session_unset();
        session_destroy();
        echo "404";
    }
}
