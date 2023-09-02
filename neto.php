<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function calcularNeto($bruto){
        return $neto = $bruto - ($bruto * 0.17);
    }

    echo "El sueldo neto es $" . calcularNeto(180000) . "<br>";
    echo "El sueldo neto es $" . calcularNeto(200000);

?>