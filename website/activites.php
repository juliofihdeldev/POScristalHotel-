<?php
    include_once("admin/ajaxscripts/c.php"); 
    include_once("header.php"); 
    $showActivites = $bdd->prepare("SELECT * FROM activites WHERE etat <> ?  ORDER BY ID_activites DESC LIMIT 0, 10");
    $showActivites->execute(array("hide"));
    echo'<div id="content">';

    while($data = $showActivites->fetch()){  
        echo'
                <div class="item">
                    <div class="itemImages">
                        <img src="admin/img/uploads/'.$data['photo'].'"/>
                    </div>
                    <div class="itemText">
                        <div class="compte_do">
                            '.$data['ID_activites'].'
                        </div>
                          
                        <div class="itemTitre">
                            '.$data['titre'].'  <br/>
                            _
                        </div>
                        <div class="itemDesc">
                            '.$data['description'].'
                            Barack Obama s\'exprimera lors d\'une réunion au profit d\'un nouveau comité démocrate, le National Democratic Redistricting Committee,
                            dirigé par son ancien ministre,  
                           
                           
                        </div>
                    </div>
                </div>	  
        ';
    }	
echo'</div>';
include_once("footer.php");
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
