<?php
session_start(); 
require_once "../connection.php";	

$amount_save = intval($_POST['amount_save']);
$name = htmlspecialchars($_POST['name']);
$category_id = htmlspecialchars($_POST['category_id']);
$date_in = htmlspecialchars($_POST['date_in']);
$description = htmlspecialchars($_POST['description']);
$user_id = $_SESSION['user_details']['user_id'];


$img_name = $_FILES["image"]["name"];
$img_size = $_FILES["image"]["size"];
$img_tmpname = $_FILES["image"]["tmp_name"];
$img_path = "/assets/img/$img_name";


$img_type = pathinfo($img_name, PATHINFO_EXTENSION); //png, jpg, svg
$is_img = false;
$has_details = false; 

if($img_type == "jpg" || $img_type == "png" || $img_type == "jpeg" || $img_type == "svg" || $img_type == "gif") {
	$is_img = true;
} else {
	echo "Please upload an image file";
}

foreach($_POST AS $key => $value){
	if(empty($value)){
		die("Please fill out all field");
	}else{
		$has_details = true;
	}
}

if($has_details && $is_img && $img_size > 0){
move_uploaded_file($img_tmpname, $_SERVER["DOCUMENT_ROOT"] . $img_path);
$query = "INSERT INTO income(name, amount_save, image, date_in, description, category_id, user_id) VALUES(?, ?, ?, ?, ?, ?, ?)";
$stmt = $cn->prepare($query);
$stmt->bind_param("sisssii", $name, $amount_save, $img_path, $date_in, $description, $category_id, $user_id);
$stmt->execute();
$stmt->close();
$cn->close();

header("Location:/".['HTTP_REFERER']);
}

 ?>