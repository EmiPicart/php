<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $stock = 800;
    $venta = 1; //hubo venta

    if($venta){
        $stock--; //$stock = $stock - 1;
    }

    if($stock > 0){
        echo "Hay Stock";
    }else{
        echo "No hay Stock";
    }

?>