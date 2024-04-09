<?php

require_once '../common/Database.php';

class District extends Database
{

    protected $tableName = "table_district";

    // * Function for Insert new district
    public function addDistrict($districtName)
    {
        $query = "INSERT INTO {$this->tableName} (name) VALUES (:name)";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':name' => $districtName]);

            return true;
        } catch (PDOException $ex) {
            echo "Error: " . $ex->getMessage();
        }
    }

    // * Function for Read all the District info
    public function viewDistrict()
    {
        $query = "SELECT * FROM {$this->tableName}";

        try {
            $statement = $this->connection->prepare($query);

            $statement->execute();

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            $districtDataSet = [];

            foreach ($results as $districtData) {
                $districtDataSet[] = $districtData;
            }

            return $districtDataSet;
        } catch (PDOException $ex) {

            echo "Error: " . $ex->getMessage();
        }
    }

    // * Function for get the district info by ID.
    public function getDistrictInfoById($id)
    {
        $query = "SELECT * FROM {$this->tableName} WHERE district_id = :id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':id' => $id]);


            $result =  $statement->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $ex) {

            echo "Error: " . $ex->getMessage();
        }
    }

    // * Function for Update District Info
    public function updateDistrict($id, $newValue)
    {
        $query = "UPDATE {$this->tableName} SET name = :name WHERE district_id = :id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':id' => $id, ':name' => $newValue]);
        } catch (PDOException $ex) {

            echo "Error: " . $ex->getMessage();
        }
    }

    // * Function for Delete District
    public function deleteDistrict($id)
    {
        $query = "DELETE FROM {$this->tableName} WHERE district_id = :id";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':id' => $id]);

            return true;
        } catch (PDOException $ex) {

            echo "Error: " . $ex->getMessage();
        }
    }

    // * Function for Count Total Rows
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
