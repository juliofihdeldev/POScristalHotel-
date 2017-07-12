<?php 
	session_start();
	
	if(isset($_POST['whatform'])){
			
		if($_POST['whatform'] == 'effectuercommande' )
		{
			include('connexion.php');
		
			?>
				<script>
					$('#ajouterCommande').submit(function(e){
						e.preventDefault();
						var da = $(this).serialize();
						$.ajax(
						{
							url: 'ajax/addData.php',
							type: 'post',
							data: da,
							dataType: 'html',
							success: function(c, r)
							{
								$(".canvas2").html(c);
							},
							error: function(c, r, e)
							{
								alert('erro');
							}
						});
						
					});
					$('#ajouterIDCommande').submit(function(e){
						e.preventDefault();
						var da = $(this).serialize();
						$.ajax(
						{
							url: 'ajax/addData.php',
							type: 'post',
							data: da,
							dataType: 'html',
							success: function(c, r)
							{
								$(".lenumeroCommande").html(c); 
								
								$('#ajouterCommande').show();
								$('.formCommande').hide();
							},
							error: function(c, r, e)
							{
								alert('erro');
							}
						});
						
					});
					
				</script>
			<?php
		}
		else if($_POST['whatform'] == 'ajouterclient')
		{
			echo'
				<div class="boiteAjout">
					<div class="titre">
						Ajouter un client
					</div>
					<div class="form">
						<form method="post" action="" id="ajouterClient">
						<p>
							Nom complet<br/> 
							<input type="text" placeholder="Exp: Jean FILS Julio" name="nomComplet" required/>
						</p>
						<p>
							CIN/NIF <br/>
							<input type="text" placeholder="CIN/NIF" name="cin_nif" />
						</p>
						<p>
							Téléphone<br/>
							<input type="text" placeholder="Téléphone" name="telephone" required/>
						</p>
					
						<p>
							Son adresse <br/>
							<input type="text" placeholder="Son adresse" name="adresse" required/>
						</p>
						<p>
							Son e-mail<br/>
							<input type="text" placeholder="exemple@gmail.com" name="email"/>
						</p>
						
						<p>
							<input type="text" value="ajouterClient" name="whatInsert" hidden/>
							<input type="submit" value="Ajouter" class="ajouter"/>
						</p>
						
						</form>
					</div>
				</div>
			';
			?>
				<script>
					$('#ajouterClient').submit(function(e){
					e.preventDefault();
					var da = $(this).serialize();
					$.ajax(
					{
						url: 'ajax/addData.php',
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
					
				});
				</script>
			<?php
		}else if($_POST['whatform'] == 'addarticle')
		{
			echo'
				<div class="boiteAjout">
					<div class="titre">
						Ajouter une chambre
					</div>
					<div class="form">
						<form id="addarticle" method="POST"  action="ajax/addData.php" enctype="multipart/form-data" >
							
							<p>
								<input type="file" placeholder="Ajouter quelques imagas " name="myFile[]" multiple="multiple"
							</p>

							<p>
								Designation<br/> 
								<input type="text" placeholder="Junior Suite" name="designation" required/>
								<input type="text" value="addarticle" name="whatInsert" hidden/>
							</p
							<p>
								Description<br/> 
								<input type="text" placeholder="Our Junior Suites offer breathtaking views of the city
								skyline"
								name="des" required/>
							</p>
							
							<p>
								Avantages:<br/>
								<input type="text" name="avantage" placeholder="Sale de bain"/> 
							
							</p>
							<p>
								Type de lit:<br/>
								<input type="radio" name="lit" value="Simple" checked>Simple<br>
								<input type="radio" name="lit" value="Double"> Double<br>
						
							
							</p>
							<p>
								Superficie du chambre<br/> 
								<input type="number" placeholder="90" name="size" required/>
							</p>
							
							<p>
								Prix <br/>
								<input type="number" placeholder="Prix" name="prix" required/>
							</p>
							
							<p>
								<input type="text" value="addarticle" name="whatInsert" hidden/>
								<input type="submit" value="Ajouter" class="ajouter"/>
							</p>
						
						</form>
					</div>
				</div>
			';	
			?>
				<script>
				$('#addarticle').submit(function(e){
					e.preventDefault();
					var da = $(this).serialize();
					$.ajax(
					{
						url: 'ajax/addData.php',
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
					
				});
				
			
				/* $(document).ready(function()
				{
					var options = 
					{ 
						beforeSend: function() 
						{
							$("#progress").fadeIn();
							$("#progress .bar").width('0%');
							$("#progress .bar .percent").html("0%");  
						/* 	$("#modTeacherForm .submit").attr("disabled", "disabled"); *
						},
						uploadProgress: function(event, position, total, percentComplete) 
						{
							$("#progress .bar").width(percentComplete+'%');
							$("#progress .percent").html(percentComplete+'%');
						},
						success: function() 
						{
							$("#progress .bar").width('100%');
							$("#progress .percent").html('100%');
							$("#formulairesMembre .submit").hide();
						},
						complete: function(response) {
						
							$("#modal").show();
							$("#modal .content").css({
								'width':'30%',
								'height':'200px',
								'margin-left':'35%'
							});
							$("#modal .content .info").fadeIn().html(response.responseText);
						
						},
						error: function(e)
						{ 
							/* $('#modal .content .info').fadeIn(); *
							alert(e);
						}
					}; 
					$("#addarticle").ajaxForm(options);
				}); */
			</script>
			<?php
		}
		
		else if( $_POST['whatform'] == 'addusers')
		{
			echo'
				<div class="boiteAjout">
					<div class="titre">
						Ajouter utilisateur
					</div>
					<div class="form">
						<form method="post" action="" id="addusers">
						<p>
							Nom<br/> 
							<input type="text" placeholder="Son nom"  name="nom" required/>
						</p>
						<p>
							Prénom<br/> 
							<input type="text" placeholder="Son prénom" name="prenom" required/>
						</p>
						<p>
							Cin OR Nif <br/>
							<input type="text" placeholder=" Cin OR Nif  " name="cinOrnif"/>
						</p>
						<p>
							Pseudo<br/>
							<input type="text" placeholder="Votre pseudo"  name="pseudo" required/>
						</p>
						
						<p>
							Fonction<br/>
						
							<select name="fonction" required>
								<option value="admin"> Admin </option>
								<option value="caissier(ere)"> Caissier (ere) </option>
							</select>

						</p>
						
						<p>
							<input type="text" value="addusers" name="whatInsert" hidden/>
							<input type="submit" value="Ajouter" class="ajouter"/>
						</p>
						
						</form>
					</div>
				</div>
			';
			?>
				<script>
					$('#addusers').submit(function(e){
					e.preventDefault();
					var da = $(this).serialize();
					$.ajax(
					{
						url: 'ajax/addData.php',
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
					
				});
				</script>
			<?php
		}
		
	}else
	{
		echo'Refresh Presser F5' ;
	}
?>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.form.js" type="text/javascript"></script>
<script src="js/main.js" type="text/javascript"></script>

