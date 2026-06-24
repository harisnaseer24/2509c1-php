<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../Admin/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="../Admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../Admin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../Admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../Admin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="../Admin/images/logo.svg" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-user text-primary"></i>
                      </span>
                    </div>
                    <input type="text" name="username" required class="form-control form-control-lg border-left-0" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="far fa-envelope-open text-primary"></i>
                      </span>
                    </div>
                    <input type="email" name="email" required class="form-control form-control-lg border-left-0" placeholder="Email">
                  </div>
                </div>
                
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="fa fa-lock text-primary"></i>
                      </span>
                    </div>
                    <input type="password" required name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">                        
                  </div>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" required class="form-check-input">
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <input type="submit" name="signup" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  value="Sign up">
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../Admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="../Admin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../Admin/js/off-canvas.js"></script>
  <script src="../Admin/js/hoverable-collapse.js"></script>
  <script src="../Admin/js/misc.js"></script>
  <script src="../Admin/js/settings.js"></script>
  <script src="../Admin/js/todolist.js"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/samples/register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:08:54 GMT -->
</html>


<?php 

if(isset($_POST['signup'])){
@require_once ("../Config/connection.php");
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashpassword= password_hash($password, PASSWORD_BCRYPT);

// //Checking user is registered or not
$checkUser="SELECT * from USERS WHERE email = '$email'";
$checkUserResult=mysqli_query($conn, $checkUser);
if( mysqli_num_rows($checkUserResult)  > 0){

echo "<script>alert('User Already Registered. 
Please login..')
    window.location.href='./login.php'
</script>";

}else{

$addUser= "INSERT INTO `users`( `username`, `email`, `password`) VALUES ('$username','$email','$hashpassword')";
$addUserResult=mysqli_query($conn, $addUser);

if ($addUserResult) {
   
echo "<script>alert('User Registered Successfully...')

    window.location.href='./login.php'
</script>";

} else {
   echo "<script>alert('Failed to register the user right now...')
</script>";
}
}
}


?>