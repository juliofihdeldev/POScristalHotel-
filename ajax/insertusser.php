<?php 
	include('connexion.php');
	$con = $bdd -> prepare ("SELECT * FROM users  WHERE pseudo=?");
	$con -> execute(array($_POST['pseudo']));
	$v = $con-> rowCount();
	if($v>0)
	{
		echo'ce pseud existe deja';
	}else
	{
		$ins = $bdd -> prepare ("INSERT INTO users(pseudo, password, date_sign )  values(?,?,now())");
		$ins -> execute (array($_POST['pseudo'],$_POST['password'])) ;
		$vIns = $ins -> rowCount();
		if ($vIns>0){
			session_start();
				$sel = $bdd -> prepare ("SELECT * FROM users  WHERE pseudo=?");
				$sel -> execute(array($_POST['pseudo']));
				while($d = $sel -> fetch())
				{
					$_SESSION['pseudo']= $d['pseudo'];
					$_SESSION['email']= $d['email'];
					$_SESSION['password']= $d['password'];
				}
				
			echo $_SESSION['pseudo'];
			echo' tous c bien passer';
		}
		else
		{		
			echo ' error';
		}
	}