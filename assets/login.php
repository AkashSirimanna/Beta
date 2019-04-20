<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
<title>Persona</title>
	<link rel = "stylesheet"href="style_register.css" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<section id = "nav-bar">
		<nav class="navbar navbar-expand-lg navbar-light>
	    <a class="navbar-brand" href="index.html" style="font-family: 'Lobster';font-size: 30px;">Beta</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <i class="fa fa-bars" aria-hidden="true"></i>
	  	</button>
	  	<div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav ml-auto" style="font-family: 'K2D',sans-serif;font-style: 'light';font-size: 20px">
	     <li class="nav-item">
	    <a class="nav-link" href="index.php">HOME</a>
	    </li>
	    <li class="nav-item">
	    <a class="nav-link" href="register.php">REGISTER</a>
	    </li>
	    <li class="nav-item">
	    <a class="nav-link" href="#">ABOUT US</a>
	    </li>
	    </ul>
	    </div>
		</nav>
	</section> <!-- NAVBAR -->


	<section id="banner">
	<div class="container" style="height: 1000px;">
	<div class="row">
	<div class = "col-md-6" style="margin-bottom: 100px;">
	<h1 class="banner-title" style="font-family: 'Lobster';">Beta</h1>
	<p style="font-family: 'K2D',sans-serif;font-style: 'regular';font-size: 30px">Together we trade, together we gain</p>
	<img src = "images/teamwork.png" class = "img-banner">
	</div>
	<div class = "col-md-6">
	<form id="registration" method="post">
  		<div class="form-group username">
    	<label for="username">Username</label>
    	<input type="text" name = "username" class="form-control" id="username" placeholder="Enter username">
  		</div>

  		<div class="form-group username">
  		<label for="password">Password</label>	
      	<input type="password" name = "password" id="password" class="form-control" placeholder="Password">
		</div>
  		<button type="submit" name = "login_btn" class="btn btn-warning">LOGIN</button>
	</form>
	</div>
	</div>
	</div>
	</section> <!-- Homepage Banner -->
</body>