<?php
include 'config.php';
include 'insert.php';
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
  <h1 class="text-center">crud operations</h1>
  <h3 class="text-center mt-3">create products</h3>
<div class="mb-3">
    <label>
<strong>username:</strong>
</label>
<input type="text" name="name" placeholder="enter your name" class="form-control w-50">
</div>
<div class="mb-3">
    <label>
<strong>price:</strong>
</label>
<input type="text" name="price" placeholder="enter the price" class="form-control w-50">
</div>
<div class="mb-3">
    <label>
<strong>image:</strong>
</label>
<input type="file" name="image" class="form-control w-50">
</div>
<input type="submit" name="upload" value="upload" class="btn btn-primary w-50">
        </form>
    </center>
<!-- fetch data -->
<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">image</th>
      <th scope="col">delete</th>
      <th scope="col">update</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $fetch_pic=mysqli_query($con,"SELECT * FROM products");
    if(mysqli_num_rows($fetch_pic)>0){
        while($row=mysqli_fetch_assoc($fetch_pic)){
            echo "
            <tr>
<td>$row[id]</td>            
<td>$row[name]</td>            
<td>$row[price]</td>            
<td><img src='$row[image]' alt='$row[image]' title='$row[image]'width='50 height='50'></td>            
<td><a href='delete.php?id=$row[id]'class='btn btn-danger' onclick='return confirm(\"are you sure you want to delete it?\")'>delete</a></td>
<td><a href='update.php?id=$row[id]'class='btn btn-success'>update</a></td>
            </tr>
            ";
        }

    }
    ?>
    
  </tbody>
</table>

</body>
</html>