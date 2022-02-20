<?php
include "database.php";
class ReportAll {

    private $id_admin;
    private $database;

    function __construct($id_admin=0) {
      $this->id_admin = $id_admin;
        $this->database = new Database();
 
    }
    
    public function getAllReports(){
        
        $sql = "SELECT reports.date, reports.time, reports.report, jobs.job, agencies.business, users.firstname, users.lastname FROM reports INNER JOIN jobs ON jobs.id = reports.id_position INNER JOIN agencies ON agencies.id = reports.id_agency INNER JOIN users ON users.id = reports.id_user";
        $result = $this->database->dbSelect($sql);
        return $result;
    } 

}


?>