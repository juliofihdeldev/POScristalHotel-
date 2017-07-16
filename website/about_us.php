<?php 
	require_once("header.php");
?>
		
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
			
				</div>
				
            </div>
        </div>
        <div id="carousel">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide">
						<img class="img" src="images/logo.png" />
						<img class="img" src="images/logo.png" />
				
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
		
		<!-- Initialize Swiper -->
		  var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',
			paginationClickable: true,
			spaceBetween: 30,
			centeredSlides: true,
			autoplay: 5000,
			autoplayDisableOnInteraction: false
		});
	</script>
	</body>
</html>