<?php
	include('ajax/connexion.php');
	session_start();
	
	if(isset($_SESSION['ID_user']))
	{
		header('location:application.php');
	}
	if($_POST){
		
		if(isset($_POST['pseudo']) AND !empty($_POST['pseudo']))
		{			
			$sel = $bdd -> prepare ("SELECT * FROM users  WHERE pseudo = ? and password = ?");
			$sel -> execute(array($_POST['pseudo'],$_POST['password']));
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
				/* echo $_SESSION['pseudo']; */
				header('location:application.php');
			}
			else
			{
				$error = 'Verifier vos parametres de connexion';
			}		
		}
		else
		{		
			$error = 'Veuillez remplir tous les champs';
		}
	}else
	{
		$errorw = 'Veuillez remplir tout les champs';
	}
?>
<!DOCTYE html>
<html>
	<head>
		<title> POSCristalHotel </title>
		<link media="all" rel="stylesheet" type="text/css" href="css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body>
		<header>
			<div class="classlogo">
				<!-- <img src="img/images.jpg"/> -->
				
			</div>
			
		</header>
		
		<div id="content">
			<div class="splashScreen">
				<div class="images">
					<a href="index.php"> <img src="img/logo.png"/> </a>
				</div>
				<div class="formulaire">
					<form id="formulaireConnenct" method="post" action="index.php">
					
						<input type="text" placeholder="Pseudo" name="pseudo"/>
						<input type="password" placeholder="Mot de passe" name="password"/>
						<input type="submit"class="sun" value="Connecter"/>
					</form>
					<?php 
						if(isset($error) and !empty($error))
							
						{
							 echo'
								<div class="error">
									'.$error.'
								</div>
							'; 
						}
					?>
				</div>
			</div>
			
	
		
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
		<script>
		$('#parametre').click(function(){
		$('.loading').show();

			$.ajax(
			{
				url: 'ajax/parametre.php',
				type: 'post',
				/* data: 'commande='+commande+'&client='+client, */
				dataType: 'html',
				success: function(c, r)
				{
					$('.loading').hide();

					$(".canvas1 ").html(c); 
					
			
				},
				error: function(c, r, e)
				{
					alert('erro');
				}
			});	
		})
		
		$('#rapport').click(function(){
		$('.loading').show();

			$.ajax(
			{
				url: 'ajax/rapport_form.php',
				type: 'post',
				/* data: 'commande='+commande+'&client='+client, */
				dataType: 'html',
				success: function(c, r)
				{
					$('.loading').hide();
					$(".canvas1 ").html(c); 
					
				},
				error: function(c, r, e)
				{
					alert('erro');
				}
			});	
		})
		</script>
	</body>
</html>

