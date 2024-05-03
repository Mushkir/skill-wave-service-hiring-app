<?php
// * SS: ServiceSeeker
// ! For App
require_once '../classes/common/Database.php';

// ! For Debugging
// require_once '../common/Database.php';


class ServiceSeeker extends Database
{
    protected $tableName = "table_service_seeker";

    // * Function for add new service seeker
    public function addServiceSeeker($ssName, $ssEmail, $ssContactNo, $ssUsername, $ssPassword, $ssGender, $ssAddressLine, $ssCity, $latitude, $longitude, $identityCardNo, $image)
    {
        $query = "INSERT INTO {$this->tableName} (name, email_address, contact_no, username, password, gender, address_line, city, latitude_Value, longitude_value, identity_card_no, image) VALUES 
        (:name, :email_address, :contact_no, :username, :password, :gender, :address_line, :city, :latitude_Value, :longitude_value, :identity_card_no, :image)";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([
                ':name' => $ssName, ':email_address' => $ssEmail, ':contact_no' => $ssContactNo, ':username' => $ssUsername, ':password' => $ssPassword,
                ':gender' => $ssGender, ':address_line' => $ssAddressLine, ':city' => $ssCity, ':latitude_Value' => $latitude, ':longitude_value' => $longitude, ':identity_card_no' => $identityCardNo, ':image' => $image
            ]);

            $lastInsertedId = $this->connection->lastInsertId();

            $insertedData = $this->getServiceSeekerInfoById($lastInsertedId);

            echo json_encode($insertedData);
        } catch (PDOException $ex) {

            echo "Error from addServiceSeeker(): " . $ex->getMessage();
        }
    }

    // * View all Service Seekers info
    public function readAllServiceSeekers()
    {

        $query = "SELECT * FROM {$this->tableName}";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute();

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            $serviceSeekersData = [];

            foreach ($results as $dataSet) {

                $serviceSeekersData[] = $dataSet;
            }

            return $serviceSeekersData;
        } catch (PDOException $ex) {

            echo "Error from readAllServiceSeekers(): " . $ex->getMessage();
        }
    }

    // * Get all service seekers info using Id
    public function getServiceSeekerInfoById($serviceSeekerId)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE service_seeker_id = :service_seeker_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':service_seeker_id' => $serviceSeekerId]);

            $numOfRows = $statement->rowCount();

            if ($numOfRows > 0 && $numOfRows == 1) {

                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } else {

                $result = 404;
            }

            return $result;
        } catch (PDOException $ex) {

            echo "Error from getServiceSeekerInfoById(): " . $ex->getMessage();
        }
    }

    // * Update SS Info by id
    public function updateServiceSeeker($serviceSeekerId, $ssName, $ssEmail, $ssContactNo, $ssUsername, $ssPassword, $ssGender, $ssAddressLine, $ssCity, $latitude, $longitude, $identityCardNo, $image)
    {
        $query = "UPDATE {$this->tableName} SET name = :name, email_address = :email_address, contact_no = :contact_no, username = :username, password = :password, gender = :gender, address_line = :address_line, city = :city, latitude_Value = :latitude_Value, longitude_value = :longitude_value, identity_card_no = :identity_card_no, image = :image WHERE service_seeker_id = :service_seeker_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([
                ':service_seeker_id' => $serviceSeekerId, ':name' => $ssName, ':email_address' => $ssEmail, ':contact_no' => $ssContactNo, ':username' => $ssUsername, ':password' => $ssPassword,
                ':gender' => $ssGender, ':address_line' => $ssAddressLine, ':city' => $ssCity, ':latitude_Value' => $latitude, ':longitude_value' => $longitude, ':identity_card_no' => $identityCardNo, ':image' => $image
            ]);

            $updatedData = $this->getServiceSeekerInfoById($serviceSeekerId);

            echo json_encode($updatedData);
        } catch (PDOException $ex) {

            echo "Error from updateServiceSeeker(): " . $ex->getMessage();
        }
    }

    // * Delete SS info by Id
    public function deleteServiceSeeker($serviceSeekerId)
    {
        // DELETE FROM table_name WHERE condition;
        $query = "DELETE FROM {$this->tableName} WHERE service_seeker_id = :service_seeker_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':service_seeker_id' => $serviceSeekerId]);

            return true;
        } catch (PDOException $ex) {

            echo "Error from deleteServiceSeeker(): " . $ex->getMessage();
        }
    }

    // * Function for get values based on requirements
    public function getServiceSeekerInfo($key, $value)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE $key = :value";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':value' => $value]);

            if ($statement->rowCount() > 0) {

                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } else {
                $result = "404";
            }

            return $result;
        } catch (PDOException $ex) {

            echo "Error from getServiceSeekerInfo(): " . $ex->getMessage();
        }
    }

    // * Count Total SS
    public function countTotalServiceSeekers($key = "", $value = "")
    {
        $query = "SELECT * FROM {$this->tableName}";

        try {

            if (!empty($key) && !empty($value)) {

                $query .= " WHERE $key = :value";

                $statement = $this->connection->prepare($query);

                $statement->execute([':value' => $value]);

                $statement->fetchAll(PDO::FETCH_ASSOC);

                $numberOfRows = $statement->rowCount();
            } else {

                $statement = $this->connection->prepare($query);

                $statement->execute();

                $statement->fetchAll(PDO::FETCH_ASSOC);

                $numberOfRows = $statement->rowCount();
            }

            return $numberOfRows;
        } catch (PDOException $ex) {

            echo "Error from countTotalServiceSeekers(): " . $ex->getMessage();
        }
    }

    // * Function for Get latitude value of City Name.
    public function getLatitudeValue($cityName)
    {
        // ! For debugging.
        // include('../../env.php'); // It includes Google Geocoding API Key.

        // ! For App.
        include('../env.php');

        // * https://maps.googleapis.com/maps/api/geocode/json?address=Washington&key=YOUR_API_KEY

        $city = urlencode($cityName);

        $URL = "https://maps.googleapis.com/maps/api/geocode/json?";
        $CITY_NAME = "address=$city";
        $API_KEY = "&key=$GOOGLE_MAP_API_KEY";

        $request = $URL . $CITY_NAME . $API_KEY;

        $response = file_get_contents($request);

        $locationObj = json_decode($response);

        $latitudeValue = $locationObj->results[0]->geometry->location->lat;

        return $latitudeValue;
    }

    // * Function for Get longitude of City Name.
    public function getLongitudeValue($cityName)
    {
        include('../env.php'); // It includes Google Geocoding API Key.
        // * https://maps.googleapis.com/maps/api/geocode/json?address=Washington&key=YOUR_API_KEY

        $city = urlencode($cityName);

        $URL = "https://maps.googleapis.com/maps/api/geocode/json?";
        $CITY_NAME = "address=$city";
        $API_KEY = "&key=$GOOGLE_MAP_API_KEY";

        $request = $URL . $CITY_NAME . $API_KEY;

        $response = file_get_contents($request);

        $locationObj = json_decode($response);

        $longitudeValue = $locationObj->results[0]->geometry->location->lng;

        return $longitudeValue;
    }
}


// $ss = new ServiceSeeker();
// echo var_dump($ss->countTotalServiceSeekers("username", "to"));
