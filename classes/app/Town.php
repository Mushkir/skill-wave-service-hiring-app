<?php
// ! For App
require_once '../classes/common/Database.php';

// ! For Debugging
// require_once '../common/Database.php';

class Town extends Database
{

    protected $tableName = "table_town";

    // * Function for Insert Town Detail
    public function addTown($townName, $districtId, $districtName)
    {
        $query = "INSERT INTO {$this->tableName} (name, district_id, district_name) VALUES (:name, :district_id, :district_name)";

        try {

            // Prepare the statement
            $statement = $this->connection->prepare($query);

            // Execute the statement
            $statement->execute([':name' => $townName, ':district_id' => $districtId, ':district_name' => $districtName]);

            $insertId = $this->connection->lastInsertId();

            $arrayOfInsertedData = $this->getTownInfoById($insertId);

            echo json_encode($arrayOfInsertedData);

            return true;
        } catch (PDOException $ex) {

            echo "Error from Town Insert: " . $ex->getMessage();
        }
    }

    // * Function for read all the town data
    public function viewAllTownData()
    {
        $query = "SELECT * FROM {$this->tableName}";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute();

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            $townDataSet = [];

            foreach ($results as $dataSetOfTown) {

                $townDataSet[] = $dataSetOfTown;
            }

            return $townDataSet;
        } catch (PDOException $ex) {

            echo "Error from Town Read: " . $ex->getMessage();
        }
    }

    // * Function for get a town info using town id.
    public function getTownInfoById($townId)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE town_id = :id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':id' => $townId]);

            $isTownInfoExist = $statement->rowCount();

            if ($isTownInfoExist > 0 && $isTownInfoExist == 1) {

                $result = $statement->fetch(PDO::FETCH_ASSOC);
            } else {
                $result = 404;
            }

            return $result;
        } catch (PDOException $ex) {

            echo "Error from getTownInfoById(): " . $ex->getMessage();
        }
    }

    // * Function for Update Town Info.
    public function updateTownInfo($townId, $townName, $districtId, $districtName)
    {
        $query = "UPDATE {$this->tableName} SET name = :name, district_id = :districtId, district_name = :district_name WHERE town_id = :id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':name' => $townName, ':districtId' => $districtId, ':town_id' => $townId, ':district_name' => $districtName]);

            $updatedTownData = $this->getTownInfoById($townId);

            echo json_encode($updatedTownData);
        } catch (PDOException $ex) {

            echo "Error from updateTownInfo(): " . $ex->getMessage();
        }
    }

    // * Function for delete town info.
    public function deleteTownInfo($townId)
    {
        $query = "DELETE FROM {$this->tableName} WHERE town_id = :id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':id' => $townId]);

            return true;
        } catch (PDOException $ex) {

            echo "Error from deleteTownInfo(): " . $ex->getMessage();
        }
    }

    // * Function for count total data in town table
    public function countTotalRows()
    {
        $query = "SELECT * FROM {$this->tableName}";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute();

            $totalRows = $statement->rowCount();

            return $totalRows;
        } catch (PDOException $ex) {

            echo "Error from countTotalRows(): " . $ex->getMessage();
        }
    }
}
