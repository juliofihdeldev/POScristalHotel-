<?php 
	session_start();
	include('ajax/connexion.php');
	$ins = $bdd -> prepare ("UPDATE commande SET statut_commande=?  WHERE ID_commande=?");
	$ins -> execute (array('remise',$_SESSION['commmade'],)); 
	$vi = $ins -> rowCount();
	if($vi>0)
	{
		header('location:application.php');
	}

?>