<?php
include "database.php";
class Car_id {

    
    private $id_driver;
    

    private $database;

    function __construct($id_driver=0) {
        $this->database = new Database();

        $this->id_driver = $id_driver;  
          
    }
    public function read(){
        $sql = "SELECT * FROM cars WHERE id_driver=$this->id_driver";
        $car= $this->database->dbSelectById($sql);
        return $car;
        $this->database->conn->close();
    }
   
      public function deleteAllMyCars(){
        $sql = "DELETE FROM cars WHERE id_driver=$this->id_driver";
        if($this->database->dbQuery($sql)===TRUE) {
          return true;
    
        }else{
          echo "Error: " . $sql . "<br>" . $this->database->conn->error;
          die();
        }
    }
    public function viewData(){
      $sql = "SELECT * FROM cars WHERE id_driver=$this->id_driver";
      $result = $this->database->dbSelect($sql);
      // $stmt->execute();
      //stmt = statements

      // $result = []; // initiate the array
      // while($row=$stmt->fetch_array())  {
      //     return $result[] = $row; // put each row in the result array
      // } 
      
      return $result; // return the result array
    }
   

    

}

?>