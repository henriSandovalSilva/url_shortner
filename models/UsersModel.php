<?php

use Flight;

class UsersModel extends Model 
{
    public function getUser($user_identification) 
    {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE user_identification = :user_identification");

        $stmt->execute(array(
          ':user_identification' => $user_identification
        ));

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($user_identification) 
    {
        $stmt = $this->conn->prepare("INSERT INTO users (user_identification) VALUES (:user_identification)");

        $stmt->execute(array(
          ':user_identification' => $user_identification
        ));

        return $this->conn->lastInsertId();
    }

    public function deleteUser($user_id)
    {
        $stmt = $this->conn->prepare('DELETE FROM users WHERE id = :id');

        $stmt->bindParam(':id', $user_id);

        $stmt->execute();
      
        return $stmt->rowCount();
    }
}