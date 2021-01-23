<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Saving</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php if(!isset($_SESSION["user_details"])): ?>
        <a class="nav-link" href="/views/forms/register.php">Register</a>
        <a class="nav-link" href="/views/forms/login.php">Login</a> 
      <?php endif; ?>

        <?php if(isset($_SESSION["user_details"])): ?>
        <a class="nav-link" href="/controllers/auth/logout.php">Logout</a>
        <a class="nav-link" href="/views/target_saving.php">Target_Saving</a>
        <a class="nav-link" href="#">Save</a>
        <a class="nav-link" href="#">Expenses</a>
        <a class="nav-link" href="#">History</a>
      <?php endif; ?>
      </div>
    </div>
  </div>
</nav>