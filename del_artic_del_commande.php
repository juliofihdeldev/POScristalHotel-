<?php
	session_start();
	include('ajax/connexion.php');
			$sel = $bdd -> prepare ("SELECT * FROM detailscommande, chambres , commande WHERE detailscommande.commande=? 
			AND detailscommande.description=? AND detailscommande.chambres=?  
			AND chambres.ID = detailscommande.chambres");		
			$sel -> execute (array($_SESSION['commmade'],$_POST['des'],$_POST['da'])); 
			$vsel= $sel -> rowCount();
			if($vsel>0)
			{
				$d = $sel -> fetch();
				if($d['quantite']>1)
				{
					$selret = $bdd -> prepare ("update detailscommande, chambres , commande set detailscommande.quantite=? WHERE  chambres.ID = detailscommande.chambres and commande.ID_commande=detailscommande.commande and commande.statut_commande = ? and detailscommande.commande=? and detailscommande.chambres=? ");
					$selret -> execute (array($d['quantite']-1, 'en cours', $_SESSION['commmade'], $_POST['da'] ));
					$vret = $selret -> rowCount();
				}
				else
				{
					$seldel = $bdd -> prepare ("DELETE FROM detailscommande WHERE detailscommande.chambres=? AND detailscommande.description=? 
					AND detailscommande.commande=? ");
					$seldel -> execute (array($_POST['da'],$_POST['des'], $_SESSION['commmade']));
					$vdel = $seldel -> rowCount();
					if($vdel>0)
					{
						
					}
				}
			}
			else{
				echo'';
			}
			echo'
			<div class="formadd">
				<form id="tr_det_comm" method="post" action="tr_detailscommande.php">
					<p>
						Quantite<br/>
						<input type="number" min="1" name="quantite" required/>
					</p>
				';	$selclient = $bdd -> query ("SELECT * FROM  chambres where statut <> 1 ");
						$v = $selclient -> rowCount();
						if($v>0)
							
						{
							echo' <p> Choisissez une chambre <br/>
							<select name="articles" required>';
							
							while($d = $selclient -> fetch())
							{
								echo
								'
									<option value="'.$d['ID'].'"> No CH'.$d['ID'].'  '.$d['designation'].' -> '.$d['prix'].'Gdes  </option>
								';
							}
							echo'<select> </p>';
							
						}	
				
				echo'
					
				<div class="otherType">
					<p>
						Date entrer<br/>
						<input type="datetime-local"  name="dateEntrer" placeholder="" required/>
						
					</p>
					<p>
						Date Sortir<br/>
						<input type="datetime-local"  name="dateSortie" " required/>
					
					</p>
					<p>
						Description<br/>
						<input type="text"  name="description" placeholder="Couleur, Marque ,etc ..." required/>
					</p>
				</div>
				<input type="submit" value="Ajouter"/>
				
			</form>
		</div>
		
		<div class="content_det_commande">
			';
			$seldetails = $bdd -> prepare ("SELECT * FROM detailscommande, chambres , commande where commande.statut_commande=? AND chambres.ID= detailscommande.chambres AND commande.ID_commande=? AND detailscommande.commande= commande.ID_commande AND commande.ID_commande=detailscommande.commande ");
			$seldetails -> execute (array('en cours',$_SESSION['commmade'])); 
			$v = $seldetails -> rowCount();

			if($v>0)
			{
				echo'
					<div class="codeCommande"> 
						No commade CH-C-'.$_SESSION['commmade'].'
					</div>
					<div class="content_det_commande">
					<div class="tableprint">
						<div class="logo">
							<img src="img/logo.png"/>
							<p>St marc Complexe Guillaume</p>
						</div>
						<table width="100%">
					
							<tr class="head">
								<td width="20%"> Chambres</td>
								<td width="40%"> Description</td>
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
							<td>'.$d['des'].'</td>
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
					}
										
					$pc = $somme *0;
					$totalfinal = $somme + $pc;
					echo'</table>';
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
							<td>
								<div class="print">
									<a href="print.php" >Toucher et Imprimer</a>
								</div>
							</td>
						</tr>
					</table>
					';
			
			}else
			{
				echo'
					
						<div class="tableprint">
							<div class="logo">
								<img src="img/logo.png"/>
								<p>St marc </p>
							</div>
							<table width="100%">
						
								<tr class="head">
									<td width="20%"> Chambres</td>
									<td width="40%"> Description</td>
									<td> Prix </td>
									<td> Qte</td>
									<td>Total </td>
									
								</tr>
							</table>
					
				';
			}
			echo'</div>';
		?>
	

	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	<script>
	
		$("#tr_det_comm").submit(function(e)
			{
				var da = $(this).serialize();	
				e.preventDefault();
				
				$.ajax(
				{
					url: 'tr_detailscommande.php',
					type: 'post',
					data:da,
					dataType: 'html',
					success: function(c, r)
					{
						
						$(".content_det_commande").html(c)
					},
					error: function(c, r, e)
					{
						alert('error');
					}
				});
			});
		
</script>

</body>
</html>
