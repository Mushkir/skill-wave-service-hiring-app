<?php

session_start();

require_once('../classes/common/Database.php');
require_once('../classes/app/Admin.php');
require_once('../classes/app/District.php');
require_once('../classes/app/Town.php');

$db = new Database();
$admin = new Admin();
$district = new District();
$town = new Town();

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
