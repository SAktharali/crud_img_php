<?php
include 'config.php';
$id=$_GET['id'];
$fetch_update=mysqli_query($con,"SELECT * FROM products WHERE ID=$id");
$result=mysqli_fetch_array($fetch_update);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <center>
        <form action="" method="post" enctype="multipart/form-data">
  <h1 class="text-center">Update Table</h1>
<div class="mb-3">
    <label>
<strong>username:</strong>
</label>
<input type="text" name="name" value="<?php echo $result['name']?>"
placeholder="enter your name" class="form-control w-50">
</div>
<div class="mb-3">
    <label>
<strong>price:</strong>
</label>
<input type="text" name="price" value="<?php echo $result['price']?>" placeholder="enter the price" class="form-control w-50">
</div>
<div class="mb-3">
    <label>
<strong>image:</strong>
</label>
<input type="file" name="image" value="<?php echo $result['image']?>" 
class="form-control w-50">

<img src="<?php echo $result['image'] ?>" width="200" height="200"  alt='<?php echo $result["image"]?>'/> 
</div>
<input type="hidden" name="id"  value="<?php echo $result["id"]; ?>">
<!-- <br><br> -->
<input type="submit" name="update" value="update" class="btn btn-primary w-50">
        </form>
    </center>
  </tbody>
</table>
<?php
if(isset($_POST["update"])){
    $id=$_POST["id"];
   $name=$_POST["name"];
   $price=$_POST["price"];
  $image=$_FILES["image"];
// print_r($image);
$image_tmp=$_FILES["image"]["tmp_name"];
$image_name=$_FILES["image"]["name"];
$image_destination="uploadimage/".$image_name;
move_uploaded_file($image_tmp,"uploadimage/".$image_name);

mysqli_query($con,"UPDATE products SET name='$name',price='$price',image='$image_destination' WHERE ID='$id'");
header('location:index.php');
}
?>
</body>
</html>