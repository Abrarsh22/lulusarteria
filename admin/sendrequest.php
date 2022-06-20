<?php
//include("../connection.php");
$con=mysqli_connect("localhost","root","","users");

if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $social=$_POST['social'];
        $address=$_POST['address'];
        $query=$_POST['query'];
        $pid=$_POST['pid'];
        $pname=$_POST['pname'];
        $pimage=$_POST['pimage'];
        $targetDir="uploadsss/";
        $image =$_FILES['files']['name'];
        $fileName=implode(",",$image);
        if(!empty($image)){
          foreach($image as $key =>$val){
            $targetfilepath=$targetDir . $val;
          move_uploaded_file($_FILES['files']['tmp_name'][$key],$targetfilepath);
        }
        $sql="INSERT INTO `userrequests`(`name`,`phone`,`socialid`,`address`,`query`,`images`,`pid`, `pname`,`pimage`)
        VALUES ('$name',$phone,'$social','$address','$query','$fileName',$pid,'$pname','$pimage')";
        $res=mysqli_query($con,$sql);
      }
            if($res){
   echo "<script type=\"text/javascript\">".
        "alert('Hurray Done!!!!!!!!');;window.location.href='../pay.php'".
        "</script>";
}
    else{
   echo "<script type=\"text/javascript\">".
        "alert('try again');".
        "</script>";

      }
    }
    if(isset($_POST['submits'])){
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $social=$_POST['social'];
        $address=$_POST['address'];
        $message=$_POST['message'];
        $query=$_POST['query'];
        $yname=$_POST['yname'];
        $yphone=$_POST['yphone'];
        $pids=$_POST['pids'];
        $pnames=$_POST['pnames'];
        $pimages=$_POST['pimages'];
        $targetDir="uploadsss/";
        $image =$_FILES['files']['name'];
        $fileName=implode(",",$image);
        if(!empty($image)){
          foreach($image as $key =>$val){
            $targetfilepath=$targetDir . $val;
          move_uploaded_file($_FILES['files']['tmp_name'][$key],$targetfilepath);
        }
        $sql="INSERT INTO `otheruserrequests`(`hname`, `hphone`, `social`, `address`, `message`, `query`, `yname`, `yphone`, `images`,`pid`,`pname`,`pimage`)VALUES ('$name',$phone,'$social','$address','$message','$query','$yname','$yphone','$fileName',$pids,'$pnames','$pimages')";
        $res=mysqli_query($con,$sql);
      }

            if($res){
   echo "<script type=\"text/javascript\">".
        "alert('Hurrrayyyy Done!!!!!!!!');".
        "</script>";
}
    else{
   echo "<script type=\"text/javascript\">".
        "alert('try again');".
        "</script>";

      }
    }
    ?>