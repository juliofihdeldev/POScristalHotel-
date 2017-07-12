$(document).ready(function()
{

	var $banner = $('#carousel'), // on cible le bloc du banner
	$img = $('#carousel .img'), // on cible les images contenues dans le banner
	indexImg = $img.length - 1, // on définit l'index du dernier élément
	i = 0, // on initialise un compteur
	$currentImg = $img.eq(i); /*  enfin, on cible l'image courante,qui possède l'index i (0 pour l'instant) */

	$img.css('display', 'none'); // on cache les images
	$currentImg.slideToggle(); // on affiche seulement l'image courante
	
	function slideImg()
	{
		setTimeout(function()
		{ // on utilise une fonction anonyme
			if(i < indexImg)
			{ // si le compteur est inférieur au dernier index
				i++; // on l'incrémente
			}
			else
			{ // sinon, on le remet à 0 (première image)
				i = 0;
			}
			$img.hide();
			$currentImg = $img.eq(i);
			$currentImg.fadeToggle(500);
			slideImg(); // on oublie pas de relancer la fonction à la fin
		}, 5000); // on définit l'intervalle à 7000 millisecondes (7s)
	}
	slideImg(); // enfin, on lance la fonction une première fois
});