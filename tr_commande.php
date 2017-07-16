<?php	
	include('ajax/connexion.php');
	session_start();
	$selclient1 = $bdd -> query ("SELECT * FROM  client ");
	$v1 = $selclient1 -> rowCount();
	if($v1>0)
	{	
		$ins = $bdd -> prepare ("INSERT INTO commande(ID_commande, client, dateCommande,statut_commande,utilisateur)  values(?,?,now(),?,?)");
		$ins -> execute (array($_SESSION['commmade'],$_POST['client'],'en cours',$_SESSION['ID_user'])) ;
		
		$vIns = $ins -> rowCount();
		if ($vIns>0)
		{	
			$selcommade = $bdd -> prepare("SELECT * FROM commande ,client where commande.ID_commande =? and client=? and commande.client = client.ID_client");
			$selcommade -> execute (array($_SESSION['commmade'], $_POST['client']));
			$v = $selcommade -> rowCount();
			while($d = $selcommade->fetch()){
				echo
				'
					NOcommande: CH-C-'.$_SESSION['commmade'].'
				';
			}
		}
		else
		{
			echo'no requette';
		}	
		
		echo'
		<div class="formadd">
			<form id="tr_det_comm" method="post" action="tr_detailscommande.php">
				<p>
					Quantite<br/>
					<input type="number" min="1" placeholder="1" name="quantite" required/>
				</p>
				
					';
						$selclient = $bdd -> query ("SELECT * FROM  chambres where statut <> 1 ");
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
				
				<p>
				
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
		</div>';
		echo'
			<div class="content_det_commande">
				<div class="tableprint">
					<div class="logo">
						<img src="img/logo.png"/>
						<p>St marc Complexe Guillaume</p>
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
	}
	else
	{
		echo'
		Vous devez ajouter des clients<p>
		<div class="imprimer">
		<table> 
			<tr>
				<td><img src="img/Left-25.png"/></td>
				<td><a href="application.php">Retour</a></td>
			</tr>
		</table>
		</div>
		'; 
	}
	
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