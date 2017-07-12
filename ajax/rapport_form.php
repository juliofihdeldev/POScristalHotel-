<?php 
	echo'
		<div class="boiteAjout">
			<div class="titre">
				Rapport de caisse
			</div>
			<form action="ajax/rapport_print.php" method="post">
				<div class="rapportCaise">
					<select name="typerapport" id="selecttype">
						<option value=""> Choisissez votre type de rapport </option>
						<option value="day"> Journalier</option>
						<option value="week"> Semaine</option>
						<option value="month"> Mensuel</option>
						<option value="year"> Annuel</option>
					</select>
				</div>
				<p>
					<input type="date" name="jour" 	id="date1" class="itemdate"/>
				</p>
				<p>
					<input type="week" name="semaine" id="date2" class="itemdate"/>
				</p>
				<p>
					<input type="month" name="mois" id="date3" class="itemdate"/>
				</p>
				<p>
					<input type="year" name="annee" id="date4" class="itemdate"/>
				</p>
				<input type="submit" value="Visualiser"/>
			</form>
		</div>
	';
?>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/main.js" type="text/javascript"></script>
	