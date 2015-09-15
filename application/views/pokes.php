<!DOCTYPE html>
<html>
<head>
	<title>Pokes</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style type="text/css">
	.upper{
		padding: 10px;
		outline: 1px solid black;
		width: 250px;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#"><h2>Welcome, <?= $user['name'] ?></h2></a>
	    </div>
	    <div>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href='/logout'><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
		<div class='container'>
			<h4><?= $allpokeinfo['total_number_of_pokes']?> people poked you</h4>
			<div class='upper'>
<?php
				if(!empty($allpokeinfo['pokes_by_user'])){
?>				
<?php
					foreach ($allpokeinfo['pokes_by_user'] as $allpoke){
?>
					<p><?=$allpoke['alias'] ?> poked you <?= $allpoke['count'] ?> times.</p>
<?php
					}
?>
<?php
				}
?>
			</div><br><br>
			<div class='lower'>
				<h4>People you may want to poke:</h4>
				<table class="table table-condensed">
				<tr>
				    <th>Name</th>
				    <th>Alias</th> 
				    <th>Email Address</th>
				    <th>Poke History</th>
				    <th>Action</th>
				 </tr>
<?php
	foreach ($allpokeinfo['poke_table_info'] as $allpoke){
?>
			<tr>
				<td><?= $allpoke['name'] ?></td>
				<td><?= $allpoke['alias'] ?></td>
				<td><?= $allpoke['email'] ?></td>
				<td><?= $allpoke['count'] ?> pokes</td>
				<td>
						<a href= "/poke_user/<?= $allpoke['id'] ?>">
							<button type ='button' class='btn btn-primary .btn-md'>Poke</button>
						</a>
				</td>
			</tr>
<?php
	}
?>
			</table>
		</div>
	</div>
</body>
</html>