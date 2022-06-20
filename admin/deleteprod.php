<?php
include "../connection.php";

 $delname=$_GET['delname'];
  $delq="DELETE FROM products where product_name='$delname'";
  $delres=mysqli_query($con,$delq);

  if($delres){
    echo "<script type=\"text/javascript\">".
        "alert('Product Deleted');window.location.href='products.php'".
        "</script>";
    }
  else{
  	echo "<script type=\"text/javascript\">".
        "alert('Sorry');window.location.href='products.php'".
        "</script>";
}

?>