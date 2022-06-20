<?php
	session_start();
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
        <a class="nav-link" href="userrequests.php">Userrequests</a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link" href="otheruserrequests.php">Other Userrequests</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Queries</a>
      </li>   
    </ul>
  </div>
</nav>
</div>
<div class="col-md-10" style="">
  <h2><u>Products List</u></h2>
  <div class="add" style="display:flex;justify-content: center;">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    +ADD CATEGORY
</button></div><br>
<?php
include("../connection.php");
$selectqury="SELECT  * FROM products ";
$squery=mysqli_query($con,$selectqury);
$result=mysqli_fetch_assoc($squery);
if ($squery = mysqli_query($con,$selectqury)) {
while($result=mysqli_fetch_assoc($squery)){
  ?>

  <div class=" card ">

  <div class="card_body ">
    <div class="name">
    <heading class="imgname"><?php echo $result['product_name'] .'-'. $result['product_price'] ?></heading></div>
    <div class="img" id="category_image">
      <img src="<?php echo $result['product_img'];?>"></div>
    </div >


<div class="btn-group">

  <button type="button" class="btn btn-success optbtn"><a href="updateprod.php?upname=<?php echo $result['product_name'];?>">Update</a></button>
  <button type="button" class="btn btn-danger optbtn"><a href="deleteprod.php?delname=<?php echo $result['product_name'];?>">Delete</a></button>
</div>
</div>
<?php }

} 
?>
</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">App Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form action="products.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="pname">Enter Product Name:</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="pprice">Enter Product Price:</label>
    <input type="number" class="form-control" id="price" name="price" required>
  </div>
  <div class="form-group">
    <label for="pname">Enter Product Image:</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  <div class="form-group">
    <label for="pname">Enter Product Video:</label>
    <input type="file" class="form-control" id="video" name="video" accept="video/mp4" multiple>
  </div>
  <div class="form-group">
    <input type="file" class="form-control" id="file-input" name="files[]" accept="image/png, image/jpeg,image/mp4" required onchange="preview()" multiple>
    <label for="file-input" id="label">
    <i class="fas fa-upload"></i> &nbsp; Choose A Photo
    </label>
    <p id="num-of-files">No Files Chosen*</p>
    <div id="images"></div>
    </div>
  <div class="form-group">
    <label for="pname">Enter Product Description:</label>
    <textarea class="form-control" id="pdesc" name="pdesc"></textarea>
  </div>
  <div class="form-group">
      <label for="name">Enter Product Type:</label>
      <select class="form-control" id="type" name="type">
        <option id="keychains" name="keychains" value="keychains">Keychains</option>
        <option id="scrapbooks" name="scrap books" value="scrap books">Scrap-Books</option>
        <option id="photoframes" name="photo frames" value="photo frames">Photo-Frames</option>
        <option id="giftbox" name="gift box" value="giftbox">Gift-Box</option>
        <option id="custom" name="custom" value="custom">Customized</option>
      </select>
    </div>
  <div class="submit" style="display: flex;justify-content: center;">
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</form>

      </div>
      <div class="modal-footer" style="display: flex;justify-content: flex-end;">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php
if(isset($_POST["submit"])){ 
  $name=$_POST['name'];
  $price=$_POST['price'];
  $pdesc=$_POST['pdesc'];
  $img_file=$_FILES['image'];
  $video=$_POST['video'];
  $vname=$_FILES['video']['name'];
  $targetdir="";
  $path=$targetdir.$_FILES['video']['name'];
  move_uploaded_file($_FILES['video']['tmp_name'],$path);
  $type=$_POST['type'];
  //print_r($img_file);
  $filename=array();
  $filename=$img_file['name'];
  $filepath=$img_file['tmp_name'];
  $fileerror=$img_file['error'];


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
    $insquery="INSERT INTO `products`(`product_name`, `product_price`,`product_img`,`product_video`,`product_images`,`product_desc`,`product_type`) VALUES ('$name',$price,'$destifile','$path','$fileName','$pdesc','$type')";
    $query=mysqli_query($con,$insquery);
  }
    if($query){
       echo "<script type=\"text/javascript\">".
        "alert('Done');window.location.href='products.php'".
        "</script>";
    }else{
       echo "<script type=\"text/javascript\">".
        "alert('Something Went Wrong');window.location.href='products.php'".
        "</script>";
    }
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