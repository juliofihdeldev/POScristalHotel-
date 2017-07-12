<?php
/*
	include('ajax/connexion.php');
	$req = $bdd -> query('select * from articles') ;
	$r = $req -> rowCount();
	if($r>0)
	{
		while( $d = $req -> fetch())
		{
			$per = $d['prix']*10/100;
			
			echo $per;
			
			$up = $bdd -> prepare('update articles set prix=? where ID_articles= ? ') ;	
			$up -> execute(array(($d['prix'] + $per), $d['ID_articles'] ));	
		}
	}
*/
?> 