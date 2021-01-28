<nav class="navbar navbar-expand-lg bg-orange text-1 sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="/">EXIN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php if(isset($_SESSION["user_details"])): ?> 
        <a class="nav-link text-white" href="/views/expenses.php"><i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i></a>
        <a class="nav-link text-white" href="/views/income.php"><i class="fa fa-money fa-2x" aria-hidden="true"></i></a>
        <a class="nav-link text-white" href="/controllers/auth/logout.php"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
         <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

