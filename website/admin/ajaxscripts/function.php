<?php
	function afficheActivite(){
		include("c.php");
		$showActivites = $bdd->prepare("SELECT * FROM activites WHERE etat <> ?  ORDER BY ID_activites DESC LIMIT 0, 10");
		$showActivites->execute(array("hide"));
		while($data = $showActivites->fetch()){  
			echo '
				<div class="item">
					<div class="itemImages">
						<img src="img/uploads/'.$data['photo'].'"/>
					</div>
					<div class="itemText">
						<div class="itemTitre">
							'.$data['titre'].'
						</div>
						<div class="itemDesc">
							'.$data['description'].'
						</div>
						<div class="prix_article">
							Lire 
						</div>
						<table id="tableOptions">
							<tr>	
								<td class="edit" name="'.$data['ID_activites'].' "> Modifier </td>
								<td> Supprimer </td>
							</tr>
						</table>
					</div>
				</div>	
			';
		}	
	}

?>