<?php
	include '../Model/_Connection.php';
	session_start();
  	$Username = $_POST["username"];
		// Searchs the database for an email that matchs the email provied.
		$conn = dbConnect();
		$login = "SELECT * FROM user WHERE Username = :Username;";
		$stmt = $conn->prepare($login);
		$stmt->bindParam(':Username', $Username);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		// Gets User login credential and changes the name of the object.
		$UP = $_POST["user_pass"];
		$DP = $result["Password"];
		// If user email is not found throw an error on reload
		if($stmt->rowcount() == 0) {
			$_SESSION['message'] = "Login details are invalid please try again";
			header('Location: ../View/index.php');
		} else {
			// Checks User input password agentist the hashed password in the database
			if (password_verify($UP, $DP)) {
				echo 'Password is valid!';
				//Set Users details into session.
				$_SESSION['UserID'] = $result['UserID'];
				$_SESSION['UserStatus'] = $result['UserStatus'];
				$_SESSION['FName'] = $result['F.Name'];
				$_SESSION['message'] = "Login successful";
				header('Location: ../View/index.php');
			} else {
				// if an email was found but your password was wrong.
				$_SESSION['message'] = "Login details are invalid please try again";
				header('Location: ../View/index.php');
			}
		}

 ?>
