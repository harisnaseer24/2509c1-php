<!doctype html>
<html lang="en" data-bs-theme="light">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS v5.3.8 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>

<div class="container">
    <form action="result.php" method="post" >
    <h1 class="text-center text-primary">Login Now...!</h1>    
    <div class="mb-3">

            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" name="login" class="btn btn-primary">Login</button>
    </form>
</div>




        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Bundle (includes Popper) -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
            crossorigin="anonymous"
        ></script>
    </body>
</html>



<?php 


//Super global variables(associative arrays key value pair)


//$_GET
//$_POST
//$_REQUEST

//$_SESSION
//$_COOKIE
//$_FILES
//$_ENV


// if(isset($_REQUEST['login']) == true){

// if ($_REQUEST['email'] == "" || $_REQUEST['password']=="") {
  
//     echo"<script>alert('Please fill all fields...!')</script>";
// } else {
//    $email = $_REQUEST['email'];
//    $password = $_REQUEST['password'];


//     echo"<script>alert('Login Successfully...! email:$email and password:$password')</script>";
// }



// }





?>