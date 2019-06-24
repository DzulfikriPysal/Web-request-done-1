<?php
session_start();
	if ( ! empty( $_POST ) ) {
		
		$_SESSION['weight'] = $_POST['weight'];
		$_SESSION['height'] = $_POST['height'];
		$_SESSION['age'] = $_POST['age'];
		$_SESSION['bmi'] = $_POST['bmi'];
		$_SESSION['bmitext'] = $_POST['bmitext'];
		
		$userid = $_SESSION['user_id'];
		
		$age = $_SESSION['age'];
		$height = $_SESSION['height'];
		$weight =  $_SESSION['weight'];
		$bmi = $_SESSION['bmi'];
		$bmitext = $_SESSION['bmitext'];
		
		

		$db_host = 'localhost';
		$db_user = 'root';
		$db_pass = '';
		$db_name = 'data_1';
		$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
			
		$sql = "UPDATE user SET age='$age', height='$height', weight='$weight', bmi='$bmi', bmitext='$bmitext' WHERE id= '$userid'";	
		
		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . $conn->error;
		}
			}

?>