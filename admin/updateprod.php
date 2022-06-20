<?php
  session_start();
  include("../connection.php");

$upname = $_GET['upname'];
  $selquery="SELECT * FROM products where product_name='$upname'";

    if(isset($_POST['submit'])){
      $product_name=$_POST['name'];
      $product_price=$_POST['price'];
      $category_image=$_FILES['image'];
      $type=$_POST['type'];
      $product_desc=$_POST['pdesc'];
      $filename=$category_image['name'];
      $filepath=$category_image['tmp_name'];
      $fileerror=$category_image['error'];

    $destifile='uploads/'.$filename;
    move_uploaded_file($filepath, $destifile);
    $targetDir="uploadss/";
    $image =$_FILES['files']['name'];
    $fileName=implode(",",$image);
    if(!empty($image)){
      foreach($image as $key =>$val){
        $targetfilepath=$targetDir . $val;
      move_uploaded_file($_FILES['files']['tmp_name'][$key],$targetfilepath);
    }
      $updquery="UPDATE `products` SET product_name='$product_name',product_price='$product_price',product_img='$destifile',product_images='$fileName',product_desc='$product_desc',product_type='$type' where product_name='$upname';";
      $updateres=mysqli_query($con,$updquery);
  }
       if($updateres){
       echo "<script type=\"text/javascript\">".
          "alert('Hurray');window.location.href='products.php'".
          "</script>";
  }
else{
 echo "<script type=\"text/javascript\">".
        "alert('Something Went Wrong');window.location.href='login1.php'".
        "</script>"; 
} 
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>
    Admin Dashboard
  </title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Adamina' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Alata' rel='stylesheet'>
  <link href="dashboardstyle.css" rel="stylesheet" />
  <script type="text/javascript">
  </script>
    </head>
<body>
  <nav class="row navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow">
  <h6 class=" col-md-2 mr-0">LulusArteria</h6>
  <div class="admin">
  <p class="form-control-dark form-control col-md-8">Admin Dashboard</p>
</div>
 <ul class="navbar-nav px-3 col-md-2">
    <li class="nav-item text-nowrap">
      <a id="reg">Welcome,abrar</a>
      
    </li>
  </ul>
</nav>
<div class="row">
      <div class="col-md-2">
    <nav class=" navbar navbar-dark bg-warning">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="border: 1px solid #ffffff">
    <span class="navbar-toggler-icon" ></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="main.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php"><strong>Products</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userrequest">Userrequests</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Queries</a>
      </li>    
    </ul>
  </div>
</nav>
</div>
<div class="col-md-10" style="">
  <h2><u>Update Products</u></h2>
<?php
  $result = mysqli_query($con,$selquery); 
    while ($row = mysqli_fetch_assoc($result)){
      $images=$row['product_images'];
      $images=explode(',',$images);
      ?>
  
        <form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="pname">Enter Product Name:</label>
    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['product_name']?>" required>
  </div>
  <div class="form-group">
    <label for="pprice">Enter Product Price:</label>
    <input type="number" class="form-control" id="price" name="price" value="<?php echo $row['product_price']?>" required>
  </div>
  <div class="form-group">
    <label for="pname">Enter Product Image:</label>
    <input type="file" class="form-control" id="image" name="image" required value="hello"/>
    <img src="<?php echo $row['product_img']?>" style="width:20%"></img>
  </div>
  <div class="form-group">
    <label for="pname">Product Video:</label>
    <input type="file" class="form-control" id="video" name="video" accept="video/mp4" multiple required>
    <video src="<?php echo $row['product_video']?>" style="width:20%" controls></video>
  </div>
  <div class="form-group">
    <input type="file" class="form-control" id="file-input" name="files[]" accept="image/png, image/jpeg" required onchange="preview()" multiple>
    <label for="file-input" id="label">
    <i class="fas fa-upload"></i> &nbsp; Choose A Photo
    </label>
    <p id="num-of-files">No Files Chosen*</p>
    <div id="images"><?php foreach($images as $image){ echo '<img src="uploadss/'.$image.'">'; }?></div>
    </div>
  <div class="form-group">
    <label for="pname">Enter Product Description:</label>
    <input type="text" class="form-control" id="pdesc" name="pdesc" value="<?php echo $row['product_desc']?>"></input>
  </div>
  <div class="form-group">
      <label for="name">Enter Product Type:</label>
      <select class="form-control" id="type" name="type">
      <option value="<?php echo $row['product_type']?>" selected disabled="disabled"><?php echo $row['product_type']?></option>
        <option id="keychains" name="keychains" value="keychains">Keychains</option>
        <option id="scrapbooks" name="scrap books" value="scrap books">Scrap-Books</option>
        <option id="photoframes" name="photo frames" value="photo frames">Photo-Frames</option>
        <option id="giftbox" name="gift box" value="giftbox">Gift-Box</option>
        <option id="custom" name="custom" value="custom">Customized</option>
      </select>
    </div>
  <div class="submit" style="display: flex;justify-content: center;">
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</div>
</form>
<?php
}
?>
<script>
    function preview(){
    let fileInput = document.getElementById("file-input");
let imageContainer = document.getElementById("images");
let numOfFiles = document.getElementById("num-of-files");
    imageContainer.innerHTML = "";
    numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

    for(i of fileInput.files){
        let reader = new FileReader();
        let figure = document.createElement("figure");
        let figCap = document.createElement("figcaption");
        figCap.innerText = i.name;
        figure.appendChild(figCap);
        reader.onload=()=>{
            let img = document.createElement("img");
            img.setAttribute("src",reader.result);
            figure.insertBefore(img,figCap);
        }
        imageContainer.appendChild(figure);
        reader.readAsDataURL(i);
    }
}
</script>
</body>
</html>
