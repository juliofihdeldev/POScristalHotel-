<?php
    echo'
    <!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
		<title>Cristal hotel </title>
		<link rel="icon" type="image/ico" href="images/logo.png" />
		<link rel="stylesheet" href="css/design.css" />
		<link rel="stylesheet" href="dist/css/swiper.min.css">
		<script src="js/jquery.js"></script>
		<!-- <script src="js/carousel.js"></script> -->
	</head>
	<body>
		<!-- <?php include("includes/enTete.php");?>  -->
	<div id="enTete">
		<div class="content">
			<div class="media">
				<div class="item">
					<img style="width:45%;margin-top:13px;opacity:0.7;" src="images/i_g.png" />
				</div>
				<div class="item">
					<img style="width:90%;margin-top:3px;opacity:0.7;" src="images/t_g.png" />
				</div>
				<div class="item">
					<img style="width:55%;margin-top:10px;" src="images/f_g.png" />
				</div>
				<div class="cont">
					<strong>Call Us:</strong> +509 48188107 | Email : <a class="mailto" href="mailto:infos@cristalhotel.com">infos@cristalhotel.com</a>
				</div>
			</div>
		</div>
	</div>
	<div id="menu">
		<div class="content">
			<div class="link">
					<a href="index.php">
						<div class="item active">
							Accueil
						</div>
					</a>
					<a href="activites.php">
						<div class="item">
							Activites
						</div>
					</a>
					 
					<a href="take_rooms.php">
						<div class="item">
							Dorm and Rooms
						</div>
					</a>

					<a href="location.php">
						<div class="item">
							Location 
						</div>
					</a>
					
					<a href="about_us.php">
						<div class="item">
								About
						</div>
					</a>
			
			
			</div>
			<div class="logo">
				<a href="index.php"> <img src="images/logo.png" /> </a>
			</div>
		</div>
	</div>
	<div id="searchDiv">
		<div class="content">
			<img class="close" src="images/token_x.png" />
			<input type="text" name="search" placeholder="Type To Search" />
		</div>
	</div>
	';
?>