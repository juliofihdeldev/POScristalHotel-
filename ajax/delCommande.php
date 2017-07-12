
	<!DOCTYE html>
	<html>
	<head>
		<title> Event haiti </title>
		<link media="all" rel="stylesheet" type="text/css" href="../css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body>

		<div class="panier">
			
			<?php 
			
				session_start();
				include('connexion.php');

				if($_GET)
				{
					$selcommande = $bdd -> prepare ("DELETE  FROM commande WHERE commande.ID_commande=? ");
					$selcommande -> execute (array($_GET['da'])); 
					if($selcommande)
					{
						$seldetcommande = $bdd -> prepare ("DELETE  FROM detailscommande WHERE detailscommande.commande=? ");
						$seldetcommande -> execute (array($_GET['da'])); 
						echo'
						<div class="successPage">
							<table>
								<tr>
									<td> <img src="../img/yes.jpg"></td>
									<td> Cette commande a été supprimer</td>
								</tr>
								<div class="footerboite">
									<a href="../application.php" class="dkr"> D\'accord </a>
								</div>
							</table>
							
						</div';
					}
				}
			?>
			
		</div>
	</body>
</html>