<?php
		include('ajax/connexion.php');
		$selqte = $bdd -> prepare ("SELECT * FROM commande WHERE dayofyear(exporation) - dayofyear(NOW()) = 2
		AND commande.statut_commande=? ");
		$selqte -> execute (array('en cours')); 
		$valert = $selqte -> rowCount();
		if($valert>0)
		{
			
			while($ds = $selqte-> fetch() )
			{
				echo ' 
					'.$ds['exporation'].'<br/>
					'.$ds['memo'].'<br/>
				';
			}
		}
		else
		{
			echo $qtecommande='0';
			
		}
		session_start();
		
		if(isset($_SESSION['ID_user']))
		{
			
		}
		else
		{
			header('location:index.php');
		}
		include('ajax/connexion.php');
	
			if($_SESSION['fonction'] =='admin')
			{
				echo
				'
					<div class="addOptions">
		
						<div class="fleche">
						
						</div>
						
						<a href="commandefait.php"> <p name="effectuercommande"> Effectuer une commande</p></a>
						<p class="addCommmande" name="ajouterclient"> Ajouter un Client</p>
						<p class="addCommmande" name="addarticle"> Ajouter une chambre </p>
						<p class="addCommmande" name="addusers"> Ajouter utilisateur</p>
						
					</div>
					<div class="addOptions2">
		
						<div class="fleche">
						
						</div>
						
						<p class="addCommmande" name="viewCommande"> Commandes</p>
						<p class="addCommmande" name="viewClient"> Clients</p>
						<p class="addCommmande" name="viewArticle">Chambres</p>
						<p class="addCommmande" name="viewUsers">Utilisateurs</p>
						<p class="addCommmande" name="viewRetrait">Retrait</p>
						
					</div>
					
					<div id="interface">
						<div class="menu">
							<div class="userPic">
								';
								if(isset($_SESSION['photouser']) and !empty($_SESSION['photouser'])){
									echo'<img src="img/'.$_SESSION['photouser'].'"/>';
								}
								else
								{
									echo'<img src="img/logst.png"/>';
								}
									
								echo';
							</div>
							<div class="name">
								'.ucfirst($_SESSION['pseudo']).'
							</div>
							
							<table id="menu">
								
								<tr>
								
									<td class="item home">
									
										<a href="application.php">
											<img src="img/Home-26 (1).png"/>
										</a>
									</td>
									<td>
											<a href="application.php"> Acceuil </a>
									</td>
								</tr>
								
								<tr id="rechercher">	
									<td>
										<div class="item home">
												<span><img src="img/dry/Search-26.png"/> 
										</div>
									</td>
									<td>
										Recherche
									</td>
								</tr>
								<tr class="ajouter">	
									<td>
										<div class="item">
											<img src="img/dry/Plus Math-26.png"/> 
										</div>
									</td>
									<td>
										Ajouter
									</td>
								</tr>
								<tr id="visualiser">	
									<td>
										<div class="item" >
											<img src="img/Visible-26.png"/>
										</div>
									</td>
									<td>
										Visualiser
									</td>
								</tr>
								<tr id="retrait">	
									<td>
										<div class="item" >
											<img src="img/Bulletproof Vest Filled-25.png"/>
										</div>
									</td>
									<td>
										Retraits
									</td>
								</tr>
								<tr id="parametre">	
									<td>
										<div class="item"  >
											<img src="img/Unlock2-24.png"/>
										</div>
										
									</td>
									<td>
										Paramètres
									</td>
								</tr>
								<tr id="rapport">	
									<td>
										<div class="item" >
											<img src="img/Combo Chart-26.png"/>
										</div>
									</td>
									<td>
										Rapports
									</td>
								</tr>
								
								
								<tr id="notifications">	
							
									<td>
										<a href="try.php">
										<div class="item" >
											<img src="img/dry/Hanger Filled-25.png"/>
										</div>
										</a>
									</td>
									<td>
										<a href="try.php">
										<span> Notifications </span>
										<span id="notificationspan">'.$valert.' </span>
										</a>
									</td>
									
								</tr>
							
								<tr id="reinitialiser">	
									<td>
										<div class="item">
											<a href="ajax/reinitialiser.php"> 
											<img src="img/Delete-26.png"/></a>
										</div>
									</td>
									<td>
										<a href="ajax/reinitialiser.php">
											Réinitialiser le systeme
										</a>
									</td>
								</tr>
								<tr>	
									<td>
										<div class="item">
											<a href="ajax/logOut.php"> <img src="img/Shutdown-26.png"/></a>
										</div>
									</td>
									<td>
										<a href="ajax/logOut.php"> Déconnexion</a>
									</td>
								</tr>
							
							</table>
							
						</div>
				';
			}else{
				echo'
					<div class="addOptions">
		
						<div class="fleche">
						
						</div>
						
						<a href="commandefait.php"> <p name="effectuercommande"> Effectuer une commande</p></a>
						<p class="addCommmande" name="ajouterclient"> Ajouter un Client</p>
						
					</div>
					<div class="addOptions2">
		
						<div class="fleche">
						
						</div>
						
						<p class="addCommmande" name="viewCommande"> Commandes </p>
						<p class="addCommmande" name="viewClient"> Clients</p>
						<p class="addCommmande" name="viewArticle">Chambres</p>
						
						
					</div>
					
					<div id="interface">
						<div class="menu">
							<div class="userPic">
							';
							if(isset($_SESSION['photouser']) and !empty($_SESSION['photouser'])){
								echo'<img src="img/'.$_SESSION['photouser'].'"/>';
							}else
							{
								echo'<img src="img/logo.png"/>';
							}
								
							echo';
							</div>
							<div class="name">
								'.ucfirst($_SESSION['pseudo']).'
							</div>
							
							<table id="menu">
								<a href="application.php">
									<tr>
									
										<td class="item home">
										
											<a href="application.php">
											<img src="img/Home-26 (1).png"/>
											</a>
										</td>
										<td>
											<a href="application.php">
											Acceuil
											</a>
										</td>
									</tr>
								</a>
								<tr id="rechercher">	
									<td>
										<div class="item home">
												<span><img src="img/dry/Search-26.png"/> 
										</div>
									</td>
									<td>
										Recherche
									</td>
								</tr>
								<tr class="ajouter">	
									<td>
										<div class="item">
											<img src="img/dry/Plus Math-26.png"/> 
										</div>
									</td>
									<td>
										Ajouter
									</td>
								</tr>
								<tr  id="visualiser">	
									<td>
										
										
											<div class="item" >
												<img src="img/Visible-26.png"/>
											</div>
										
									</td>
									<td>
										Visualiser
									</td>
								</tr>
								<tr  id="parametre">	
									<td>
										<div class="item" >
											<img src="img/Unlock2-24.png"/>
										</div>
									</td>
									<td>
										Parametres
									</td>
								</tr>
								<tr  id="rapport">	
									<td>
									
										<div class="item" >
											<img src="img/Combo Chart-26.png"/>
										</div>
										
									</td>
									<td>
										Rapports
									</td>
								</tr>
								<tr id="notifications">	
									<td>
										<a href="try.php">
										<div class="item" >
											<img src="img/dry/Hanger Filled-25.png"/>
										</div>
										</a>
									</td>
									<td>
										<a href="try.php">
										<span> Notifications </span>
										<span>'.$valert.' </span>
										</a>
									</td>
									
								</tr>
								<tr>	
									<td>
										<div class="item">
											<a href="ajax/logOut.php"> <img src="img/Shutdown-26.png"/></a>
										</div>
									</td>
									<td>
										<a href="ajax/logOut.php"> Déconnexion</a>
									</td>
								</tr>
							
							</table>
							
						</div>
					';
			}
	?>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	<script>
		$('.ajouter').click(function(){
			$('.addOptions').toggle();
			$('.addOptions2').hide();
		});
		
		$('#visualiser').click(function(){
			$('.addOptions2').toggle();
			$('.addOptions').hide();
		});
	</script>