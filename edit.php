<?php
include 'connect.php';

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `userdata` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: index.php?msg=Data Update successfully');
    } else {
        echo 'connection failed:' . mysqli_connect_error($conn);
    }
}
?>

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
    <div class="text-center mb-4">
        <h3>Edit User</h3>
    </div>

    <?php
    $sql = "SELECT * FROM `userdata` WHERE id=$id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="container d-flex justify-content-center">
        <div class="card mt-5 p-4">
        <form action="" method="post" style="width:50vw;min-width:300px;">
    <div class="row mb-3">
        <div class="col">
            <label for="form-label">First Name:</label>
            <input type="text" class="form-control" name="firstname" placeholder="Enter your firstname" value="<?php echo $row[
                'firstname'
            ]; ?>">
        </div>

        <div class="col ">
            <label for="form-label">last Name:</label>
            <input type="text" class="form-control" name="lastname" placeholder="Enter your lastname" value="<?php echo $row[
                'lastname'
            ]; ?>">
        </div>
</div>
         <div class="row mb-3">
        <div class="col">
            <label for="form-label">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" value="<?php echo $row[
                'email'
            ]; ?>">
        </div>
</div>

<div class="form-group mb-3">
    <label for="">Gender:</label> &nbsp;
<input type="radio" class="form-check-label" name="gender" id="male" value="male" <?php echo $row[
    'gender'
] == 'male'
    ? 'checked'
    : ''; ?>>
<label for="male" class="form-input-label">Male</label> &nbsp; 
<input type="radio" class="form-check-label" name="gender" id="female" value="female" <?php echo $row[
    'gender'
] == 'female'
    ? 'checked'
    : ''; ?>>
<label for="female" class="form-input-label">Female</label>
</div>

<div>
    <button type="submit" class="btn btn-success" name="submit">Update</button>
    <a href="index.php" class="btn btn-danger">Cancle</a>
</div>
</form>
    </div>
</div>
</div>

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>