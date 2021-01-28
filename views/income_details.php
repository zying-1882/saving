<?php  
	$title = "Income_details";
	function get_content() {
	require_once '../controllers/connection.php';
	

	$id = $_GET['id'];
	$query = "SELECT * FROM income WHERE income_id = ?";
	$stmt = $cn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$income = $result->fetch_assoc();

	$query = "SELECT * FROM category_in";
 	$stmt = $cn->prepare($query);
 	$stmt->execute();
  	$result = $stmt->get_result();
  	$category_in = $result->fetch_all(MYSQLI_ASSOC);
	
	
	
?>



<div id="inex">
	<div class="container">	
		<div class="card mt-5 mx-auto" style="max-width: 540px;">
  			<div class="row g-0">
    		<div class="col-md-4">
     			<img src="<?php echo $income['image'] ?>" class="img-fluid">
    		</div>
    		<div class="col-md-8">
     			 <div class="card-body">
        			<h4 class="card-title">
        			<?php echo $income['name'] ?>
       			    </h4>
        			<p class="card-text">Description: <?php echo $income['description'] ?></p>
        			<p class="card-text"><small>Price: RM <?php echo $income['amount_save'] ?></small></p>
       		 		<p class="card-text"><small>Date: <?php echo $income['date_in'] ?></small></p>
      			</div>
      			<div class="mb-3">
      				<button class="text-1-1 button1" data-bs-toggle="modal" data-bs-target="#deleteModal">DELETE</button>

        		<div class="modal fade" id="deleteModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Are you sure you want to delete <?php echo $income['name'] ?>  ?</h5>
                        </div>
                        <div class="modal-footer">
                            <button data-bs-dismiss="modal" class="button1 text-1-1">Cancel</button>
                            <a href="../controllers/income/delete_income.php?id=<?php echo $income['income_id'] ?>"><button class="text-1-1 button1">Comfirm</button></a>
                        </div>
                        </div>
                    </div>
                </div>

                <button class="text-1-1 button1" data-bs-toggle="modal" data-bs-target="#editModal">EDIT</button>

                <div class="modal fade" id="editModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Edit Item</h5>
                        </div>
                      <div class="modal-body">
                          <form method="POST" action="../controllers/income/update_income.php" enctype="multipart/form-data">
                             <input type="hidden" name="income_id" value="<?php echo $income['income_id'] ?>">
                             <div class="mt-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control text-2" value="<?php echo $income['name'] ?>">
                              </div>
                              <div class="mt-3">
                                <label>Price</label>
                                <input type="number" name="amount_save" class="form-control text-2" value="<?php echo $income['amount_save'] ?>">
                              </div>
                              <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" value="<?php echo $income['image'] ?>">
                              </div>
                              <div class="mb-3">
                                <label>Category</label>
                                <select name="category_id" class="form-select">
                                  <?php foreach($category_in as $category): ?> <!-- 2 -->
                                    <?php if($category['category_id'] == $income['category_id']): ?>
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
                              <input type="date" name="date_in" class="form-control text-2" value="<?php echo $income['date_in'] ?>">
                            </div>
                            <div>
                              <label>Description</label>
                              <textarea name="description" class="form-control text-2" rows="5"><?php echo $income['description'] ?></textarea>
                            </div>

                            <button class="button1 mt-3">Update</button>
                         
                      </div>
                      <div class="modal-footer">
                          <button class="button1" data-bs-dismiss="modal">Cancel</button>
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

<?php  
	}
	require_once 'partials/layout.php';
?>


