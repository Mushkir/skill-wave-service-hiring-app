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
}
