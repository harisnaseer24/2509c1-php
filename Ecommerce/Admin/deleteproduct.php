	<?php 
if (!isset($_GET['id'])) {
header("Location: ./products.php");
} else {

@require_once ("../Config/connection.php");

$pid =$_GET['id'];

// $delete_product ="DELETE FROM `products`  WHERE product_id=$pid;";
$delete_product ="UPDATE `products` SET status=0  WHERE product_id=$pid;";

$result= mysqli_query($conn,$delete_product);
if ($result) {
   
echo "<script>alert('Product Deleted Successfully...')

    window.location.href='./products.php'
</script>";

} else {
   echo "<script>alert('Failed to Delete the product right now...')

    window.location.href='./products.php'
</script>";
}
}
  ?>








