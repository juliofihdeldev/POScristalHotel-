<!DOCTYE html>
<html>
	<head>
		<title> POScristalHotel</title>
		<link media="all" rel="stylesheet" type="text/css" href="css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body>
	<?php
		include('phpscripts/menu.php');
		include('phpscripts/fonctions.php');
		include('ajax/connexion.php');

			supprimerCommandeVide();		
			supprimerCommandeNonTermniner();
			
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
		
		
		$selversement = $bdd -> query ("SELECT SUM(versement) as sommevers  FROM commande ");
		$vversement = $selversement -> rowCount();
		$sommeversement=0;
		
			if($vversement>0)
			{
					
					while ($d = $selversement-> fetch())
					{
						
						$sommeversement =''.$d['sommevers'].'' + $totalfinalremise;
					} 
					
			}
			else
			{
				$sommeversement = 0 ;
			}
			
		$seldetails = $bdd -> prepare ("SELECT * FROM detailscommande, chambres , commande where commande.statut_commande=? AND chambres.ID= detailscommande.chambres AND detailscommande.commande= commande.ID_commande AND commande.ID_commande=detailscommande.commande ");
		$seldetails -> execute (array('en cours')); 
		$v = $seldetails -> rowCount();

			if($v>0)
			{
					$somme = 0;
					while ($d = $seldetails-> fetch())
					{
						$montantLigne= $d['prix'] * $d['quantite'];
						$somme += $montantLigne;
					} 
					$pc = $somme * 0;
					
					$totalfinal = $somme + $pc;
					
			}else
			{
				$totalfinal = 0 ;
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
			<div class="contentPresentation">
				
				<div class="canvas1">
					<div class="presentation">
						Etat de caisse 
					</div>
					
					<div class="boiteResultSearch">
						<div class="fermer">
							<img src="img/dry/Delete-26.png"/>
						</div>
					</div>
					<div class="btn">
						<div class="desc">
							En cours<br/>
						 ' .$totalfinal.' Gdes
						</div>
						<div class="images">
							<img src="img/Cheap 2-100.png"/>
						</div>
					</div>
					<div class="btn">
						<div class="desc">
						Payer
							'.$totalfinalremise.' Gdes<br> 
							
						</div>
						<div class="images">
							<img src="img/Cheap 2-100.png"/>
						</div>
					</div>
					<div class="btn">
					<div class="desc">
							En caisse
							'.$lereste = $sommeversement - $sommeretrait .'Gdes<br> 	
						</div>
						<div class="images">
							<img src="img/Cheap 2-100.png"/>
						</div>
					</div>
					
				</div>
				<div class="canvas2">
					<div class="titrerubrique">
						Commande en cours
					</div>
					<div class="search">
						<form method="" action="" id="laRechercher"> 
							<input type="search" placeholder="Rechercher" id="theval"/>
							<input type="submit" value="Find"/>
						</form>
					</div>
					<div class="info">
					';
		
				$seldetails = $bdd -> prepare ("SELECT * FROM  commande WHERE commande.statut_commande =? ");
				$seldetails -> execute (array('en cours'));
				$v = $seldetails -> rowCount();
				
				if($v>0){
					echo'<div class="Montableau">
							<table>
							
							<tr class="entente">
								<td>#</td>
								
								<td> Code Client</td>
								<td> No commande</td>
								<td> Etat de commande</td>
								
								<td> Date</td>
							</tr>
						
							</tr>';
					$no=0;
					/* $somme = 0; */
					
					while ($d = $seldetails-> fetch())
					{
						$no = $no + 1;
						echo'	
				
							
								<tr  class="forClick" id="'.$d['ID_commande'].'"  name="'.$d['client'].'">
									<td>'.$no.'.</td>
									
									<td>CH-00'.$d['client'].' </td>
									<td>CH-C-'.$d['ID_commande'].' </td>
									<td>'.$d['statut_commande'].' </td>
									
									<td>'.$d['dateCommande'].' </td>
								</tr>
							
						';
						/* $montantLigne = $d['quantite'] * $d['prix']; 
						$somme += $montantLigne; */
					} 
					/* $pc = $somme * 0.1;
					$totalfinal = $somme + $pc; */
					
						echo'
					
						</table>
					</div>
				</div>
				 
				</div>';
				
				 }
				 else
				 {
					echo'Aucune commande encours pour l\'instant';
				 }
				echo'		
			</div>
		</div>
		<div id="modal">
			<div class="content">
				<div class="fermer">
					<img src="img/dry/Delete-26.png">
				</div>
				<div class="info">
				
				</div>
				<div class="footer">
				
				</div>
			</div>
			
		</div>
		<div id="modalsmall">
			<div class="contentsmall">
				<div class="fermer">
					<img src="img/dry/Delete-26.png">
				</div>
				<div class="infosmall">
				
				</div>
			</div>
		</div
		
	
		';?>
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>

	</body>
	<!--
		<div class="btn">
			<div class="desc">
				100<br> 
				Wedding Dress
			</div>
			<div class="images">
				<img src="img/dry/size/Wedding Dress-50.png"/>
			</div>
		</div>
		<div class="btn">
			<div class="desc">
				100<br> 
				Shirt Filled
			</div>
			<div class="images">
				<img src="img/dry/size/Shirt Filled-50.png"/>
			</div>
		</div>
	-->
		<div class="loading">
			<div class="images">
				<img src="img/loading.gif"/>
				<p>Waiting</p>
			</div>
		</div>
</html>


