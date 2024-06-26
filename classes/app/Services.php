<?php
// ! For debugging
// include_once '../common/Database.php';

// ! For App
include_once('../classes/common/Database.php');

class Services extends Database
{
    protected $tableName = "table_services";

    // * Insert service info.
    public function addNewServiceInfo($serviceProviderId, $serviceSeekerId, $desc, $serviceCharge, $serviceAgreed, $serviceStatus, $paymentStatus, $feedbackStatus)
    {
        $query = "INSERT INTO {$this->tableName} (provider_id, seeker_id, description, service_charge, service_agreed, service_status, date_time, payment_status, feedback_status) 
        VALUES (:provider_id, :seeker_id, :description, :service_charge, :service_agreed, :service_status, NOW(), :payment_status, :feedback_status)";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':provider_id' => $serviceProviderId, ':seeker_id' => $serviceSeekerId, ':description' => $desc, ':service_charge' => $serviceCharge, ':service_agreed' => $serviceAgreed, ':service_status' => $serviceStatus, ':payment_status' => $paymentStatus, ':feedback_status' => $feedbackStatus]);

            return true;
            // $lastInsertId = $this->connection->lastInsertId();

            // $insertedData = $this->getServiceInfoById($lastInsertId);

            // echo json_encode($insertedData);
        } catch (PDOException $ex) {

            echo "Error from addNewServiceInfo(): " . $ex->getMessage();
        }
    }

    // * Get whole services info based on condition.
    public function getServicesInfo($key = "", $value = "")
    {
        $query = "SELECT * FROM {$this->tableName}";

        try {

            if (!empty($key) && !empty($value)) {

                $query .= " WHERE $key = :value";

                $statement = $this->connection->prepare($query);

                $statement->execute([':value' => $value]);

                $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                $dataset = [];

                foreach ($result as $data) {

                    $dataset[] = $data;
                }

                return $result;
            } else {

                $statement = $this->connection->prepare($query);

                $statement->execute();

                $results = $statement->fetchAll(PDO::FETCH_ASSOC);

                $dataset = [];

                foreach ($results as $data) {

                    $dataset[] = $data;
                }

                return $dataset;
            }
        } catch (PDOException $ex) {

            echo "Error from getServicesInfo(): " . $ex->getMessage();
        }
    }

    // * Get Service Info using Id.
    public function getServiceInfoById($serviceInfoId)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE services_id = :services_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute(['services_id' => $serviceInfoId]);

            $numberOfRows = $statement->rowCount();

            if ($numberOfRows > 0 && $numberOfRows == 1) {

                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } else {

                $result = "404";
            }

            return $result;
        } catch (PDOException $ex) {

            echo "Error from getServicesInfoById(): " . $ex->getMessage();
        }
    }

    // * Update Service Info
    public function updateServiceInfo($servicesId, $serviceProviderId, $serviceSeekerId, $desc, $serviceCharge, $serviceAgreed, $serviceStatus, $paymentStatus, $feedbackStatus)
    {

        $query = "UPDATE {$this->tableName} SET provider_id = ':provider_id', seeker_id = ':seeker_id', description = ':description', service_charge = ':service_charge', service_agreed = ':service_agreed', service_status = ':service_status', date_time = NOW(), payment_status = ':payment_status', feedback_status = :feedback_status WHERE services_id = ':services_id'";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':provider_id' => $serviceProviderId, 'seeker_id' => $serviceSeekerId, ':description' => $desc, ':service_charge' => $serviceCharge, ':service_agreed' => $serviceAgreed, ':service_status' => $serviceStatus, ':payment_status' => $paymentStatus, ':feedback_status' => $feedbackStatus, ':services_id' => $servicesId]);

            $updatedData = $this->getServiceInfoById($servicesId);

            echo json_encode($updatedData);
        } catch (PDOException $ex) {

            echo "Error from updateServiceInfo(): " . $ex->getMessage();
        }
    }

    // * Delete Service info by id
    public function deleteServicesInfo($servicesId)
    {
        $query = "DELETE FROM {$this->tableName} WHERE services_id = :services_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':services_id' => $servicesId]);

            return true;
        } catch (PDOException $ex) {

            echo "Error from deleteServicesInfo(): " . $ex->getMessage();
        }
    }

    // * Count total Service info
    public function countServiceInfo($key = "", $value = "")
    {
        $query = "SELECT * FROM {$this->tableName}";

        try {

            if (!empty($key) && !empty($value)) {

                $query .= " WHERE $key = :value";

                $statement = $this->connection->prepare($query);

                $statement->execute([':value' => $value]);

                $numberOfRows = $statement->rowCount();
            }
        } catch (PDOException $ex) {

            echo "Error from countServiceInfo(): " . $ex->getMessage();
        }
    }
}
