<?php 
	require_once("header.php");
?>
		
	<div id="welcome">
			<div class="content">
                <div class="each_item">
                    <div class="bag">
                        <img src="images/f/0.jpg" />
                    </div>
                    <div class="text">
                        <div class="title"> Suite Junoir </div>
                        <div class="content_text">
                            <div class="all_details">
                                From 30$ per person, our dorms can accommodate 2, 4, 8, or 12 people. Each room...
                            </div>
                            <div class="table">
                                <table>
                                    <tr>
                                        <td> <img src="images/icon/elec.png"/> </td> 
                                        <td> <img src="images/icon/tv.png"/> </td> 
                                        <td> <img src="images/icon/wi.png"/> </td>
                                        <td> <img src="images/icon/safe.png"/> </td>
                                        <td> <img src="images/icon/shower.png"/> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="price">
                                $30 
                            </div>
                            <div class="more">
                                Plus informations
                            </div>
                        </div>
                    </div>
                </div>
                <div class="each_item">
                    <div class="bag">
                        <img src="images/f/4.jpg" />
                    </div>
                    <div class="text">
                        <div class="title"> Triple Room </div>
                        <div class="content_text">
                            <div class="all_details">
                              From 50$ per person, triple rooms are suitable for 3 guests, perfect for a......
                            </div>
                            <div class="table">
                                <table>
                                    <tr>
                                        <td> <img src="images/icon/elec.png"/> </td> 
                                        <td> <img src="images/icon/tv.png"/> </td> 
                                        <td> <img src="images/icon/wi.png"/> </td>
                                        <td> <img src="images/icon/safe.png"/> </td>
                                        <td> <img src="images/icon/shower.png"/> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="price">
                                $50
                            </div>
                            <div class="more">
                                Plus informations
                            </div>
                        </div>
                    </div>
                </div>
                <div class="each_item">
                    <div class="bag">
                        <img src="images/f/3.jpg" />
                    </div>
                    <div class="text">
                        <div class="title">Double Room</div>
                        <div class="content_text">
                            <div class="all_details">
                                From 80$ per person, double rooms are for two guests, and include a personal...                            </div>
                            <div class="table">
                                <table>
                                    <tr>
                                        <td> <img src="images/icon/elec.png"/> </td> 
                                        <td> <img src="images/icon/tv.png"/> </td> 
                                        <td> <img src="images/icon/wi.png"/> </td>
                                        <td> <img src="images/icon/safe.png"/> </td>
                                        <td> <img src="images/icon/shower.png"/> </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="price">
                                $80 
                            </div>
                            <div class="more">
                                Plus informations
                            </div>
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