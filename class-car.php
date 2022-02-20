<?php
include "database.php";
class Car {

    private $brand;
    private $model;
    private $series;
    private $engine;
    private $driver;
    private $license;
    private $image;
    private $id_driver;
    private $id;

    private $database;

    function __construct($brand = "", $model = "", $series = "", $engine="", $driver="", $license="", $image="", $id_driver=0, $id = 0) {
        $this->database = new Database();

        $this->brand = mysqli_real_escape_string($this->database->conn,$brand);
        $this->model = mysqli_real_escape_string($this->database->conn,$model);
        $this->series = mysqli_real_escape_string($this->database->conn,$series);
        $this->engine = $engine;
        $this->driver=mysqli_real_escape_string($this->database->conn,$driver);
        $this->license = $license;
        $this->image=mysqli_real_escape_string($this->database->conn,$image);
        $this->id_driver = $id_driver;  
        $this->id = $id;  
    }
    public function read(){
        $sql = "SELECT * FROM cars WHERE id_driver=$this->id_driver";
        $car= $this->database->dbSelectById($sql);
        return $car;
    }
    public function insert(){
        $sql = "INSERT INTO cars (brand, model, series, engine, driver, license, image, id_driver) VALUES ('$this->brand', '$this->model', '$this->series', '$this->engine', '$this->driver', '$this->license', '$this->image', $this->id_driver)";
        if($this->database->dbQuery($sql)===TRUE){
          return true;
    
        }else {
          echo "Error: " . $sql . "<br>" . $this->database->conn->error;
          die();
        }
    }
      public function update() {
       
        $sql = "UPDATE cars SET 
            brand = '$this->brand', 
            model = '$this->model', 
            series = '$this->series', 
            engine = '$this->engine', 
            driver = '$this->driver', 
            license = '$this->license', 
            image = '$this->image'
            WHERE id_driver = $this->id_driver";
    
        if ($this->database->dbQuery($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->database->conn->error;
            die();
        }
    }
      public function delete(){
        $sql = "DELETE FROM cars WHERE id_driver=$this->id_driver";
        if($this->database->dbQuery($sql)===TRUE) {
          return true;
    
        }else{
          echo "Error: " . $sql . "<br>" . $this->database->conn->error;
          die();
        }
    }
    public static function getAllUsers(){
        $database = new Database();
        $sql = "SELECT * FROM cars";
        return $database->dbSelect($sql);
    } 

    

}

?>