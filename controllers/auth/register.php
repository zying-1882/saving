<?php 
require_once "../connection.php";


$errors = 0;
$firstname = htmlspecialchars($_POST['firstname']);
$lastname = htmlspecialchars($_POST['lastname']);
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$password2 = htmlspecialchars($_POST['password2']);

//all inputs should not be empty
foreach($_POST as $key => $value){
	if(strlen($value) == 0 && empty($value)){
		$errors++;
		die("Please fill out all fields");
	}
}

//username should grater than 8
if(strlen($username) < 8){
	echo "Username must be greater than 8 characters";
	$errors++;
}

//password should be grater than 8 characters
if(strlen($password) < 8){
	echo "Password must be greater than 8 characters";
	$errors++;
}

//password & comfirm password should match
if($password != $password2){
	echo "Password do not match";
	$errors++;
}

//check if the username or email akreadt exists
if($username){
	$query = "SELECT * FROM users WHERE username = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$result = $stmt->get_result();
	$user = $result->fetch_all(MYSQLI_ASSOC);
	
	if($user){
		echo "Username already exists";
		$errors++;
		$cn->close();
		$stmt->close();
	}
}
//if $errors still at zero than we can register
if($errors === 0){
	$query = "INSERT INTO users(firstname, lastname, username, password) VALUES(?, ?, ?, ?)";
	$stmt = $cn->prepare($query);
	$stmt->bind_param("ssss", $firstname, $lastname, $username, password_hash($password,PASSWORD_DEFAULT ));
	$stmt->execute();
	$stmt->close();
	$cn->close();



	header("Location:/");
}

 ?>