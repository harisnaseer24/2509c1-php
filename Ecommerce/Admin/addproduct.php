	<?php 

@include_once ("./components/header.php");
@require_once ("../Config/connection.php");

$get_cat ="SELECT * FROM `categories` WHERE 1";
$result_cat = mysqli_query($conn,$get_cat);

?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Add Product
            </h3>
          </div>
         <div class="row">
              <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  <p class="card-description">
                    Basic form elements
                  </p>
                  <form class="forms-sample" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" class="form-control" name="price" id="price" placeholder="Price">
                    </div>
                      <div class="form-group">
                      <label for="price">Stock</label>
                      <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock">
                    </div>
               
                    <div class="form-group">
                      <label for="cat_id">Categories</label>
                        <select class="form-control" name="cat_id"id="cat_id">
<option value="" selected disabled>Choose product category</option>
<?php

// dynamic category dropdown
while($row = mysqli_fetch_assoc($result_cat)){
$cat_id = $row['cat_id'];
$cat_name = $row['cat_name'];
echo "   <option value='$cat_id'>$cat_name</option>";

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
                      <textarea class="form-control" name="description" id="description" rows="4"></textarea>
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
    
	<?php 

@include_once ("./components/scripts.php");

?>
     <!-- Custom js for this page-->
  <script src="./js/file-upload.js"></script>
  <script src="./js/typeahead.js"></script>
  <script src="./js/select2.js"></script>
  <!-- End custom js for this page-->

  <?php 

  if(isset($_POST['add'])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $cat_id = $_POST['cat_id'];
    $stock = $_POST['stock'];

if($_FILES['img']['error'] == 4){
  echo "<script>alert('Please select an image for the product..😢')</script>";
}
else if($_FILES['img']['size'] > 2000000){
  echo "<script>alert('File is too large. Please select file under 2MB..😢')</script>";
}
else{
//extension
$allowed_ext = ['jpg','jpeg','png', 'webp', 'jfif', 'gif'];
$file_name = $_FILES['img']['name'];
// my.banner.png
$extension= explode(".", $file_name); // ["my","banner","png"]
$extension= end($extension); //png
           // .xls
if( !in_array($extension,$allowed_ext)){
  echo "<script>alert('Invalid File type..❗')</script>";
  }
else{

$newImageName = uniqid().".".$extension; // hsdfh348754974345.png
 $insert_product="INSERT INTO `products`( `title`, `description`, `price`, `stock`, `image`, `cat_id`) VALUES ('$title','$description','$price','$stock','$newImageName','$cat_id')";

$result_product = mysqli_query($conn,$insert_product);
if($result_product){

move_uploaded_file($_FILES['img']['tmp_name'], "./uploads/".$newImageName);
  echo "<script>alert('Product added successfully...😍')</script>";
  }else{
    echo "<script>alert('Failed to  add product right now..😢')</script>";

  }
}
  }
  }
  
  ?>