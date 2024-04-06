<?php

require_once('../classes/common/Database.php');
require_once('../classes/app/Admin.php');

if (isset($_POST['action']) && $_POST['action'] == 'signUpAdmin') {

    $adminUsernameEl = $_POST['admin-username'];
    $adminPasswordEl = $_POST['password'];
    $adminEmailEl = $_POST['admin-email'];
    $adminProfileImgEl = $_FILES['admin-profile-image'];

    $encryptedPassword = password_hash($adminPasswordEl, PASSWORD_DEFAULT);

    $db = new Database();

    // $adminProfileImg = $db->imageUpload($adminProfileImgEl);

    $admin = new Admin();
    // $allAdminData = $admin->read();

    // $admin->addAdmin($adminUsernameEl, $encryptedPassword, $adminProfileImg, $adminEmailEl);
}
