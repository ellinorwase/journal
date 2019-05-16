<?php

class User extends Mapper {
  public function getUserByID($userID) { // hämta användare med ID
    $statement = $this->db->prepare("SELECT * FROM users WHERE userID = :userID");
    $statement->execute([
      ':userID' => $userID
    ]);
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function getAllUsers() {// hämta alla användare
    $statement = $this->db->prepare("SELECT * FROM users");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);

}
}
