<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    date_default_timezone_set("America/Argentina/Buenos_Aires");
    $nombre = "Emiliano Picart";
    $edad = "21";
    //$aPeliculas = array("Rapidos y Furiosos", "Saga de Avengers");
    $aPeliculas = ["Rapidos y Furiosos", "Saga de Avengers"]; //Otra forma
    /*print_r($aPeliculas);
    var_dump($aPeliculas);*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Ficha Personal</title>
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1>Ficha Personal</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-3">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Fecha:</th>
                        <td><?php echo date("d/m/Y"); ?></td>
                    </tr>
                    <tr>
                        <th>Nombre y apellido:</th>
                        <td><?php echo $nombre; ?></td>
                    </tr>
                    <tr>
                        <th>Edad:</th>
                        <td><?php echo $edad; ?></td>
                    </tr>
                    <tr>
                        <th>Películas favoritas:</th>
                        <td>
                            <?php echo $aPeliculas[0]; ?><br>
                            <?php echo $aPeliculas [1]; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</body>
</html>