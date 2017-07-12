<?php
	include('ajax/connexion.php');
	$ins = $bdd -> prepare ("select * from chambres WHERE ID =?");
	$ins -> execute(array($_POST['da']));
	$vIns = $ins -> rowCount();
	if ($vIns>0)
	{
		$d = $ins-> fetch();
		echo'
		<div class="boiteAjout">
			<div class="titre">
				Modifier
			</div>
			<div class="form">
				<form method="post" action="" id="edit_articles">
				<p>
					Designation<br/> 
					<input type="text" value="'.$d['ID'].'" name="ID" hidden/>
					<input type="text" value="'.$d['designation'].'" name="designation"/><br/>
					Type de lit<br/> 
					<input type="text" value="'.$d['lit'].'" name="lit"/> <br/>
					Description du chambres<br/>
					<input type="text" value="'.$d['des'].'" name="des"/> <br/>
					Avantage du chambre <br/>
					<input type="text" value="'.$d['avantage'].'"  name="avantage"/> <br/>
					Superficie du chambre<br/>
					<input type="text" value="'.$d['size'].'"  name="size"/> <br/>
					
				</p>
				<p>
					Prix <br/>
					<input type="number" value="'.$d['prix'].'" name="prix"/>
				</p>
				
				<p>
					<input type="text" value="addarticle" name="whatInsert" hidden/>
					<input type="submit" value="Modifier" class="ajouter"/>
				</p>
				
				</form>
			</div>
		</div>
	';	
	}
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
<script>
	
	$('.fermer').click(function(){

		$('#modalsmall').hide();
	});

	$('#edit_articles').submit(function(e){
	e.preventDefault();
	var da = $(this).serialize();
	$.ajax(
	{
		url: 'tr_edit.php',
		type: 'post',
		data: da,
		dataType: 'html',
		success: function(c, r)
		{
			
			$("#modalsamll").show();
			$("#modalsmall .contentsmall .infosmall").html(c);
		},
		error: function(c, r, e)
		{
			alert('erro');
		}
	});
	
});
</script>