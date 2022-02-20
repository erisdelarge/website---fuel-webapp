<?php
include "database.php";
class User {
  private $firstname;
  private $lastname;
  private $position;
  private $age;
  private $startdate;
  private $salary;
  private $email;
  private $pass;
  private $username;
  private $image;
  private $db_color;
  private $text_color;
  private $navbar_text;
  private $car_border_color;
  private $car_text_color;
  private $id;

  private $database;

  public function __construct($firstname="", $lastname="", $position="", $age=0, $startdate="", $salary="", $email="", $pass="", $username="", $image="", $db_color="", $text_color="", $navbar_text="", $car_border_color="", $car_text_color="", $id=0) {
    $this->database = new Database();
    $this->firstname = mysqli_real_escape_string($this->database->conn,$firstname);
    $this->lastname = mysqli_real_escape_string($this->database->conn,$lastname);
    $this->position = mysqli_real_escape_string($this->database->conn,$position);
    $this->age = $age;
    $this->startdate = $startdate;
    $this->salary = $salary;
    $this->email = $email;
    $this->pass = mysqli_real_escape_string($this->database->conn,$pass);
    $this->username = mysqli_real_escape_string($this->database->conn,$username);
    $this->image =mysqli_real_escape_string($this->database->conn,$image);
    $this->db_color =mysqli_real_escape_string($this->database->conn,$db_color);
    $this->text_color =mysqli_real_escape_string($this->database->conn,$text_color);
    $this->navbar_text =mysqli_real_escape_string($this->database->conn,$navbar_text);
    $this->car_border_color =mysqli_real_escape_string($this->database->conn,$car_border_color);
    $this->car_text_color =mysqli_real_escape_string($this->database->conn,$car_text_color);
    $this->id = $id;
   
  }
  public function read(){
      $sql = "SELECT * FROM users WHERE id=$this->id";
      $user= $this->database->dbSelectById($sql);
      return $user;
  }
  public function select(){
      $sql = "SELECT * FROM users WHERE id=$this->id";
      if($this->database->dbQuery($sql)===TRUE){
        return true;
  
      }else {
        echo "Error: " . $sql . "<br>" . $this->database->conn->error;
        die();
      }
  }
  public function insert(){
    $sql = "INSERT INTO users (firstname, lastname, position, age, startdate, salary, email, pass, username, image, db_color, text_color, navbar_text, car_border_color, car_text_color) VALUES ('$this->firstname', '$this->lastname', '$this->position', $this->age, '$this->startdate', '$this->salary', '$this->email', '$this->pass', '$this->username', '$this->image', '$this->db_color', '$this->text_color', '$this->navbar_text', '$this->car_border_color', '$this->car_text_color')";
    if($this->database->dbQuery($sql)===TRUE){
      return true;

    }else {
      echo "Error: " . $sql . "<br>" . $this->database->conn->error;
      die();
    }
  }
  public function update() {
       
    $sql = "UPDATE users SET 
        firstname = '$this->firstname', 
        lastname = '$this->lastname', 
        position = '$this->position', 
        age = '$this->age', 
        startdate = '$this->startdate', 
        salary = '$this->salary',
        email = '$this->email', 
        pass = '$this->pass', 
        username = '$this->username', 
        image = '$this->image', 
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
  public function delete(){
    $sql = "DELETE FROM users WHERE id=$this->id";
    if($this->database->dbQuery($sql)===TRUE) {
      return true;

    }else{
      echo "Error: " . $sql . "<br>" . $this->database->conn->error;
      die();
    }
  }
  public static function getAllUsers(){
    $database = new Database();
    $sql = "SELECT * FROM users";
    return $database->dbSelect($sql);
  }
  public function checkEmail(){
    $sql = "SELECT * FROM users WHERE email=$this->email";
        $user= $this->database->dbSelectById($sql);
        return $user;
  
  }
}

  ?>