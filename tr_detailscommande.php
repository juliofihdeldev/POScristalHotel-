	
	<?php 
	
	session_start();
	include('ajax/connexion.php');
	$ins = $bdd -> prepare ("insert into detailscommande(commande, chambres, quantite,description,dateEntrer,dateSortie)values(?,?,?,?,?,?)");
	$ins -> execute (array($_SESSION['commmade'],$_POST['articles'],$_POST['quantite'],$_POST['description'],
	$_POST['dateEntrer'],$_POST['dateSortie'])); 
	
	$vi = $ins -> rowCount();
	if($vi>0)
	{
		$seldetails = $bdd -> prepare ("SELECT * FROM detailscommande, chambres , commande where commande.statut_commande=? AND chambres.ID= detailscommande.chambres AND commande.ID_commande=? AND detailscommande.commande= commande.ID_commande AND commande.ID_commande=detailscommande.commande ");
		$seldetails -> execute (array('en cours',$_SESSION['commmade'])); 
		$v = $seldetails -> rowCount();
			if($v>0)
			{
				echo'
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
					';
					$somme = 0;
					while ($d = $seldetails-> fetch())
					{
						$montantLigne= $d['prix'] * $d['quantite'];
						
						echo'	
							
						<tr>
							<td>'.$d['designation'].'</td>
							<td> '.$d['dateEntrer'].' </td>
							<td> '.$d['dateSortie'].' </td>
							<td> '.$d['prix'].' Gdes</td>
							<td>'.$d['quantite'].' </td>
							<td> '.$montantLigne.' Gdes</td>
							<td> 
								<div class="del_for_detail" name="'.$d['description'].'" id="'.$d['chambres'].'"> 
									<img src="img/Delete-26.png"/>
								</div>
							</td>
						</tr>
						';
						$somme += $montantLigne;
						$datecommande = $d['dateCommande'];
					} 
					echo
					'
						<div class="codeClient"> 
							Empl :'.$_SESSION['pseudo'].'
						</div>
						
						<div class="codeClient"> 
							Le:'.$datecommande.'
						</div>
						
					';
					

					echo'</table>';

					$pc = $somme * 0;
					$totalfinal = $somme + $pc;
					
					echo'
					<table width="100%">
						<tr> 
							<td colspan="5" width="60%"> </td>
						</tr>
						
					
						<tr>
							<td colspan="5"></td>
							<td> Total final </td>
			
							<td> '.$totalfinal.' Gdes </td>
						</tr>
						 
						<tr> 
						<td></td>
							
						</tr>
					</table>
						<td>
							<div class="print">
								<a href="print.php" > Toucher et Imprimer</a>
							</div>
						</td>
					</div>
					';
			}
	}
	
?>
<!--<div class="memo">
	<div class="form_memo">
		<form id="addmemo" method="post" action="tr_detailscommande.php">
			Remarques:
			<p>
				<textarea name="memo"></textarea>
				
			</p>
			<p>
				Date expiration<br/>
				<input type="date" name="exporation" class="datexportion" required><br/>
				<input type="submit" value="Ajouter">
			</p>
		</form>
	</div>
</div>
-->
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script>
	
		$("#addmemo").submit(function(e)
		{
			var am = $(this).serialize();
			e.preventDefault();
			
			$.ajax(
			{
				url: 'ajouter_memo.php',
				type: 'post',
				data:am,
				dataType: 'html',
				success: function(c, r)
				{
					
					$(".memo").html(c)
				},
				error: function(c, r, e)
				{
					alert('error');
				}
			});
		});
</script>