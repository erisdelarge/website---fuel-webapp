<?php

class Database {

    private $servername = "localhost";
    private $username = 'federicapietrolungo';
    private $password = '';
    private $dbname = 'my_federicapietrolungo';
    
    public $conn;

    function __construct() {
        // Create connection
        $this->conn = new mysqli($this->servername, 
                                $this->username, 
                                $this->password, 
                                $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("DB Connection failed: " . $this->conn->connect_error);
        } 
    
    }
   
    /**
     * Funzione che esegue una select 
     * e restituisce un array con un set di risultati,
     * cioè un array bidimensionale
     */
    public function dbSelect($_query) {
        $result = array();
        
        $righe = $this->conn->query($_query);

        if ($righe->num_rows > 0) {
            // output data of each row
            while($row = $righe->fetch_assoc()) {
            $result[] = $row;
            }
        }
        return $result;
    }

    /**
     * Funzione che esegue una select 
     * e restituisce un array con un solo record,
     * cioè un array monodimensionale
     */
    public function dbSelectByID($_query) {
        $result = $this->dbSelect($_query);

        return (count($result)>0) ? $result[0] : $result;
    }

    /**
     * Funzione che esegue una insert, una update o una delete 
     * e restituisce true o false.
     */
    public function dbQuery($_query) {
        return $this->conn->query($_query);
    }


}
?>