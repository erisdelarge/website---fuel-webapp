<?php
include "database.php";
class Utente {
  
  private $id;

  private $database;

  public function __construct($id=0) {
    $this->database = new Database();
   
    $this->id = $id;
   
  }
  public function read(){
      $sql = "SELECT * FROM users WHERE id=$this->id";
      $user= $this->database->dbSelectById($sql);
      return $user;
  }
  // public function edit(){
  //     $sql = "SELECT * FROM users WHERE id=$this->id";
  //     if($this->database->dbQuery($sql)===TRUE){
  //       return true;
  
  //     }else {
  //       echo "Error: " . $sql . "<br>" . $this->database->conn->error;
  //       die();
  //     }
  // }
  
  
  public function delete(){
    $sql = "DELETE FROM users WHERE id=$this->id";
    if($this->database->dbQuery($sql)===TRUE) {
      return true;

    }else{
      echo "Error: " . $sql . "<br>" . $this->database->conn->error;
      die();
    }
  }
  

}
  ?>