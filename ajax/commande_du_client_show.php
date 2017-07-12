<!DOCTYE html>
	<html>
	<head>
		<title> Event haiti </title>
		<link media="all" rel="stylesheet" type="text/css" href="../css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body>
	
			<?php 
			
				session_start();
				include('connexion.php');		
				$seldetails = $bdd -> prepare ("SELECT * FROM detailscommande, articles , commande, client WHERE articles.ID_articles= detailscommande.articles AND detailscommande.commande = commande.ID_commande AND commande.ID_commande=detailscommande.commande AND commande.ID_commande=? AND commande.client=client.ID_client ");
			 	$seldetails -> execute (array($_POST['da'])); 
				$v = $seldetails -> rowCount();
					if($v)
					{
						
						echo'
						<div id="table_content">
							<div class="table">
								<div class="logo">
									<img src="../img/logst.png"/>
								</div>
								
								<div class="adresse">
									Laboule 11 <br/> Complexe Guillaume
								</div
								<div class="codeCommande"> 
									 Tel: (509)2209-5929
								</div>
								
								<table width="100%">
								
								<tr class="entete">
									<td width="20%"> Article</td>
									<td width="40%"> Description</td>
									<td> Prix unitaire</td>
									<td align="center"> Quantite</td>
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
									<td>'.$d['designation'].' </td>
									<td> '.$d['description'].' </td>
									<td> '.$d['prix'].' Gdes</td>
									<td align="center">'.$d['quantite'].' </td>
									<td> '.$montantLigne.' Gdes</td>
								</tr>
								
								<div class="leclient">
									'.$d['nomComplet'].'
								</div>
								
							';
							$id_commande = $d['ID_commande'];
							
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
						<div class="imprimer">
						<table> 
							<tr>
								<td><img src="../img/Print-25.png"/></td>
								<td><a href="../ajax/print_commande_client_one.php?lecommande='.$id_commande.'">Imprimer</a></td>
							</tr>
						</table>
						</div>
						<div class="imprimer">
							<table> 
								<tr>
									<td><img src="../img/Left-25.png"/></td>
									<td><a href="../application.php">Retour</a></td>
								</tr>
							</table>
						</div>
						
						</div>
					</div>';
					}
					else
					{
						echo'
						Il y aucune commande pour ce client<p>
						<div class="imprimer">
						<table> 
							<tr>
								<td><img src="img/Left-25.png"/></td>
								<td><a href="../application.php">Retour</a></td>
							</tr>
						</table>
						</div>
						'; 
					}
			

			?>
			
			</div>
	</body>
</html>
<script src="../js/jquery.js" type="text/javascript"></script>
<script src="../js/main.js" type="text/javascript"></script>
	

