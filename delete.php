<?php
include "db.php";
$id=$_GET['id'];

$query="DELETE from feedback where id='$id'";
$result=mysqli_query($con, $query);
header("refresh:0;url=feedback.php?delete=Comment deleted successfully");

?>