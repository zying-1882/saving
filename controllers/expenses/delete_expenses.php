<?php 
require_once '../connection.php';
$id = $_GET['id'];
$query = "DELETE FROM expenses WHERE expenses_id = ?";
$stmt = $cn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();

$cn->close();
$stmt->close();
header("Location: /");


 ?>