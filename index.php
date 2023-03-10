<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font aweson -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>CRUD Operation</title>
  </head>
  <body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5"style="background-color:#00ff5573;">
PHP Complete CRUD Application</nav>

<div class="container">
  <?php if (isset($_GET['msg'])) {
      $msg = $_GET['msg'];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
   ' .
          $msg .
          '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  } ?>

    <a href="add.php" class="btn btn-dark mb-3">Add New</a>

<table class="table table-striped text-center">
 
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
       <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
  include 'connect.php';
  $sql = 'SELECT *FROM `userdata`';
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
      <td><?php echo $row['id']; ?></td>
     <td><?php echo $row['firstname']; ?></td>
     <td><?php echo $row['lastname']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['gender']; ?></td>
      <td>
        <a href="edit.php?id=<?php echo $row[
            'id'
        ]; ?>" class="link-dark"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
        <a href="delete.php?id=<?php echo $row[
            'id'
        ]; ?>" class="link-dark"><i class="fa fa-trash" aria-hidden="true"></i></a>
      </td>
    </tr>
     <?php }
  ?>
    
  </tbody>
</table>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>