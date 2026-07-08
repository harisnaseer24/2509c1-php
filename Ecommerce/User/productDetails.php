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
      
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Showing Our Products
            </h3>
           
          </div>
          <div class="card">
            <div class="card-body">
             
              <div class="row">
                <div class="col-lg-6">
                    <img src="../Admin/uploads/<?= $row['image'] ?>" alt="" style="width:90%">
                </div>
                <div class="col-lg-6">
                    <h1><?= $row['title'] ?></h1>
                    <p><?= $row['description'] ?></p>
                    <p>Rs. <?= $row['price'] ?></p>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      
    
	<?php 

@include_once ("./components/footer.php");


  
}
  ?>








