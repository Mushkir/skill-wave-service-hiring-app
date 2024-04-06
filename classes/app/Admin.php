<?php
// ! For app 
// require_once('../classes/common/Database.php');

// ! For debugging purpose only
require_once '../common/Database.php';

class Admin extends Database
{

    // Adding Admin (Insert)
    public function addAdmin($adminName, $password, $img, $email)
    {
        $query = "INSERT INTO admin (name, password, image, email) VALUES (:name, :password, :image, :email)";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':name' => $adminName, ':password' => $password, ':image' => $img, ':email' => $email]);

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

    // Get Admin By Id
    public function getAdminById($key, $value)
    {
        $query = "SELECT * FROM admin WHERE $key = :$value";

        try {

            $statement = $this->connection->prepare($query);

            $statement->execute([':value' => $value]);

            $result = $statement->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $ex) {

            echo "Error: " . $ex->getMessage();
        }
    }
}

$admin = new Admin();

echo var_dump($admin->getAdminById("name", "mushkir"));
