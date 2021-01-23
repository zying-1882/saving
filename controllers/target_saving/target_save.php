<?php
session_start(); 
require_once "../connection.php";

$errors = 0;
$name = htmlspecialchars($_POST['name']);
$total_amount = intval($_POST['total_amount']);
$end_date = htmlspecialchars($_POST['end_date']);
$amount_save = intval($_POST['amount_save']);
$user_id = $_SESSION['user_details']['user_id'];

foreach($_POST as $key => $value){
	if(strlen($value) == 0 && empty($value)){
		$errors++;
		die("Please fill out all fields");
	}
}

if($errors === 0){
$query = "INSERT INTO target_saving(name, total_amount, end_date, amount_save, user_id) VALUES(?, ?, ?, ?, ?)";
$stmt = $cn->prepare($query);
$stmt->bind_param("sisii", $name, $total_amount, $end_date, $amount_save, $user_id);
$stmt->execute();
$stmt->close();
$cn->close();



	header("Location:/".['HTTP_REFERER']);
}

 ?>