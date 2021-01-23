<?php 
session_start(); 
require_once "../connection.php";

$amount_sav = intval($_POST['amount_sav']);
$user_id = $_SESSION['user_details']['user_id'];


$query = "INSERT INTO history(amount, user_id, target_id) VALUES(?, ?, ?)";
$stmt = $cn->prepare($query);
$stmt->bind_param('iii', $amount_sav, $user_id, $target_id);
$stmt->execute();
$stmt->close();
$cn->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);

 ?>