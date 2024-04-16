<?php
// * SP: Service Provider
// ! For App

// ! For Debugging.
require_once '../common/Database.php';

class ServiceSeeker
{
    protected $tableName = "table_service_provider";

    // * Function for add new SP
    public function addServiceProvider($spName, $spEmail, $spContactNo, $spUsername, $spPassword, $spGender, $spAddressLine, $spTownId, $latitudeValue, $longitudeValue, $spQualification, $spSkills, $image, $serviceDescription, $keywords, $pricePackge, $status)
    {
        $query = "INSERT INTO {$this->tableName} (name, email_address, contact_no, username, password, gender, address_line, 
        town_id, latitude_value, longitutde_value, qualification, skills, image, description, keywords, price, status) 
        
        VALUES 

        (:name, :email_address, :contact_no, :username, :password, :gender, :address_line, :town_id, :latitude_value, 
        :longitutde_value, :qualification, :skills, :image, :description, :keywords, :price, :status)";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':name' => $spName, ':email_address' => $spEmail, ':contact_no' => $spContactNo, ':username' => $spUsername, ':password' => $spPassword, ':gender' => $spGender, ':address_line' => $spAddressLine, ':town_id' => $spTownId, ':latitude_value' => $latitudeValue, ':longitutde_value' => $longitudeValue, ':qualification' => $spQualification, ':skills' => $spSkills, ':image' => $image, ':description' => $serviceDescription, ':keywords' => $keywords, ':price' => $pricePackge, ':status' => $status]);

            $insertedId = $this->connection->lastInsertId();

            $insertedData = $this->getServiceProviderInfoById($insertedId);

            echo json_encode($insertedData);
        } catch (PDOException $ex) {

            echo "Error from addServiceProvider(): " . $ex->getMessage();
        }
    }

    // * View all SP info
    public function readAllServiceProviderInfo()
    {
        $query = "SELECT * FROM {$this->tableName}";

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

    // * Get all SP info using Id
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
    public function updateServiceProviderInfo($serviceProviderId, $spName, $spEmail, $spContactNo, $spUsername, $spPassword, $spGender, $spAddressLine, $spTownId, $latitudeValue, $longitudeValue, $spQualification, $spSkills, $image, $serviceDescription, $keywords, $pricePackge, $status)
    {
        $query = "UPDATE {$this->tableName} SET name = :name, email_address = :email_address, contact_no = :contact_no, username = :username, password = :password, gender = :gender, address_line = :address_line, town_id = :town_id, latitude_value = :latitude_value, longitutde_value = :longitutde_value, qualification = :qualification, skills = :skills, image = :image, description = :description, keywords = :keywords, price = :price, status = :status WHERE service_provider_id = :service_provider_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':service_provider_id' => $serviceProviderId, ':name' => $spName, ':email_address' => $spEmail, ':contact_no' => $spContactNo, ':username' => $spUsername, ':password' => $spPassword, ':gender' => $spGender, ':address_line' => $spAddressLine, ':town_id' => $spTownId, ':latitude_value' => $latitudeValue, ':longitutde_value' => $longitudeValue, ':qualification' => $spQualification, ':skills' => $spSkills, ':image' => $image, ':description' => $serviceDescription, ':keywords' => $keywords, ':price' => $pricePackge, ':status' => $status]);
        } catch (PDOException $ex) {

            echo "Error from updateServiceProviderInfo(): " . $ex->getMessage();
        }
    }
}
