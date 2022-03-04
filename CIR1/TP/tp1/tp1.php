<?php
include 'mesFonctions.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP1 : web dynamique</title>
        <meta charset="utf-8" />
        <style>
            h1{text-align:center;}
            h2{color:red;}
            h3{color:green;}
            h4{color:blue;}
            h5{color:pink;}
            .tableauExo7{border:medium solid red;}
        </style>
    </head>
    <body>
        <h1>TP1 : web dynamique</h1>
        <h2>Variables et constantes</h2>
        <h3>Exercice 1</h3>
        <h4>Enoncé</h4>
        <p>
        Donner la valeur des variables après chaque affectation, et corriger les "Warning". 
        Vous pouvez utiliser la fonction var_dump() qui donne plusieurs information sur une variable (type, taille ,valeur)
        </p>
        <h4>Solution</h4>
        <?php
            echo "<h5>Script 1</h5>";// affichage d'un code HTML
            $x="7 personnes"; 
            var_dump($x); //Utilisation de la fonction var_dump() qui donne : string(11) "7 personnes" : une chaine de 11 caracères
            echo "<br>"; // affichage d'un retour à la ligne
            $y=(integer)$x;
            var_dump($y);
            echo "<br>"; 
            $x="9E3";
            var_dump($x);
            echo "<br>";
            $z=(double)$x;
            var_dump($z);
            echo "<br>";
        
            echo "<h5>Script 2</h5>";
            $a="<br>Les ";
            $b="10 merveilles du monde";
            $c=$a.$b;
            $d=(integer)$b+13; //on passe b en entier
            var_dump($a);
            echo "<br>";
            var_dump($b);
            echo "<br>";
            var_dump($c);
            echo "<br>";
            var_dump($d);
            echo "<br>";
        
            $b=&$c;
            var_dump($b);
            echo "<br>";
            $b[1]=4;
            var_dump($b);
            echo "<br>";
    
            echo "<h5>Script 3</h5>";
            $a="5+6";
            var_dump($a);
            echo "<br>";
            $b="2E2";
            var_dump($b);
            echo "<br>";
            $c=(integer)$a+(integer)$b;
            var_dump($c);
            echo "<br>";
        
            echo "<h5>Script 4</h5>";
            $a="1";
            var_dump($a);
            echo "<br>";

            $b="FALSE";
            var_dump($b);
            echo "<br>";
            $c=FALSE;
            var_dump($c);
            echo "<br>";
            $d=($a OR $b);
            var_dump($d);
            echo "<br>";
            $e=($a AND $c);
            var_dump($e);
            echo "<br>";
            $f=($a XOR $b);
            var_dump($f);
            echo "<br>";

            echo "<h5>Script 5</h5>";
            $x="3 fois";
            var_dump($x);
            echo "<br>";
            $x = (float)$x*5.2;
            var_dump($x);
            echo "<br>";
            $z=$x%5;
            var_dump($z);
            echo "<br>";
            $x= "0" || 1;
            var_dump($x);
            echo "<br>";
            $y=is_string($x);
            var_dump($y);
            echo "<br>";
        ?>

        <h3>Exercice 2</h3>
        <h4>Enoncé</h4>
        <p>
        En utilisant les variables et les constantes prédéfinies du php, écrire un script qui permet d'afficher la version du php, 
        le système d'exploitation du serveur, le fichier courant, le host et la langue du navigateur client.<br>
        <a href="https://www.php.net/manual/fr/reserved.variables.php " target="_blank">Variables prédéfinies</a><br>
        <a href="https://www.php.net/manual/fr/reserved.constants.php  " target="_blank">Constantes prédéfinies</a><br>
        <a href="https://www.php.net/manual/fr/language.constants.magic.php  " target="_blank">Constantes magiques</a>
        </p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
        <?php
        echo "La version de php est : ".PHP_VERSION ,"<br>";
        echo "L'os du serveur est : ".PHP_OS_FAMILY,"<br>";
        echo "Le fichier courrant est : ".__FILE__,"<br>";
        echo "le host est : ",$_SERVER['SERVER_NAME'],"<br>";
        echo "La langue du nav client est : ",$_SERVER['HTTP_ACCEPT_LANGUAGE'];
        ?>

        <h2>Structures conditionnelles et itératives</h2>
        <h3>Exercice 3</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script pour tester si un nombre est à la fois un multiple de 3 et de 5.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
        <?php
            $nb = 16;
            if($nb % 3 == 0 && $nb % 5 == 0){
                echo "Le nombre $nb est divisible par 3 et 5.";
            }
            else{
                echo "Le nombre $nb n'est pas divisble par 3 et par 5.";
            }

        ?>
        <h3>Exercice 4</h3>
        <h4>Enoncé</h4>
        <p>En utilisant les variables $nombre1 $nombre2 et $operation, écrire un script effectuant une opération parmi les quatre 
            opérations arithmétiques élémentaires suivant la valeur de la variable $opération (utiliser l'instruction switch).</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
        <?php
            $nombre1 = 10;
            $nombre2 = 32;
            $operation = 1;
            switch ($operation){
                case 1:
                    echo "$nombre1 + $nombre2 = ",$nombre1 + $nombre2;
                    break;
                case 2:
                    echo "$nombre1 - $nombre2 = ",$nombre1 - $nombre2;
                    break;
                case 3:
                    echo "$nombre1*$nombre2 = ",$nombre1 * $nombre2;
                    break;
                case 4:
            
                    if ($nombre2 != 0){
                        echo "$nombre1 / $nombre2 = ",$nombre1/$nombre2;
                        break;
                    }
            }
        ?>
        

        <h3>Exercice 5</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script affichant les nombres de 1 à 100, et mettant les nombres pairs en rouge et le fond des multiples de 5 en vert.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
        <?php
            echo"<p>";
            for($i = 1;$i<=100;$i++){
                if($i % 2 ==0){
                    if($i%5 == 0){
                        echo "<span style=color:red;background-color:green> $i </span>";
                    }
                    else{
                        echo "<span style=color:red> $i </span>";
                    }
                }
                elseif($i %5 ==0){
                    echo"<span style=background-color:green> $i </span>";
                }
                else{
                    echo "$i";
                }
            }
            echo"</p>";
        ?>
        <h3>Exercice 6</h3>
        <h4>Enoncé</h4>
        <p>Ecrire un script faisant une suite de tirages de nombres aléatoires jusqu’à obtenir une suite composée d’un nombre pair 
            suivi de deux nombres impairs. Afficher le nombre d'itérations réalisées.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
        <?php
        $counter = 0; 
        $shot = false;
        do{
            $alea = rand(1,100);
            $counter++;
            if($alea%2==0){
                $alea = rand(1,100);
                $counter++;
                if($alea%2!=0){
                    $alea = rand(1,100);
                    $counter++;
                    if($alea%2!=0){
                        echo"$alea trouvé en $counter itérations.";
                        $shot = true; 
                    }
                }
            }
        }while($shot != true);
        ?>
        <h3>Exercice 7</h3>
        <h4>Enoncé</h4>
        <p>Écrire le code PHP/HTML/CSS permettant de réaliser le tableau suivant (il s'agit de la table de multiplication des nombres de 1 à 10) (Voir le fichier pdf).</p>
        <table>
            <caption>Exemple de tableau </caption>
            <tr>
                <td> élément 1.1</td>
                <td> élément 1.2</td>
            </tr>
            <tr>
                <td> élément 2.1</td>
                <td> élément 2.2</td>
            </tr>
        </table>

        <h4>Solution</h4>
        <!-- Votre solution ici -->
        <table class="tableauExo7">
        <?php
        for($x =1;$x<11;$x++){
            echo"<tr>";
            for($y = 1;$y<11;$y++){
                echo"<td style=width:50px;text-align:right>",$x*$y,"</td>";
            }
            echo"</tr>";
        }
        ?>
        </table>
        

        <h2>Fonctions et tableaux</h2>
        <h3>Exercice 8</h3>
        <h4>Enoncé</h4>
        <p>Créer une fonction appelée remplacerLettres(). Elle prendra un argument de type string. 
            Elle devra retourner ce même string mais en remplaçant les e par des 3, les i par des 1. </p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
        <?php 
            echo "string originale : testiie. Nouvelle string : ";
            echo remplacerLettres("testiie");
        ?>
        <h3>Exercice 9 (tableaux indexés)</h3>
        <h4>Enoncé</h4>
        <p>Créer une fonction appelée premierElementTableau(). Elle prendra un argument de type array. 
            Elle devra retourner le premier élément du tableau. Si l'array est vide, il faudra retourner null.</p>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
        <?php 
        
        $arr = ["a","b","c"];
        $arr2 = [];
        echo "tab1 : ",print_r($arr)," : ",premierElementTableau($arr),"<br>";
        echo "tab2 : ",print_r($arr2)," : ",premierElementTableau($arr2);
        ?>

        <h3>Exercice 10 (tableaux associatifs)</h3>
        <h4>Enoncé</h4>
        <p>En utilisant un tableau associatif avec les valeurs ci-dessous, afficher seulement les pays qui ont une population 
            supérieure ou égale à 20 millions d'habitants. Afficher les pays en utilisant une liste non-ordonnée.</p>
        <ul>
            <li>France : 67595000,</li>
            <li>Suede : 9998000,</li>
            <li>Suisse : 8417000,</li>
            <li>Kosovo : 1820631,</li>
            <li>Malte : 434403,</li>
            <li>Mexique : 122273500,</li>
            <li>Allemagne : 82800000,</li>
        </ul>
        <h4>Solution</h4>
        <!-- Votre solution ici -->
        <?php
        $country = ["France"=>67595000,
                    "Suede" => 9998000,
                    "Suisse" => 8417000,
                    "Kosovo" => 1820631,
                    "Malte" => 434403,
                    "Mexique" => 122273500,
                    "Allemagne" => 82800000];
        
        echo "<ul>";
        foreach($country as $cle => $valeur){
            if($valeur >= 20000000){
                echo "<li>",$cle,"</li>";
            }
        }
        echo"</ul>";
        ?>
      
        <h2>Factorisation du code</h2>
        <h3>Exercice 11</h3>
        <h4>Enoncé</h4>
        <p>Créer un fichier PHP appelé « mesFonctions.php »et y copier les fonctions définies dans les exercices 8 et 9 
            (supprimer la définition de ces fonctions de la page tp1.php). 
            Avant de tester ces fonctions dans les exercices 8 et 9, ajouter le fichier mesFonctions.php en utilisant : 
            inlude, include_once, require et require_once. 
            Laquelle de ces quatre options est la plus convenable ? justifier votre réponse.<br>
			<a href="https://www.php.net/manual/fr/language.control-structures.php" target="_blank">Documentation</a>
        </p>
        <h4>Justification</h4>
        <!-- Votre justification ici -->
        <!-- 
        Le include se trouve tout en haut de la page.
        La fonction include est plus appropriée car en cas d'erreur, elle n'empêchera pas 
        le code d'être interprété, et comme le code contenu dans mesFonctions.php sera 
        évalué plusieurs fois, include_once n'est pas une solution fonctionnelle.
         -->

    </body>
</html>