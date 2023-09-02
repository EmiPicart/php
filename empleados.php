<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    function sueldoNeto($bruto){
        return $neto = $bruto - ($bruto * 0.17);
    };

    $aEmplados = array();
    $aEmplados[] = array("dni" => 33300123, "nombre" => "David García", "bruto" => 85000.30);
    $aEmplados[] = array("dni" => 40874456, "nombre" => "Ana Del Valle", "bruto" => 90000);
    $aEmplados[] = array("dni" => 67567565, "nombre" => "Andrés Perez", "bruto" => 100000);
    $aEmplados[] = array("dni" => 75744545, "nombre" => "Victoria Luz", "bruto" => 70000);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center p-5">
                    <h1>Lista de Empleados</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Sueldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($aEmplados as $emplado){ ?>
                                <tr>
                                    <td><?php echo $emplado["dni"] ?></td>
                                    <td><?php echo mb_strtoupper($emplado["nombre"]) ?></td>
                                    <td><?php echo "$" . number_format(sueldoNeto($emplado["bruto"]), 2 , "," , ".") ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12">
                            <p>Cantidad de empleados activos: <?php echo count($aEmplados) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>