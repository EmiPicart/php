<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $aPacientes = array();
    $aPacientes[] = array(
        "dni" => "33.765.012",
        "nombre" => "Ana Acuña",
        "edad" => 45,
        "peso" => 81.50
    );
    $aPacientes[] = array(
        "dni" => "23.684.385",
        "nombre" => "Gonzalo Bustamante",
        "edad" => 66,
        "peso" => 79
    );
    $aPacientes[] = array(
        "dni" => "12.111.222",
        "nombre" => "Ejem Plo",
        "edad" => 90,
        "peso" => 60
    );
    $aPacientes[] = array(
        "dni" => "43.936.004",
        "nombre" => "Emiliano Picart",
        "edad" => 22,
        "peso" => 62
    );
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Clientes clinica</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 py-3">
                <h1>Lista de Clientes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre y apellido</th>
                            <th>Edad</th>
                            <th>Peso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($contador = 0 ; $contador < count($aPacientes) ; $contador++){?>
                                <tr>
                                    <td><?php echo $aPacientes[$contador]["dni"]?></td>
                                    <td><?php echo $aPacientes[$contador]["nombre"]?></td>
                                    <td><?php echo $aPacientes[$contador]["edad"]?></td>
                                    <td><?php echo $aPacientes[$contador]["peso"]?></td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>