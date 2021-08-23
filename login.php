<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin | Employee's Payroll Management System</title>
 	

<?php 
include('header.php');
include('db_connect.php');
//session_start();
/*if(isset($_SESSION['login_name']))
header("location:index.php");*/

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$user=mysqli_real_escape_string($conn,$_POST['username']);
	$passw=mysqli_real_escape_string($conn,$_POST['password']);

	$sql="SELECT id FROM users WHERE username='$user' AND password='$passw'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	$count = mysqli_num_rows($result);

	if($count ==1){
		//session_register("login_name");
		$_SESSION['login_name']=$user;
		header("location: index.php");
	}else{
		$error = "Your login name and password is invalid!";
	}
}
?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    background: #393a3a;
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background-color:#393a3a;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left: 0;
		width:60%;
		height: calc(100%);
		display: flex;
		align-items: center;
	    background-repeat: no-repeat;
	    background-size: cover;
	}
	#login-right .card{
		margin: auto;
		z-index: 1;

	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: 0.5em 0.7em;
    border-radius: 10% 10%;
    color: #000000b3;
    z-index: 10;
	background: url(assets/img/R.jpg);
	background-repeat: no-repeat;
	background-image:cover;
}
div#login-right::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: calc(100%);
    height: calc(100%);
    background: #9fa3a7e0;
}
h2{
	text-align:center;
}
</style>

<body>


  <main id="main" class=" bg-dark">
  		<div id="login-left" class="logo">
		  
  		</div>
  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body"><h2>Login</h2>
  					<form id="login-form" method="POST" action="">
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</body>	
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>