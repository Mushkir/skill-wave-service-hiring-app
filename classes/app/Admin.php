<?php
require_once('../classes/common/Database.php');

class Admin extends Database
{
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
}
