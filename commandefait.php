<!DOCTYE html>
<html>
	<head>
		<title> POSCristal Hotel</title>
		<link media="all" rel="stylesheet" type="text/css" href="css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	
	<body>	
	
<!-- 	
	<div class="canvas1">
	
	</div> 
-->
<?php
		
	include('phpscripts/menu.php');
	include('ajax/connexion.php');
	include('phpscripts/fonctions.php');
		supprimerCommandeVide();
		supprimerCommandeNonTermniner();
		$selclient = $bdd -> query ("SELECT * FROM  commande order by ID_commande DESC ");
		$v = $selclient -> rowCount();
		if($v>0)
		{
			/* Elle en compte la dernier */
			$d = $selclient -> fetch();
			
			$seldetails = $bdd -> prepare ("SELECT * FROM  detailscommande WHERE commande =? ");
			$seldetails -> execute(array($d['ID_commande']));
			$ve = $seldetails-> rowCount();
			if($ve>0)
			{
				$_SESSION['commmade'] = $d['ID_commande']+1;	
			}
			else
			{
				$_SESSION['commmade'] = $d['ID_commande'];
			}		
		}
		else
		{
			$_SESSION['commmade']=1;
		}
	echo'
		<div class="detcommande">
		NOcommande:
		CH-C-'.$_SESSION['commmade'].'
		
		<form id="tr_form_add_commande" method="POST" action="tr_commande.php">';
		
			$selclient= $bdd -> query ("SELECT * FROM  client ");
			$v = $selclient -> rowCount();
			if($v>0)
			{
					
				echo'<p>Choisissez le Client <br/>';
				echo'<select name="client">';
				while($d = $selclient -> fetch()){
					echo
					'
						<option value="'.$d['ID_client'].'"> '.$d['nomComplet'].' </option>	
					';
				}
				echo'</select>
				</p>';
			}	
			

			echo'
			<input type="submit" value="Effectuer">
			</form>
			<div class="content_det_commande">
				<div class="tableprint">
					<div class="logo">
						<img src="img/logo.png"/>
						<p>Votre adresse</p>
					</div>
					<table width="100%">
				
						<tr class="">
							<td width="20%"> Chambres</td>
							<td width="20%"> Entrer</td>
							<td width="20%"> Sortir</td>
							<td> Prix </td>
							<td> Qte</td>
							<td>Total </td>
							
						</tr>
				</table>
			</div>
	</div>
	
	';
	?>
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	<script>
		$("#tr_form_add_commande").submit(function(e)
			{
				var da = $(this).serialize();	
				e.preventDefault();
			
				$.ajax(
				{
					url: 'tr_commande.php',
					type: 'post',
					data:da,
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