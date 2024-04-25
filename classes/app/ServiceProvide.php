<?php
// * SP: Service Provider
// ! For App
require_once('../classes/common/Database.php');

// ! For Debugging.
// require_once '../common/Database.php';

class ServiceProvider extends Database
{
    protected $tableName = "table_service_provider";

    // * Function for add new SP
    public function addServiceProvider($spName, $spEmail, $spContactNo, $spUsername, $spPassword, $spGender, $spAddressLine, $spDistrictId, $spTownId, $latitudeValue, $longitudeValue, $spQualification, $spSkills, $image, $serviceDescription, $keywords, $pricePackge, $status)
    {
        $query = "INSERT INTO {$this->tableName} (name, email_address, contact_no, username, password, gender, address_line, district_id, 
        town_id, latitude_value, longitutde_value, qualification, skills, image, description, keywords, price, status) 
        
        VALUES 

        (:name, :email_address, :contact_no, :username, :password, :gender, :address_line, :district_id, :town_id, :latitude_value, 
        :longitutde_value, :qualification, :skills, :image, :description, :keywords, :price, :status)";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':name' => $spName, ':email_address' => $spEmail, ':contact_no' => $spContactNo, ':username' => $spUsername, ':password' => $spPassword, ':gender' => $spGender, ':address_line' => $spAddressLine, ':district_id' => $spDistrictId, ':town_id' => $spTownId, ':latitude_value' => $latitudeValue, ':longitutde_value' => $longitudeValue, ':qualification' => $spQualification, ':skills' => $spSkills, ':image' => $image, ':description' => $serviceDescription, ':keywords' => $keywords, ':price' => $pricePackge, ':status' => $status]);

            $insertedId = $this->connection->lastInsertId();

            $insertedData = $this->getServiceProviderInfoById($insertedId);

            echo json_encode($insertedData);
        } catch (PDOException $ex) {

            echo "Error from addServiceProvider(): " . $ex->getMessage();
        }
    }

    // * View all SP info
    public function readAllServiceProviderInfo($limit = "")
    {
        $query = "SELECT * FROM {$this->tableName}";

        if (!empty($limit)) {
            $query .= " ORDER BY RAND() LIMIT $limit";

            try {

                $statement = $this->connection->prepare($query);

                $statement->execute();

                $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                $limitDataSet = [];

                foreach ($results as $data) {

                    $limitDataSet[] = $data;
                }

                return $limitDataSet;
            } catch (PDOException $ex) {

                echo "Error from readAllServiceProviderInfo()" . $ex->getMessage();
            }
        } else {

            try {

                $statement = $this->connection->prepare($query);

                $statement->execute();

                $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                $spDataSet = [];

                foreach ($results as $dataSet) {

                    $spDataSet[] = $dataSet;
                }

                return $spDataSet;
            } catch (PDOException $ex) {

                echo "Error from readAllServiceProviderInfo(): " . $ex->getMessage();
            }
        }
    }

    // * Get all info of a SP, using Id
    public function getServiceProviderInfoById($serviceProviderId)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE service_provider_id = :service_provider_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':service_provider_id' => $serviceProviderId]);

            $numberOfRow = $statement->rowCount();

            if ($numberOfRow > 0 && $numberOfRow == 1) {

                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } else {

                $result = "404";
            }

            return $result;
        } catch (PDOException $ex) {

            echo "Error from getServiceProviderInfoById(): " . $ex->getMessage();
        }
    }

    // * Update SP Info by id
    public function updateServiceProviderInfo($serviceProviderId, $spName, $spEmail, $spContactNo, $spUsername, $spPassword, $spGender, $spAddressLine, $spDistrictId, $spTownId, $latitudeValue, $longitudeValue, $spQualification, $spSkills, $image, $serviceDescription, $keywords, $pricePackge, $status)
    {
        $query = "UPDATE {$this->tableName} SET name = :name, email_address = :email_address, contact_no = :contact_no, username = :username, password = :password, gender = :gender, address_line = :address_line, district_id = :district_id, town_id = :town_id, latitude_value = :latitude_value, longitutde_value = :longitutde_value, qualification = :qualification, skills = :skills, image = :image, description = :description, keywords = :keywords, price = :price, status = :status WHERE service_provider_id = :service_provider_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':service_provider_id' => $serviceProviderId, ':name' => $spName, ':email_address' => $spEmail, ':contact_no' => $spContactNo, ':username' => $spUsername, ':password' => $spPassword, ':gender' => $spGender, ':address_line' => $spAddressLine, ':district_id' => $spDistrictId, ':town_id' => $spTownId, ':latitude_value' => $latitudeValue, ':longitutde_value' => $longitudeValue, ':qualification' => $spQualification, ':skills' => $spSkills, ':image' => $image, ':description' => $serviceDescription, ':keywords' => $keywords, ':price' => $pricePackge, ':status' => $status]);

            $updatedData = $this->getServiceProviderInfoById($serviceProviderId);

            echo json_encode($updatedData);
        } catch (PDOException $ex) {

            echo "Error from updateServiceProviderInfo(): " . $ex->getMessage();
        }
    }

    // * Delete SP info by id
    public function deleteServiceProvider($serviceProviderId)
    {
        $query = "DELETE FROM {$this->tableName} WHERE service_provider_id = :service_provider_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':service_provider_id' => $serviceProviderId]);

            return true;
        } catch (PDOException $ex) {

            echo "Error from deleteServiceProvider(): " . $ex->getMessage();
        }
    }

    // * Function for get values based on requirements
    public function getServiceProviderInfo($key, $value)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE $key = :value";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':value' => $value]);

            $result = $statement->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $ex) {

            echo "Error from getServiceProviderInfo(): " . $ex->getMessage();
        }
    }

    // * Count Total SS
    public function countTotalServiceProviders($key = "", $value = "")
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

            echo "Error from countTotalServiceProviders(): " . $ex->getMessage();
        }
    }

    // * Function for Get latitude value of City Name.
    public function getServiceProviderLatitudeValue($townName)
    {
        // ! For debugging.
        // include('../../env.php'); // It includes Google Geocoding API Key.

        // ! For App.
        include('../env.php');

        // * https://maps.googleapis.com/maps/api/geocode/json?address=Washington&key=YOUR_API_KEY

        $town = urlencode($townName);

        $URL = "https://maps.googleapis.com/maps/api/geocode/json?";
        $CITY_NAME = "address=$town";
        $API_KEY = "&key=$GOOGLE_MAP_API_KEY";

        $request = $URL . $CITY_NAME . $API_KEY;

        $response = file_get_contents($request);

        $locationObj = json_decode($response);

        $latitudeValue = $locationObj->results[0]->geometry->location->lat;

        return $latitudeValue;
    }

    // * Function for Get latitude value of City Name.
    public function getServiceProviderLongitudeValue($townName)
    {
        // ! For debugging.
        // include('../../env.php'); // It includes Google Geocoding API Key.

        // ! For App.
        include('../env.php');

        // * https://maps.googleapis.com/maps/api/geocode/json?address=Washington&key=YOUR_API_KEY

        $town = urlencode($townName);

        $URL = "https://maps.googleapis.com/maps/api/geocode/json?";
        $CITY_NAME = "address=$town";
        $API_KEY = "&key=$GOOGLE_MAP_API_KEY";

        $request = $URL . $CITY_NAME . $API_KEY;

        $response = file_get_contents($request);

        $locationObj = json_decode($response);

        $longitudeValue = $locationObj->results[0]->geometry->location->lng;

        return $longitudeValue;
    }
}
