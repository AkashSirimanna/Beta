<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
<title>Beta</title>
	<link rel = "stylesheet"href="style_register.css" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
</head>
<body>
	<section id = "nav-bar">
		<nav class="navbar navbar-expand-lg">
	    <a class="navbar-link" href="index.php" style="font-family: 'Lobster';font-size: 30px;">Beta</a>
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <i class="fa fa-bars" aria-hidden="true"></i>
	  	</button>
	  	<div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav ml-auto" style="font-family: 'K2D',sans-serif;font-style: 'light';font-size: 20px">
	    <li class="nav-item">
	    <a class="nav-link" href="index.php">HOME</a>
	    </li>
	    <li class="nav-item">
	    <a class="nav-link" href="login.php">LOGIN</a>
	    </li>
	    <li class="nav-item">
	    <a class="nav-link" href="#">ABOUT US</a>
	    </li>
	    </ul>
	    </div>
		</nav>
	</section> <!-- NAVBAR -->


	<section id="banner">
	<div class="container">
	<div class="row">
	<div class = "col-md-6">
	<h1 class="banner-title" style="font-family: 'Lobster';">Beta</h1>
	<p style="font-family: 'K2D',sans-serif;font-style: 'regular';font-size: 30px">Together we trade, together we gain</p>
	<img src = "images/teamwork.png" class = "img-banner">
	</div>
	<div class = "col-md-6">
	<form id="registration" method="post">
		<label for="user_firstname">Enter your name</label>	
  		<div class="row">
    	<div class="col">
      	<input type="text" name = "user_firstname" class="form-control" placeholder="First name">
    	</div>
    	<div class="col">
      	<input type="text" name = "user_lastname" class="form-control" placeholder="Last name">
   		</div>
  		</div>

  		<div class="form-group email">
    	<label for="email">Email address</label>
    	<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  		</div>

  		<div class="form-group username">
    	<label for="username">Username</label>
    	<input type="text" class="form-control" name="username" placeholder="Enter desired username">
  		</div>

  		<label for="password">Password</label>	
  		<div class="row">
    	<div class="col">
      	<input type="password" name="password1" class="form-control" placeholder="Password">
    	</div>
    	<div class="col">
      	<input type="password" name="password2" class="form-control" placeholder="Confirm Password">
   		</div>
  		</div>

  		<button type="submit" name = "register_btn"class="btn btn-warning">REGISTER</button>
	</form>
	</div>
	</div>
	</div>
	</section> <!-- Homepage Banner -->
</body>