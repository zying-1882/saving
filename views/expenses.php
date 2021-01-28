<section id="ex">
<?php  
	$title = "HOME";
	function get_content() {
	require_once '../controllers/connection.php';

	$query = "SELECT * FROM expenses";
	$stmt = $cn->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$expenses = $result->fetch_all(MYSQLI_ASSOC);

	$query = "SELECT * FROM category_ex";
	$stmt = $cn->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
	$category_ex = $result->fetch_all(MYSQLI_ASSOC);
	
	
?>

<h1 class="text-center text-1 mt-5">EXPENSES</h1>

<div class="container">
	<?php if(isset($_SESSION["user_details"])): ?>

	<form class="py-5 col-md-6 mx-auto text-2-2" method="POST" action="/controllers/expenses/expenses.php" enctype="multipart/form-data">
		<div class="mt-3">
			<label>Name</label>
			<input type="text" name="name" class="form-control text-2">
		</div>
		<div class="mt-3">
			<label>Price</label>
			<input type="number" name="amount_spend" class="form-control text-2">
		</div>
		<div class="mt-3">
			<label>Image</label>
			<input type="file" name="image" class="form-control">
		</div>
		<div class="mt-3">
			<label>Category</label>
			<select name="category_id" class="form-select">
				<?php foreach($category_ex as $category): ?>
					<option value="<?php echo $category['category_id'] ?>">
						<?php echo $category["name"]; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div>
			<label>Date</label>
			<input type="date" name="date" class="form-control text-2">
		</div>
		<div>
			<label>Description</label>
			<textarea name="description" class="form-control text-2" rows="5"></textarea>
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