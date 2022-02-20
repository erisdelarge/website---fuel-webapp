<?php
include "database.php";
class Report {

    private $report;
    private $date;
    private $time;
    private $id_position;
    private $id_agency;
    private $id_user;
    
    private $id;

    private $database;

    function __construct($report = "", $date = "", $time = "", $id_position=0, $id_agency=0, $id_user=0, $id = 0) {
        $this->database = new Database();

        $this->report = mysqli_real_escape_string($this->database->conn,$report);
        $this->date = mysqli_real_escape_string($this->database->conn,$date);
        $this->time = mysqli_real_escape_string($this->database->conn,$time);
        $this->id_position = $id_position;
        $this->id_agency=mysqli_real_escape_string($this->database->conn,$id_agency);
        $this->id_user = $id_user;  
        $this->id = $id;  
    }
    public function read(){
        $sql = "SELECT * FROM reports WHERE id_user=$this->id_user";
        $report= $this->database->dbSelectById($sql);
        return $report;
    }
    public function insert(){
        $sql = "INSERT INTO reports (report, date, time, id_position, id_agency, id_user) VALUES ('$this->report', '$this->date', '$this->time', $this->id_position, $this->id_agency, $this->id_user)";
        if($this->database->dbQuery($sql)===TRUE){
          return true;
    
        }else {
          echo "Error: " . $sql . "<br>" . $this->database->conn->error;
          die();
        }
    }
      public function update() {
       
        $sql = "UPDATE reports SET 
            report = '$this->report', 
            date = '$this->date', 
            time = '$this->time', 
            id_position = '$this->id_position', 
            id_agency = '$this->id_agency', 
            id_user = '$this->id_user', 
            
            WHERE id_user = $this->id_user";
    
        if ($this->database->dbQuery($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->database->conn->error;
            die();
        }
    }
      public function delete(){
        $sql = "DELETE FROM reports WHERE id_user=$this->id_user";
        if($this->database->dbQuery($sql)===TRUE) {
          return true;
    
        }else{
          echo "Error: " . $sql . "<br>" . $this->database->conn->error;
          die();
        }
    }
    public static function getAllUsers(){
        $database = new Database();
        $sql = "SELECT * FROM reports";
        return $database->dbSelect($sql);
    } 

    

}

?>