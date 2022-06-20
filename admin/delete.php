<?php
session_start(); 
include "../connection.php";

 $nam=$_GET['names'];
  $delq="DELETE FROM contact where name='$nam'";
  $delres=mysqli_query($con,$delq);
  if($delres){
    echo "<script type=\"text/javascript\">".
        "alert('Query Deleted');window.location.href='contact.php'".
        "</script>";
  }else{
      echo "<script type=\"text/javascript\">".
        "alert('Something Went Wrong');window.location.href='contact.php'".
        "</script>";
}


?>
