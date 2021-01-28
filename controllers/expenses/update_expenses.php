
<?php 
require_once '../connection.php';


$id = intval($_POST['expenses_id']);
$name = htmlspecialchars($_POST['name']);
$amount_spend = intval($_POST['amount_spend']);
$category = intval($_POST['category_id']);
$date_ex = htmlspecialchars($_POST['date']);
$description = htmlspecialchars($_POST['description']);



if($_FILES['image']['name'] != "") {
		$img_name = $_FILES['image']['name'];
		$img_path = "/assets/img/$img_name";
		move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . $image_path);

		$query = "UPDATE expenses SET amount_spend= ?, name=?, image=?, category_id=?, date_ex=?, description=?  WHERE expenses_id= ? ";
		$stmt = $cn->prepare($query);
		$stmt->bind_param("sissisi", $name, $amount_spend, $description, $img_path, $category, $date_ex, $id);
		$stmt->execute();
		$stmt->close();
		$cn->close();
	} else {
		$query = "UPDATE expenses SET amount_spend= ?, name=?, category_id=?, date_ex=?, description=?  WHERE expenses_id= ? ";
		$stmt = $cn->prepare($query);
		$stmt->bind_param("sisisi", $name, $amount_spend, $description, $category, $date_ex, $id);
		$stmt->execute();
		$stmt->close();
		$cn->close();
	}


header('Location:'.$_SERVER['HTTP_REFERER']);








 ?>
