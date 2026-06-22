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


$getCategoriesQuery = "SELECT * FROM `categories`";
$getCategoryResult = mysqli_query($conn,$getCategoriesQuery);

 ?>
     <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Edit Product
            </h3>
          </div>
         <div class="row">

 <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="title">Product Title</label>
                      <input type="text" name="title" required class="form-control" id="exampleInputName1" placeholder="Title" value="<?= $row['title'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" required  name="price" class="form-control" id="price" placeholder="Price in PKR"  value="<?= $row['price'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="stock">Stock</label>
                      <input type="number" required  name="stock" class="form-control" id="stock" placeholder="Stock"  value="<?= $row['stock'] ?>">
                    </div>
                  
                   
                  
                    <div class="form-group">
                      <label for="cat_id">Categories</label>
                        <select class="form-control" id="cat_id" name="cat_id">
<option value='' selected disabled>Choose a category</option>
<?php
while($rowCat =mysqli_fetch_assoc($getCategoryResult)){
  $cat_id = $rowCat['cat_id'];
  $cat_name = $rowCat['cat_name'];
echo "<option value='$cat_id'>$cat_name</option>";

}
?>
 
                         
                          
                        </select>
                      </div>
                    <div class="form-group">
                      <label>File upload</label>
                   
                      <input type="file" name="img" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea class="form-control" name="description" id="description" rows="4" > <?= $row["description"] ?>"</textarea>  </textarea>
                    </div>
                    <button type="submit" name="add" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>







         </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="far fa-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <script src="./vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="./js/off-canvas.js"></script>
  <script src="./js/hoverable-collapse.js"></script>
  <script src="./js/misc.js"></script>
  <script src="./js/settings.js"></script>
  <script src="./js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="./js/file-upload.js"></script>
  <script src="./js/typeahead.js"></script>
  <script src="./js/select2.js"></script>
  <!-- End custom js for this page-->
</body>


</html>
<?php 

if(isset($_POST['add'])){

$title = $_POST['title'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$description = $_POST['description'];
$cat_id = $_POST['cat_id'];
// file handling
if($_FILES['img']['error']==4){
  echo "<script>alert('No Image Uploaded');</script>";
}else if($_FILES['img']['size'] > 2000000){
  echo "<script>alert('Files size must be under 2MBs');</script>";
}else{
$imgname=$_FILES['img']['name'];
$tmpname=$_FILES['img']['tmp_name'];

$validExtensions=["png","jpg","jpeg","gif","webp","jfif"];
// abc.jpg
// harisnaseer= ["haris","naseer"]
// abc.kavish.latest.png
$extension= explode(".",$imgname);// ["kaavish", "PNG"]
// print_r($extension);
$extension= strtolower(end($extension));//png
if(!in_array($extension, $validExtensions)){
  echo "<script>alert('Invalid File Type');</script>";
}
$newimgname=uniqid().".".$extension;//4545gh45rt454242.jpg
// $newimgname=$imgname;//kavish.png
$insertQuery = "UPDATE `products`  set `title` = '$title', `description`='$description', `price`=$price, `stock`=$stock, `image`='$newimgname', `cat_id`=$cat_id  WHERE product_id = $pid";

$result= mysqli_query($conn,$insertQuery);
if($result){

move_uploaded_file($tmpname,"./uploads/".$newimgname);
  echo "<script>alert('Product Updated Successfully');</script>";
}else{
    echo "<script>alert('Error Updated Product');</script>";
}

}

}





}
?>