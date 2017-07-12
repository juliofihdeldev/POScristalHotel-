<?php
	function StudentCode()
	{
		include('connexion.php');
		
		$iden = $bdd->query('SELECT MAX(ID) AS ID FROM etudiant');
		$id = $iden->fetch();
		
		$id = $id['ID'] + 1;
		$str = '';
		$long = strlen($id);
		$long -= 6;
		$long = abs($long);
		
		for ($i = 0; $i < $long + 1; $i++)
		{
			$str .= '0';
		}
		
		return 'SID-'.$str.''.$id;
	}
	function TeacherCode()
	{
		include('connexion.php');
		
		$iden = $bdd->query('SELECT MAX(ID) AS ID FROM professeur');
		$id = $iden->fetch();
		
		$id = $id['ID'] + 1;
		$str = '';
		$long = strlen($id);
		$long -= 6;
		$long = abs($long);
		
		for ($i = 0; $i < $long + 1; $i++)
		{
			$str .= '0';
		}
		
		return 'TID-'.$str.''.$id;
	}
	function EmployeeCode()
	{
		include('connexion.php');
		
		$iden = $bdd->query('SELECT MAX(ID) AS ID FROM user');
		$id = $iden->fetch();
		
		$id = $id['ID'] + 1;
		$str = '';
		$long = strlen($id);
		$long -= 6;
		$long = abs($long);
		
		for ($i = 0; $i < $long + 1; $i++)
		{
			$str .= '0';
		}
		
		return 'UID-'.$str.''.$id;
	}
	function PaymentCode($id)
	{
		$str = '';
		$long = strlen($id);
		$long -= 6;
		$long = abs($long);
		
		for ($i = 0; $i < $long + 1; $i++)
		{
			$str .= '0';
		}
		return 'EPID-'.$str.''.$id;
	}
	function OtherPaymentCode($id)
	{
		$str = '';
		$long = strlen($id);
		$long -= 6;
		$long = abs($long);
		
		for ($i = 0; $i < $long + 1; $i++)
		{
			$str .= '0';
		}
		return 'OPID-'.$str.''.$id;
	}
	function CutText($texte, $longeur_max)
	{
		if(strlen($texte) > $longeur_max)
		{
			$texte = substr($texte, 0, $longeur_max);
			$texte .= "...";
		}
		
		return $texte;
	}
	function CutTextSimple($texte, $longeur_max)
	{
		if(strlen($texte) > $longeur_max)
		{
			$texte = substr($texte, 0, $longeur_max);
			$texte .= ".";
		}
		
		return $texte;
	} 
	function CutCode($texte, $longeur_max)
	{
		if(strlen($texte) > $longeur_max)
		{
			$texte = substr($texte, 0, $longeur_max);
			$texte .= "";
		}
		
		return $texte;
	} 
	function CutNif($texte, $longeur_max)
	{
		if(strlen($texte) > $longeur_max)
		{
			$texte = substr($texte, 0, $longeur_max);
			$texte .= "...";
		}
		
		return $texte;
	} 
	function Picture($client,$table="Student")
	{
		include("connexion.php");
		$img = '';
		$size = '';
		
		if($table == "Student")
		{
			$pix = $bdd->prepare("SELECT photo FROM etudiant WHERE ID = ?");
			$pix->execute(array($client));
			$cnt = $pix->rowCount();
			
			if($cnt > 0)
			{
				$p = $pix->fetch();
				
				$fileInd = 'uploads/photos/'.$p['photo'];
				$file = '../uploads/photos/'.$p['photo'];
				
				if(file_exists($file) || file_exists($fileInd))
				{
					$img = '<img width="100%" src="uploads/photos/'.$p['photo'].'" />';
				}
				else
				{
					$img = '<img width="100%" src="images/noPix.png" />';
				}
			}
			else
			{
				$img = '<img width="100%" src="images/noPix.png" />';
			}
		}
		else if($table == "User")
		{
			$pix = $bdd->prepare("SELECT photo FROM user WHERE ID = ?");
			$pix->execute(array($client));
			$cnt = $pix->rowCount();
			
			if($cnt > 0)
			{
				$p = $pix->fetch();
				
				$fileInd = 'uploads/photos/'.$p['photo'];
				$file = '../uploads/photos/'.$p['photo'];
				
				if(file_exists($file) || file_exists($fileInd))
				{
					$img = '<img width="100%" src="uploads/photos/'.$p['photo'].'" />';
				}
				else
				{
					$img = '<img width="100%" src="images/noPix.png" />';
				}
			}
			else
			{
				$img = '<img width="100%" src="images/noPix.png" />';
			}
		}
		else if($table == "Teacher")
		{
			$pix = $bdd->prepare("SELECT photo FROM professeur WHERE ID = ?");
			$pix->execute(array($client));
			$cnt = $pix->rowCount();
			
			if($cnt > 0)
			{
				$p = $pix->fetch();
				
				$fileInd = 'uploads/photos/'.$p['photo'];
				$file = '../uploads/photos/'.$p['photo'];
				
				if(file_exists($file) || file_exists($fileInd))
				{
					$img = '<img width="100%" src="uploads/photos/'.$p['photo'].'" />';
				}
				else
				{
					$img = '<img width="100%" src="images/noPix.png" />';
				}
			}
			else
			{
				$img = '<img width="100%" src="images/noPix.png" />';
			}
		}
		else if($table == "Document")
		{
			$pix = $bdd->prepare("SELECT fichier AS photo FROM document WHERE student = ?");
			$pix->execute(array($client));
			$cnt = $pix->rowCount();
			
			if($cnt > 0)
			{
				$p = $pix->fetch();
				
				$fileInd = 'uploads/photos/'.$p['photo'];
				$file = '../uploads/photos/'.$p['photo'];
				
				if(file_exists($file) || file_exists($fileInd))
				{
					$img = '<img width="100%" src="uploads/photos/'.$p['photo'].'" />';
				}
				else
				{
					$img = '<img width="100%" src="images/noPix.png" />';
				}
			}
			else
			{
				$img = '<img width="100%" src="images/noPix.png" />';
			}
		}
		else if($table == "Publication")
		{
			$pix = $bdd->prepare("SELECT photo FROM photopub WHERE idPub = ?");
			$pix->execute(array($client));
			$cnt = $pix->rowCount();
			
			if($cnt > 0)
			{
				$p = $pix->fetch();
				
				$fileInd = 'application/uploads/photos/'.$p['photo'];
				$file = '../application/uploads/photos/'.$p['photo'];
				
				if(file_exists($file) || file_exists($fileInd))
				{
					$img = '<img width="100%" src="application/uploads/photos/'.$p['photo'].'" />';
				}
				else
				{
					$img = '<img width="100%" src="images/noPix.png" />';
				}
			}
			else
			{
				$img = '<img width="100%" src="images/noPix.png" />';
			}
		}
		return $img;
	}
	function RencontreDeDeuxVoyelles($article, $maChaine)
	{
		$lettreA = 'a';
		$lettreE = 'e';
		$lettreI = 'i';
		$lettreO = 'o';
		$lettreU = 'u';
		$lettreY = 'y';
		$lettreH = 'h';
		
		$txt = "";
		
		$maChaine = lcfirst($maChaine);
		
		if(stripos($maChaine, $lettreH) == 0)
		{	
			$txt = $article.'\' '.$maChaine;
		}
		else
		{
			$txt = $article.' '.$maChaine;
		}
		
		return $txt;
	}
?>