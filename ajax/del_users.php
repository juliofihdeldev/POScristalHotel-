<!DOCTYE html>
<html>
	<head>
		<title> Dry Cleaning</title>
		<link media="all" rel="stylesheet" type="text/css" href="../css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body>

<?php 
	if($_GET)
	{
		session_start();
		include('connexion.php');
		$seldel = $bdd -> prepare ("DELETE FROM users WHERE users.ID_users=? AND users.fonction<>? ");
		$seldel -> execute (array($_GET['theuser'],"admin"));
		$vdel = $seldel -> rowCount();
		if($vdel>0)
		{
			echo'
				<div class="successPage">
					<table>
						<tr>
							<td> <img src="../img/yes.jpg"></td>
							<td> L\'utilisateur a été supprimer</td>
						</tr>
						<div class="footerboite">
							<a href="../application.php" class="dkr"> D\'accord </a>
						</div>
					</table>
					
				</div>
			';
		}
		else
		{
			echo'
				<div class="successPage">
					<table>
						<tr>
							<td> <img src="../img/quest.png"></td>
							<td> Vous ne pouvez pas supprimer un compte administrateur</td>
						</tr>
						<div class="footerboite">
							<a href="../application.php" class="dkr"> D\'accord </a>
						</div>
					</table>
					
				</div>
			';
		}
	}
	else
	{
		header('location:../application.php');
	}
	
?>