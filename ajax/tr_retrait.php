<?php
	include('connexion.php');
	
	$ins = $bdd -> prepare ("INSERT INTO retrait(motif,retrait,date_retrait ) VALUES (?,?,now())");
	$ins -> execute (array($_POST['motif'],
	$_POST['le_montant_retrait']));

	$v = $ins -> rowCount();
	
	if($v>0)
	{
		echo'
			<div class="reussi">
				<table>
					<tr>
						<td>
							<img src="img/yes.jpg"/ >
						</td>
						<td>
							 Le retrait  de '.$_POST['le_montant_retrait'].' Gdes a été effectuer
						</td>
					</tr>
				</table>
				<a href="application.php">
					<div class="ok">
						Terminer
					</div>
				</a>
			</div>
		';
	}
?>