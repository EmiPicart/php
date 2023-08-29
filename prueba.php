<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $miArray = array();
    $miArray[0] = 'Hola';
    $miArray[37] = 'Chau';
    $miArray[] = 'Adios';
    $miArray[] = 'Buenas tardes';
    $miArray[1] = 'Hello';
    $miArray[] = 'Bye';

    $aAgenda = array();
    $aAgenda = array(
        array("Lu", "Ma", "Mi", "Ju", "Vi"),
        array("Curso", "Libre", "Curso", "Libre", "Curso")
    );

    $aAgenda2 = array();
    $aAgenda2[0][0] = "Lu";
    $aAgenda2[0][1] = "Ma";
    $aAgenda2[0][2] = "Mi";
    $aAgenda2[0][3] = "Ju";
    $aAgenda2[0][4] = "Vi";
    $aAgenda2[1][0] = "Curso";
    $aAgenda2[1][1] = "Libre";
    $aAgenda2[1][2] = "Curso";
    $aAgenda2[1][3] = "Libre";
    $aAgenda2[1][4] = "Curso";

    $aAuto = array();
    $aAuto["color"] = array("Negro", "Verde");
    $aAuto["marca"] = "Ford";
    $aAuto["anio"] = "1908";
    $aAuto["precio"] = "800";

    echo "El auto " . $aAuto["marca"] . " del año " . $aAuto["anio"] . " es de color " . $aAuto["color"][0] . " y su precio es USD ". $aAuto["precio"] . "<br>";

    $nombre = 'Juan';
    $apellido = 'Perez';
    echo "Me llamo " . $nombre . " " . $apellido . "<br>";
    echo "Me llamo $nombre $apellido <br>";

    $num1 = 10;
    $num2 = 8;
    $resultado = $num1 + $num2;

    echo $resultado . "<br>";

    echo "La TV es de 42\" y cuesta $50.000 <br>";
    echo "El contenido de la variable \$nombre es $nombre <br>";

    $bVariable = true; //Variable booleana

    if( $bVariable == true ){
        echo "Hola mundoooo. <br>";
    }
    if( $bVariable == false){
        echo "TE LA COMISTEEE <br>";
    }

    $edad = 19;

    if( $edad >= 18){
        echo "Es mayor de edad <br>";
    }
    /*
    print_r($miArray);
    print_r($aAgenda);
    print_r($aAgenda2);
    print_r($aAuto);
    */
?>