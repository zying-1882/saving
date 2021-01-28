<?php  
	$title = "Login";
	function get_content() {
?>
<section id="loin">
	<div class="container">
		<h1 class="text-center text-1 pt-5">LOGIN</h1>
		<div class="row">
			<form class="col-md-6 mx-auto py-5" method="POST" action="/controllers/auth/login.php">
				<div class="mb-3 text-1">
					<label>Username</label>
					<input type="text" name="username" class="form-control">
				</div>
				<div class="mb-3 text-1">
					<label>Password</label>
					<input type="password" name="password" class="form-control">
				</div>
					<button class="button1 text-1">Login</button>
				</form>
		</div>
	</div>
</section>
<?php  
	}
	require_once '../partials/layout.php';
?>