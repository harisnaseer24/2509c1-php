<?php 
if(isset($_GET['id'])){

 @require_once "./config/connection.php";
$id= $_GET['id'];
$deleteQuery="DELETE FROM `mobiles` WHERE `id`=$id";
$result= mysqli_query($conn, $deleteQuery);
if($result){
echo "<script>alert('Product deleted succesffully..🎉')
window.location.href='./index.php';
</script>";
}else{
    echo "<script>alert('Failed to delete this product right now...!')
    window.location.href='./index.php';
    </script>";
}
}else{
 echo "<script>alert('Id not found...!')
 window.location.href='./index.php';
 </script>";
}
?>