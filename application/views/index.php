<!DOCTYPE html>
<html>
<head>
	<title>Login/Registration</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type='text/css'>
	.container{
		width: 900px;
		height: 700px;
	}
		.body{
			display: inline-block;
			width: 900px;
		}
			.register{
				outline: 1px solid black;
				padding-left: 20px;
				display: inline-block;
				width: 425px;
				height: 350px;
			}
				#button_left{
					margin-left: 325px;
				}
			.login{
				padding-left: 20px;
				outline: 1px solid black;
				margin-left: 30px;
				vertical-align: top;
				display: inline-block;
				width: 425px;
				height: 225px;
			}
				#button_right{
					margin-left: 247px;
				}
</style>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Welcome!</a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav">
			<li><a href="#"></a></li>
	        <li><a href="#"></a></li> 
	        <li><a href="#"></a></li> 
	      </ul>
<!-- 	      <ul class="nav navbar-nav navbar-right">
	      	<li><a href="/travels">Home</a></li>
	        <li><a href='/logout'><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	      </ul> -->
	    </div>
	  </div>
	</nav>
	<div class='container'>
		<div class='body'>
			<div class='register'>
				<h4>Register</h4>
				<?= $this->session->flashdata('errors') ?>
				<?= $this->session->flashdata('success') ?>
				<form action='/register' method='post'>
					<input type="hidden" name="registration" value="registration">
						<p>Name: <input type='text' name='name'></p>
						<p>Alias: <input type='text' name='alias'></p>
						<p>Email: <input type='text' name='email'></p>
						<p>Password: <input type='password' name='password'></p>
						<p>*Password should be at least 8 characters</p>
						<p>Password Confirmation: <input type='password' name='confirm_password'></p>
						<p>Date of Birth: <input type="date" name="dob"></p>
						<p><input type='submit' class='btn btn-primary .btn-md' value="Register"></p>
				</form><br>
			</div>
			<div class='login'>
				<h4>Login</h4>
				<?= $this->session->flashdata("login_errors"); ?>
				<form action='/login' method='post'>
					<input type="hidden" name="login" value="login">
						<p>Email: <input type='text' name='email'></p>
						<p>Password: <input type='password' name='password'></p>
						<p></p><input type='submit' class='btn btn-primary .btn-md' value="Login">
				</form><br>
			</div>
		</div>
	</div>
<body>
</body>
</html>