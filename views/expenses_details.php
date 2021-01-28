<?php  
	$title = "Expenses_details";
	function get_content() {
	require_once '../controllers/connection.php';
	

	$id = $_GET['id'];
	$query = "SELECT * FROM expenses WHERE expenses_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$expenses = $result->fetch_assoc();
	

  $query_cat = "SELECT * FROM category_ex";
  $stmt = $cn->prepare($query_cat);
  $stmt->execute();
  $result = $stmt->get_result();
  $category_ex = $result->fetch_all(MYSQLI_ASSOC);
	

?>



<div id="inex">
	<div class="container">	
	  <div class="card mx-auto text-2" style="max-width: 540px;">
  		<div class="row g-0">
    	<div class="col-md-4">
     		<img src="<?php echo $expenses['image'] ?>" class="img-fluid">
    	</div>
    	<div class="col-md-8">
        	<div class="card-body">
        		<h4 class="card-title">
        			<?php echo $expenses['name'] ?>
        		</h4>
        		<p class="card-text">Description: <?php echo $expenses['description'] ?></p>
        		<p class="card-text"><small>Price: RM <?php echo $expenses['amount_spend'] ?></small></p>
        		<p class="card-text"><small>Date: <?php echo $expenses['date_ex'] ?></small></p>
        	</div>
        	<div class="mb-3">
        		<button class="text-1-1 button1" data-bs-toggle="modal" data-bs-target="#deleteModal">DELETE</button>

        		<div class="modal fade" id="deleteModal">
                    <div class="modal-dialog inn">
                      <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Are you sure you want to delete <?php echo $expenses['name'] ?>  ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button data-bs-dismiss="modal" class="button1 text-1-1 mt-3">Cancel</button>
                            <a href="../controllers/expenses/delete_expenses.php?id=<?php echo $expenses['expenses_id'] ?>"><button class="text-1-1 button1">Comfirm</button></a>
                        </div>
                        </div>
                    </div>
                </div>

                <button class="text-1-1 button1" data-bs-toggle="modal" data-bs-target="#editModal">EDIT</button>

                <div class="modal fade" id="editModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header inn">
                          <h5 class="modal-title">Edit <?php echo $expenses['name'] ?></h5>
                        </div>
                      <div class="modal-body inn">
                          <form method="POST" action="../controllers/expenses/update_expenses.php" enctype="multipart/form-data">
                             <input type="hidden" name="expenses_id" value="<?php echo $expenses['expenses_id'] ?>">
                             <div class="mt-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control text-2" value="<?php echo $expenses['name'] ?>">
                              </div>
                              <div class="mt-3">
                                <label>Price</label>
                                <input type="number" name="amount_spend" class="form-control text-2" value="<?php echo $expenses['amount_spend'] ?>">
                              </div>
                              <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" value="<?php echo $expenses['image'] ?>">
                              </div>
                              <div class="mb-3">
                                <label>Category</label>
                                <select name="category_id" class="form-select">
                                  <?php foreach($category_ex as $category): ?> <!-- 2 -->
                                    <?php if($category['category_id'] == $expenses['category_id']): ?>
                                      <option selected value="<?php echo $category['category_id'] ?>">
                                        <?php echo $category['name'] ?>
                                      </option>
                                  <?php else: ?>
                                    <option value="<?php echo $category['category_id'] ?>">
                                       <?php echo $category["name"]; ?>
                                    </option>
                                  <?php endif; ?>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div>
                              <label>Date</label>
                              <input type="date" name="date" class="form-control text-2" value="<?php echo $expenses['date_ex'] ?>">
                            </div>
                            <div>
                              <label>Description</label>
                              <textarea name="description" class="form-control text-2" rows="5"><?php echo $expenses['description'] ?></textarea>
                            </div>

                            <button class="button1 mt-3">Update</button>
                         
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      </div>
                      </form> 
                  </div>
              </div>

          </div>
        	</div>
    	</div>
  		</div>
	  </div>
	</div>
</div>

<?php  
	}
	require_once 'partials/layout.php';
?>


