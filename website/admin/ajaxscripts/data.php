<?php 
	session_start();

	if($_POST['w']== "connection"){
		
		include("c.php");
		$conn = $bdd->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
		$conn->execute(array(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['password'])));
		$cnt = $conn->rowCount();
		
		if($cnt>0){
			$c = $conn->fetch();
			$_SESSION["ID"] = $c["ID"];
			$_SESSION["email"] = $c["email"];
			?>
			<script>
				$(".forget").hide();
			</script>
			<?php
		
		}else{
			
			echo'
				Verifiez vos parametres de connexion.	
			';
		}
		
	}
	
	if($_POST['w']== "mofierArticle"){
		
		include("c.php");
	
		$editActivites = $bdd->prepare("SELECT * FROM activites WHERE ID_activites = ?");
		$editActivites->execute(array($_POST['id']));
		$verif = $editActivites->rowCount();
		if($verif>0){

			while($data = $editActivites->fetch()){  
		
					echo'
							<form id="editActivite" method="POST" action="ajaxscripts/data.php" enctype="multipart/form-data">
								<p>
									<input type="file" name="myFile"  placeholder="choisissez une image" > <br/>
									<input type="text" name="w"  value="editActivite" hidden> <br/>
									<input type="text" name="ID_activites"  value="'.$data['ID_activites'].'" hidden> <br/>
								</p>
								<p>
									<input type="text" name="titre"  value=" '.$data['titre'].' " required> <br/>
								</p>

								<p>
									<textarea name="description"  value =" '.$data['description'].' "value=" '.$data['description'].' " required></textarea>
								</p>
						
								<p>
									<input type="submit" name="send" value="Effectuer la modification">
								<p/>
					
							</form>
						</div>
						<div class="pieds">
							
						</div>
					';
			};
		}
	}
	

	if($_POST['w']== "ajouterActivites"){
		
		include("c.php");
	
		if(isset($_FILES['myFile']) AND $_FILES['myFile']['error'] == 0)
			{
				// Testons si le fichier n'est pas trop gros
				if ($_FILES['myFile']['size'] <= 30000000)
				{
					// Testons si l'extension est autoris�e
					$infosfichier = pathinfo($_FILES['myFile']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG');
					if(in_array($extension_upload, $extensions_autorisees))
					{
						$timestamp = time();
						$pix = $timestamp.'_'.$_FILES['myFile']['name'];
						
						// On peut valider le fichier et le stocker d�finitivement
						if(move_uploaded_file($_FILES['myFile']['tmp_name'], '../img/uploads/'.$pix))
						{
							$photo= $pix;
						}
					}
					else
					{
						// Format
						echo 1;
					}
				}
				else
				{
					// Poids
					echo 2;
				}
					
				$iUS = $bdd->prepare("INSERT INTO activites(id_users, titre, description,photo , etat) VALUES(?, ?, ?,?,?)");
				$iUS->execute(array($_SESSION["ID"], 
				htmlspecialchars($_POST['titre']), 
				htmlspecialchars($_POST['description']),$pix , "show"));
				if($iUS){
					echo'
						
						<div class="message">
							Votre Activites a ete ajoutee!
						</div>
						<div class="yesOrNo">
							<span>Accept</span> 
						</div>
						';
					/* ?>
						<script>
							
						</script>
					<?php */
				}else{
					
					echo'
						error 	
					';
				}
			}
			else
			{
				// Pas de photo
				echo 3+" pas de phot";
			}
			

	}
	
	if($_POST['w']== "editActivite"){
		
		include("c.php");
	
		if(isset($_FILES['myFile']) AND $_FILES['myFile']['error'] == 0)
		{
				// Testons si le fichier n'est pas trop gros
				if ($_FILES['myFile']['size'] <= 30000000)
				{
					// Testons si l'extension est autoris�e
					$infosfichier = pathinfo($_FILES['myFile']['name']);
					$extension_upload = $infosfichier['extension'];
					$extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG');
					if(in_array($extension_upload, $extensions_autorisees))
					{
						$timestamp = time();
						$pix = $timestamp.'_'.$_FILES['myFile']['name'];
						
						// On peut valider le fichier et le stocker d�finitivement
						if(move_uploaded_file($_FILES['myFile']['tmp_name'], '../img/uploads/'.$pix))
						{
							$photo= $pix;
						}
					}
					else
					{
						// Format
						echo 1;
					}
				}
				else
				{
					// Poids
					echo 2;
				}
				$iUS = $bdd->prepare("UPDATE activites SET  titre=?, description=? , photo=? WHERE ID_activites =? ");
						$iUS->execute(array(
						$_POST['titre'], 
						$_POST['description'],
						$_POST['ID_activites'],$pix));
						if($iUS){
							echo'
							<div class="message">
								Votre Article a ete modifier
							</div>
							<div class="yesOrNo">
								<span>Accept</span> 
							</div>';
							/* ?>
								<script>
									
								</script>
							<?php */ 
					}else{
					
					echo'
						error 	
					';
				}
			}else{
				// Ne pas choisit d'autre photo
				$iUS = $bdd->prepare("UPDATE activites SET  titre=?, description=?  WHERE ID_activites =? ");
					$iUS->execute(array(
					$_POST['titre'], 
				    $_POST['description'],
					$_POST['ID_activites']));
					if($iUS){
						echo'
						<div class="message">
							Votre Article a ete modifier
						</div>
						<div class="yesOrNo">
							<span>Accept</span> 
						</div>';
						/* ?>
							<script>
								
							</script>
						<?php */ 
				}else{
					
					echo'
						error id
					';
				}
			}
			
	}

?>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script>

	$(document).ready(function(){
		var options = 
		{ 
			beforeSend: function() {
				$("#progress").fadeIn();
				$("#progress .bar").width('0%');
				$("#progress .bar .percent").html("0%");  
			},
			uploadProgress: function(event, position, total, percentComplete) {
				$("#progress .bar").width(percentComplete+'%');
				$("#progress .percent").html(percentComplete+'%');
			},
			success: function() {
				$("#progress .bar").width('100%');
				$("#progress .percent").html('100%');
				$("#formulairesMembre .submit").hide();
			},
			complete: function(response) {
				
					$("#btnFormAdd").fadeIn();
					$("#btnFormAdd .boiteconnexion").css({
						width: "25%",
						height: "150px",
						overflow:"hidden",
					}, 100, function() {
						// faire autre truck apres
						location.reload();
					});
					
					$("#btnFormAdd .boiteconnexion .form").fadeIn().html(response.responseText)
			
			},
			error: function()
			{
				//$('#modal .content .info').fadeIn();
				alert('ERROR');
			}
		}; 
		$("#editActivite").ajaxForm(options); 
	});		
	</script>