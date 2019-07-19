<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dinamic web pages Project with PHP</title>
	<meta name="author" content="sharath mohan">
	<meta name="description" content="PHP dinamic web pages project">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>



<div class="container">
	<div class="row no-gutters">
		<div class="col">
			<nav class="navbar navbar-expand-sm bg-light navbar-light">
				<a href="index.php?pageName=home" class="navbar-brand">Dinamic WEB PAGE</a>
				<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
	    			<span class="navbar-toggler-icon"></span>
	  			</button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
						<li class="nav-item active"><a href="index.php?pageName=home" class="nav-link">Home</a></li>
						<li class="nav-item"><a href="index.php?pageName=projects" class="nav-link">Projects</a></li>
						<li class="nav-item"><a href="index.php?pageName=skills" class="nav-link">Skills</a></li>
						<li class="nav-item"><a href="index.php?pageName=about" class="nav-link">About Me</a></li>
						<li class="nav-item"><a href="index.php?pageName=login" class="nav-link">Login Form</a></li>
						<li class="nav-item"><a href="index.php?pageName=sign_in" class="nav-link">Signin Form</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>

<div class="container">
	<div class="row no-gutters">
		<div class="col-9" style="border-left: 5px solid rgba(0,0,0);">
			<?php

			$bug_list = ['password' , '"' , "'" , "''" , '""' , "." , "," , "/" , "user" , "user_name" , "?" , '`' , "\\"];
			$pagesFolder = 'dinamic_pages';
			$pagesArray = scandir($pagesFolder , 0);
			unset($pagesArray[0] , $pagesArray[1]);

			if (!empty($_GET['pageName'])) {
				$pageName = $_GET['pageName'];
				if (in_array($pageName . '.inc.php', $pagesArray)) {
					include($pagesFolder . "/" . $pageName. '.inc.php');
				} else if (in_array($pageName, $bug_list)) {
					echo "<div class='include_content'><h1 class='h1'>Don't try to hack my website</h1></div>";

				} else {
					include($pagesFolder . "/error.inc.php");
				}
			} else {
				include($pagesFolder . "/home.inc.php");
			}
			

			?>
		</div>
		<div class="col-3">
			<div>
 				<img class="img" src="images/side_img.jpg" height="400px" width="400px">
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="jumbotron jumbotron-fluid bg-dark mb-0 fixed-bottom text-light text-center p-1 font-weight-light">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, dolorum!</p>
		<b>&copy;Copyright By Sharath Mohan</b>
		<p> dinamic web pages is a trick which we can use it to load the perticular portion of the web page... </p>
	</div>
</div>


<!--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
