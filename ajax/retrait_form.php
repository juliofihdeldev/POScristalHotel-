<?php 
			include('../ajax/connexion.php');
			$seldetails = $bdd -> prepare ("SELECT * FROM detailscommande, chambres , commande WHERE commande.statut_commande=? AND chambres.ID= detailscommande.chambres AND detailscommande.commande= commande.ID_commande AND commande.ID_commande=detailscommande.commande ");
			$seldetails -> execute (array('remise')); 
			$v = $seldetails -> rowCount();
			if($v>0)
			{
				$sommeremise = 0;
				while ($d = $seldetails-> fetch())
				{
				$montantLigneremise= $d['prix'] * $d['quantite'];
					$sommeremise += $montantLigneremise;
				} 
				$pcremise = $sommeremise * 0;
				$totalfinalremise = $sommeremise + $pcremise;
				
				
			}else
			{
				$totalfinalremise = 0 ;
			}
				
		$selretrait = $bdd -> query ("SELECT SUM(retrait) as somme_retrait  FROM retrait ");
		$vselretrait = $selretrait -> rowCount();
		$sommeretrait=0;
		
		
			if($vselretrait>0)
			{
				while ($d = $selretrait-> fetch())
				{
					$sommeretrait =''.$d['somme_retrait'].'' ;
				} 	
			}
			else
			{
				$sommeretrait = 0 ;
			}
		echo'
		<div class="boiteAjout">
			<div class="titre">
				Retrait
			</div>
			<form action="ajax/rapport_print.php" method="POST" id="tr_retrait">
				<input type="text" name="le_motif" placeholder="Motif du retrait" hidden/>
				<p>
					Le motif du retrait<br/>
					<input type="text" name="motif" required/>
				</p>
				<p>
					Le montant du retrait<br/>
					<input type="number" name="le_montant_retrait" min="1" max="'.$montantpeut= $totalfinalremise - $sommeretrait.'" required/>
				</p>
				
				
					
				<input type="submit" value="Effectuer"/>
			</form>
		</div>
	';
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>