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

		function success(){
			var name=document.getElementById('name').value;
			var password=document.getElementById('password').value;
			if(name=="abrar" && password=="abrar"){
		window.location.href= "main.php";
	}else{
		alert("Admin Not Registered");
	}

			}
	</script>
    </head>
<body>
	<nav class="row navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow">
  <h6 class=" col-md-2 mr-0" id="head" >LulusArteria</h6>
  <div class="admin">
  <p class="form-control-dark form-control col-md-8">Admin Dashboard</p>
</div>
 
</nav>
<br>
	<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-4">
			<h4><b>Admin Login</b></h4>
			<p class="message"></p>
			<form id="admin-login-form" method="POST" >
			  <div class="form-group">
			    <label for="email">UserName :</label>
			    <input type="name" class="form-control" name="name" id="name"  placeholder="Enter Username" required>
			    <small id="emailHelp" class="form-text text-muted">Enter your registered username</small>
			  </div>
			  <div class="form-group">
			    <label for="password">Password :</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
			  </div>
			  <div class="button">
			  <button type="button" id="login" class="btn login-btn" name="login" onclick="success()"> Login</button>
			</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>
<?php
if(isset($_POST['login'])){
$_SESSION['name']=$_POST['name'];
}
?>