<?php
include "database.php";
class Fillup {
  private $car;
  private $date;
  private $time;
  private $odometer;
  private $od_um;
  private $quantity;
  private $qu_um;
  private $price;
  private $pr_um;
  private $total;
  private $tot_um;
  private $station;
  private $id_cardriver;
  
  private $id;

  private $database;

  public function __construct($car=0, $date="", $time="", $odometer=0, $od_um="", $quantity="", $qu_um="", $price="", $pr_um="", $total=0, $tot_um="", $station="", $id_cardriver=0, $id=0) {
    $this->database = new Database();
    $this->car = mysqli_real_escape_string($this->database->conn,$car);
    $this->date = mysqli_real_escape_string($this->database->conn,$date);
    $this->time = mysqli_real_escape_string($this->database->conn,$time);
    $this->odometer = $odometer;
    $this->od_um = $od_um;
    $this->quantity = $quantity;
    $this->qu_um = $qu_um;
    $this->price = mysqli_real_escape_string($this->database->conn,$price);
    $this->pr_um = mysqli_real_escape_string($this->database->conn,$pr_um);
    $this->total =mysqli_real_escape_string($this->database->conn,$total);
    $this->tot_um =mysqli_real_escape_string($this->database->conn,$tot_um);
    $this->station =mysqli_real_escape_string($this->database->conn,$station);
    $this->id_cardriver =mysqli_real_escape_string($this->database->conn,$id_cardriver);
    
    $this->id = $id;
   
  }
  public function read(){
      $sql = "SELECT * FROM fillup_reports WHERE id_cardriver=$this->id_cardriver";
      $fillup= $this->database->dbSelectById($sql);
      return $fillup;
  }
  public function readDate(){
      $sql = "SELECT date, total, tot_um FROM fillup_reports WHERE id_cardriver=$this->id_cardriver";
      $fillup= $this->database->dbSelectById($sql);
      return $fillup;
  }
  public function select(){
      $sql = "SELECT * FROM fillup_reports WHERE id_cardriver=$this->id_cardriver";
      if($this->database->dbQuery($sql)===TRUE){
        return true;
  
      }else {
        echo "Error: " . $sql . "<br>" . $this->database->conn->error;
        die();
      }
  }
  public function insert(){
    $sql = "INSERT INTO fillup_reports (id_car, date, time, odometer, od_um, quantity, qu_um, price, pr_um, total, tot_um, station, id_cardriver) VALUES ($this->car, '$this->date', '$this->time', $this->odometer, '$this->od_um', $this->quantity, '$this->qu_um', $this->price, '$this->pr_um', $this->total, '$this->tot_um', '$this->station', $this->id_cardriver)";
    if($this->database->dbQuery($sql)===TRUE){
      return true;

    }else {
      echo "Error: " . $sql . "<br>" . $this->database->conn->error;
      die();
    }
  }
  public function update() {
       
    $sql = "UPDATE fillup_reports SET 
        id_car = '$this->car', 
        date = '$this->date', 
        time = '$this->time', 
        odometer = $this->odometer, 
        od_um = '$this->od_um', 
        quantity = '$this->quantity',
        qu_um = '$this->qu_um', 
        price = '$this->price', 
        pr_um = '$this->pr_um', 
        total = '$this->total', 
        tot_um = '$this->tot_um', 
        station = '$this->station', 
        id_cardriver = '$this->id_cardriver' 
        
        WHERE id = $this->id";

    if ($this->database->dbQuery($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $this->database->conn->error;
        die();
    }
  }
  public function delete() {
    $sql = "DELETE FROM fillup_reports WHERE id_cardriver=$this->id_cardriver";
    if($this->database->dbQuery($sql)===TRUE) {
      return true;

    }else{
      echo "Error: " . $sql . "<br>" . $this->database->conn->error;
      die();
    }
  }
  public static function getAllUsers(){
    $database = new Database();
    $sql = "SELECT * FROM fillup_reports";
    return $database->dbSelect($sql);
  }
  public function getAll(){
    
    $sql = "SELECT * FROM fillup_reports WHERE id_cardriver = $this->id_cardriver ORDER BY fillup_reports.date DESC";
    $fillups= $this->database->dbSelectById($sql);
      return $fillups;
  }

}
  ?>