<html>
<head>
	<title>Show Movies</title>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="js/bootstrap.min.css">
	<script src="js/jquery.js"></script>
  	<script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		.carousel-inner > .item > img,
  		.carousel-inner > .item > a > img {
      	width: 80%;
      	margin: auto;
  		}
	</style>
</head>
<body background="bg.jpg">
	<!-- Silder Show -->
	<div class="container" id="slideframe">
	  <br>
	  <div id="myCarousel" class="carousel slide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	      <li data-target="#myCarousel" data-slide-to="3"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner" role="listbox">
	    <div class="item active">
	        <img src="img/2.jpg" width="1" height="1">
	    </div>

	    <div class="item">
	        <img src="img/3.jpg" width="460" height="345">
	    </div>

	    <div class="item">
	        <img src="img/4.jpg" width="460" height="345">
	    </div>

	    <div class="item">
	        <img src="img/5.jpg" width="460" height="345">
	    </div>
	        
	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	</div>
</body>
</html>
