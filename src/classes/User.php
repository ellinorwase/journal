<?php

class User extends Mapper {
  public function getUserByID($userID) {
    $statement = $this->db->prepare("SELECT * FROM users WHERE userID = :userID");
    $statement->execute([
      ':userID' => $userID
    ]);
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function getAllUsers() {
    $statement = $this->db->prepare("SELECT * FROM users");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
public function get20Comments() {
  $statement = $this->db->prepare("SELECT content FROM comments LIMIT 20");
  $statement->execute();
  return $statement->fetchAll(PDO::FETCH_ASSOC);
}
public function registerUser() {
  $statement = $this->db->prepare("SELECT COUNT(username) AS num FROM users WHERE username=:username");
  $statement = $pdo->prepare($query);
         $statement ->execute ([":username" => $_POST['username']]);
         $num =$statement->fetch(PDO::FETCH_ASSOC)['num'];
         return true;
       
       if (!$num>0) {
         $statement = $pdo->prepare("INSERT INTO users (username, password)
           VALUES (:username, :password)"
         );
         $statement->execute([
           ":username" => $_POST['username'], 
           ":password" => password_hash($_POST['password'], PASSWORD_BCRYPT) 
         ]);
         return true;
          // "<h4 style='color:rgb(134, 248, 63)';><i>The user {$_POST['username']} was created.</i></h4>";
       }
       else{
         return false;
        //  echo "<h4 style='color:#B22222;'> <b>Denna användaren finns redan. <b></h4>";
       }
}

}
