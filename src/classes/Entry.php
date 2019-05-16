<?php

class Entry extends Mapper { // hämta alla inlägg
  public function getAllEntry() {
    $statement = $this->db->prepare("SELECT * FROM entries");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getOneEntry() { //h hämta ett inlägg
    $statement = $this->db->prepare("SELECT * FROM entries LIMIT 1");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}
?>