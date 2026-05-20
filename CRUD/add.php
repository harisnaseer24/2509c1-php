
   <?php 
@include_once "./components/header.php";
@require_once "./config/connection.php";

?>
   
   <div class="container my-4">
    <h1 class="text-center">Enter Mobile Details</h1>
<form action="" method="post" class="form-group">

<input type="text" name="model" id="" required class="form-control my-2" placeholder="Enter mobile model">
<input type="number" name="price" id="" min="0" required class="form-control my-2" placeholder="Enter Mobile price in PKR">
<input type="text" name="brand" id="" required class="form-control my-2" placeholder="Enter Mobile brand">
<input type="number" name="stock" min="0" id=""required  class="form-control my-2" placeholder="Enter Mobile stock">
<select  name="ptaStatus" id="" required class="form-control my-2">
    <option value="" selected disabled>Select PTA Status</option>
    <option value="approved">Approved</option>
    <option value="non-approved">Not Approved</option>
    </select>
<input type="submit" name="Add" id="" class="form-control btn btn-primary my-2">
</form>
</div>

    <?php 
@include_once "./components/footer.php";
if(isset($_POST["Add"])){
    $model = $_POST["model"];
    $brand = $_POST["brand"]; 
    $price = $_POST["price"];
    $stock = $_POST["stock"];
    $ptaStatus = $_POST["ptaStatus"];

    if( !empty($model) && !empty($brand) && !empty($price) && !empty($stock) && !empty($ptaStatus) ) {
    $insertQuery = "INSERT INTO `mobiles`( `model`, `price`, `brand`, `stock`, `ptaStatus`) VALUES ('$model','$price','$brand','$stock','$ptaStatus')";

    $result =mysqli_query($conn, $insertQuery);
    if ($result) {
        echo "<script>alert('Product added succesffully..🎉')
        window.location.href='./index.php';
        
        </script>";
        } else {
        echo "<script>alert('Failed to add product right now..🤡');
        
        window.location.href='./index.php';
        </script>";
       
    }

    }else{
        echo "<script>alert('All fields are required')</script>";
    }
    
    }
?>