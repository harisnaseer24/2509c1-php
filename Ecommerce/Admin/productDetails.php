	<?php 

if (!isset($_GET['id'])) {

header("Location: ./products.php");

} else {


@include_once ("./components/header.php");
@require_once ("../Config/connection.php");

$pid =$_GET['id'];

$get_products ="SELECT p.*,c.cat_name FROM
`products` as p
INNER JOIN
`categories` as c
ON p.cat_id = c.cat_id  WHERE product_id=$pid;";

$result_products = mysqli_query($conn,$get_products);
$row= mysqli_fetch_assoc($result_products);
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
                <div class="col-6">
                    ><img src="./uploads/<?= $row['image'] ?>" alt="" style="height: 60px; width:60px">
                </div>
                <div class="col-6">
                    <h1><?= $row['title'] ?></h1>
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

  <?php 
  
  
}
  ?>








