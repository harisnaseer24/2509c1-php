 <?php 
@include_once "./components/header.php";
@require_once "./config/connection.php";
if(isset($_GET['id'])){
$id= $_GET['id'];
$getQuery="SELECT * FROM `mobiles` WHERE `id`=$id";
$result= mysqli_query($conn, $getQuery);
$row= mysqli_fetch_assoc($result);
?>
 <div class="container my-4">
    <h1 class="text-center">Edit Mobile Details</h1>
<form action="" method="post" class="form-group">
<input type="text" name="model" id="" required class="form-control my-2" placeholder="Enter mobile model" value="<?= $row["model"]; ?>">
<input type="number" name="price" id="" min="0" required class="form-control my-2" placeholder="Enter Mobile price in PKR" value="<?php echo $row["price"]; ?>">
<input type="text" name="brand" id="" required class="form-control my-2" placeholder="Enter Mobile brand"value="<?php echo $row["brand"]; ?>">
<input type="number" name="stock" min="0" id=""required  class="form-control my-2" placeholder="Enter Mobile stock" value="<?php echo $row["stock"]; ?>">
<select  name="ptaStatus" id="" required class="form-control my-2">
    <option value="" selected disabled>Select PTA Status</option>
    <option value="approved">Approved</option>
    <option value="non-approved">Not Approved</option>
    </select>
<input type="submit" name="Save" id="" class="form-control btn btn-primary my-2">
</form>
</div>

<?php
if(isset($_POST["Save"])){
    $model = $_POST["model"];
    $brand = $_POST["brand"]; 
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $ptaStatus = $_POST["ptaStatus"];

    if( !empty($model) && !empty($brand) && !empty($price) && !empty($stock) && !empty($ptaStatus) ) {
    $updateQuery = " UPDATE `mobiles` set `model`='$model',  `price`=$price, `brand`='$brand', `stock`=$stock, `ptaStatus`='$ptaStatus' WHERE `id`=$id";

    $result =mysqli_query($conn, $updateQuery);
    if ($result) {
        echo "<script>alert('Product updated succesffully..🎉')
        window.location.href='./index.php';
        
        </script>";
        } else {
        echo "<script>alert('Failed to update product right now..🤡');
        
        window.location.href='./index.php';
        </script>";  
    }
    }else{
        echo "<script>alert('All fields are required')</script>";
    }
    }

}else{
 echo "<script>alert('Id not found...!')
 window.location.href='./index.php';
 </script>";
}

?>
   
  
    <?php 
@include_once "./components/footer.php";

?>