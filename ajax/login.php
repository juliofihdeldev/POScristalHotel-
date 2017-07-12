<?php
	include('connexion.php');
	session_start();
	if(isset($_POST['pseudo']) AND !empty($_POST['pseudo']))
	{			
		$sel = $bdd -> prepare ("SELECT * FROM users  WHERE pseudo = ? and password = ?");
		$sel -> execute(array($_POST['pseudo'],$_POST['password']));
		$v = $sel -> rowCount();
		if($v>0)
		{
		
			while($d = $sel -> fetch())
			{
				$_SESSION['fonction']= $d['fonction'];
				$_SESSION['ID_user']= $d['ID_users'];
				$_SESSION['pseudo']= $d['pseudo'];
				$_SESSION['password']= $d['password'];
			
			}
			echo $_SESSION['pseudo'];
		}
		else
		{
			$error = 'verifier vos parametres de connexion';
		}		
	}
	else
	{		
		$error = 'Rien n\est poster';
	}
?>