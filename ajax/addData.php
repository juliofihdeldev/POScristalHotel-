<?php
	session_start();
	require('connexion.php');
	global $montanttaxe;
	global $totalnet;
	
	if($_POST['whatInsert'] == 'ajouterClient')
	{
		$ins = $bdd -> prepare ("INSERT INTO client(nomComplet,cinOrnif,telephone, adresse,email,dateAjout) values(?,?,?,?,?,now())");
		$ins -> execute (array($_POST['nomComplet'],$_POST['cin_nif'],$_POST['telephone'],$_POST['adresse'],$_POST['email'])) ;
		$vIns = $ins -> rowCount();
		if ($vIns>0)
		{
			echo'	
			<div class="reussi">
				<table>
					<tr>
						<td>
							<img src="img/yes.jpg"/ >
						</td>
						<td>
							 Le client a été ajouter
						</td>
					</tr>
				</table>
				<a href="commandefait.php">
					<div class="ok">
						Terminer
					</div>
				</a>
			</div>
			';
		}
		else
		{		
			echo ' error';
		}
	}
	else if($_POST['whatInsert'] == 'addarticle')
	{
		
		/* $ins = $bdd -> prepare ("INSERT INTO articles(path,chambres)values(?,?)");
		$ins -> execute (array($_POST['designation'],$_POST['prix']));
		$vIns= $ins -> rowCount();
		 */
		
		$ins = $bdd -> prepare ("INSERT INTO chambres(designation,des,avantage,lit,size,prix)values(?,?,?,?,?,?)");
		$ins -> execute (array($_POST['designation'], $_POST['des'], $_POST['avantage'], $_POST['lit'],  $_POST['size'],$_POST['prix']));
		
		$vIns= $ins -> rowCount();
		if ($vIns>0)
		{
			echo'	
			<div class="reussi">
				<table>
					<tr>
						<td>
							 <img src="img/yes.jpg"/ >
						</td>
						<td>
							<span> Ajout effectuer
						</td>
					</tr>
				</table>
				<a href="application.php">
					<div class="ok">
							D\'accord
					</div>
				</a>
			</div>
			';
		}
		else
		{		
			echo ' error';
		}
	}
	else if($_POST['whatInsert'] == 'addusers')
	{
		$ins = $bdd -> prepare ("INSERT INTO users(nom,prenom,cinOrnif,pseudo,password,statut,fonction,date_ajout) values(?,?,?,?,?,?,?,now())");
		$ins -> execute (array($_POST['nom'],$_POST['prenom'],$_POST['cinOrnif'],$_POST['pseudo'],'123456','actif',$_POST['fonction']));
		$vIns = $ins -> rowCount();
		if ($vIns>0)
		{
			echo'	
			<div class="reussi">
				<table>
					<tr>
						<td>
							 <img src="img/yes.jpg"/ >
						</td>
						<td>
							<span> Ajout effectuer
						</td>
					</tr>
				</table>
				<a href="application.php">
					<div class="ok">
							D\'accord
					</div>
				</a>
			</div>
			';
		}
		else
		{		
			echo ' error';
		}
	}
	else if($_POST['whatInsert'] == 'ajouterCommande')
	{
		
		$selclient= $bdd -> query ("SELECT * FROM  client ");
		$v = $selclient -> rowCount();
		if ($v>0 )
		{
			echo'<select name="client">';
			while($d = $selpro -> fetch()){
				echo
				'
					<option value="'.$d['ID_client'].'"> '.$d['nom'].' '.$d['prenom'].' </option>	
				';
			}
			echo'</select>';
		}			
		
		$montantLigne = $selprodata['prixAchat'] * $_POST['quantite'];
		$insd = $bdd -> prepare ("INSERT INTO detailscommande (commande,produit,qte,montantLigne) values(?,?,?,?)");
		$insd -> execute (array($_SESSION['commande'],$_POST['produit'],$_POST['quantite'],$montantLigne));
		$vInsd = $insd -> rowCount();
	
			if ($vInsd>0)
			{
				$seldetails = $bdd -> prepare ("SELECT * FROM detailscommande, product , commande WHERE  product.ID_product = detailscommande.produit and commande.ID_commande=detailscommande.commande and detailscommande.commande=?");
				$seldetails -> execute (array($_SESSION['commande']));
				$v = $seldetails -> rowCount();
				
				/* requette de comptage */
				$rc = $bdd -> prepare("SELECT SUM(detailscommande.montantLigne) AS totale FROM detailscommande, product , commande WHERE product.ID_product = detailscommande.produit and commande.ID_commande=detailscommande.commande and detailscommande.commande=?");
				$rc -> execute (array($_SESSION['commande']));
				$drc = $rc-> fetch();
				 
				
					echo'<div class="Montableau">
							<table>
							<tr class="entente">
								<td>#</td>
								<td>Qte</td>
								<td>Unite de vente</td>
								<td>Description</td>
								<td> Prix</td>
								<td> Montant</td>
							</tr>';
							$no=0;
					while ($d = $seldetails-> fetch())
					{
						$no = $no + 1;
						echo'	
				
				
							<tr>
								<td>'.$no.'.</td>
								<td>'.$d['qte'].' </td>
								<td>'.$d['uniteVente'].' </td>
								<td>'.$d['designation'].'</td>
								<td> '.$d['prixAchat'].'</td>
								<td> '.$d['montantLigne'].'</td>
							</tr>
						';
					} 
					echo'
								<td COLSPAN=5></td>
							</tr>
							<tr>
								<td COLSPAN=4></td>
		
								<td> Total</td>
								<td> '.$drc['totale'].'</td>
							</tr>
							<tr>
								<td COLSPAN=4></td>
		
								<td> TVA 10%</td>
								<td>  '. $montanttaxe = (int)$drc['totale'] /10 .'</td>
							</tr>
							<tr>
								<td COLSPAN=4></td>
		
								<td> TOTAL NET</td>
								<td> '.$totalnet = $montanttaxe /  $drc['totale'] .'</td>
							</tr> 
						
							
							<tr>
								<td COLSPAN=4></td>
						
								<td> Terminer</td>
							</tr>
						</table>
					</div>
				<div class="reussi">
						
						<a href="appklication.php">
							<div class="ok">
									Terminer
							</div>
						</div>
				</div>';
			}else{
				echo'Error';
			}
				
				
		
		
	}else if($_POST['whatInsert'] == 'ajouterIDCommande')
	{
		$ins = $bdd -> prepare ("INSERT INTO commande(ID_commande,cashOrcredit,dateCommande) values(?,?,now())");
		$ins -> execute (array($_POST['ID_commande'],$_POST['cashOrcredit']));
		$vIns = $ins -> rowCount();
		
		$_SESSION['commande']=$_POST['ID_commande'];
		if ($vIns>0)
		{
			echo 'No Commande '.$_POST['ID_commande'].' ';
			
			?>
			<script>
				$('.formCommande').hide();
			</script>
			<?php
		}
		else
		{		
			echo ' error';
		}
	}
?>
	<script src="js/jquery.js" type="text/javascript"></script>