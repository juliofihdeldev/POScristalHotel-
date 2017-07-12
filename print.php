<!DOCTYE html>
<html>
	<head>
		<title> POSCristal Hotel</title>
		<link media="all" rel="stylesheet" type="text/css" href="css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body onload="print();">
	<?php 
	session_start();
	include('ajax/connexion.php');
	/* finir la commande quand on click sur terminer */
	$finir = $bdd -> prepare ("UPDATE commande set effectif=? WHERE ID_commande=?");
	$finir -> execute (array('oui',$_SESSION['commmade'])); 

		$seldetails = $bdd -> prepare ("SELECT *  FROM client, detailscommande, chambres , commande WHERE  chambres.ID= detailscommande.chambres AND commande.ID_commande=? AND detailscommande.commande= commande.ID_commande AND commande.ID_commande=detailscommande.commande AND client.ID_client= commande.client");
		$seldetails -> execute (array($_SESSION['commmade'])); 
		$v = $seldetails -> rowCount();

			if($v>0){
				echo'
					<div class="codeCommande"> 
						No commade CH-C-'.$_SESSION['commmade'].'
					</div>
					<div class="codeCommande"> 
						Laboule 11 <br/>Complexe Guillaume
					</div>
					<div class="codeCommande"> 
						 Tel: (509)2209-5929
					</div>
					<div class="tableImpression">
						<div class="logo">
							<img src="img/logo.png"/>
						</div>
						<table width="70%">
						
						<tr class="head">
							
							<td width="20%"> Chambres</td>
							<td width="40%"> Description</td>
							<td> Prix </td>
							<td align="center"> Qte</td>
							<td>Total </td>
							<td></td>
						</tr>
					';
					$somme = 0;
					while ($d = $seldetails-> fetch())
					{
					$montantLigne= $d['prix'] * $d['quantite'];
					echo'	
						<tr>
							<td>'.$d['designation'].' </td>
							<td> '.$d['description'].' </td>
							<td> '.$d['prix'].' Gdes </td>
							<td align="center">'.$d['quantite'].' </td>
							<td> '.$montantLigne.' Gdes</td>
						</tr>
						<div class="ladate">
							le:'.$d['dateCommande'].'	
						</div>
						<div class="leclient">
							'.$d['nomComplet'].'
						</div>
						';
						$somme += $montantLigne;
					} 
					echo'
					
					
						<div class="codeClient"> 
							<div class="co"> 
								Empl:'.$_SESSION['pseudo'].'
							</div>
						</div>
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
					';
			}
		$selcommade = $bdd -> prepare("SELECT * FROM commande  WHERE commande.ID_commande =?");
		$selcommade -> execute (array($_SESSION['commmade']));
		$v = $selcommade -> rowCount();
		while($d = $selcommade->fetch()){
			echo
			'
						<p>
							Remaques:
							'.$d['memo'].'
							<hr>
						</p>
						
						<p>
							Date sortir:
							'.$d['exporation'].'
							<hr>
						</p>
					</form>
				</div>
			';
		}
		echo'
		<div class="nb">
			<p> 
				Cette doit etre liberer a l\'heure prevue sur la fiche 
			</p>
		</div>
		<hr>
		<div class="imprimer">
			<table> 
				<tr>
					<td><img src="img/Left-25.png"/></td>
					<td><a href="application.php">Retour</a></td>
				</tr>
				<tr>
					<td><img src="img/Print-25.png"/></td>
					<td><a href="print.php">Print</a></td>
				</tr>
			</table>
		</div>
		
	';			
?>



<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script>
	/* $("#del_for_detail").click(function(e)
		{
			var da = $(this).attr('class');	
			e.preventDefault();
		
			$.ajax(
			{
				url: 'del_artic_del_commande.php',
				type: 'post',
				data: 'da='+da,
				dataType: 'html',
				success: function(c, r)
				{
					
					$(".detcommande").html(c)
				},
				error: function(c, r, e)
				{
					alert('error');
				}
			});
		}); */
</script>