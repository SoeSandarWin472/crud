<?php

include 'connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM `userdata` WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header('Location: index.php?msg=Record Delete Successfully');
} else {
    echo 'Failed:' . mysqli_connect_error($conn);
}

?>
