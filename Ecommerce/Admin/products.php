	<?php 

@include_once ("./components/header.php");
@require_once ("../Config/connection.php");

$get_products ="SELECT p.*,c.cat_name FROM
`products` as p
INNER JOIN
`categories` as c
ON p.cat_id = c.cat_id;";

$result_products = mysqli_query($conn,$get_products);

?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Showing Our Products
            </h3>
           
          </div>
          <div class="card">
            <div class="card-body">
             
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Product #</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                      <?php 
                      while($row= mysqli_fetch_assoc($result_products)){
?>
 <tr>
                            <td><?= $row['product_id'] ?></td>
                            <td><?= $row['title'] ?></td>
                            <td><img src="./uploads/<?= $row['image'] ?>" alt="" style="height: 60px; width:60px"></td>
                            <td><?php echo  mb_substr($row['description'], 0, 40) . '...'; ?></td>
                            <td>Rs. <?= $row['price'] ?></td>
                            <td><?= $row['stock'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td><?= $row['cat_name'] ?></td>
                          
                            <td>
                              <a href="./productDetails.php?id=<?= $row['product_id'] ?>" class="btn btn-outline-primary">View</a >
                              <a href="./productDetails.php?id=<?= $row['product_id'] ?>" class="btn btn-outline-primary">Edit</a >
                              <a href="./productDetails.php?id=<?= $row['product_id'] ?>" class="btn btn-outline-primary">Delete</a >
                            </td>
                        </tr>


<?php


                      }
                      
                      
                      ?>
                       
                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    
	<?php 

@include_once ("./components/scripts.php");

?>
  <!-- Custom js for this page-->
  <script src="./js/data-table.js"></script>
  <!-- End custom js for this page-->

  