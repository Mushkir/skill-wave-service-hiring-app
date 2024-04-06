<?php
// ! For app 
require_once('../classes/common/Database.php');

// ! For debugging purpose only
// require_once '../common/Database.php';

class Admin extends Database
{

    // Adding Admin (Insert)
    public function addAdmin($adminName, $adminUsername, $password, $img, $email)
    {
        $query = "INSERT INTO admin (name, username, password, image, email) VALUES (:name, :username, :password, :image, :email)";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':name' => $adminName, ':username' => $adminUsername, ':password' => $password, ':image' => $img, ':email' => $email]);

            return true;
        } catch (PDOException $ex) {

            echo "Error: " . $ex->getMessage();
        }
    }


    // Read whole admin detail
    public function read()
    {
        $query = "SELECT * FROM admin";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute();

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            $allAdminInfo = [];

            foreach ($results as $dataOfAdmin) {

                $allAdminInfo[] = $dataOfAdmin;
            }

            return $allAdminInfo;
        } catch (PDOException $ex) {

            echo "Error: " . $ex->getMessage();
        }
    }

    // Get Admin Info based on needs.
    public function getAdminByKeyAndValue($key, $value)
    {
        $query = "SELECT * FROM admin WHERE $key = :value"; // Remove colon from parameter name

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute(['value' => $value]); // Change parameter name to 'value'

            $result = $statement->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $ex) {

            echo "Error: " . $ex->getMessage();
        }
    }

    // Count Rows
    public function countRows($key = "", $value = "")
    {
        $query = "SELECT * FROM admin";

        try {
            if (!empty($key) && !empty($value)) {

                $query .= " WHERE $key = :value";

                $statement = $this->connection->prepare($query);

                $statement->execute([":value" => $value]);

                $statement->fetchAll(PDO::FETCH_ASSOC);

                $numOfRows = $statement->rowCount();
            } else {

                $statement = $this->connection->prepare($query);

                $statement->execute();

                $statement->fetchAll(PDO::FETCH_ASSOC);

                $numOfRows = $statement->rowCount();
            }

            return $numOfRows;
        } catch (PDOException $ex) {

            echo "Error: " . $ex->getMessage();
        }
    }
}

// $admin = new Admin();
// // echo var_dump($admin->countRows("name", "mushkir"));
// echo var_dump($admin->countRows());

// // echo var_dump($admin->getAdminById("admin_id", 7));
