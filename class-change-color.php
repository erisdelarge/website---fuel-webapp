<?php
include "database.php";
class UserColors {
  
  private $db_color;
  private $text_color;
  private $navbar_text;
  private $car_border_color;
  private $car_text_color;
  private $id;

  private $database;

  public function __construct($db_color="", $text_color="", $navbar_text="", $car_border_color="", $car_text_color="", $id=0) {
    $this->database = new Database();
    
    $this->db_color =mysqli_real_escape_string($this->database->conn,$db_color);
    $this->text_color =mysqli_real_escape_string($this->database->conn,$text_color);
    $this->navbar_text =mysqli_real_escape_string($this->database->conn,$navbar_text);
    $this->car_border_color =mysqli_real_escape_string($this->database->conn,$car_border_color);
    $this->car_text_color =mysqli_real_escape_string($this->database->conn,$car_text_color);
    $this->id = $id;
   
  }

  public function update() {
       
    $sql = "UPDATE users SET  
        db_color = '$this->db_color', 
        text_color = '$this->text_color', 
        navbar_text = '$this->navbar_text', 
        car_border_color = '$this->car_border_color', 
        car_text_color = '$this->car_text_color'
        WHERE id = $this->id";

    if ($this->database->dbQuery($sql) === TRUE) {
        return true;
        
    } else {
        echo "Error: " . $sql . "<br>" . $this->database->conn->error;
        die();
    }
    
  }
  public function read(){
    $sql = "SELECT * FROM users WHERE id=$this->id";
    $user= $this->database->dbSelectById($sql);
    return $user;
}


}
  ?>