<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP2 : web dynamique</title>
        <meta charset="utf-8" />
        <style>
			body{padding:3%;}
            h1{text-align:center;}
            h2{color:red;}
            h3{color:green;}
            h4{color:blue;}
            h5{color:pink;}
	
			table{border-collapse:collapse;}
			td{border: 1px solid black; width: 100px; text-align:center;}
			div{border:solid red; padding:10px;}

        </style>
    </head>
    <body>
        <h1>TP2 : web dynamique<br>Les fonctions intégrées<br>(partie II)</h1>
		<h2>I. Manipulation des chaines de caractères</h2>
		<h3>Exercice 6 (Précision)</h3>
        <h4>Enoncé</h4>
        <p>Ecrire une fonction qui s'appelle verificationEmail(). Elle prendra un argument de type string.
		Elle devra retourner un boolean qui vaut true si le email respecte les règles suivantes :<br>
		L'émail doit contenir des lettres, le caractère point "." ou le caractère "-", suivit du caractère "@" une seul fois, suivit de 0 ou plusieurs lettres ou caractère point, suivit de la chaine "junia.com qui doit être à la fin de l'émail"
		</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		function verificationEmail($mail){
			$flag = false;
			$end = "junia.com";
			$regex = "/(?i)(([a-z]*)(.|-))(?-i)@((?i)([a-z]*)(?-i)|.)junia.com$/";
			if(preg_match_all("/@/",$mail)==1){
				// if(preg_match("/@(?i)([a-z])*(?-i)junia.com$/",$mail)){
				if(preg_match($regex,$mail)){
					$flag = true;
				}
			}
			return $flag;
		}
		$testemail = "AD.a@.junia.com";
		 
		$ret = verificationEmail($testemail);
		echo "Email : $testemail, true/false (1/0) :",var_dump($ret);
		?>
		
        <h2>III. Manipulation des dates</h2>
		<div>
			Définitions:
			<ul>
				<li>Les fonctions date de PHP permettent d’afficher la date et l’heure sur les pages web.</li>
				<li>Les informaticiens ont défini une date de base arbitraire, correspondant au 1er janvier 1970 00h00m00s. À partir de cette date, le temps est compté en secondes.</li>
				<li>Ce nombre de secondes est nommé <span style="color:red;"> timestamp</span>, ou instant Unix</li>
				<li>Le timestamp est universel, puisqu'il y a pas de notion de fuseaux horaire.</li>
				<li>Le timestamp est passé en paramètre à d'autres fonctions pour réaliser l’affichage en clair de la date.</li>
			</ul>
			Exemples:
			<ul>
			<?php		
				echo "<li>La fonction time() retourne le timestamp actuelle : ".time()." secondes.</li>";
				echo "<li>La fonction date() affiche la date sous plusieurs formes : ".date('r')."</li>" ;
				echo "<li>La fonction date peut aussi prendre un timestamp comme paramètre pour l'afficher selon le format souhaité</li>.";
			?>
			</ul>
			Aide:
			<ul>
				<li>Documentation: <a href="https://www.php.net/manual/fr/ref.datetime.php" target="_blank">Liste des fonctions sur les dates</a>, 
				<a href="https://www.php.net/manual/fr/datetime.format.php" target="_blank">Les formats pour la fonction date()</a> </li>
				<li>Fonctions utiles pour cette partie: checkdate, date, time, mktime</li>
			</ul>
		</div>
		<h3>Exercice 1</h3>
        <h4>Enoncé</h4>
        <p>Vérifiez si la date du 29 février 2022 est valide.</p>
        <h4>Solution</h4>
		<!-- Votre solution ici -->
		<?php
		$date = checkdate(2,29,2022);
		echo "checkdate (true/false) : ",var_dump($date);
		if($date == false){
			echo "La date n'est pas valide.";
		}
		else{
			echo "La date est valide.";
		}
		?>
		
		
		<h3>Exercice 2</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant la date et l'heure courantes sous les formes suivantes :</p>
		<p>Monday/January/2022<br>25/Jan/2022<br>25-01-22<br>23h: 31m: 01s</p>
        <h4>Solution</h4>
		<!-- Votre solution ici -->
		<?php
		$templates = array(
			1 => "l/F/Y",
			2 => "d/M/Y",
			3 => "d-m-y",
			4 => "H\h: i\m: s\s");

		foreach($templates as $key => $value){
			echo date($value),"<br>";
		}

		?>
		
		<h3>Exercice 3</h3>
        <h4>Enoncé</h4>
        <p>Quel jour de la semaine était le 6 novembre 1975?</p>
        <h4>Solution</h4>
		<!-- Votre solution ici -->
		<?php 
		$date=date_create("1975-11-06");
		echo "Nous étions un ",date_format($date,"l")," donc un jeudi en français.";
		?>
		
		<h3>Exercice 4</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant si une année est bissextile.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		$year = date("Y");
		function checkBissextile($year){
			if(checkdate(2,29,$year)){
				echo "L'année $year est bissextile.";
				return true;
			}
			else{
				echo "L'année $year n'est pas bissextile.";
				return false;
			}
		}
		checkBissextile($year);
		?>

		
		<h3>Exercice 5</h3>
        <h4>Enoncé</h4>
        <p>Calculez votre âge à l’instant en cours (soustraction de deux timestamp), en secondes puis en années.</p>
        <h4>Solution</h4>
		<!-- Votre solution ici -->
		<?php
		echo "Mon age en seconde est de ",strtotime("now")- strtotime("16 september 2003")," secondes.";
		?>

		<h3>Exercice 6</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant le jours de la semaine (en français) du premier mai des années comprises entre 2022 et 2033, <br>
		le script affiche : "vous aurez un weekend prolongé" si le premier mai correspond à un vendredi ou un lundi, <br>
		"vous aurez un jours de repos" si le premier mai correspond à un mardi, mercredi ou jeudi,<br>
		"désolé" si le premier mai correspond à un samedi ou dimanche</p>
        <h4>Solution</h4>
		<?php
		$jours=["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];
		
		//Votre solution ici
		$days = array(
			"Sunday" => $jours[0],
			"Monday" => $jours[1],
			"Tuesday" => $jours[2],
			"Wednesday" => $jours[3],
			"Thursday" => $jours[4],
			"Friday" => $jours[5],
			"Saturday" => $jours[6] 
		);
		function findDay($day,$tabJour){
			foreach($tabJour as $eng => $fr){
				if($day == $eng){
					//echo "Jour : ",$eng," --- <br>";
					return $fr;
				}
			}
		}

		for($a=2022;$a<2034;$a++){
			$date = findDay(date("l", mktime(0, 0, 0, 4, 1, $a)),$days);
			echo "Le premier mai $a est un $date. ";
			if($date == "Vendredi" or $date == "Lundi"){
				echo "Vous aurez un weekend prolongé.<br>";
			}
			elseif($date == "Mardi" or $date == "Mercredi" or $date == "Jeudi"){
				echo "Vous aurez un jour de repos.<br>";
			}
			elseif($date == "Samedi" or $date == "Dimanche"){
				echo "Désolé.<br>";
			}
		}
		?>
		
		

    </body>
</html>