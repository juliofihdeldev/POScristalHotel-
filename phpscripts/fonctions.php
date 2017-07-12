<?php
	
	function supprimerCommandeVide()
	{
		include('ajax/connexion.php');
	
		$cor = $bdd -> prepare('SELECT * FROM commande WHERE statut_commande=?');
		$cor -> execute(array('en cours'));
		$cnt = $cor -> rowCount();
		
		if($cnt>0)
		{
			while($c = $cor -> fetch())
			{
				$sel = $bdd -> prepare('SELECT * FROM detailscommande WHERE commande =?');
				$sel -> execute(array($c['ID_commande']));
				$cntd = $sel-> rowCount();
				if($cntd<=0)
				{
					$delc = $bdd ->prepare('DELETE FROM commande WHERE ID_commande = ?');
					$delc -> execute(array($c['ID_commande']));
				}
			}
	

	}
}
	
/* 
	Suprimer les commande qui sont pas terminer 
*/
function supprimerCommandeNonTermniner()
{
	include('ajax/connexion.php');

	$delEffectif = $bdd -> prepare('SELECT * FROM commande WHERE effectif<>?');
	$delEffectif -> execute(array('oui'));
	$cnt = $delEffectif -> rowCount();
	if($cnt>0)
	{
		while($c = $delEffectif -> fetch())
		{
			
			$sele = $bdd -> prepare('SELECT * FROM detailscommande WHERE commande =?');
			$sele -> execute(array($c['ID_commande']));
			$cntd = $sele-> rowCount();
			
			if($cntd >0)
			{
				$delc = $bdd ->prepare('DELETE FROM commande WHERE effectif <> ?');
				$delc -> execute(array($c['ID_commande']));
				
				$delc2 = $bdd ->prepare('DELETE FROM detailscommande WHERE commande = ?');
				$delc2 -> execute(array($c['ID_commande']));
			}
			
		}
		
	}else
	{
		echo'pa genyen';
	}			
}			
?>