<?php
include 'config.php';
echo $id=$_GET["id"];
$delete="DELETE FROM products WHERE ID=$id";
mysqli_query($con,$delete);
header('location:index.php');
?>