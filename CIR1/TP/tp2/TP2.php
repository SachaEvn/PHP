<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP1 : web dynamique</title>
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
        <h1>TP2 : web dynamique<br>Les fonctions intégrées<br>(partie I)</h1>
        <h2>I. Manipulation des chaines de caractères</h2>
		<div>
			Aide:
			<ul>
				<li>Documentation: <a href="https://www.php.net/manual/fr/ref.strings.php" target="_blank">Liste des fonctions sur les chaines de caractères</a></li>
				<li>Fonctions utiles pour cette partie: strlen, preg_match, printf, str_pad, str_replace, ord, ucwords, </li>
			</ul>
		</div>
		<h3>Exercice 1</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant le code ASCII de chaque lettre d'une chaine de caractères.</p>
        <h4>Solution</h4>
		<?php
		$chaine="TP2 : PHP dynamique";
		//Votre solution ici
		$i = 0;
		echo "La chaine de caractère est encodée en UTF-8, ord() renvoit donc son code ASCII.<br><br>";
		for( $i=0;$i<strlen($chaine);$i++){
			echo ord($chaine[$i])," ";
		}
		echo " == '$chaine'";
		
		?>
		
        <h3>Exercice 2</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant Tous les mots d'une phrase donnée avec une initiale en majuscule.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php 
		$chaine = "ceci est une phrase d'exemple.";
		//version qui modifie la chaine de caractère
		$chaine[0] = strtoupper($chaine[0]);
		for($i =0;$i<strlen($chaine);$i++){
			if($chaine[$i] == " "){
				$chaine[$i+1] = strtoupper($chaine[$i+1]);
			}
		}
		echo $chaine, "<br>";

		//version qui se contente de l'afficher sans changer $chaine de façon permanente 
		$chaine = "ceci est une phrase d'exemple.";
		$copy_chaine = explode(' ',$chaine);

		for($i = 0;$i<str_word_count($chaine);$i++){
			echo ucfirst($copy_chaine[$i])," ";
		}

		?>
		<h3>Exercice 3</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script remplaçant les caractères \n par &lt; br&gt;</p>
        <h4>Solution</h4>
		<?php
		$chaine="PHP \n est meilleur \n que ASP \n et JSP \n";
		echo "Avant: $chaine <br>";
		// Votre solution ici 
		//preg_replace('\n','<br>',$chaine);
		
		$chaine = str_replace("\n",'<br>',$chaine);
		echo "Après : $chaine";
		
		?>

		<h3>Exercice 4</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script permettant de formater l'affichage d'un sommaire composé d'une suite de titres et leurs numéros de page de la façons suivante 
		</p>
        <h4>Solution</h4>
		<?php
		$titre1= "HTML";
		$titre2="CSS";
		$titre3="PHP";
		$page1="1";
		$page2="5";
		$page3="20";
		echo "<br>";
		echo "<pre>";
		//40 char de long dans l'exemple exo4.png
		//Votre solution ici
		echo str_pad("Chapitres",40 - strlen("Pages")),"Pages<br>";
		echo str_pad($titre1,39,"."),$page1,"<br>";
		echo str_pad($titre2,39,"."),$page2,"<br>";
		echo str_pad($titre3,38,"."),$page3,"<br>";
		echo "</pre>";
		?>
		
		
        <h3>Exercice 5</h3>
        <h4>Enoncé</h4>
        <p>Ecrire une fonction qui s'appelle verificationPassword(). Elle prendra un argument de type string.
		Elle devra retourner un boolean qui vaut true si le password respecte les règles suivantes :
		<ul>
			<li>faire au moins 8 caractères ;</li>
			<li>avoir au moins 1 chiffre ;</li>
			<li>avoir au moins une majuscule et une minuscule.</li>
		</ul>
		Utiliser les expressions régulières et la fonction preg_match().
		</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		function verificationPassword($pass){
			$flag = false;
			if(strlen($pass) >= 8){
				if(preg_match('!\d+!',$pass)){
					if(preg_match('/[A-Z]/',$pass) and preg_match('/[a-z]/',$pass)){
						$flag = true;
					}
				}
			}
			echo ($flag)?"le password est conforme.<br>" :  "Le password n'est pas conforme.<br>";
			return $flag;
		} 
		echo verificationPassword("bonJour6");

		?>


		<h3>Exercice 6</h3>
        <h4>Enoncé</h4>
        <p>Ecrire une fonction qui s'appelle verificationEmail(). Elle prendra un argument de type string.
		Elle devra retourner un boolean qui vaut true si le email respecte les règles suivantes :<br>
		L'émail doit contenir le caractère "@" une seul fois, suivit de 0 ou plusieurs lettres, suivit de la chaine "junia.com qui doit être à la fin de l'émail"
		</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		function verificationEmail($mail){
			$flag = false;
			$end = "junia.com";
			if(preg_match_all("/@/",$mail)==1){
				if(preg_match("/@junia.com/",$mail) or preg_match("/@(?i)([a-z])*(?-i)junia.com$/",$mail) ){
					$flag = true;					
				}
			}
			return $flag;
		}
		$testemail = "salut@aDZDzeezefjunia.com";
		$ret = verificationEmail($testemail);
		echo "Email : $testemail, true/false (1/0) :",var_dump($ret);
		?>


        <h2>II. Manipulation des tableaux</h2>
		<div>
			Aide:
			<ul>
				<li>Documentation: <a href="https://www.php.net/manual/fr/ref.array.php" target="_blank">Liste des fonctions sur les tableaux</a>, 
				<a href="https://www.php.net/manual/fr/ref.math.php" target="_blank">Liste des fonctions mathématiques</a></li>
				<li>Fonctions utiles pour cette partie:  array_sum, round, array_merge, count, print_r, ksort, array_keys, unset, arsort, max, min,</li>
			</ul>
		</div>
        <h3>Exercice 7</h3>
        <h4>Enoncé</h4>
        <p>
		Considérant le tableau suivante des étudiants et leurs notes.</p>
		<table>
			<tr><td>Alixe</td><td>13</td></tr>
			<tr><td>Justine</td><td>16</td></tr>
			<tr><td>Raja</td><td>10</td></tr>
			<tr><td>Jean</td><td>15</td></tr>
			<tr><td>Clément</td><td>10</td></tr>
			<tr><td>Mathieu</td><td>12</td></tr>
			<tr><td>Claire</td><td>11</td></tr>
			<tr><td>Juliette</td><td>20</td></tr>
			<tr><td>Paul</td><td>12</td></tr>
		</table>
		<ol>
			<li>Créer et initialiser un tableau associatif $notes, sachant que les noms représentent les clés et les notes représentent les valeurs.
			Utiliser la fonction print_r pour pour afficher le contenu de votre tableau</li>
			<li>Afficher la note maximale, la note minimale et la moyenne de la classe (précision : deux chiffres après la virgule). 
			Utiliser les fonctions mathématiques intégrées min, max, round.</li>
			<li>Ecrire une fonction "Affichage" prenant un tableau associatif des notes comme argument et affiche son contenu à l'aide de la balise HTML table, 
			tout en respectant le style suivant:
				<ul>
					<li>Couleur du texte: la note maximale en rouge, la note minimale en vert</li>
					<li>Couleur du fond: les notes supérieures ou égale à la moyenne en orange, les notes inférieures à la moyenne en jaune.</li>
				</ul>
			</li>
			<li>Ajouter au tableau $note l'étudiant "Hugo" et sa note 14. Supprimer l'étudiant Clément du tableau. Trier votre tableau par ordre alphabétique des noms et afficher-le<br></li>
			<li>Trier le tableau par ordre décroissant des notes.</li>
			<li>Ajouter au début du tableau ces deux étudiants : "Cristophe"=>20 et "Karim" => 20. Afficher votre tableau.</li>
			<li>Créer deux tableaux $cleMax et $cleMin contenant les noms des étudiants qui ont la note maximale et minimale repectivement 
			(utiliser la fonction intégrée "array_keys")</li>
		</ol>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
		<?php
		echo "1)<br>";
		$notes = array(
			"Alixe"=> 13,
			"Justine"=>16,
			"Raja"=>10,
			"Jean"=>15,
			"Clément"=>10,
			"Mathieu"=>12,
			"Claire"=>11,
			"Juliette"=>20,
			"Paul"=>12);
		print_r($notes);

		echo "<br>2)<br>";
		echo "La note minimale est de ",min($notes)," et la note maximum est de ",max($notes);
		$moyenne = array_sum($notes)/count($notes);
		echo "<br>La moyenne de classe est de ",round($moyenne,2);

		echo"<br>3)<br>";
		function Affichage($tab){
			$moyenne = array_sum($tab)/count($tab);
			$min = min($tab);
			$max = max($tab);
			echo "<table>";
			foreach($tab as $student => $note) {
				$txtColor = "black";
				($note >= $moyenne)? $back = "orange" : $back = "yellow";
				if($note == $max){
					$txtColor = "red";
				}
				if($note == $min){
					$txtColor = "green";
				}
				echo "<tr style=background-color:$back><td>",$student,"</td><td> <span style=color:$txtColor> ",$note,"</span></td></tr>";
	
			}
			echo "</table>";
		}
		Affichage($notes);
		$notes["Hugo"] = 14;
		unset($notes["Clément"]);
		echo "<br>4) Ajout de Hugo et retrait de clément du tableau :<br><br>";
		Affichage($notes);
		echo "<br>5) tri décroissant des notes : <br><br>";
		arsort($notes);
		Affichage($notes);
		echo "<br>6) Ajout de Christophe et karim au début du tab :<br><br>";
		$notes = array("Christophe"=>20,"Karim"=>20)+$notes;
		Affichage($notes);
		echo "<br>7) <br>";
		$cleMax = array_keys($notes,max($notes));
		echo "Clé max : <br>";
		print_r($cleMax);
		$cleMin = array_keys($notes,min($notes));
		echo "<br>Clé min : <br>";
		print_r($cleMin);
		?>
    </body>
</html>