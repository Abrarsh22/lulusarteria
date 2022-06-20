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
  <h6 class=" col-md-2 mr-0" id="head" >LulusArteria</h6>
  <div class="admin">
  <p class="form-control-dark form-control col-md-8">Admin Dashboard</p>
</div>
 <ul class="navbar-nav px-3 col-md-2">
    <li class="nav-item text-nowrap">
    	<a id="reg" >Welcome,'abrar'</a>
      
    </li>
  </ul>
</nav>
<div class="row">
			<div class="col-md-2">
		<nav class=" navbar navbar-dark bg-success">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="border: 1px solid #ffffff">
    <span class="navbar-toggler-icon" ></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
    	<li class="nav-item">
        <a class="nav-link" href="main.php"><strong>Home</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php">Products</a>
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
<div class="col-md-7" style="display: flex;justify-content: flex-start;">
	<h2><u>Welcome To Your DashBoard</u></h2>
	</div>
</div>
</body>
</html>