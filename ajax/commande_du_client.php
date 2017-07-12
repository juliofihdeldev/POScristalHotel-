<!DOCTYE html>
	<html>
	<head>
		<title> POSCristalHotel </title>
		<link media="all" rel="stylesheet" type="text/css" href="../css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body>
		<header>
			<div class="classlogo">

			</div>
			
		</header>
		
		<div class="panier">
			
			<?php 
			
				session_start();
				include('connexion.php');
				
				$selcommande = $bdd -> prepare ("SELECT * FROM commande, client WHERE commande.client=? AND commande.client=client.ID_client ");
			 	$selcommande -> execute (array($_GET['da'])); 
				$vcommande = $selcommande -> rowCount();
				if($vcommande>0)
				{
					echo
					'
					<div class="content_table_left">
					<div class="titreview2">
						Liste de commande
					</div>
					<table>
						<tr class="entete">	
							<td> No commande</td>
							<td> NO client</td>
							<td>Etat de commande</td>
							<td> dateCommande</td>
							
							<td></td>
						</tr>
					';
					
					while ($dcom = $selcommande -> fetch())
					{
						
						echo'	
								<tr  class="forClick" id="'.$dcom['ID_commande'].'"  name="'.$dcom['client'].'">
									<td>SJP-C-'.$dcom['ID_commande'].' </td>
									<td>STJ-00'.$dcom['client'].'P </td>
									<td>'.$dcom['statut_commande'].' </td>
									<td>'.$dcom['dateCommande'].' </td>
									<td>
										<a href="commande_du_client.php?da='.$dcom['ID_commande'].'" class="voir_le_commande" name="'.$dcom['ID_commande'].'">
											<img src="../img/Visible-26.png"/> 
										</a>
									</td>
								</tr>
							';
					}
					echo'
					</table>
					</div>
					';
				}
				else
				{
					echo'No commande';
				}
					
				$seldetails = $bdd -> prepare ("SELECT * FROM detailscommande, chambres , commande, client WHERE chambres.ID= detailscommande.chambres AND detailscommande.commande = commande.ID_commande AND commande.ID_commande=detailscommande.commande AND commande.client=? AND commande.client=client.ID_client ");
			 	$seldetails -> execute (array($_GET['da'])); 
				$v = $seldetails -> rowCount();
					if($v>0)
					{
						
						echo'
						<div id="table_content_general">
						<div id="table_content">
							<div class="table">
								<div class="logo">
									<img src="../img/logst.png"/>
								</div>
								
								<div class="adresse">
									Laboule 11 <br/> Complexe Guillaume
								</div>
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
									<td  align="center" >'.$d['quantite'].' </td>
									<td> '.$montantLigne.' Gdes</td>
								</tr>
								
								<div class="leclient">
									'.$d['nomComplet'].'
								</div>
								
							';
							$id_client = $d['ID_client'];
							
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
								<td><a href="../ajax/print_commande_client.php?leclient='.$id_client.'">Imprimer</a></td>
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
								<td><img src="../img/Left-25.png"/></td>
								<td><a href="../application.php">Retour</a></td>
							</tr>
						</table>
						</div>
						'; 
					}
			

			?>
			
			</div>
			<div class="loading">
				<div class="images">
					<img src="img/loading.gif"/>
					<p>Waiting</p>
				</div>
		</div>
	</body>
</html>
<script src="../js/jquery.js" type="text/javascript"></script>

<script>
$(".voir_le_commande").click(function(e)
{
	$('.loading').show();
	var da = $(this).attr('name');	
	e.preventDefault();
	
	$.ajax(
	{
		url: 'commande_du_client_show.php',
		type: 'post',
		data: 'da='+da,
		dataType: 'html',
		success: function(c, r)
		{
			$("#table_content_general").html(c)
			$('.loading').hide();
		},
		error: function(c, r, e)
		{
			/* alert('error'); */
		}
	});
})
</script>
	

