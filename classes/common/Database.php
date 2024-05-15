<?php

// * PHP Mailer Dependencies
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Database
{
    private $dsn = "mysql:host=localhost;dbname=db-skill-wave;";
    private $username = 'root';
    private $password = "";

    protected $connection;

    public function __construct()
    {
        try {

            $this->connection = new PDO($this->dsn, $this->username, $this->password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        }
    }

    // * Function for Upload Image file
    public function imageUpload($imgFile)
    {
        try {
            // Storyline
            // 1. Get the Image file.
            if (!empty($imgFile['name'])) {

                // 2. Give Image file 'name' attr.
                $imageFileName = $imgFile['name'];

                // 3. Give Image file 'tmp_name' attr.
                $imageFileTempName = $imgFile['tmp_name'];

                // 4. Give Image file 'type' attr.
                $imageFileType = $imgFile['type'];

                // 5. Divide the image file into array using explode().
                $dividedImageFile = explode(".", $imageFileName);   // * It will change the image file as array using ".";

                // 6. Create the array which inclueds allowed extensions of image file.
                $allowedImgExtensions = ['jpeg', 'jpg', 'png'];

                // 7. Change the divided image file array extension into lowercase using strtolower(end()).
                $imageExtensionInLowerCase = strtolower(end($dividedImageFile));

                if (in_array($imageExtensionInLowerCase, $allowedImgExtensions)) {

                    // 8. Give the new name to the divided img file using md5() with changed extension (step 7).
                    $newImageFileName = md5(time() . $imageFileName) . "." . $imageExtensionInLowerCase;

                    // 9. Give the path of img storing folder with current working directory using getcwd().
                    $imageStoreTargetDirectory = getcwd() . "/uploads";

                    // 10. Give the path to store the new chnaged image file (step 8).
                    $imageDestinationPath = $imageStoreTargetDirectory . '/' . $newImageFileName;

                    // move_uploaded_file(ImgTempFileName, DestinationPath)
                    if (move_uploaded_file($imageFileTempName, $imageDestinationPath)) {

                        return $newImageFileName;
                    } else {

                        echo "Oops! We can't process the image upload. Please try again!";
                    }
                }
            }
        } catch (PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        }
    }

    // * Function for JOIN Queries
    public function getMultipleData($query)
    {
        try {

            $stmt = $this->connection->prepare($query);

            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $dataSet = [];

            foreach ($results as $arrayOfResults) {

                $dataSet[] = $arrayOfResults;
            }

            return $dataSet;
        } catch (PDOException $ex) {

            echo "Error from getMultipleData(): " . $ex->getMessage();
        }
    }

    public function updateDataByQuery($query)
    {
        try {

            $stmt = $this->connection->prepare($query);

            $stmt->execute();

            return true;
        } catch (PDOException $ex) {
            echo "Error from updateDataByQuery(): " . $ex->getMessage();
        }
    }

    // * Count Data based on SQL Query
    public function countMultipleData($query)
    {
        try {

            $stmt = $this->connection->prepare($query);

            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $numberOfRows = $stmt->rowCount();

            return $numberOfRows;
        } catch (PDOException $ex) {

            echo "Error from getMultipleData(): " . $ex->getMessage();
        }
    }

    // * Sending Email
    public function sendEmail($serviceProviderName, $serviceProviderEmail, $emailSubject, $emailBody)
    {
        require_once '../env.php'; // ! This file includes userEmail and passKey

        $mail = new PHPMailer(true);

        $userEmail = $USER_MAIL;
        $passKey = $PASS_KEY;

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $userEmail;
        $mail->Password = $passKey;
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        $mail->setFrom($userEmail);
        $mail->addAddress($serviceProviderEmail, $serviceProviderName);

        $mail->isHTML(true);

        $mail->Subject = $emailSubject;
        $mail->Body = $emailBody;

        $mail->send();
    }

    // function getIPAddress()
    // {
    //     //whether ip is from the share internet  
    //     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    //         $ip = $_SERVER['HTTP_CLIENT_IP'];
    //     }
    //     //whether ip is from the proxy  
    //     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    //     }
    //     //whether ip is from the remote address  
    //     else {
    //         $ip = $_SERVER['REMOTE_ADDR'];
    //     }
    //     return $ip;
    // }

    // * Get current location using Google Map API
    // public function getUserCurrentLocation()
    // {
    //     // require_once '../env.php';
    //     require_once '../../env.php';

    //     // Google Maps Geocoding API endpoint
    //     $api_endpoint = 'https://maps.googleapis.com/maps/api/geocode/json';

    //     // Your Google Maps API key
    //     $api_key = $GOOGLE_MAP_API_KEY;

    //     // Your current IP address
    //     $ip_address = $_SERVER['REMOTE_ADDR'];
    //     // Create the request URL
    //     $request_url = "$api_endpoint?address=$ip_address&key=$api_key";

    //     // Initialize cURL
    //     $curl = curl_init();

    //     // Set cURL options
    //     curl_setopt($curl, CURLOPT_URL, $request_url);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    //     // Execute the request
    //     $response = curl_exec($curl);

    //     // Check for errors
    //     if ($response === false) {
    //         die(curl_error($curl));
    //     }

    //     // Close cURL
    //     curl_close($curl);

    //     // Decode the JSON response
    //     $data = json_decode($response, true);

    //     echo var_dump($data);

    //     // // Check if the request was successful
    //     // if ($data['status'] === 'OK') {
    //     //     // Extract latitude and longitude
    //     //     $latitude = $data['results'][0]['geometry']['location']['lat'];
    //     //     $longitude = $data['results'][0]['geometry']['location']['lng'];

    //     //     // Output the results
    //     //     echo "Latitude: $latitude<br>";
    //     //     echo "Longitude: $longitude";
    //     // } else {
    //     //     // Output error message
    //     //     echo "Error: " . $data['status'];
    //     // }
    // }
}
