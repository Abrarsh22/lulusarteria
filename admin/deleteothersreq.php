<?php
include "../connection.php";

 $delname=$_GET['names'];
  $delq="DELETE FROM `otheruserrequests` where id='$delname'";
  $delres=mysqli_query($con,$delq);

  if($delres){
    echo "<script type=\"text/javascript\">".
        "alert('Request Deleted');window.location.href='userrequests.php'".
        "</script>";
    }
  else{
  	echo "<script type=\"text/javascript\">".
        "alert('Sorry');window.location.href='userrequests.php'".
        "</script>";
}

?>