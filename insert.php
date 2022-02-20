
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		include "callDatabase.php";
		include "class-user.php";
			
		if (isset($_POST['email']) && isset($_POST['password'])) {

			function validate($data){
		
				$data = trim($data);
		
				$data = stripslashes($data);
		
				$data = htmlspecialchars($data);
		
				return $data;
		
			};
		
			$email = validate($_POST['email']);
		
			$pass = validate($_POST['password']);
			$first_name = validate($_POST['first_name']);
			$last_name = validate($_POST['last_name']);
			$username = validate($_POST['username']);
		
			if (empty($email)) {
		
				header("Location: register.php?error=Email is required");
		
				exit();
		
			}else if(empty($pass)){
		
				header("Location: register.php?error=Password is required");
		
				exit();
		
			}else if(empty($first_name)){
		
				header("Location: register.php?error=First name is required");
		
				exit();
		
			}else if(empty($last_name)){
		
				header("Location: register.php?error=Last name is required");
		
				exit();
		
			}else if(empty($username)){
		
				header("Location: register.php?error=Username is required");
		
				exit();
		
			}else{
		
				//check if email already exists in database
				// before w sql: 
				$sql = "SELECT * FROM users WHERE email='$email'";
		
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
		
					$row = mysqli_fetch_assoc($result);
						
		
					if ($email==isset($row['email'])) {
		
						header("Location: register.php?error=email already exists");
						exit();
			
					}

				}
				// after w class:    (nn worka)
				// $usermailObj= new User($email);
				// $useremails=$usermailObj->checkEmail();
				// if (count($useremails)>0){
				// 	foreach($useremails as $usermail){}
						
		
				// 	if ($useremails==isset($usermail['email'])) {
		
				// 		header("Location: register.php?error=email already exists");
				// 		exit();
			
				// 	}

				// }
				




				  //do your insert code here or do something (run your code)
					  // Taking all values from the form data(input)
					
					  $position = $_REQUEST['position'];
					  $age = $_REQUEST['age'];
					  $start_date = $_REQUEST['start_date'];
					  $salary = $_REQUEST['salary'];
					  
					  
					  $image = $_REQUEST['image'];
					  
					  $db_color= "bg-gradient-primary";
					  $text_color= "sidebar-dark";
					  $navbar_text= "navbar-light";
					  $car_border_color= "border-left-primary";
					  $car_text_color= "text-primary";
					//   $id = $_REQUEST['id'];
					
			//before, encrypt password w md5:
					//   $password = md5($password);

			//after, encrypt pass w sanature key:         (or is sIGNAture key??)
					
					//Dj3XyJH.%QT&Wt411\FfBDw6?3RYgP <-- my sanature key
					$sntkey= "Dj3XyJH.%QT&Wt411\FfBDw6?3RYgP";
					$password= hash("sha512", $sntkey.$pass); 
					// hash = stringa alfanumerica di 512 caratteri
					// $mysalary=$salary."€";

			//   BEFORE, W SQL: 					  
					//   $sql = "INSERT INTO users (firstname, lastname, position, age, startdate, salary, email, pass, username, image, db_color, text_color, navbar_text, car_border_color, car_text_color) VALUES ('$first_name', '$last_name', '$position','$age','$start_date','$salary', '$email','$password', '$username', '$image', '$db_color', '$text_color', '$navbar_text', '$car_border_color', '$car_text_color')";
			  
					//   if(mysqli_query($conn, $sql)){
				  
					// 	  header("Location: logout.php");
			  
					//   } else{
					//   echo "ERROR: Hush! Sorry $sql. "
					// 	  . mysqli_error($conn);
					//   }
			//   AFTER, W CLASS: 
					$userObj= new User($first_name, $last_name, $position, $age, $start_date, $salary, $email, $password, $username, $image, $db_color, $text_color, $navbar_text, $car_border_color, $car_text_color);
					$user=$userObj->insert(); 
				
					if($user===TRUE){
						header("Location: logout.php");
					} else{
						echo "ERROR: Hush! Sorry $user. ";
							die();
						}


				// Close connection
				mysqli_close($conn);
							  
		
			}
	
     
		}
		// if($email==isset($row['email']))
        // {
        //     header("Location: register.php?error=email already exists");	
			
        // }
		
		
		
	
	
		
		
	
?>

