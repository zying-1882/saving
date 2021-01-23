<?php  
	$title = "Target_saving_details";
	function get_content() {
	require_once '../controllers/connection.php';
	date_default_timezone_set("Asia/Kuala_Lumpur");

	$id = $_GET['id'];
	$query = "SELECT * FROM target_saving WHERE target_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$target_saving = $result->fetch_assoc();


	
	$date = date('H:i:s');
	$total = 0;

	
?>

<div class="container">
	<form method="POST" action="../controllers/target_saving/history.php" class="col-md-6 mx-auto py-5">
		<div>
			<label>Total</label>
			<h4><?php $total ?></h4>
		</div>
		<div class="d-flex justify-content-between">
			<input type="number" name="amount_sav" class="form-control">
			<button class="btn btn-success">Add</button>
		</div>
		
	</form>
</div>

 <div class="container">
	<div class="row">
		<div class="col-md-4 py-5">
			<div class="d-flex justify-content-between">
				<h5 class="card-title">RM <?php echo $target_saving["total_amount"] ?></h5>
				<h5 class="card-text"><?php echo $target_saving['end_date'] ?></h5>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<h5>History</h5>
	<div class="row">
		<div class="col-md-12 py-4">
			<small><?php echo $history['amount'] ?></small>
			<small><?php echo $date ?></small>
		</div>
	</div>
</div>





<?php  
	}
	require_once 'partials/layout.php';
?>


