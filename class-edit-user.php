<?php
include "database.php";
//class x modif gli User utilizzata dall'Admin (da users_table, pencil icon)
class editUser {
  private $myFirstname;
  private $myLastname;
  private $myPosition;
  private $myAge;
  private $myStartdate;
  private $mySalary;
  private $get_id_user;

  private $database;

  public function __construct($myFirstname="", $myLastname="", $myPosition="", $myAge=0, $myStartdate="", $mySalary="", $get_id_user=0) {
    $this->database = new Database();
    $this->myFirstname = mysqli_real_escape_string($this->database->conn,$myFirstname);
    $this->myLastname = mysqli_real_escape_string($this->database->conn,$myLastname);
    $this->myPosition = mysqli_real_escape_string($this->database->conn,$myPosition);
    $this->myAge = $myAge;
    $this->myStartdate = $myStartdate;
    $this->mySalary = $mySalary;
    $this->get_id_user = $get_id_user;
   
  }
  public function read(){
      $sql = "SELECT * FROM users WHERE id=$this->get_id_user";
      $user= $this->database->dbSelectById($sql);
      return $user;
  }
  public function editUser(){
    $sql = "UPDATE users SET firstname='$this->myFirstname', lastname='$this->myLastname', position='$this->myPosition', age=$this->myAge, startdate='$this->myStartdate', salary='$this->mySalary' WHERE id=$this->get_id_user";
      if($this->database->dbQuery($sql)===TRUE){
        return true;
  
      }else {
        echo "Error: " . $sql . "<br>" . $this->database->conn->error;
        die();
      }
  }
  
  
  // public function delete(){
  //   $sql = "DELETE FROM users WHERE id=$this->id";
  //   if($this->database->dbQuery($sql)===TRUE) {
  //     return true;

  //   }else{
  //     echo "Error: " . $sql . "<br>" . $this->database->conn->error;
  //     die();
  //   }
  // }
  

}
  ?>