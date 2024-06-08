<?php

// ! For app
require_once('../classes/common/Database.php');

// ! For debugging purpose only
// require_once '../common/Database.php';

class Feedback extends Database
{

    protected $tableName = "table_feedback";

    // * Insert feedback function
    public function insertSpFeedback($serviceProviderId, $feedback, $serviceId)
    {
        $query = "INSERT INTO {$this->tableName} (provider_id, feedback, service_id) VALUES (:provider_id, :feedback, :service_id)";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':provider_id' => $serviceProviderId, ':feedback' => $feedback, ':service_id' => $serviceId]);

            $lastInsertedID = $this->connection->lastInsertId();

            $lastInsertedData = $this->getFeedbackInfoById($lastInsertedID);

            echo json_encode($lastInsertedData);
        } catch (PDOException $ex) {
            echo "An error occured from insertSpFeedback(): " . $ex->getMessage();
        }
    }


    // * Get feedback info by id
    public function getFeedbackInfoById($key = "", $id = "")
    {
        $query = "SELECT * FROM {$this->tableName} WHERE $key = :key";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':key' => $id]);

            $numberOFRow = $statement->rowCount();

            // $data[] = "";

            // $response[] = "";

            if ($numberOFRow > 0 && $numberOFRow == 1) {

                $feedbackData = $statement->fetch(PDO::FETCH_ASSOC);

                $data[] = $feedbackData;

                $response[] = array("status" => "200", "data" => $data);
            } else {

                $response[] = array("status" => "404", "data" => "No data");
            }

            return $response;
        } catch (PDOException $ex) {
            echo "An error occured from getFeedbackInfoById(): " . $ex->getMessage();
        }
    }
}
