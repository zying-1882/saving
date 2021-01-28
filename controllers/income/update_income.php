<?php 
require_once '../connection.php';

$id = intval($_POST['income_id']);
$name = htmlspecialchars($_POST['name']);
$amount_save = floatval($_POST['amount_save']);
$category = intval($_POST['category_id']);
$date = intval($_POST['date_in']);
$description = htmlspecialchars($_POST['description']);

if($_FILES['image']['name'] != "") {
		$img_name = $_FILES['image']['name'];
		$img_path = "/assets/img/$img_name";
		move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . $image_path);
		$query = "UPDATE income SET name= ?, amount_save=?, image=?, date_in=?, description=?, category_id=?  WHERE income_id= ? ";
		$stmt = $cn->prepare($query);
		$stmt->bind_param("sissisi", $name, $amount_save, $description, $img_path, $category, $date, $id);
		$stmt->execute();
		$stmt->close();
		$cn->close();
	} else {
		$query = "UPDATE income SET name= ?, amount_save=?, date_in=?, description=?, category_id=?  WHERE income_id= ? ";
		$stmt = $cn->prepare($query);
		$stmt->bind_param("sissisi", $name, $amount_save, $description, $category, $date, $id);
		$stmt->execute();
		$stmt->close();
		$cn->close();
	}



header('Location:'.$_SERVER['HTTP_REFERER']);





 ?>


