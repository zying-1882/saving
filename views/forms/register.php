<?php
$title = "Register";
function get_content(){

?>

	<form method="POST" action="/controllers/auth/register.php" class="col-md-6 mx-auto py-5">
		<div class="mb-3">
			<label>Firstname</label>
			<input type="text" name="firstname" class="form-control">
		</div>
		<div class="mb-3">
			<label>Lastname</label>
			<input type="text" name="lastname" class="form-control">
		</div>
		<div class="mb-3">
			<label>Username</label>
			<input type="text" name="username" class="form-control">
		</div>
		<div class="mb-3">
			<label>Password</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="mb-3">
			<label>Confirm Password</label>
			<input type="password" name="password2" class="form-control">
		</div>
		<button class="btn btn-success">Submit</button>
		</div>
	</form>
	



<?php
}
	require_once "../partials/layout.php";
 ?>