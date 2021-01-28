<?php  
  $title = "HOME";
  function get_content() {
  require_once 'controllers/connection.php';

  
  $query_ex = "SELECT * FROM expenses";
  $stmt = $cn->prepare($query_ex);
  $stmt->execute();
  $result = $stmt->get_result();
  $expenses = $result->fetch_all(MYSQLI_ASSOC);

  $query = "SELECT * FROM income";
  $stmt = $cn->prepare($query);
  $stmt->execute();
  $result = $stmt->get_result();
  $income = $result->fetch_all(MYSQLI_ASSOC);

  $query_cat = "SELECT * FROM category_ex";
  $stmt = $cn->prepare($query_cat);
  $stmt->execute();
  $result = $stmt->get_result();
  $category_ex = $result->fetch_all(MYSQLI_ASSOC);

?>
<?php if(!isset($_SESSION["user_details"])): ?> 
<section id="home">
<div class="container">
  <div class="row">
    <div class="mt-5">
    <h1 class="text-1 text-center">WELCOME TO EXIN</h1>
    </div>
     <div class="mt-5">
      <p class="text-1 text-center typewriter"><small >Here is the place let you record your EXPENSES & INCOME.</small></p>
    </div>
    <div class="d-flex justify-content-center">
      <a href="/views/forms/register.php"><button class="text-1 button1">REGISTER</button></a>
      <a href="/views/forms/login.php"><button class="text-1 button1">LOGIN</button></a>
    </div>
  </div>
</div>
</section>
<?php endif; ?>


<?php if(isset($_SESSION["user_details"])): ?> 
<section id="history">
<div class="container">
  <h3 class="text-1 pt-5">History of Expenses</h3>
  <button class="text-2-2 aofex mb-5 mt-3 button1"><a href="/controllers/expenses/chart_ex.php">Record Of Expenses</a></button>
  <p class="text-2-2 mb-3"><small>Click the name for more details of your expenses</small></p>
    <div class="row">
      <div class="container">
       <?php foreach($expenses as $expense): ?>
          <div class="card-group col-md-6">
            <div class="card mb-5" style="width: 18rem;">
              <img src="<?php echo $expense['image'] ?>" class="card-img-top">
                <div class="card-body aofex">
                  <a href="/views/expenses_details.php?id=<?php echo $expense['expenses_id'] ?>"><h5 class="card-text text-2-3"><?php echo $expense['name'] ?></h5></a>
                  </div>
                 </div>
            </div>
          </div>
      <?php endforeach; ?>
      </div> 
  </div>

  <hr>

<div class="container">
  <h3 class="text-1 pt-5">History of Income</h3>
 <button class="text-2-2 aofex mb-5 mt-3 button1"><a href="../controllers/income/chart_in.php">Record Of Income</a></button> 
 <p class="text-2-2 mb-3"><small>Click the name for more details of your income</small></p>
  <div class="row">
        <div class="container">
          <?php foreach($income as $incom): ?>
        <div class="card-group col-md-6">
           <div class="card mb-5" style="width: 18rem;">
            <img src="<?php echo $incom['image'] ?>" class="card-img-top">
            <div class="card-body aofin">
              <a href="/views/income_details.php?id=<?php echo $incom['income_id'] ?>"><h5 class="card-text text-2-3"><?php echo $incom['name'] ?></h5></a>
            </div>
            </div>
        </div>
         <?php endforeach; ?>
      </div> 
  </div>
</div>
<?php endif; ?> 
</section>

         



<?php  
  }
  require_once 'views/partials/layout.php';
?>
