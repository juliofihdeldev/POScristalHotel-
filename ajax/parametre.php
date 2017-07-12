<?php 
	session_start();
	require('connexion.php');
	$ins = $bdd -> prepare ("SELECT * FROM users WHERE users.ID_users=?");
	$ins -> execute (array($_SESSION['ID_user'])) ;
	$vIns = $ins -> rowCount();
	
	$d = $ins -> fetch();
	echo'
	<div class="boiteAjout">
		<div class="titre">
			Profil
		</div>
		<div class="form">
			<form method="post" action="ajax/modifeirUsers.php" id="modifeirUsers" enctype="multipart/form-data">
			<p>
				Nom <br/> 
				<input type="text" value="'.$d['nom'].'" name="nom" required/>
				<input type="text" value="'.$d['ID_users'].'" name="users" hidden/>
			</p>
			<p>
				Prenom <br/>
				<input type="text" value="'.$d['prenom'].'" name="prenom" required />
			</p>
			<p>
				Pseudo <br/>
				<input type="text" value="'.$d['pseudo'].'"  name="pseudo"  required/>
			</p>
			<p>
				CIN OR NIF<br/>
				<input type="text"  value="'.$d['cinOrnif'].'"  name="cinornif" />
			</p>
			<p>
				Votre mot de passe: <br/>
				<input type="text"  value="'.$d['password'].'"  name="password" />
			</p>
			<p>
				<p>Choisissez une image</p>
				<input type="file" name="myFile"  class="upfiles" placeholder="Images"/>
			</p>
			<p>
				<input type="submit" value="Modifier" class="ajouter"/>
			</p>
			
			</form>
		</div>
	</div>
	';
?>
<script>
/* 	$('#modifeirUsers').submit(function(e){
	e.preventDefault();
	var da = $(this).serialize();
	$.ajax(
	{
		url: 'ajax/modifeirUsers.php',
		type: 'post',
		data: da,
		dataType: 'html',
		success: function(c, r)
		{
			
			$("#modal").show();
			$("#modal .content").css({
				'width':'30%',
				'height':'200px',
				'margin-left':'35%'
			});
			$("#modal .content .info").html(c);
		},
		error: function(c, r, e)
		{
			alert('erro');
		}
	});
	
}); */
</script>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.form.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	
	<script> 		
		
	</script>
