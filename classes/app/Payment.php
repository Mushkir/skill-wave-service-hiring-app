<?php
// ! For app
require_once('../classes/common/Database.php');

// ! For debugging purpose only
// require_once '../common/Database.php';

class Payment extends Database
{
    protected $tableName = "table_payment";

    public function insertNewPayment($paymentStatus, $serviceSeekerId, $serviceProviderId, $serviceId, $serviceChargeAmount)
    {
        $query = "INSERT INTO {$this->tableName} (status, seeker_id, provider_id, services_id, amount, date_time) 
        VALUES (:status, :seeker_id, :provider_id, :services_id, :amount, NOW())";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':status' => $paymentStatus, ':seeker_id' => $serviceSeekerId, ':provider_id' => $serviceProviderId, ':services_id' => $serviceId, ':amount' => $serviceChargeAmount]);

            return true;
            // $lastInsertedId = $this->connection->lastInsertId();

            // $lastInsertedData = $this->getPaymentInfoById($lastInsertedId);

            // echo json_encode($lastInsertedData);
        } catch (PDOException $ex) {

            echo "Error from insertNewPayment(): " . $ex->getMessage();
        }
    }

    public function getPaymentInfo($key = "", $value = "")
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

            echo "Error from getPaymentInfo(): " . $ex->getMessage();
        }
    }


    public function getPaymentInfoById($paymentId)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE payment_id = :payment_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([":payment_id" => $paymentId]);

            $numberOfRows = $statement->rowCount();

            if ($numberOfRows > 0) {

                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } else {

                $result = 404;
            }

            return json_encode($result);
        } catch (PDOException $ex) {

            echo "Error from getPaymentInfoById(): " . $ex->getMessage();
        }
    }


    // * Update payment all details by id
    public function updatePayment($paymentId, $paymentStatus, $serviceSeekerId, $serviceProviderId, $serviceId, $serviceChargeAmount)
    {
        $query = "UPDATE {$this->tableName} SET status = :status, seeker_id = :seeker_id, provider_id = :provider_id, services_id = :services_id, amount = :amount, date_time = NOW() WHERE payment_id = :payment_id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':payment_id' => $paymentId, ':status' => $paymentStatus, ':seeker_id' => $serviceSeekerId, ':provider_id' => $serviceProviderId, ':services_id' => $serviceId, ':amount' => $serviceChargeAmount]);

            $updatedData = $this->getPaymentInfoById($paymentId);

            echo json_encode($updatedData);

            return true;
        } catch (PDOException $ex) {

            echo "Error occured from updatePayment: " . $ex->getMessage();
        }
    }

    // * Delete payment info by id
    public function deletePayment($paymentId)
    {
        $query = "DELETE FROM {$this->tableName} WHERE payment_id = :paymentId";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':paymentId' => $paymentId]);

            return true;
        } catch (PDOException $ex) {
            echo "Error occured from deletePayment: " . $ex->getMessage();
        }
    }

    // * Count payment infos
    public function countRows()
    {
        $query = "SELECT * FROM {$this->tableName}";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute();

            $totalRows = $statement->rowCount();

            return $totalRows;
        } catch (PDOException $ex) {

            echo "Error: " . $ex->getMessage();
        }
    }
}
