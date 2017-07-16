<?php 
	require_once("header.php");
?>
		<div id="carousel">
			<!-- <?php
			/* 	$pix = $bdd->prepare("SELECT * FROM pix_site WHERE type = ?");
				$pix->execute(array("Slider"));
				
				while($p = $pix->fetch())
				{
					echo '
					<img class="img" src="images/'.$p['photo'].'" />';
				} */
			?> -->
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<img class="img" src="images/banner/b4.jpg" />
					</div>

					<div class="swiper-slide">
						<img class="img" src="images/banner/b3.jpg" />
					</div>

					<div class="swiper-slide">
						<img class="img" src="images/banner/b2.jpg" />
					</div>

					<div class="swiper-slide">
						<img class="img" src="images/banner/b.jpg" />
					</div>	
				</div>

				 <!-- If we need pagination -->
				<div class="swiper-pagination"></div>
				
				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
				
				<!-- If we need scrollbar -->
				<div class="swiper-scrollbar"></div>
			</div>
		</div>
		
		<div id="about">
			<div class="content">
				<div class="title">
					<span class="bar">
						<span class="gras">A PROPOS</span> <span class="italic">Cristal Hotel</span>
					</span>
					<div class="bBar">
						.
					</div>
				</div>
				<div class="textjulio">
					<p class="sometext">
						I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on yourI'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.</b>
				
					</p>
					<p>
						<a class="readMore" href="aboutus.html"> Lire la suite<a/>
					</p>
				</div>
			
			</div>
		</div>

		<div id="infos">
			<div class="body">
				<div class="content">
					<div class="item">
						<div class="pixOne">
							<img src="images/conferencecall.png"/>
						</div>
						<div class="text">
							<div class="cntOne">400</div>
							<div class="txt">Client </div>
						</div>
					</div>
					<div class="item">
						<div class="pixTwo">
							<img src="images/Microphone-48.png"/>
							
			
						</div>
						<div class="text">
							<div class="cntTwo">160</div>
							<div class="txt">Bar and resto</div>
						</div>
					</div>
					<div class="item">
						<div class="pixThree">
							<img src="images/hospitalicon.png"/>
						<img >
						</div>
						<div class="text">
							<div class="cntThree">25</div>
							<div class="txt"> Visites guide et autres </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="gregory">
			<div class="content">
						<div class="bcpImage">
							<div class="pix1">
								<img src="images/f/0.jpg"/>
							</div>
								<div class="pix2">
								<img src="images/f/3.jpg"/>
							</div>
						
						</div>
						
						<div class="infos">
							<div class="title">
								<span class="bar">
									<span class="gras">01</span>
								</span>
								<div class="bBar">
									.
								</div>
								<div class="min">
									Take A Room
								</div>
								<div class="text">
								
								I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.

								</div>
							</div>
						</div>
				
			</div>
		</div>
		<div id="gregory">
			<div class="content">
						<div class="bcpImage">
							<div class="pix1">
								<img src="images/f/bar2.jpg"/>
							</div>
								<div class="pix2">
								<img src="images/f/bar.jpg"/>
							</div>

						</div>
						
						<div class="infos">
							<div class="title">
								<span class="bar">
									<span class="gras">02</span>
								</span>
								<div class="bBar">
									.
								</div>
								<div class="min">
									Have A Drink
								</div>
								<div class="text">
								
								I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.

								</div>
							</div>
						</div>
				
			</div>
		</div>
		<div id="gregory">
			<div class="content">
						<div class="bcpImage">
							<div class="pix1">
								<img src="images/f/v.jpg"/>
							</div>
							<div class="pix2">
								<img src="images/f/v2.jpg"/>
							</div>
							<!-- <div class="pix3">
								<img src="images/img-04.jpg"/>
							</div>
							<div class="pix4">
								<img src="images/img-03.jpg"/>
							</div> -->
						</div>
						
						<div class="infos">
							<div class="title">
								<span class="bar">
									<span class="gras">03</span>
								</span>
								<div class="bBar">
									
								</div>
								<div class="min">
									Look Around 
								</div>
								<div class="text">
								
								I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.

								</div>
							</div>
						</div>
				
			</div>
		</div>

	<?php 
	  	require_once("say_about_us.php");
		require_once("footer.php");
	?>

	<script src="js/jquey.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	<script src="dist/js/swiper.min.js"></script>
	<script>
		  var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			paginationClickable: true,
			spaceBetween: 1,
			centeredSlides: true,
			autoplay: 5000,
			autoplayDisableOnInteraction: false
		});
	</script>
	</body>
</html>