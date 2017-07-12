<?php
	session_start();
	require('connexion.php');
	global $montanttaxe;
	global $totalnet;
	if($_POST['whatInsert'] == 'ajoutmontantvente')
	{
		$ins = $bdd -> prepare ("INSERT INTO montantvendu(montant, ladate ,editerPar) values(?,?,?)");
		$ins -> execute (array($_POST['montant'],$_POST['dateversement'],$_SESSION['ID_user'])) ;
		$vIns = $ins -> rowCount();
		if ($vIns>0)
		{
			echo'	
			<div class="reussi">
					<span> <img src="img/dry/Visible-26.png"/ ></span>
					<span> Transaction reuissi</span>
					<a href="application.php">
						<div class="ok">
								D\'accord
						</div>
					</div>
			</div>';
		}
		else
		{		
			echo ' error';
		}
	}
	else if ($_POST['whatInsert'] == 'ajoutfournisseur')
	{
		$ins = $bdd -> prepare ("INSERT INTO fournisseur(designation, adresse,dataAjout) values(?,?,now())");
		$ins -> execute (array($_POST['designation'],$_POST['adresse'])) ;
		$vIns = $ins -> rowCount();
		if ($vIns>0)
		{
			echo'	
			<div class="reussi">
					<span> <img src="img/dry/Visible-26.png"/ ></span>
					<span> Transaction reuissi</span>
					<a href="application.php">
						<div class="ok">
								D\'accord
						</div>
					</div>
			</div>';
		}
		else
		{		
			echo ' error';
		}
	}
	else if($_POST['whatInsert'] == 'ajouterClient')
	{
		$ins = $bdd -> prepare ("INSERT INTO client(nomComplet,cinOrnif,telephone, adresse,email,dateAjout) values(?,?,?,?,?,now())");
		$ins -> execute (array($_POST['nomComplet'],$_POST['cin_nif'],$_POST['telephone'],$_POST['adresse'],$_POST['email'])) ;
		$vIns = $ins -> rowCount();
		if ($vIns>0)
		{
			echo'	
			<div class="reussi">
					<span> <img src="img/dry/Visible-26.png"/ ></span>
					<span> Transaction reuissi</span>
					<a href="application.php">
						<div class="ok">
								D\'accord
						</div>
					</div>
			</div>';
		}
		else
		{		
			echo ' error';
		}
	}
	else if($_POST['whatInsert'] == 'addarticle')
	{
		$ins = $bdd -> prepare ("INSERT INTO articles(designation,prix)values(?,?)");
		$ins -> execute (array($_POST['designation'],$_POST['prix']));
		$vIns= $ins -> rowCount();
		if ($vIns>0)
		{
			echo'	
			<div class="reussi">
					<span> <img src="img/dry/Visible-26.png"/ ></span>
					<span> Transaction reuissi</span>
					<a href="application.php">
						<div class="ok">
								D\'accord
						</div>
					</div>
			</div>';
		}
		else
		{		
			echo ' error';
		}
	}
	else if($_POST['whatInsert'] == 'viewArticle')
	{
		$ins = $bdd -> query ("select * from chambres");
		$vIns = $ins -> rowCount();
		if ($vIns>0)
		{
			echo'
					<div class="titreview"> Chambres</div>
						<table id="menuView">
							
							<tr class="entente">
								<td>#</td>
								
								<td> Code chambres</td>
								<td> Designation</td>
								<td> Prix</td>
							
							</tr>';
						$no=0;
					if($_SESSION['fonction'] =='admin')
					{
						while ($d = $ins-> fetch())
						{
							$no = $no + 1;
							echo'	
					
								<tr  class="modifierArticle"  name="'.$d['ID'].'">
									<td> '.$no.'.</td>
									<td> CH-C'.$d['ID'].'P </td>
									<td> '.$d['designation'].' </td>
									<td> '.$d['prix'].' Goudes</td>
								</tr>
								
							';
						}
					}
					else
					{
						while ($d = $ins-> fetch())
						{
							$no = $no + 1;
							echo'	
					
								<tr name="'.$d['ID'].'">
									<td> '.$no.'.</td>
									<td> CH-C'.$d['ID'].' </td>
									<td> '.$d['designation'].' </td>
									<td> '.$d['prix'].' Goudes</td>
								</tr>
								
							';
						}
					}
				 
		}
		else
		{		
			echo'
					 <div class="reussi">
						<span> <img src="img/dry/Visible-26.png"/ ></span>
						<span>Aucun article </span>
						<a href="application.php">
							<div class="ok">
								Retour
							</div>
						</div>
					</div>';
		}
	}
	else if($_POST['whatInsert'] == 'viewClient')
	{
		$ins = $bdd -> query ("select * from client");
		$vIns = $ins -> rowCount();
		if ($vIns>0)
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
			
			while ($d = $ins-> fetch())
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
						<td><a href="ajax/commande_du_client.php?da='.$d['ID_client'].'"> <img src="img/Visible-26.png"></a></td>
							
						';
						
						if($_SESSION['fonction'] =='admin')
						{
							echo'
							<td><a href="ajax/delClient.php?da='.$d['ID_client'].'">  <img src="img/Delete-26.png"></a></td>
							';
						}
						
						
				
				
				'	</tr>';
			}
			echo'
				</table>
			
				<div class="search2">
					<form method="post" action="fu.v" id="abc"> 
						<input type="search" name="leClient" id="client"p laceholder="Recherche client"/>
						<input type="submit" value="Find"/>
					</form>
				</div>
			';
		}
		else
		{		
			echo'
			 <div class="reussi">
				<span> <img src="img/dry/Visible-26.png"/ ></span>
				<span>Pas de Client</span>
				<a href="application.php">
					<div class="ok">
						Retour
					</div>
				</div>
			</div>';
		}
	}
	else if($_POST['whatInsert'] == 'viewCommande')
	{
		$seldetails = $bdd -> prepare ("SELECT * FROM  commande WHERE commande.statut_commande =? ");
				$seldetails -> execute (array('remise'));
				$v = $seldetails -> rowCount();
				if($v>0){
					echo'
						<div class="titreview"> Mes commandes</div>
						<table id="menuView">
							
							<tr class="entente">
								<td>#</td>
								
								<td> Code Client</td>
								<td> No commande</td>
								<td> Etat de commande</td>
								<td> Date</td>
								
						
							</tr>';
							$no=0;
					while ($d = $seldetails-> fetch())
					{
						$no = $no + 1;
						echo'	
				
							<tr  class="forClick" id="'.$d['ID_commande'].'"  name="'.$d['client'].'">
								<td>'.$no.'.</td>
								<td>STJ-00'.$d['client'].'P </td>
								<td>SJP-C-'.$d['ID_commande'].'  </td>

								<td>'.$d['statut_commande'].' </td>
								<td>'.$d['dateCommande'].' </td>
								';
								
								if($_SESSION['fonction'] =='admin')
								{
									echo'
									<td>
									<a href="ajax/delCommande.php?da='.$d['ID_commande'].'">  <img src="img/Delete-26.png"></a>
									</td>
									';
								}else
								{
									echo $_SESSION['fonction'];
								}
								
								
								echo'
								</tr>
							</tr>
							
						';
					} 
						echo'

							
						</table>
					</div>
				</div>
				 
				</div>';
				
				 }
				 else
				 {
					 echo'
					 <div class="reussi">
						<span> <img src="img/dry/Visible-26.png"/ ></span>
						<span>Pas de Commande remise</span>
						<a href="application.php">
							<div class="ok">
								Retour
							</div>
						</div>
					</div>';
				 }
	}
	else if($_POST['whatInsert'] == 'viewUsers')
	{
		$ins = $bdd -> query ("select * from users ");
		$vIns = $ins -> rowCount();
		if ($vIns>0)
		{
			echo'
				<div class="titreview"> Mes Utilisateurs</div>
					<table id="menuView">
						
						<tr class="entente">
							<td>#</td>
							
							<td> Code</td>
							<td> Nom</td>
							<td> Prénom</td>
							<td> Pseudo</td>
							<td> Password</td>
							<td> Cin or Nif</td>
							<td> Fonction</td>
							
						</tr>';
						$no=0;
				while ($d = $ins-> fetch())
				{
					$no = $no + 1;
					echo'	
			
						<tr  class=""  name="'.$d['ID_users'].'">
							<td>'.$no.'.</td>
							<td>STJ-00U'.$d['ID_users'].'P </td>
							<td>'.$d['nom'].' </td>
							<td>'.$d['prenom'].' </td>
							<td>'.$d['pseudo'].' </td>
							<td>'.$d['password'].' </td>
							<td>'.$d['cinOrnif'].' </td>
							<td>'.$d['fonction'].' </td>
							';
							if($_SESSION['fonction'] =='admin')
								{
									echo'
									<td>
										<a href="ajax/del_users.php?theuser='.$d['ID_users'].'">  <img src="img/Delete-26.png">
										</a>
									</td>
									';
								}
									else
								{
									echo $_SESSION['fonction'];
								}
								'
						</tr>
						
					';
				} 
		}
		
	}
	else if($_POST['whatInsert'] == 'viewRetrait')
	{
		$ins = $bdd -> query ("select * from retrait ");
		$vIns = $ins -> rowCount();
		if ($vIns>0)
		{
			echo'
				<div class="titreview"> Mes retrait</div>
					<table id="menuView">
						
						<tr class="entente">
							<td>#</td>
							<td> Motif</td>
							<td> Montant</td>
							<td> Date du retrait</td>
						</tr>';
						$no=0;
				while ($d = $ins-> fetch())
				{
					$no = $no + 1;
					echo'	
			
						<tr  class=""  name="'.$d['ID_retrait'].'">
							<td>'.$no.'.</td>
							<td>'.$d['motif'].'P </td>
							<td>'.$d['retrait'].' Gdes</td>
							<td>'.$d['date_retrait'].' </td>
						</tr>
						
					';
				} 
		}
		$montant = $bdd -> query ("select SUM(retrait)  AS le_retrait_total from retrait ");
		$vmontant = $montant -> rowCount();
		if($vmontant)
		echo'
				<tr>
				<td colspan="1"></td>
				<td colspan="1"> Montant total des retraits</td>';
		{
			while($da = $montant-> fetch()){
				echo 
				'<td>
					'.$da['le_retrait_total'].' Gdes
				</td>
				';
			}
			
		}
		echo'<tr>
				<table>';
		
	}
	else if($_POST['whatInsert'] == 'viewAnnonce')
	{
		$selqte = $bdd -> prepare ("SELECT * FROM commande WHERE dayofyear(exporation) - dayofyear(NOW()) <= 3
		AND commande.statut_commande=? ");
		$selqte -> execute (array('en cours')); 
		$valert = $selqte -> rowCount();
		if($valert>0)
		{
			echo'<table>
			<div class="titreview"> Mes commandes</div>
				<table id="menuView">
					
					<tr class="entente">
						<td>#</td>
						
						<td> Code Client</td>
						<td> No commande</td>
						<td> Etat de commande</td>
						<td> Date commande</td>
						<td> Date expiration</td>
					</tr>
				';
			$no=0;
			while($d =  $selqte ->fetch())
			{
				$no = $no + 1;
				echo'
					<tr  class="forClick" id="'.$d['ID_commande'].'"  name="'.$d['client'].'">
						<td>'.$no.'.</td>
						<td>STJ-00'.$d['client'].'P </td>
						<td>SJP-C-'.$d['ID_commande'].'  </td>

						<td>'.$d['statut_commande'].' </td>
						<td>'.$d['dateCommande'].' </td>
						<td>'.$d['exporation'].' </td>
						';
						
						if($_SESSION['fonction'] =='admin')
						{
							echo'
							<td>
							<a href="ajax/delCommande.php?da='.$d['ID_commande'].'">  <img src="img/Delete-26.png"></a>
							</td>
							';
						}else
						{
							echo $_SESSION['fonction'];
						}
						'
						</tr>
					</tr> 
				</table>';
			}
		}
		else
		{
			$qtecommande='0';
			?>
			<script>
					
				$('#modal').show();
				$('#modal .content').css({
					'width':'20%',
					'height':'150px',
					'margin-left':'30%',
					'margin-top':'2%'	
				});
			
			</script>
			<?php
			
			echo'	
			
				<div class="reussi">
					<table>
						<tr>
							<td>
							<span> <img src="img/quest.png"/ ></span>
							</td>
							<td>
							<span> Il y a pas de chambres qui devrait etre disponible pour l\'instant</span>
							</td>
						</tr>
					</table>
					<a href="application.php">
						<div class="ok">
								Fermer
						</div>
					
					</a>
				</div>
			
		';
		}
	}
	else
	{
		echo'options non definie';
	}
?>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	<script>
		$(".modifierArticle").click(function(e)
			{
				var da = $(this).attr('name');	
				e.preventDefault();
			
				$.ajax(
				{
					url: 'edit_articles.php',
					type: 'post',
					data: 'da='+da,
					dataType: 'html',
					success: function(c, r)
					{
						
						$("#modalsmall").show();
						$("#modalsmall .contentsmall .infosmall").html(c)
					},
					error: function(c, r, e)
					{
						alert('error');
					}
				});
			});
			
	/* 	$("#viexCommandeClient").click(function(e)
			{
				var da = $(this).attr('name');	
				e.preventDefault();
				$.ajax(
				{
					url: 'ajax/commande_du_client.php',
					type: 'post',
					data: 'da='+da,
					dataType: 'html',
					success: function(c, r)
					{
						
						$("#modal").show();
						$("#modal .content .info").html(c)
					},
					error: function(c, r, e)
					{
						alert('error');
					}
				});
			}); */
	</script>