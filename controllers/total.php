<?php 
session_start(); 
require_once "connection.php";


$user_id = $_SESSION['user_details']['user_id'];


	$ex_query = "SELECT * FROM expenses WHERE expenses_id = ?";
	$ex_stmt = $cn->prepare($ex_query);
	$ex_stmt->bind_param("i", $ex_id);
	$ex_stmt->execute();
	$ex_result = $ex_stmt->get_result();
	$expenses = $ex_result->fetch_assoc();


	$in_query = "SELECT * FROM income WHERE income_id = ?";
	$in_stmt = $cn->prepare($in_query);
	$in_stmt->bind_param("i", $in_id);
	$in_stmt->execute();
	$in_result = $in_stmt->get_result();
	$income = $in_result->fetch_assoc();

var_dump($income);
die();

$query = "INSERT INTO history(user_id, expenses_id, income_id) VALUES(?, ?, ?) ";
$stmt = $cn->prepare($query);
$stmt->bind_param('iii', $user_id, $expenses, $income);
$stmt->execute();
$stmt->close();
$cn->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);






	


 ?>