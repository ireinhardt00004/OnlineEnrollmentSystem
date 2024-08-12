<?php

include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
	session_start(); // Initialize the session

	function validate($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$enteredPassword = $_POST['password'];

	if (empty($email)) {
		header("Location: ../login.php?error=Email Address is required");
		exit();
	} else if (empty($enteredPassword)) {
		header("Location: ../login.php?error=Password is required");
		exit();
	}

	$query = "SELECT password FROM students WHERE email = :email";
	$stmt = $db->prepare($query);
	$stmt->bindParam(':email', $email);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	if ($result && password_verify($enteredPassword, $result['password'])) {
		$hashedPassword = $result['password'];
		$sql = "SELECT * FROM students WHERE email = :email AND password = :password AND role = 'user'";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $hashedPassword);
		$stmt->execute();

		if ($stmt->rowCount() === 1) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

			$_SESSION['email'] = $row['email'];
			$_SESSION['fname'] = $row['fname'];
			$_SESSION['middlename'] = $row['middlename'];
			$_SESSION['lname'] = $row['lname'];
			$_SESSION['accountID'] = $row['accountID'];
			$_SESSION['bdate'] = $row['bdate'];
			$_SESSION['address'] = $row['address'];
			$_SESSION['cnum'] = $row['cnum'];
			$_SESSION['gender'] = $row['gender'];
			$_SESSION['img_url'] = $row['img_url'];
			$_SESSION['course'] = $row['course'];
			$_SESSION['category'] = $row['category'];
			$_SESSION['year'] = $row['year'];
			$_SESSION['semester'] = $row['semester'];
			$_SESSION['acadyear'] = $row['acadyear'];
			header("Location: ../user/index.php");
			exit();
		}
	} else {
		$query = "SELECT password FROM faculty WHERE email = :email";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($result && password_verify($enteredPassword, $result['password'])) {
			$hashedPassword = $result['password'];
			$sql = "SELECT * FROM faculty WHERE email = :email AND password = :password AND role = 'admin'";
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password', $hashedPassword);
			$stmt->execute();

			if ($stmt->rowCount() === 1) {
				$row = $stmt->fetch(PDO::FETCH_ASSOC);

				$_SESSION['email'] = $row['email'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['middlename'] = $row['middlename'];
				$_SESSION['lname'] = $row['lname'];
				$_SESSION['accountID'] = $row['accountID'];
				$_SESSION['bdate'] = $row['bdate'];
				$_SESSION['address'] = $row['address'];
				$_SESSION['cnum'] = $row['cnum'];
				$_SESSION['gender'] = $row['gender'];
				$_SESSION['img_url'] = $row['img_url'];
				$_SESSION['course'] = $row['course'];

				header("Location: ../admin/index.php");
				exit();
			}
		}
	}

	// Password is incorrect or no matching user found
	header("Location: ../login.php?error=Incorrect Email Address or Password");
	exit();
} else {
	header("Location: ../login.php");
	exit();
}
?>
