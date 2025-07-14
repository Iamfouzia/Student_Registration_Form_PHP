<?php
include ('connect.php');

$id = $_GET['id'];
 $sql = "DELETE FROM FORM WHERE id= '$id' ";
$data = mysqli_query($conn,$sql);

if ($data)
{
   echo "<script>alert('Record Dleted!')</script>"; 
   ?>

   <meta http-equiv = "refresh" content = "0; url = http://localhost/php_crud/display.php" />
   <?php
}
else{
    echo "<script>alert('Failed To Dleted!')</script>";
}
?>