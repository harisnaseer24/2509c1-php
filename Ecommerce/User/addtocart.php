
<?php 
session_start();
if(!isset($_SESSION["role"])    ||  $_SESSION["role"] != "user"){
header("Location: ./login.php");
}

if(isset($_POST['addtocart'])){
@require_once ("../Config/connection.php");

$product_id= $_POST['product_id'];
$price= $_POST['price'];
$qty= $_POST['qty']; //2
$user_id= $_SESSION['user_id'];
$total= $price * $qty;

$checkDuplicate= "SELECT * from cart where product_id=$product_id and user_id= $user_id";
$checkDuplicateResult= mysqli_query($conn, $checkDuplicate);

if (mysqli_num_rows($checkDuplicateResult) > 0) {
    # code...
 $row = mysqli_fetch_assoc($checkDuplicateResult);
$cart_id= $row["cart_id"];//5
$oldQty= $row["qty"];//5
$finalQty= $oldQty + $qty; //7
$total = $price * $finalQty; //price * 7

$updateCartQuery ="Update `cart` set `qty`= $finalQty, `total`=$total where cart_id=$cart_id";
$result = mysqli_query($conn,$updateCartQuery);

if($result){
    echo "<script>alert('Product Added to Cart Successfully')</script>";
    echo "<script>window.location.href='./cart.php'</script>";

}else{
     echo "<script>alert('Failed to add product in cart right now..!')</script>";
}
}
 else {
   
$addToCartQuery ="INSERT INTO `cart`( `product_id`, `user_id`, `qty`, `price`, `total`) VALUES ($product_id,$user_id,$qty,$price,$total)";
$result = mysqli_query($conn,$addToCartQuery);

if($result){
    echo "<script>alert('Product Added to Cart Successfully')</script>";
    echo "<script>window.location.href='./cart.php'</script>";

}else{
     echo "<script>alert('Failed to add product in cart right now..!')</script>";
}
}






}



?>