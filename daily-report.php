<?php
include "config.php";
include "callDatabase.php";
include "functions-database.php";
// include "database.php";
include "class-report.php";
// $database= new Database();

			
		

			function validate($data){
		
				$data = trim($data);
		
				$data = stripslashes($data);
		
				$data = htmlspecialchars($data);
		
				return $data;
		
			};
		
			// $id_user = validate($_SESSION['id']);
			$date = validate($_POST['report_date']);
            $time = validate($_POST['report_time']);
            $report = validate($_POST['report']);
			
			if (empty($report)) {
		
				header("Location: profile.php?error=Report text is required");
		
				exit();
		
			}else if(empty($date)){
		
					header("Location: profile.php?error=Report Date is required");
			
					exit();
			
			}else if(empty($time)){
	
				header("Location: profile.php?error=Report Time is required");
		
				exit();
		
			}
		
			// if (empty($email)) {
		
			// 	header("Location: register.php?error=Email is required");
		
			// 	exit();
		
			// }else if(empty($pass)){
		
			// 	header("Location: register.php?error=Password is required");
		
			// 	exit();
		
			// }else{
		
				// $sql = "SELECT * FROM reports WHERE id_user='$id_user'";
		
				// $result = mysqli_query($conn, $sql);
				// if (mysqli_num_rows($result) > 0) {
		
				// 	$row = mysqli_fetch_assoc($result);
						
		
				// 	// if ($email==isset($row['email'])) {
		
				// 	// 	header("Location: register.php?error=email already exists");
				// 	// 	exit();
			
				// 	// }

				// }
				  //do your insert code here or do something (run your code)
					  
					  $report = ($_REQUEST['report']);
					  
					  //addslashes()--> permette ai caratteri come apici ed apostrofi di essere letti precedendoli in autom con un backslash
					  //mysqli_real_escape_string()--> altra function che fa lo stesso, si utilizza così:
					 //$report=$_REQUEST['report']; $report= mysqli_real_escape_string($conn, $report);  
					  $date = $_REQUEST['report_date'];
					  $time = $_REQUEST['report_time']; 
					  $id_position = $_REQUEST['report_position'];
					  $id_agency = $_REQUEST['report_agency'];
					  
					  $id_user = $_REQUEST['id'];
					  
					//   echo $job;
					//   echo $agency;
					//   !! prende direttamente il value numerico della option selezionata, rendendo superfluo tutto il codice successivo!! evvaiiiiiiii


			  
					  //metodo complicato per ottenere l'id corrispondente alla option selezionata andandolo a prendere dal database agencies-->
					//   $sql = "SELECT * FROM agencies";
					//   $result = mysqli_query($conn, $sql);
					//   $mrow = mysqli_fetch_assoc($result);
					//   if ($mrow['business'] === $agency) {
					// 	  $myagency = $mrow['id'];
					// 	  echo $myagency;
						 
						  

					//   };
					  
					
					 //metodo complicato per ottenere l'id corrispondente alla option selezionata andandolo a prendere dal database jobs-->
					//io   N O N   C A P I S C O   perché con jobs   N O N   M I   F U N Z I O N A  ! ! ! ! !

					// $sql = "SELECT * FROM jobs";
					
					// $result = $conn->query($sql);
					//   Q U I   mi da   E R R O R E :  
					///  Fatal error: Uncaught Error: Object of class mysqli_result could not be converted to string in D:\xampp\htdocs\infobasic\Dashboard-template\pages\daily-report.php:95 Stack trace: #0 {main} thrown in D:\xampp\htdocs\infobasic\Dashboard-template\pages\daily-report.php on line 95   -->

					// if ($row = mysqli_fetch_assoc($result)){
					// 	echo $result;
					// 	if ($row['job'] === $job) {
					// 		$myjob = $row['id'];
					// 		echo $myjob;
					// 	};
					// } else {
					// 	echo "ERROR: Hush! Sorry $sql. "
					// 		. mysqli_error($conn);
					// 		die();	 
					// };

					////  !!  ho   R I S O L T O   con il loop del ciclo while e mysqli_fetch_array al posto di assoc   -->
					// while($row = mysqli_fetch_array($result)) {
					// 	echo $row['job'];
					// 	if ($row['job'] === $job) {
					// 		$myjob = $row['id'];
					// 		echo $myjob;
									
		
					// 	};
				  	// }

				//query che inserisce i dati ottenuti col metodo complesso (myjob, myagency) -->
					// $sql = "INSERT INTO reports (report, date, time, id_position, id_agency, id_user) VALUES ('$report', '$date', '$time', $myjob, $myagency, $id_user)";
					
					//  //id_positions, $myjob,

					// $sql = "INSERT INTO reports (report, date, time, id_position, id_agency, id_user) VALUES ('$report', '$date', '$time', $id_position, $id_agency, $id_user)";
					// //  before: 
					// //   if(mysqli_query($conn, $sql)){
					// 	//   after, w function:
					// 	if ($database->dbQuery($sql) === TRUE) {
				  
					// 	  header("Location: profile.php");
			  
					//   } else{
					//   echo "ERROR: Hush! Sorry $sql. "
					// 	  . mysqli_error($conn);
					// 	  die();
                       
					//   }
	//   soluzione with class Report() ->
	$reportObj = new Report($report, $date, $time, $id_position, $id_agency, $id_user);
            $report=$reportObj->insert();
			if($report===TRUE){
          
				header("Location: profile.php");
	
			} else{
				echo "Error: " . $sql . "<br>" . $database->conn->error;
				die();
			}
	// Close connection
	mysqli_close($conn);
	

?>