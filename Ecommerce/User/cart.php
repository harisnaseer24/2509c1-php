	<?php 
session_start();
if(!isset($_SESSION["role"])    ||  $_SESSION["role"] != "user"){
header("Location: ./login.php");
}

@include_once ("./components/header.php");
@require_once ("../Config/connection.php");

$user_id =$_SESSION['user_id'];

$get_cartItems="SELECT * FROM `cart` as c 
INNER JOIN `products` as p
ON c.product_id = p.product_id
WHERE c.user_id =$user_id";

$result_cart = mysqli_query($conn,$get_cartItems);

?>
      <!-- partial -->
      
        <div class="content-wrapper container">
          <div class="page-header">
            <h3 class="page-title">
              Showing Our Products
            </h3>
           
          </div>
          <div class="card">
            <div class="card-body">
             
              <div class="row ">

<!-- 12 -->
<div class="col-lg-8">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title </th>
      <th scope="col">Image </th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
<?php 
while($row=mysqli_fetch_assoc($result_cart)){
?>
    <tr>
      <th scope="row"><?= $row["cart_id"] ?></th>
      <td><?= $row["title"] ?></td>
    <td>  <img src="../Admin/uploads/<?= $row["image"] ?>" alt="" height="60"></td>
      <td><?= $row["qty"] ?></td>
      <td><?= $row["price"] ?></td>
      <td><?= $row["total"] ?></td>
    </tr>
   

    <?php 
}

?>
  </tbody>
</table>
</div>
<div class="col-lg-4">
    <h1>Total</h1>
</div>







<!-- 
                <div class="col-lg-6">
                    <img src="../Admin/uploads/<?= $row['image'] ?>" alt="" style="width:90%">
                </div>
                <div class="col-lg-6">
                    <h1><?= $row['title'] ?></h1>
                        <h2>Rs. <?= $row['price'] ?></h2>
                    <p><?= $row['description'] ?></p>
                 
                




                </div> -->
                
              </div>
            </div>
          </div>
        </div>
      
    
	<?php 

@include_once ("./components/footer.php");


  

  ?>








