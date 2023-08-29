<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $valor = rand(1,50);
    
    echo "El numero random es $valor <br>";

    if($valor %2 == 0){
        echo "El numero $valor es par <br>";
    }else{
        echo "El numero $valor es impar <br>";
    }


    if($valor == 1 || $valor == 3 || $valor == 5){
        echo "El numero $valor es impar <br>";
    }else{
        echo "El numero $valor es par <br>";
    }
?>