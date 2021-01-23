<?php  
	$title = "Target_saving";
	function get_content() {
	require_once '../controllers/connection.php';

	$target_saving_query = "SELECT * FROM target_saving";
	$target_saving_stmt = $cn->prepare($target_saving_query);
	$target_saving_stmt->execute();
	$target_saving_result = $target_saving_stmt->get_result();
	$target_saving = $target_saving_result->fetch_all(MYSQLI_ASSOC);
	
?>

	<form method="POST" action="../controllers/target_saving/target_save.php" class="col-md-6 mx-auto py-5">
		<div class="container">
			<h2 class="text-center">My Goals</h2>
		</div>
		<div class="container">
			<div class="card">
				<div class="card-header">
					<label>Name:</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="card-body">
					<div>
						<label>Total Amount:</label>
						<input type="number" name="total_amount" class="form-control">
					</div>
					<div>
						<label>Date</label>
						<input type="date" name="end_date" class="form-control">
					</div>
					<div>
						<label>Amount Save</label>
						<input type="number" name="amount_save" class="form-control">
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-success">Submit</button>
				</div>
			</div>
		</div>
	</form>


	<div class="container">
	<?php foreach($target_saving as $target_save): ?>
		<div class="col-md-4 py-5">
			<div class="card">
				<div class="card-body">
					<a href="/views/target_saving_details.php?id=<?php echo $target_save['target_id'] ?>"><h5 class="card-title"><?php echo $target_save["name"] ?></h5></a>
					<div><?php echo $target_save["end_date"] ?></div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div> 

	
	


<?php  
	}
	require_once 'partials/layout.php';
?>


