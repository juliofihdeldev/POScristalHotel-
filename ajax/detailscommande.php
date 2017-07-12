	<div class="panier">
			
			<?php 
				session_start();
				include('connexion.php');
				
				$seldetails = $bdd -> prepare ("SELECT * FROM detailscommande, chambres , commande, client where (commande.statut_commande=? OR commande.statut_commande=?) AND chambres.ID= detailscommande.chambres AND commande.ID_commande=? AND detailscommande.commande= commande.ID_commande AND commande.ID_commande=detailscommande.commande AND client.ID_client= commande.client ");
			 	$seldetails -> execute (array('en cours','remise', $_POST['commande'])); 
				$v = $seldetails -> rowCount();
				$_SESSION['commmade']=$_POST['commande'];
					if($v)
					{
						echo'
							<div class="table">
								<div class="logo">
									<img src="img/logo.png"/>
								</div>
								NOcommande:
								CH-C-'.$_SESSION['commmade'].'
								<div class="adresse">
									Laboule 11 <br/>Complexe Guillaume
								</div>
								<table width="100%">
								<tr class="head">
									
									<td width="20%"> Chambres</td>
									<td width="40%"> Description</td>
									<td> Prix unitaire</td>
									<td align=""> Quantite</td>
									<td>Total </td>
									<td></td>
									<td></td>
								</tr>
						';
						$somme = 0;
						$verifstatut_commande = "";
						
						while ($d = $seldetails-> fetch())
						{
							$verifstatut_commande = $d['statut_commande']; 
							$montantLigne= $d['prix'] * $d['quantite'];
							echo'	
								<tr>
									<td>'.$d['designation'].'</td>
									<td>'.$d['description'].'</td>
									<td> '.$d['prix'].' Gdes</td>
									<td align="">'.$d['quantite'].' </td>
									<td> '.$montantLigne.' Gdes</td>
								</tr>
								<div class="ladate">
									le:'.$d['dateCommande'].'	
								</div>
								<div class="leclient">
									'.ucwords($d['nomComplet']).'
								</div>
							';
							
							$somme += $montantLigne;
							
					
					} 
						echo
						
						'
							<div class="codeClient"> 
								Empl :'.$_SESSION['pseudo'].'
							</div>
						';
						
						$pc = $somme * 0;
						$totalfinal = $somme + $pc;
					
					}
					else
					{
						echo'	
							<div class="success">
									<table>
										<tr>
											<td> <img src="img/circle-icon-63.png"></td>
											<td> Error system</td>
										</tr>
									</table>
									<div class="footerboite">
										<a href="application.php" class="dkr"> D\'accord </a>
									</div>
								</div>
						';
					}
			
					echo'
		
						<tr>
							<td colspan="5"> </td>
						</tr>
						
					
						
						<tr>
							<td colspan="3"></td>
							<td colspan=""> Total final</td>
							<td  >'.$totalfinal.' Gdes</td>
						</tr>
					
					</table>';
					
					$selcommade = $bdd -> prepare("SELECT * FROM commande  WHERE commande.ID_commande =?");
					$selcommade -> execute (array($_SESSION['commmade']));
					$v = $selcommade -> rowCount();
					
					while($d = $selcommade->fetch()){
						echo
						'	
							<div>
								<p>
									Remarques:
									
									'.$d['memo'].'
								</p>
								
							</div>
						';
					}
				
			?>
			
			</div>
			<?php 
			if($verifstatut_commande == "remise")
			{
			
				echo'
					<div class="imprimer">
						<table> 
							<tr>
								<td><img src="img/Print-25.png"/></td>
								<td><a href="print.php">Imprimer</a></td>
							</tr>
						</table>
					</div>
					';
			}
			else
			{
				echo'
				
					<div class="imprimer">
						<table> 
							<tr>
								<td><img src="img/Print-25.png"/></td>
								<td><a href="print.php">Imprimer</a></td>
							</tr>
						</table>
					</div>
					
					<div class="remise">
						<table> 
							<tr>
								<td><img src="img/Expensive 2-50.png"/></td>
								<td><a href="remise.php">Terminer</a></td>
							</tr>
						</table>
					</div>
		
				';
			}
		?>
			
		
		</div>
		
		
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
		
	</body>
</html>

