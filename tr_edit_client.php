<?php 
	session_start();
	include('ajax/connexion.php');
	$ins = $bdd -> prepare ("UPDATE client SET nomComplet=?, telephone=?,cinOrnif=?,adresse=?,email=? WHERE ID_client=?");
	$ins -> execute (array($_POST['nomComplet'],$_POST['telephone'],$_POST['cinOrnif'],$_POST['adresse'],$_POST['email'],$_POST['client'])); 
	$vi = $ins -> rowCount();
	if($vi>0)
	{
		echo'	
			<div class="reussi">
					<span> <img src="img/dry/Visible-26.png"/ ></span>
					<span> Le client a été modifier </span>
					<a href="application.php">
						<div class="ok">
								D\'accord
						</div>
					</a>
			</div>
		';
	}

?>