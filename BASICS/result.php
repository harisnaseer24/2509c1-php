
<?php 

if(isset($_REQUEST['login']) == true){
if ($_REQUEST['email'] == "" || $_REQUEST['password']=="") {
  
    echo"<script>alert('Please fill all fields...!')</script>";
} else {
   $email = $_REQUEST['email'];
   $password = $_REQUEST['password'];
    echo"<script>alert('Login Successfully...! email:$email and password:$password')</script>";
}

}


?>