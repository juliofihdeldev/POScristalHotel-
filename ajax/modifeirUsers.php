<!DOCTYE html>
<html>
	<head>
		<title> Dry Cleaning</title>
		<link media="all" rel="stylesheet" type="text/css" href="../css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body>

<?php 
session_start();
	if($_POST)
	{
		include('connexion.php');
		
		if(isset($_FILES['myFile']) AND $_FILES['myFile']['error'] == 0)
				{
					// Testons si le fichier n'est pas trop gros
					if ($_FILES['myFile']['size'] <= 30000000)
					{
						// Testons si l'extension est autorisée
						$infosfichier = pathinfo($_FILES['myFile']['name']);
						$extension_upload = $infosfichier['extension'];
						$extensions_autorisees = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG');
						if(in_array($extension_upload, $extensions_autorisees))
						{
							$timestamp = time();
							$pix = $timestamp.'_'.$_FILES['myFile']['name'];
							
							// On peut valider le fichier et le stocker définitivement
							move_uploaded_file($_FILES['myFile']['tmp_name'], '../img/'.$pix);
							
							$ins = $bdd -> prepare ("UPDATE users SET nom=?, prenom=?,cinOrnif=?,pseudo=?, password=? , photouser=? WHERE ID_users=?");
							$ins -> execute (array($_POST['nom'],$_POST['prenom'],$_POST['cinornif'],$_POST['pseudo'],$_POST['password'],$pix,$_POST['users'])); 
	
								$vIns = $ins -> rowCount();
								if ($vIns>0)
								{	
										$sel = $bdd -> prepare ("SELECT * FROM users  WHERE ID_users = ?");
										$sel -> execute(array($_SESSION['ID_user']));
										$v = $sel -> rowCount();
										if($v>0)
										{
										
											while($d = $sel -> fetch())
											{
												$_SESSION['ID_user']= $d['ID_users'];
												$_SESSION['pseudo']= $d['pseudo'];
												$_SESSION['password']= $d['password'];
												$_SESSION['fonction']= $d['fonction'];
												$_SESSION['photouser']= $d['photouser'];
											}
											
										}
									
										echo'
												
												<div class="successPage">
													<table>
														<tr>
															<td> <img src="../img/yes.jpg"></td>
															<td> Modification effectuer</td>
														</tr>
														<div class="footerboite">
															<a href="../index.php" class="dkr"> D\'accord </a>
														</div>
													</table>
													
												</div>
											';
								}
								else
								{		
									echo ' requette non effectuer';
								}
							
						}
						else
						{	
							echo'
								<div class="successPage">
									<table>
										<tr>
											<td> <img src="../img/quest.png"></td>
											<td>Veilleur verifier si c\'est une image</td>
										</tr>
									<div class="footerboite">
										<a href="../index.php" class="dkr"> D\'accord </a>
									</div>
									</table>
									
								</div>';
						}
					}
					else
					{
						echo'
							<div class="successPage">
									<table>
										<tr>
											<td> <img src="img/quest.jpg"></td>
											<td>Images trop grand</td>
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
					$ins = $bdd -> prepare ("UPDATE users SET nom=?, prenom=?,cinOrnif=?,pseudo=?, password=?  WHERE ID_users=?");
					$ins -> execute (array($_POST['nom'],$_POST['prenom'],$_POST['cinornif'],$_POST['pseudo'],$_POST['password'],$_POST['users'])); 
						if ($ins){
							$sel = $bdd -> prepare ("SELECT * FROM users  WHERE ID_users = ?");
							$sel -> execute(array($_SESSION['ID_user']));
							$v = $sel -> rowCount();
							if($v>0)
							{
							
								while($d = $sel -> fetch())
								{
									$_SESSION['ID_user']= $d['ID_users'];
									$_SESSION['pseudo']= $d['pseudo'];
									$_SESSION['password']= $d['password'];
									$_SESSION['fonction']= $d['fonction'];
									$_SESSION['photouser']= $d['photouser'];
								}
								
							}
							echo'
									<div class="successPage">
										<table>
											<tr>
												<td> <img src="../img/yes.jpg"></td>
												<td> Modification effectuer</td>
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
							echo ' requette non effectuer';
						}
				}
	}
	else
	{
		echo'
		<div class="successPage">
			<table>
				<tr>
					<td> <img src="img/quest.jpg"></td>
					<td> Ceci n\'est pas une image</td>
				</tr>
			<div class="footerboite">
				<a href="../application.php" class="dkr"> D\'accord </a>
			</div>
			</table>
			
		</div>';
	}
	
?>