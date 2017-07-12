<?php 
	session_start();
	include('ajax/connexion.php');
	$ins = $bdd -> prepare ("UPDATE commande set memo=?, exporation =? WHERE ID_commande=?");
	$ins -> execute (array($_POST['memo'],$_POST['exporation'],$_SESSION['commmade'])); 
	$vi = $ins -> rowCount();
	if($vi>0)
	{
		$selcommade = $bdd -> prepare("SELECT * FROM commande  WHERE commande.ID_commande =?");
		$selcommade -> execute (array($_SESSION['commmade']));
		$v = $selcommade -> rowCount();
		while($d = $selcommade->fetch()){
			echo
			'
				
				<div class="form_memo">
					<form id="addmemo" method="post" action="tr_detailscommande.php">
						
						Remarques
						<p>
							<textarea>'.$d['memo'].'</textarea>

						</p>
						<p>
							Date exporation'.$d['exporation'].'

						</p>
					</form>
				</div>
			';
		}
	}
	else
	{
		echo'ERROR';
	}
	
?>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>
	<script>
	/* 	$("#addmemo").submit(function(e)
		{
			var am = $(this).serialize();
			e.preventDefault();
			alert(am);
		
			$.ajax(
			{
				url: 'ajouter_memo.php',
				type: 'post',
				data:am,
				dataType: 'html',
				success: function(c, r)
				{
					$(".memo").html(c)
				},
				error: function(c, r, e)
				{
					alert('error');
				}
			});
		}); */
	</script>