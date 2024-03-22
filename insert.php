<?php
// include 'config.php';
if(isset($_POST["upload"])){
$name=$_POST["name"];
$price=$_POST["price"];
$image=$_FILES["image"];
// print_r($image);
$image_tmp=$_FILES["image"]["tmp_name"];
$image_name=$_FILES["image"]["name"];
$image_destination="uploadimage/".$image_name;
move_uploaded_file($image_tmp,"uploadimage/".$image_name);

try{
    mysqli_query($con,"INSERT INTO products(name,price,image) VALUES('$name','$price','$image_destination')");

}
catch(mysqli_sql_exception){
echo "<span onclick='this.remove()' style='cursor:pointer;text-align:center;'>do not enter repeated product details</span>";
}

}


?>