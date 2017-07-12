<?php 
	session_start();
	include('ajax/connexion.php');
	$ins = $bdd -> prepare ("UPDATE chambres SET designation=?, prix=?, lit=?, des=?, avantage=?, size=?  WHERE ID=?");
	$ins -> execute (array($_POST['designation'],$_POST['prix'],$_POST['lit'],$_POST['des'],$_POST['avantage'],
	$_POST['size'],$_POST['ID'])); 
	$vi = $ins -> rowCount();
	if($vi>0)
	{
		echo'	
			<div class="reussi">
					<span> <img src="img/dry/Visible-26.png"/ ></span>
					<span> Transaction reussi</span>
					<a href="application.php">
						<div class="ok">
								D\'accord
						</div>
					</a>
			</div>
		';
	}

?>