<?php
	session_start();
	include("ajaxscripts/function.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Cristal Hotel </title>
		<link rel="icon" type="image/ico" href="img/facebookprofiil-ConvertImage.ico"/>
		<link media="all" rel="stylesheet" type="text/css" href="css/style.css"/>	
		<meta charset="utf-8" />
	</head>
	<body>			
		<div id="enTete">
			<div class="content">
				<div class="media">
					<div class="item">
						<img style="width:45%;margin-top:13px;opacity:0.7;" src="img/i_g.png" />
					</div>
					<div class="item">
						<img style="width:90%;margin-top:3px;opacity:0.7;" src="img/t_g.png" />
					</div>
					<div class="item">
						<img style="width:55%;margin-top:10px;" src="img/f_g.png" />
					</div>
				
					<div class="cont">
						<strong>Call Us:</strong> +509 37036770 | Email : <a class="mailto" href="mailto:contact@jobetrouve.com">contact@jobetrouve.com</a>
					</div>
				</div>
			</div>
		</div>
		<header>
			<div class="classlogo" onclick="refreshPage()">
				Cristal Hotel
			</div>
			<div class="barsearch">
				<div>
					<input id="searchOth" class="theval" type="search" placeholder="Rechercher"/>
					<input type="submit" value=""/> 
				</div>
			</div>
			<div id="nav"> 
				<a href="#">
					<div class="btndatec active">
						Ajouter une activite
					</div>
				</a>
				<!--
					<a href="#" class="product_show" >
						<div class="btndatec">
							Ajouter
						</div>
					</a>
				-->
			</div>
		</header>
		
	<div id="menuDeroulant">
		<div class="fermer">
			<div class="images"> 
				<img src="img/back.png">
			</div>
		</div>
		
		<div class="drawer">
			<div class="image">
				<img src="img/android_os_100px.png">
			</div>
			<div class="name">
				Jean fils julio<br/>
				julio.fils1@gmail.com
			</div>
		</div>
		
		<div class="menu">
			<table>
				<tr>
					<td>
						<div class="img">
							<img src="img/Plus Math-26.png"/>
						</div>
					</td>
					<td>
						<div class="img">
							Ajouter entreprise
						</div>
					</td>
				</tr>
				<tr>				
					<td>
						<div class="img">
							<img src="img/Plus Math-26.png"/>	
						</div>
					</td>
					<td>
						<div class="img">
							Ajouter une offres
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="img">
							<img src="img/product_100px.png"/>
						</div>
					</td>
					<td>
						<div class="img">
							Liste des candidats
						</div>
					</td>
				</tr>
					<td>
						<div class="img">
							<img src="img/shutdown_100px_1.png"/>
						</div>
					</td>
					<td>
						<div class="img">
							Log out
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	
	<div id="contentOffre">
		<div id="content">
			<?php 
				afficheActivite();
			?>
		</div>
	</div>

	<div class="small">
		<div class="fermer">
			<div class="images"> 
				<img src="img/Delete-26.png">
			</div>
		</div>
		<div class="message">
			Etre vous sur de vouloir faire ca?
			yes ou no
		</div>
		<div class="yesOrNo">
			<span>Cancel</span> 
			<span>Accept</span> 
		</div>
		
	</div>


	<div class="loading">
		<div class="loadingimg">
			<img src="img/loading.gif"/>
		</div>
	</div>

	<?php
		//echo $_SESSION["ID"];
		if(isset($_SESSION["ID"])){	echo'';}else
		{
			echo'
			<div id="boiteadmin">
				<div class="boiteconnexion">
					<div class="form" >
						<form id="login" method="post">
							<div class="picCimgct">
								<img src="../images/logo.jpg" />
							</div>
							
							<p>
								<input type="text" class="email" name="email"  placeholder="Votre email" required> <br/>
							</p>
							
							<p>
								<input type="password"  class="password" name="password" placeholder="Votre mot de passe" required>
							<p/>
							
							<p>
								<input type="submit"  class="submit" name="send" value="Se connecter">
							<p/>
							
							<p class="forget">
								Verifier vos parametres de connexion !
							</p>
								
							<p class="notMember">
								<div class="errorLogin">
									
								</div>
								Mot de passe oublie!
							</p>
						<!-- 	<p>
								<div class="goToCreate">
									Creer un compte
								</div>
							</p> -->
						</form>
					</div>
					<div class="pieds">
						
					</div>
				</div>
			</div>
		';
		}
	?>

	<div id="btnFormAdd">
		<div class="boiteconnexion">
			<div class="fermer">
				<div class="images"> 
					<img src="img/cancel_100px.png">
				</div>
			</div>
			<div class="form">
				<form id="addActivite" method="POST" action="ajaxscripts/data.php" enctype="multipart/form-data">
					<p>
						<input type="file" name="myFile"  placeholder="choisissez une image" required> <br/>
						<input type="text" name="w"  value="ajouterActivites" hidden> <br/>
					</p>
					<p>
						<input type="text" name="titre"  placeholder="Titre de l'article" required> <br/>
					</p>
				
					<p>
						<textarea name="description" placeholder="Description de l'article " required></textarea>
					</p>
			
					<p>
						<input type="submit" name="send" value="Terminer">
					<p/>
		
				</form>
			</div>
			<div class="pieds">
				
			</div>
		</div>
	</div>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.form.js" type="text/javascript"></script>
	<script>
			
		$('#login').submit(function(e){
			e.preventDefault();
			var emailVal = $('.email').val();
			var passwordVal = $('.password').val();
			if(emailVal=="" || passwordVal=="")
			{
				
				//$('.forget').toggle();
				//toast vides
			
			}else{
				var da = $(this).serialize();
				e.preventDefault();
				var w = "connection";
			
				$.ajax(
				{
					url: "ajaxscripts/data.php",
					type: 'post',
					data: da+'&w='+w,
					dataType: 'html',
					success: function(c, r)
					{
			
						var url = "index.php";
						
						if(c.length == 0)
						{
							document.location.href = url;
						}
						else
						{
							$(".forget").fadeIn().html(c);
							setTimeout(function(){
								location.reload();
							}, 500);
							
						}
						
						$("#modal").fadeOut();
						$("#modal .loading").fadeOut();
					},
					error: function(msg, c ,r)
					{
						$('#enTete').hide(); 
						$('#noConn').fadeIn(); 
						$('#loading').hide(); 
					} 
				});
			}
		});
		
		$('.btndatec').click(function(){

			$("#btnFormAdd").show();
			
		});
		$('.fermer img').click(function(){

			$("#btnFormAdd").toggle();
			
		});
		
		/* 
		$('#addActivite').submit(function(e){
			e.preventDefault();
		
				var da = $(this).serialize();
				e.preventDefault();
				var w = "ajouterActivites";
				
				$.ajax(
				{
					url: "ajaxscripts/data.php",
					type: 'post',
					data: da+'&w='+w,
					dataType: 'html',
					success: function(c, r)
					{

						alert(c);
						$("#modal").fadeIn().html(c)
						
					},
					error: function(msg, c ,r)
					{
					 
					} 
				});
			});
			 */
		
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
		$("#addActivite").ajaxForm(options); 
	});		

	/**Modifier une article**/
		
	
	$('#tableOptions tr td.edit').click(function(){

			var id = $(this).attr("name");
			let w = "mofierArticle";
			$.ajax(
			{
				url: "ajaxscripts/data.php",
				type: 'post',
				data : 'id=' + id + '&w=' + w,   
				dataType: 'html',
				success: function(c, r)
				{		
					$("#btnFormAdd").fadeIn();
					$("#btnFormAdd .boiteconnexion .form").fadeIn().html(c)
			
				},
				error: function(msg, c ,r)
				{
					
				} 
			});
			
		});
		
</script>
