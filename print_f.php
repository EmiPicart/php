<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function print_f($variable){
        if(is_array($variable)){
            $fNotas = fopen("notas.txt", "a");
            
            fwrite($fNotas, "Datos del array ==> \n");

            foreach ($variable as $item){
                fwrite($fNotas, $item . "\n");
            }

            echo "Archivo generado.";

            fclose($fNotas);

            //file_put_contents("notas.txt", $variable);
        }else{
            $contenido = "Datos de la variable ==>\n" . $variable;
            file_put_contents("datos.txt", $contenido);
        }
    }

    $aNotas = array(8, 5, 7, 9, 10);
    $msg = "Este es un mensaje";
    print_f($aNotas);
?>