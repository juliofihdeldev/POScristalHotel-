<?php 
	include('connexion.php');
	$selRech = $bdd -> query ("select * from commande
	WHERE (commande.ID_commande LIKE '%".htmlspecialchars($_POST['search'])."%') ");
	$v= $selRech-> rowCount();
	
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
			while ($d = $selRech-> fetch())
			{
				$no = $no + 1;
				echo'	
		
					
						<tr  class="forClick" id="'.$d['ID_commande'].'"  name="'.$d['client'].'">
							<td>'.$no.'.</td>
							
							
							<td>STJ-00'.$d['client'].'P </td>
							<td>SJP-C-'.$d['ID_commande'].' </td>
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
			 echo'<div class="reussi">
				Aucun commande
				<a href="application.php">Retour</a>
			 </div>';
		 }
?>
<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>