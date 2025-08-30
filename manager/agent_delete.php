<?php
include "db.php";
$id=$_GET['Aid'];

$query="DELETE from registration where id='$id'";
$result=mysqli_query($con, $query);
header("refresh:0;url=agent.php?Aremove=Agent removed successfully");

?>