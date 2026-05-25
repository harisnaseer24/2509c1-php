<?php 
@include_once "./components/header.php";
@require_once "./config/connection.php";

?>
        <main>
            <h1 class="h1 text-center">Showing Our Latest Stock</h1>
            <div class="container table-responsive">

                <table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Brand</th>
      <th scope="col">Model</th>
      <th scope="col">Price</th>
      <th scope="col">Stock</th>
      <th scope="col">Pta Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  <?php 
  $getAllMobiles= "SELECT * FROM `mobiles` WHERE 1";
  $result = mysqli_query($conn, $getAllMobiles);

  if ( mysqli_num_rows($result)  > 0) {

  while( $row = mysqli_fetch_assoc($result)){

echo "<tr>
 <td>{$row["id"]}</td>
      <td>{$row["brand"]}</td>
      <td>{$row["model"]}</td>
      <td> Rs. {$row["price"]}</td>
      <td>{$row["stock"]} Units</td>
      <td>{$row["ptaStatus"]}</td>
      <td>
<a href='./delete.php?id={$row["id"]}' class='btn btn-danger btn-sm'>Delete</a>
<a href='./edit.php?id={$row["id"]}' class='btn btn-primary btn-sm'>Edit</a>
</td>
      
      </tr>
      ";
  }
   
  } else {
    echo "<tr>Data not Found</tr>";
    
  }
  
  ?>
  
  </tbody>
</table>

            </div>
        </main>

        <?php 
@include_once "./components/footer.php";

?>