<!DOCTYE html>
<html>
	<head>
		<title> Dry Cleaning</title>
		<link media="all" rel="stylesheet" type="text/css" href="../css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body onload="print();">
	<?php 
	
	session_start();
	include('connexion.php');
	if($_POST['jour'])
	{
		$seldetails = $bdd -> prepare ("SELECT *  FROM commande , articles, detailscommande , client WHERE  DATE(dateCommande)=? AND commande.ID_commande=detailscommande.commande AND articles.ID_articles = detailscommande.articles AND client.ID_client= commande.client");
		$seldetails -> execute (array(htmlspecialchars($_POST['jour']))); 
		$v = $seldetails -> rowCount();

		if($v>0)
		{
			echo'
					<div class="codeCommande"> 
						Adresse: Laboule 11 <br/>Complexe guillaume
					</div>
					<div class="codeCommande"> 
						 Tel: (509)2209-5929
					</div>
					<div class="tableprint">
						<div class="logo">
							<img src="../img/logst.png"/>
						</div>
						<table width="70%">
						
						<tr class="head">
							
							<td width="60%"> Article</td>
							<td> Prix unitaire</td>
							<td> Quantite</td>
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
							<td>'.$d['designation'].'</td>
							
							<td> '.$d['prix'].' Gdes </td>
							<td>'.$d['quantite'].' </td>
							<td> '.$montantLigne.' Gdes</td>
						</tr>
						
						';
						$somme += $montantLigne;
						
						$dateCommande = $d['dateCommande'];
					} 
					
					echo'
					
						<div class="codeClient"> 
							<div class="co"> 
								Le:'.$dateCommande .'
							</div>
						</div>
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
							<td colspan="4"> </td>
						</tr>
						
						<tr>
							<td colspan="2"></td>
							<td colspan=""> Total final</td>
		
							<td  >'.$totalfinal.' Gdes</td>
						</tr>
					
					</table>
					';
					
					echo'	
				
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
		else
		{
			echo'	
				Il y aucune rapport disponible<p>
				<div class="imprimer">
					<table> 
						<tr>
							<td><a href="../application.php">
							<img src="../img/Left-25.png"/></a></td>
							<td><a href="../application.php">Retour</a></td>
						</tr>
					</table>
				</div>
				';
		}
	}
	elseif($_POST['semaine'])
	{
		
		$coupersemaine =  explode("W",$_POST['semaine']);
		
		$seldetails = $bdd -> prepare ("SELECT *  FROM commande , articles, detailscommande , client WHERE WEEKOFYEAR(dateCommande)=? AND commande.ID_commande=detailscommande.commande AND articles.ID_articles = detailscommande.articles AND client.ID_client= commande.client");
		
		$seldetails -> execute (array(htmlspecialchars($coupersemaine[1]))); 
		$v = $seldetails -> rowCount();

		if($v>0){
			
			echo'
					
					<div class="codeCommande"> 
						Adresse: Laboule 11 <br/>Complexe guillaume
					</div>
					<div class="codeCommande"> 
						 Tel: (509)2209-5929
					</div>
					<div class="tableprint">
						<div class="logo">
							<img src="../img/logst.png"/>
						</div>
						<table width="70%">
						
						<tr class="head">
							
							<td width="60%"> Article</td>
							<td> Prix unitaire</td>
							<td> Quantite</td>
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
							<td>'.$d['designation'].'</td>
							
							<td> '.$d['prix'].' Gdes </td>
							<td>'.$d['quantite'].' </td>
							<td> '.$montantLigne.' Gdes</td>
						</tr>
						
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
							<td colspan="4"> </td>
						</tr>
						
						<tr>
							<td colspan="2"></td>
							<td colspan=""> Total final</td>
		
							<td  >'.$totalfinal.' Gdes</td>
						</tr>
					
					</table>
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
			else
			{
				
				echo'	
				Il y aucune rapport disponible<p>
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
	}
	elseif($_POST['mois'])
	{
		$coupermois =  explode("-" , $_POST['mois']);
		$seldetails = $bdd -> prepare ("SELECT *  FROM commande , articles, detailscommande , client WHERE  MONTH(dateCommande)=? AND commande.ID_commande=detailscommande.commande AND articles.ID_articles = detailscommande.articles AND client.ID_client= commande.client");
		
		$seldetails -> execute (array(htmlspecialchars($coupermois[1]))); 
		$v = $seldetails -> rowCount();

		if($v>0)
		{
			echo'
					<div class="codeCommande"> 
						Adresse: Laboule 11 <br/>Complexe guillaume
					</div>
					<div class="codeCommande"> 
						 Tel: (509)2209-5929
					</div>
					<div class="tableprint">
						<div class="logo">
							<img src="../img/logst.png"/>
						</div>
						<table width="70%">
						
						<tr class="head">
							
							<td width="60%"> Article</td>
							<td> Prix unitaire</td>
							<td> Quantite</td>
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
							<td>'.$d['designation'].'</td>
							
							<td> '.$d['prix'].' Gdes </td>
							<td>'.$d['quantite'].' </td>
							<td> '.$montantLigne.' Gdes</td>
						</tr>
						<div class="ladate">
							le:'.$d['dateCommande'].'	
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
					$pc = $somme * 1;
					$totalfinal = $somme + $pc;
					
					echo'
				
						<tr>
							<td colspan="4"> </td>
						</tr>
					
						<tr>
							<td colspan="2"></td>
							<td colspan=""> Total final</td>
		
							<td  >'.$totalfinal.' Gdes</td>
						</tr>
					
					</table>
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
			else
			{
				echo'	
				Il y aucune rapport disponible<p>
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
	}
	elseif($_POST['annee'])
	{
		$seldetails = $bdd -> prepare ("SELECT *  FROM commande , articles, detailscommande , client WHERE  YEAR(dateCommande)=? AND commande.ID_commande=detailscommande.commande AND articles.ID_articles = detailscommande.articles AND client.ID_client= commande.client");
		$seldetails -> execute (array(htmlspecialchars($_POST['annee']))); 
		$v = $seldetails -> rowCount();

		if($v>0){
			echo'
					<div class="codeCommande"> 
						Adresse: Laboule 11 <br/>Complexe Guillaume
					</div>
					<div class="codeCommande"> 
						 Tel: (509)2209-5929
					</div>
					<div class="tableprint">
						<div class="logo">
							<img src="../img/logst.png"/>
						</div>
						<table width="70%">
						
						<tr class="head">
							
							<td width="60%"> Article</td>
							<td> Prix unitaire</td>
							<td> Quantite</td>
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
							<td>'.$d['designation'].'</td>
							
							<td> '.$d['prix'].' Gdes </td>
							<td>'.$d['quantite'].' </td>
							<td> '.$montantLigne.' Gdes</td>
						</tr>
						<div class="ladate">
							Le:'.$d['dateCommande'].'	
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
							<td colspan="4"> </td>
						</tr>
						
						<tr >
							<td colspan="2"> </td>
							<td class="total"> Total</td>
							<td class="total" >'.$somme.' Gdes</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td> TCA 10%</td>
							<td> '.$pc.' Gdes</td>
							
						</tr>
						<tr>
						
						<tr>
							<td colspan="2"></td>
							<td colspan=""> Total final</td>
		
							<td  >'.$totalfinal.' Gdes</td>
						</tr>
					
					</table>
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
			else
			{						
				echo'	
				Il y aucune rapport disponible<p>
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
	}
	else
	{
		echo'	
				
				<div class="imprimer">
					<table> 
						<tr>
							<td><img src="../img/Left-25.png"/></td>
							<td>Les champs sont vides</td>
							<td><a href="../application.php">Retour</a></td>
						</tr>
					</table>
				</div>
				';
	}	
?>


<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script>
	$("#del_for_detail").click(function(e)
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
		});
</script>