<?php
	include('ajax/connexion.php');
	$ins = $bdd -> prepare ("select * from client WHERE ID_client =?");
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
				<form method="post" action="" id="edit_client">
					<p>
						
						<input type="text" value="'.$d['ID_client'].'" name="client" hidden/>
						<input type="text" value="'.$d['nomComplet'].'" name="nomComplet"/><p>
						<input type="text" value="'.$d['cinOrnif'].'" name="cinOrnif"/><p>
						<input type="text" value="'.$d['telephone'].'" name="telephone"/><p>
						
						<input type="text" value="'.$d['adresse'].'" name="adresse"/><p>
						<input type="text" value="'.$d['email'].'" name="email"/><p>
			
						<input type="text" value="addClient" name="whatInsert" hidden/>
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

	$('#edit_client').submit(function(e){
	e.preventDefault();
	var da = $(this).serialize();
	$.ajax(
	{
		url: 'tr_edit_client.php',
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