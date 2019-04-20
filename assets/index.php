<?php
session_start(); 
$database = mysqli_connect('localhost','root','','persona') or die("could not connect to database");
if(isset($_POST['search_btn'])){
	session_start();
	$_SESSION['ticker'] =  strtoupper(mysqli_real_escape_string($database,$_POST['ticker']));
	header('location: ticker.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Beta</title>
	<link rel = "stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel = "stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=K2D" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
	    <?php
	    if(isset($_SESSION['username'])) : ?>
	    <form class="form-inline" method= "post">
    	<input class="form-control mr-sm-2" type="search" name = "ticker" placeholder="Ticker Symbol" aria-label="Search">
    	<button class="btn btn-outline-light my-2 my-sm-0" name="search_btn" type="submit">Search</button>
  		</form>
	    <li class="nav-item">
	    <a class="nav-link" href="logout.php">LOG OUT</a>
	    </li>
	    <?php
	    else : ?>
	    <form class="form-inline" method = "post">
    	<input class="form-control mr-sm-2" type="search" name = "ticker" placeholder="Ticker Symbol" aria-label="Search">
    	<button class="btn btn-outline-light my-2 my-sm-0" name="search_btn" type="submit">Search</button>
  		</form>
	    <li class="nav-item">
	    <a class="nav-link" href="register.php">SIGN UP<span class="sr-only">(current)</span></a>
	    </li>
	    <li class="nav-item">
	    <a class="nav-link" href="login.php">LOGIN</a>
	    </li>
	    <?php endif ?>
	    <li class="nav-item">
	    <a class="nav-link" href="blog/blog.php">BLOG</a>
	    </li>
	    <li class="nav-item">
	    <a class="nav-link" href="learn/index_learn.php">LEARN</a>
	    </li>
	    </ul>
	    </div>
		</nav>
	</section> <!-- NAVBAR -->


	<section id="banner">
	<div class="container">
	<div class="row">
	<div class = "col-md-6">
	<p class="banner-title" style="font-family: 'Lobster';font-size:70px;x">Beta</p>
	<p style="font-family: 'K2D',sans-serif;font-style: 'regular';font-size: 30px;">Together we trade, together we gain</p>
	<a class = "instagram" href="#"><img src="images/instagram.png" class = "img-instagram"></a>
	</div>
	<div class = "col-md-6 text-center">
	<img src = "images/teamwork.png" class = "img-banner">
	</div>
	</div>
	</div>
	<img src = "images/wave.png" class = "img-wave">
	</section> <!-- Homepage Banner -->

	<section id = "idea">
	<div class = "container text-center">
		<h1 class = "idea-title">What is <span style="font-family: 'Lobster';">Beta</span></h1>
	<div class = "row text-center">
	<div class = "col-md-6 text-center">
	<h1>Learn</h1>
	<p>Pioneering the movement of modern education</p>
	<img src = "images/book.png" style = "width:45%; margin-top: 70px;">
	</div>
	<div class = "col-md-6 text-center">
	<h1>Research</h1>
	<p>Choose a security, do your research</p>
	<!-- TradingView Widget BEGIN -->
  	<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  	<script type="text/javascript">
  	new TradingView.widget(
  	{
	  "autosize" : true,
	  "symbol": "NASDAQ:AAPL",
	  "interval": "D",
	  "timezone": "Etc/UTC",
	  "theme": "Light",
	  "style": "2",
	  "locale": "en",
	  "toolbar_bg": "#f1f3f6",
	  "enable_publishing": false,
	  "hide_legend": true,
	  "allow_symbol_change": true,
	  "container_id": "tradingview_12aff"
	}
  	);
  	</script>
	<!-- Widget End-->
	</div>
	</div>
	</div>	
	</section>
</body>
</html>