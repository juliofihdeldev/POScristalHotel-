<?php 
	session_start();
	require('connexion.php');
	$rei = $bdd -> query ("TRUNCATE  TABLE client");
	$rei1 = $bdd -> query ("TRUNCATE  TABLE commande");
	$rei1 = $bdd -> query ("TRUNCATE  TABLE detailscommande");
	$rei1 = $bdd -> query ("TRUNCATE  TABLE retrait");

	if($rei)
	{
		header('location:../application.php');
	}
	else
	{
		echo'Error';
	}