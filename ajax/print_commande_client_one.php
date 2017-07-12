<!DOCTYE html>
	<html>
	<head>
		<title> Dry Cleaning</title>
		<link media="all" rel="stylesheet" type="text/css" href="../css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body onload="print();">
	
	<div class="panier">
			
			<?php 
				session_start();
				include('connexion.php');
	 
				$seldetails = $bdd -> prepare ("SELECT * FROM detailscommande, articles , commande, client WHERE articles.ID_articles= detailscommande.articles AND detailscommande.commande = commande.ID_commande AND commande.ID_commande=detailscommande.commande AND commande.ID_commande=? AND commande.client=client.ID_client ");
			 	$seldetails -> execute (array($_GET['lecommande'])); 
				$v = $seldetails -> rowCount();
				
					if($v){
						
						echo'
							<div class="table">
								<div class="logo">
									<img src="../img/logst.png"/>
								</div>
								
								<div class="">
									<p>Laboule 11<br/>
									complexe guillaume
									</p>
								</div>
								<table width="">
								<tr class="entete">
									
									<td width="20%"> Article</td>
									<td width="40%"> Description</td>
									<td> Prix</td>
									<td align="center"> Qte</td>
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
									<td align="center">'.$d['quantite'].' </td>
									<td> '.$montantLigne.' Gdes</td>
								</tr>
								
								<div class="leclient">
									'.$d['nomComplet'].'
								</div>
							';
							
							$somme += $montantLigne;
						} 
						
						echo
						'
							
							
						';
							$pc = $somme * 0;
							$totalfinal = $somme + $pc;
						echo'
		
						<tr>
							<td colspan="5"> </td>
						</tr>
					
						
						
						<tr>
							<td colspan="3"></td>
							<td colspan=""> Total final</td>
		
							<td  >'.$totalfinal.' Gdes</td>
						</tr>
					
					</table>
					<div class="nb">
						<p> 
						N.B La maison n\'est plus responsable du ligne après 90 jours 
						<br/>
						Ouvert tout les jours de 8 hres A.M à 8 hres P.M
						
						<br/>
						Le samedi 8 hres A.M à 8 hres P.M
						</p>
					</div>
					<hr>
					<div class="imprimer">
						<table> 
							<tr>
								<td><img src="../img/Print-25.png"/></td>
								<td><a href="../ajax/print_commande_client_one.php?lecommande='.$_GET['lecommande'].'">Imprimer</a></td>
							</tr>
						</table>
					</div>
						';
					
					
					}else
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
			
					
				
				
			?>
			<?php 
			
				echo
				'
				
				<div class="imprimer">
					<table> 
						<tr>
							<td><img src="../img/Left-25.png"/></td>
							<td><a href="../application.php">Retour</a></td>
						</tr>
					</table>
				</div>
				';
				
			?>
			</div>
		</div>
		
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
		
	</body>
</html>

