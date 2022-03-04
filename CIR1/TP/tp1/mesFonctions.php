<?php
//exo 8
function remplacerLettres($s){
    $s = str_replace("e","3",$s);
    $s = str_replace("i","1",$s);
    return $s;
}

//exo 9
function premierElementTableau($array){
            if(empty($array)){
                return NULL;
            }
            else{
                return $array[0];
            }
        } 

?>