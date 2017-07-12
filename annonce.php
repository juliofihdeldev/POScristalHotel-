<?php	
	
	include('ajax/connexion.php');
	$selqte = $bdd -> prepare ("SELECT * FROM commande WHERE dayofyear(exporation) - dayofyear(NOW()) <= 3
	AND commande.statut_commande=? ");
	$selqte -> execute (array('en cours')); 
	$valert = $selqte -> rowCount();
	if($valert>0)
	{
		
		while($ds = $selqte-> fetch() )
		{
			echo $valert;
			echo ' 
				'.$ds['exporation'].'<br/>
				'.$ds['memo'].'<br/>
			';
		}
	}
	else
	{
		echo $qtecommande='0';
		
	}
?>