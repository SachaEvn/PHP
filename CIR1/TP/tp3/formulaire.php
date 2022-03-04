<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Formulaire Action </title>
	<style>
		body{padding:3%;}
		h4{color:blue;}
	</style>
</head>
<body>
	<h4>Exercice 1: Solution</h4>
	<?php
				$nom=$_POST["nom"];
				if(isset($nom))
					echo "<p> Bonjour $nom";
				
				if(isset($_POST['genre'])){
					$genre=$_POST['genre'];
					if($genre=="homme")
						echo "monsieur ";
					else if ($genre=="femme")
						echo "madame ";				
				}

				if(isset($_POST['couleur'])){
					$couleur =$_POST['couleur']; 
					echo ",<br>Votre couleur préférée est le $couleur <br>";
				}
					
				if(isset($_POST['sports'])==false)
					echo "Vous ne pratiquez aucun sport.</p>";
				else {
					$sports=$_POST['sports'];
					echo "Vous pratiquez : ";
					foreach ($sports as $key => $sport )
						echo "le  $sport ";
					echo ".</p>";
				}
	?>
</body>
</html>