<section id="in">
<?php  
	$title = "HOME";
	function get_content() {
	require_once '../controllers/connection.php';

	$query = "SELECT * FROM income";
	$stmt = $cn->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$income = $result->fetch_all(MYSQLI_ASSOC);

	$query = "SELECT * FROM category_in";
	$stmt = $cn->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$category_in = $result->fetch_all(MYSQLI_ASSOC);
	
	
?>
<h1 class="text-center text-1 mt-5">INCOME</h1>

<div class="container text-2-2">
	<?php if(isset($_SESSION["user_details"])): ?>

	<form class="py-5 col-md-6 mx-auto" method="POST" action="/controllers/income/income.php?>" enctype="multipart/form-data">
		<div class="mt-3">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="mt-3">
			<label>Amount</label>
			<input type="number" name="amount_save" class="form-control text-grey">
		</div>
		<div class="mt-3 ">
			<label>Image</label>
			<input type="file" name="image" class="form-control">
		</div>
		<div class="mt-3">
			<label>Category</label>
			<select name="category_id" class="form-select">
				<?php foreach($category_in as $category): ?>
					<option value="<?php echo $category['category_id'] ?>">
						<?php echo $category["name"]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div>
			<label>Date Receive</label>
			<input type="date" name="date_in" class="form-control">
		</div>
		<div>
			<label>Description</label>
			<textarea name="description" class="form-control" rows="5"></textarea>
		</div>
		<button class="button1 text-2-2">Submit</button>	
	</form>
</div>
<?php endif; ?>


<?php  
	}
	require_once 'partials/layout.php';
?>
</section>