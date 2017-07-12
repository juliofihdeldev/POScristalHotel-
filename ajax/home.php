<?php 
	include('connexion.php');
	$selEvent = $bdd -> query ("select * from users , event WHERE ID_user = theUser && ID_user = ID_event  ");
	$v = $selEvent-> rowCount();
	if($v>0)
	{
		while( $d = $selEvent-> fetch() )
		{
			echo 
			'
			<div class="classevent">
				<div class="lapersonne">
					<div class="photo">
						<img src="img/'.$d['photoUser'].'"/>
					</div>
					<div class="lenom">
						'.$d['pseudo'].'
					</div>
					<div class="nbrminute">
						'.$d['dateAjout'].'
					</div>
				</div>
				<div class="classeventimg">
					<img src="img/'.$d['flyes'].'"/>
				</div>
				<div class="like">
					<table>
						<tr>
							<td>
								<span class="iconlove">
									<img src="img/Hearts-25.png"/>
								</span>
							</td>
							<td>
								<span class="nbrlove">
									'.$d['nbrLike'].'likes
								</span>
							</td>
						</tr>
					</table>
				</div>
			</div>	
			';
		}
		
	}
	else
	{
		echo'pas de donnees';	
	}
?>