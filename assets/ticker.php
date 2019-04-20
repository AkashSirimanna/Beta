<?php
session_start();

$database = mysqli_connect('localhost','root','','persona') or die("could not connect to database");
if(isset($_POST['search_btn'])){
	$_SESSION['ticker'] =  mysqli_real_escape_string($database,$_POST['ticker']);
	header('location: ticker.php');
}
$ticker = $_SESSION['ticker'];
if (isset($_POST['fire_btn']) && !isset($_SESSION['time'])){
	header('location: ticker.php');
	if (!isset($_SESSION['time'])){
		$_SESSION['time'] = time();
	}
	$query = "SELECT * FROM votes WHERE ticker = '$ticker' LIMIT 1";
	$results = mysqli_query($database,$query);
	$current_tickers = mysqli_fetch_assoc($results);
	if ($current_tickers['ticker'] != $ticker){
		$query = "INSERT INTO votes(ticker,fire,cold) VALUES ('$ticker',1,0)";
		mysqli_query($database,$query);
	}
	else{
		$query = "UPDATE votes SET fire=fire+1 WHERE ticker = '$ticker'";
		mysqli_query($database,$query);
	}
}
if (isset($_POST['cold_btn'])){
	header('location: ticker.php');
	if (!isset($_SESSION['time']) && !isset($_SESSION['time'])){
		$_SESSION['time'] = time();
	}
	$query = "SELECT * FROM votes WHERE ticker = '$ticker' LIMIT 1";
	$results = mysqli_query($database,$query);
	$current_tickers = mysqli_fetch_assoc($results);
	if ($current_tickers['ticker'] != $ticker){
		$query = "INSERT INTO votes(ticker,fire,cold) VALUES ('$ticker',0,1)";
		mysqli_query($database,$query);
	}
	else{
		$query = "UPDATE votes SET cold=cold+1 WHERE ticker = '$ticker'";
		mysqli_query($database,$query);
	}
}
if (isset($_SESSION['time']) && time() - $_SESSION['time'] > 600){ //reset voting time every 10 minutes
	unset($_SESSION['time']);
}

$query = "SELECT fire from votes WHERE ticker = '$ticker' LIMIT 1";
$result = mysqli_query($database, $query);
$fire = mysqli_fetch_assoc($result);
$query = "SELECT cold from votes WHERE ticker = '$ticker' LIMIT 1";
$result = mysqli_query($database, $query);
$cold = mysqli_fetch_assoc($result);

if(isset($_POST['comment_btn'])) {
	if (!isset($_SESSION['post_time'])){
	$comment = mysqli_real_escape_string($database,$_POST['comment']);
	$query = "INSERT INTO comments(message,ticker) VALUES ('$comment','$ticker')";
	mysqli_query($database,$query);
	$_SESSION['post_time'] = time();
	}
}

if (isset($_SESSION['post_time']) && time() - $_SESSION['post_time'] > 600){ //reset voting time every 10 minutes
	unset($_SESSION['post_time']);
}

$query = "SELECT message FROM comments WHERE ticker = '$ticker'  ORDER BY id DESC LIMIT 50";
$result = mysqli_query($database, $query);
while($row = mysqli_fetch_assoc($result))
	$comments[] = $row['message'];
if(empty($comments)){
	$comments = array("Welcome to the comment section" ,"Share your thoughts!");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Beta <?php echo $_SESSION['ticker']?> </title>
	<link rel = "stylesheet" href="style_dashboard.css" type="text/css">
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
	    <a class="nav-link" href="index.php">HOME</a>
	    </li>
	    <li class="nav-item">
	    <a class="nav-link" href="logout.php">LOG OUT</a>
	    </li>
	    <?php
	    else : ?>
	    <form class="form-inline" method= "post">
    	<input class="form-control mr-sm-2" name = "ticker" type="search" placeholder="Ticker Symbol" aria-label="Search">
    	<button class="btn btn-outline-light my-2 my-sm-0" name = "search_btn" type="submit">Search</button>
  		</form>
  		<li class="nav-item">
	    <a class="nav-link" href="index.php">HOME</a>
	    </li>
	    <li class="nav-item">
	    <a class="nav-link" href="register.php">SIGN UP<span class="sr-only">(current)</span></a>
	    </li>
	    <li class="nav-item">
	    <a class="nav-link" href="login.php">LOGIN</a>
	    </li>
	    <?php endif ?>
	    </ul>
	    </div>
		</nav>
	</section> <!-- NAVBAR -->

	<section id = "dashboard">
		<div class="container" style="margin-top: 30px;">
		<div class="mx-auto text-center" style="width: 100px; padding-bottom: 10px;">
  		<?php echo $_SESSION['ticker']?>
  		</div>
  		<form class="form-inline" method= "post">
  		<div class="col" style="text-align:center; padding-bottom: 20px">
  		<?php
  		if (!isset($_SESSION['time'])): ?>
  		<?php echo $fire['fire'] ?>
  		<button id = "fire_btn" name = "fire_btn" class="btn btn-outline-warning" type = "submit"  style= "border-radius: 100%;">
  			<span class="fas fa-fire" style="color: #f69005; font-size: 30px;"></span>
  		</button>
  		<button id = "cold_btn" name = "cold_btn" class="btn btn-outline-primary" type="submit"  style= "border-radius: 100%;">
  			<span class="fas fa-snowflake" style="color: #8eecff;font-size: 30px;"></span>
  		</button>
  		<?php echo $cold['cold'] ?>
  		<?php 
  		else: ?>
  		<?php echo $fire['fire'] ?>
  		<span class="fas fa-fire" style="color: #f69005; font-size: 30px;"></span>
  		<span class="fas fa-snowflake" style="color: #8eecff;font-size: 30px;"></span>
  		<?php echo $cold['cold']  ?>
  		<?php endif ?>
		</div>
	    </form>
	    <div class = "row">
	    <div class = "col-sm-4" style="background-color: #f7f8f9; border-radius: 3%;">
	    <div style = "overflow: auto; height: 450px; margin-top: 10px;">
	    	<?php 
	    	$i = 0;
	    	while ($i < 100 && $i < count($comments)){
	    		echo '<div class="alert">';
  				echo $comments[$i];
				echo '</div>';
				$i++;
    		}
    		?>
    	</div>
    	<form class="form-inline" method= "post">
  		<div class="form-group">
    		<input type="text" class="form-control" id="comment" name="comment" placeholder="Enter Comment" style = "margin-top: 10px;">
    		<button type="submit" name = "comment_btn" style="color: #ffffff;" class="btn btn-warning">Post</button>
  		</div>
  		</form>
		</div>
	    <div class = "col-sm-8">
		<div style="height: 500px">
  				<!-- TradingView Widget BEGIN -->
  			<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  			<script type="text/javascript">
  			new TradingView.widget(
  			{
			  "autosize" : true,
			  "symbol": '\''+'<?php echo $_SESSION['ticker'];?>'+'\'',
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
		<div class="row text-center" style="margin-top: 50px; height: 250px" >
		<div class="col-md-6"><!-- TradingView Widget BEGIN -->
		<div class="tradingview-widget-container">
  		<div class="tradingview-widget-container__widget"></div>
  		<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-single-quote.js" async>
  		{
  		"symbol": "<?php echo $_SESSION['ticker'];?>",
  		"width": "100%",
  		"locale": "en"
		}
  		</script>
		</div>
 		</div>
		<div class="col-md-6">
			<h1>Latest Lesson<img src="images/idea.png" style="max-height: 20%; max-width: 20%"></h1>
		</div>
		</div>
		</div>		
	</section>
</body>
</html>