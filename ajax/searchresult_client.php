<?php 
	session_start();
	include('connexion.php');
	$selRech = $bdd -> query ("select * from client
	WHERE (client.nomComplet LIKE '%".htmlspecialchars($_POST['client'])."%') ");
	$v= $selRech-> rowCount();
	if($v>0)
	{
			echo'
				<div class="titreview"> Mes Clients</div>
				<table id="menuView">
					
					<tr class="entente">
						<td>#</td>
						<td> Code Client</td>
						<td> Non complet</td>
						<td> Cin or Nif</td>
						<td> Tel</td>
						<td> Email</td>
						<td> Adresse</td>
						<td> Date ajout </td>
						
					</tr>';
			$no=0;
			
			while ($d = $selRech-> fetch())
			{
				$no = $no + 1;
				echo'
				
					<tr id="viexCommandeClient" name="'.$d['ID_client'].'">
						<td>'.$no.'.</td>
						<td>STJP-00C'.$d['ID_client'].'</td>
						<td>'.$d['nomComplet'].' </td>
						<td>'.$d['cinOrnif'].' </td>
						<td>'.$d['telephone'].' </td>
						<td>'.$d['email'].'</td>
						<td>'.$d['adresse'].'</td>
						<td>'.$d['dateAjout'].' </td>
						<td class="editClient"id="'.$d['ID_client'].'"> 
						<img src="img/Add User-25.png"></td>
						<td>	
							<a href="ajax/commande_du_client.php?da='.$d['ID_client'].'">
								<img src="img/Visible-26.png"/> 
							</a>
						</td>
							';
						if($_SESSION['fonction'] =='admin')
						{
							echo'
						<td>	
							<a href="ajax/delclient.php?da='.$d['ID_client'].'">
								<img src="img/Delete-26.png"/> 
							</a
							';
						}else
						{
							
						}
						echo'
					</tr>
				</a>
				';
			} 
	}
	else
	{		
		echo ' 
			<div class="imprimer">
			<p>Aucun client</p>
				<table> 
					<tr>
						<td><a href="../application.php">
						<img src="img/Left-25.png"/></a></td>
						<td><a href="application.php">Retour</a></td>
					</tr>
				</table>
			</div>';
	}
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>